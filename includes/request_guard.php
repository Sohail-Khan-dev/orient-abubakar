<?php
// Request guard: refuses attacks, scanners and abusive clients before any page
// renders. The site has no database, but these checks stop injection attempts,
// path traversal, vulnerability scanners and floods, and ban repeat offenders.
require_once __DIR__ . '/bot_guard.php';

const BAN_SECONDS   = 86400; // a banned address is refused for 24 hours
const RATE_LIMIT    = 120;   // requests per address...
const RATE_WINDOW   = 60;    // ...per this many seconds
const MAX_POST_SIZE = 20000; // bytes; the contact form needs far less

// Checked against the decoded URL (path and query string).
const ATTACK_URL_PATTERNS = [
    '/\.\.[\/\\\\]/',                                                        // path traversal
    '/\x00/',                                                                // null byte
    '/<\s*script|javascript:|on(error|load|click|mouseover)\s*=/i',          // XSS
    '/\bunion\b.*\bselect\b|\binformation_schema\b|\bxp_cmdshell\b|\bload_file\s*\(|\binto\s+outfile\b|@@version/i', // SQL injection
    '/\bsleep\s*\(|\bbenchmark\s*\(|\bwaitfor\s+delay\b|\b(or|and)\s+[\'"]?\d+[\'"]?\s*=\s*[\'"]?\d+/i',            // blind SQL injection
    '/\$\{jndi:/i',                                                          // Log4Shell
    '/<\?php|<\?=/i',                                                        // PHP code
    '/\/etc\/passwd|\/proc\/self|win\.ini|boot\.ini/i',                      // system file reads
];

// Form fields are free text, so only unambiguous attack signatures are checked there.
const ATTACK_FIELD_PATTERNS = [
    '/<\s*script|javascript:|on(error|load)\s*=/i',
    '/\bunion\b.*\bselect\b|\binformation_schema\b|\bxp_cmdshell\b/i',
    '/\$\{jndi:/i',
    '/<\?php|<\?=/i',
];

// Paths that only scanners ask for: version control, env files, CMS and database admin tools.
const PROBE_PATH_PATTERN = '/(^|\/)(\.(env|git|svn|hg|htpasswd|ds_store|aws|docker)|wp-(admin|login|content|includes|config)|phpmyadmin|pma|administrator|xmlrpc\.php|config\.php|web\.config|composer\.(json|lock)|package(-lock)?\.json|cgi-bin|vendor\/)|\.(bak|sql|swp|old|ini|conf|log)$/i';

function guard_decode($value) {
    // Decode a few times so double-encoded payloads are also caught.
    for ($i = 0; $i < 3; $i++) {
        $decoded = rawurldecode($value);
        if ($decoded === $value) break;
        $value = $decoded;
    }
    return $value;
}

function guard_matches($value, array $patterns) {
    foreach ($patterns as $pattern) {
        if (preg_match($pattern, $value)) return true;
    }
    return false;
}

function guard_dir() {
    // Same folder as the contact log: outside the project folder, as the file lives in includes/.
    $dir = dirname(__DIR__, 2) . '/private/guard';
    if (!is_dir($dir)) @mkdir($dir, 0700, true);
    // Same protection as the contact log folder, in case it sits inside the web root.
    $deny = dirname($dir) . '/.htaccess';
    if (is_dir(dirname($dir)) && !is_file($deny)) {
        @file_put_contents($deny, "<IfModule mod_authz_core.c>\n  Require all denied\n</IfModule>\n<IfModule !mod_authz_core.c>\n  Deny from all\n</IfModule>\n");
    }
    return $dir;
}

function guard_deny($code, $text) {
    http_response_code($code);
    header('Content-Type: text/plain; charset=UTF-8');
    echo $text;
    exit;
}

function guard_ban($ip) {
    $dir = guard_dir();
    if (is_dir($dir)) {
        @file_put_contents($dir . '/ban_' . sha1($ip), (string) (time() + BAN_SECONDS), LOCK_EX);
    }
}

function guard_rate_limit($ip) {
    $dir = guard_dir();
    if (!is_dir($dir)) return;

    $file = $dir . '/rate_' . sha1($ip);
    $now = time();
    $data = is_file($file) ? json_decode((string) file_get_contents($file), true) : null;
    if (!is_array($data) || $now - ($data['start'] ?? 0) >= RATE_WINDOW) {
        $data = ['start' => $now, 'count' => 0];
    }
    $data['count']++;
    @file_put_contents($file, json_encode($data), LOCK_EX);

    if ($data['count'] > RATE_LIMIT) {
        header('Retry-After: ' . RATE_WINDOW);
        guard_deny(429, 'Too Many Requests');
    }
}

function guard_request() {
    static $done = false;
    if ($done) return;
    $done = true;

    ini_set('display_errors', '0');
    header_remove('X-Powered-By');

    $ip = $_SERVER['REMOTE_ADDR'] ?? '';

    // Refuse addresses that are still serving a ban.
    $banFile = guard_dir() . '/ban_' . sha1($ip);
    if (is_file($banFile)) {
        if ((int) file_get_contents($banFile) > time()) {
            guard_deny(403, 'Forbidden');
        }
        @unlink($banFile);
    }

    // The site only uses GET, HEAD and POST.
    $method = $_SERVER['REQUEST_METHOD'] ?? '';
    if (!in_array($method, ['GET', 'HEAD', 'POST'], true)) {
        header('Allow: GET, HEAD, POST');
        guard_deny(405, 'Method Not Allowed');
    }

    // Attacks in the URL: ban the address and refuse the request.
    $url = guard_decode($_SERVER['REQUEST_URI'] ?? '');
    if (guard_matches($url, ATTACK_URL_PATTERNS) || preg_match(PROBE_PATH_PATTERN, $url)) {
        guard_ban($ip);
        guard_deny(403, 'Forbidden');
    }

    // Attacks in submitted form fields.
    if ($method === 'POST') {
        if ((int) ($_SERVER['CONTENT_LENGTH'] ?? 0) > MAX_POST_SIZE) {
            guard_deny(413, 'Payload Too Large');
        }
        $attack = false;
        array_walk_recursive($_POST, function ($value) use (&$attack) {
            if (is_string($value) && guard_matches(guard_decode($value), ATTACK_FIELD_PATTERNS)) {
                $attack = true;
            }
        });
        if ($attack) {
            guard_ban($ip);
            guard_deny(403, 'Forbidden');
        }
    }

    guard_rate_limit($ip);
}

// Every page calls this first: the request checks, then the crawler block.
function guard_all() {
    guard_request();
    block_bots();
}
