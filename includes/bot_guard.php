<?php
// Keep crawlers and AI scrapers off the site. robots.txt is advisory only, so
// known bot user agents are refused here as well.
function block_bots() {
    static $checked = false;
    if ($checked) return;
    $checked = true;

    header('X-Robots-Tag: noindex, nofollow, noarchive, nosnippet, noimageindex');

    $ua = strtolower($_SERVER['HTTP_USER_AGENT'] ?? '');

    // Empty user agents are not sent by normal browsers.
    $blocked = ($ua === '');

    // Generic crawler tokens (search engines, SEO tools, scrapers).
    foreach (['bot', 'crawl', 'spider', 'slurp', 'scrape', 'headless', 'python-requests', 'go-http-client', 'java/', 'libwww', 'httpclient', 'okhttp', 'aiohttp', 'node-fetch', 'axios', 'wget', 'curl/', 'facebookexternalhit'] as $token) {
        if (!$blocked && strpos($ua, $token) !== false) $blocked = true;
    }

    // Named AI and data-collection crawlers that do not always contain a generic token.
    foreach (['bytespider', 'anthropic-ai', 'claude', 'cohere', 'google-extended', 'meta-externalagent', 'omgili', 'petalbot', 'diffbot', 'imagesift', 'youbot', 'timpi', 'seekr', 'ai2bot', 'perplexity', 'gptbot', 'chatgpt'] as $token) {
        if (!$blocked && strpos($ua, $token) !== false) $blocked = true;
    }

    if ($blocked) {
        http_response_code(403);
        header('Content-Type: text/plain; charset=UTF-8');
        echo "Forbidden";
        exit;
    }
}
