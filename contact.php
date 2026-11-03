<?php
$page = 'contact';
$pageTitle = '联系我们 Contact Us | 东方国际（集团）有限公司';

// Submissions are stored outside the web root, so they cannot be downloaded
// directly even if the server ignores the .htaccess rule for *.log files.
$logDir  = dirname(__DIR__) . '/private';
$logFile = $logDir . '/messages.log';

const MAX_NAME_LEN    = 100;
const MAX_EMAIL_LEN   = 254;
const MAX_MESSAGE_LEN = 5000;
const SUBMIT_COOLDOWN = 30; // seconds between submissions from one visitor

ini_set('session.use_strict_mode', '1');
session_set_cookie_params([
    'lifetime' => 0,
    'path'     => '/',
    'secure'   => !empty($_SERVER['HTTPS']),
    'httponly' => true,
    'samesite' => 'Lax',
]);
session_start();

// Strip control characters (including CR/LF) so input cannot forge log lines
// or, later, mail headers. Invalid UTF-8 is rejected outright.
function clean_field($value) {
    if (!is_string($value) || !mb_check_encoding($value, 'UTF-8')) return '';
    return trim(preg_replace('/[\x00-\x1F\x7F]+/', ' ', $value));
}

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Handle the contact form submission.
$formMessage = '';
$formOk = false;
$name = $email = $message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $submittedToken = $_POST['csrf_token'] ?? '';
    $name    = clean_field($_POST['name'] ?? '');
    $email   = clean_field($_POST['email'] ?? '');
    $message = clean_field($_POST['message'] ?? '');

    if (!is_string($submittedToken) || !hash_equals($_SESSION['csrf_token'], $submittedToken)) {
        $formMessage = '表单已过期，请刷新页面后重试。Your session has expired. Please refresh the page and try again.';
    } elseif (($_POST['website'] ?? '') !== '') {
        // Honeypot field is hidden from people; only bots fill it in.
        // Pretend success so the bot gets no signal, but store nothing.
        $formOk = true;
        $formMessage = '感谢您的留言，我们会尽快回复。Thank you — we will get back to you soon.';
        $name = $email = $message = '';
    } elseif (time() - ($_SESSION['last_submit'] ?? 0) < SUBMIT_COOLDOWN) {
        $formMessage = '提交过于频繁，请稍后再试。Too many submissions. Please wait a moment and try again.';
    } elseif ($name === '' || $email === '' || $message === '') {
        $formMessage = '请填写所有字段。Please fill in all fields.';
    } elseif (mb_strlen($name) > MAX_NAME_LEN || mb_strlen($email) > MAX_EMAIL_LEN || mb_strlen($message) > MAX_MESSAGE_LEN) {
        $formMessage = '内容超出长度限制。One of the fields is too long.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $formMessage = '请输入有效的邮箱地址。Please enter a valid email address.';
    } else {
        $_SESSION['last_submit'] = time();

        if (!is_dir($logDir) && !mkdir($logDir, 0700, true) && !is_dir($logDir)) {
            $formMessage = '系统繁忙，请稍后再试。The system is busy. Please try again later.';
        } else {
            // Belt and braces: if the folder ends up inside the web root, deny web access to it.
            if (!is_file($logDir . '/.htaccess')) {
                file_put_contents($logDir . '/.htaccess', "<IfModule mod_authz_core.c>\n  Require all denied\n</IfModule>\n<IfModule !mod_authz_core.c>\n  Deny from all\n</IfModule>\n");
            }
            $line = sprintf("[%s] %s <%s>: %s\n", date('Y-m-d H:i:s'), $name, $email, $message);
            if (file_put_contents($logFile, $line, FILE_APPEND | LOCK_EX) === false) {
                $formMessage = '系统繁忙，请稍后再试。The system is busy. Please try again later.';
            } else {
                $formOk = true;
                $formMessage = '感谢您的留言，我们会尽快回复。Thank you — we will get back to you soon.';
                $name = $email = $message = '';
                // Rotate the token after each successful submission.
                $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            }
        }
    }
}
include 'includes/header.php';
?>

<section class="page-hero">
  <div class="container">
    <h1>联系我们</h1>
    <p>CONTACT US</p>
  </div>
</section>

<section class="section">
  <div class="container contact-grid">
    <div class="contact-info">
      <h3>东方国际（集团）有限公司</h3>
      <p><strong>地址 Address</strong><br>
         上海市长宁区虹桥路1488号<br>
         No. 1488 Hongqiao Road, Changning District, Shanghai</p>
      <p><strong>电话 Tel</strong><br>021-22110288</p>
      <p><strong>办公时间 Office Hours</strong><br>
         周一至周五 Mon–Fri 9:00 – 17:30</p>
    </div>

    <form class="contact-form" method="post" action="contact.php">
      <?php if ($formMessage): ?>
        <div class="form-msg <?php echo $formOk ? 'ok' : 'err'; ?>">
          <?php echo htmlspecialchars($formMessage, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>
        </div>
      <?php endif; ?>

      <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8'); ?>">

      <div class="form-hp" hidden>
        <label for="website">Website</label>
        <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
      </div>

      <div class="form-row">
        <label for="name">姓名 <small>Name</small></label>
        <input type="text" id="name" name="name" required maxlength="<?php echo MAX_NAME_LEN; ?>"
               value="<?php echo htmlspecialchars($name, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>">
      </div>
      <div class="form-row">
        <label for="email">邮箱 <small>Email</small></label>
        <input type="email" id="email" name="email" required maxlength="<?php echo MAX_EMAIL_LEN; ?>"
               value="<?php echo htmlspecialchars($email, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>">
      </div>
      <div class="form-row">
        <label for="message">留言 <small>Message</small></label>
        <textarea id="message" name="message" rows="5" required maxlength="<?php echo MAX_MESSAGE_LEN; ?>"><?php echo htmlspecialchars($message, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></textarea>
      </div>
      <button type="submit" class="btn blue">提交 Submit</button>
    </form>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
