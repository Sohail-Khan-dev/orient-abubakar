<?php
$page = 'contact';
$pageTitle = '联系我们 Contact Us | 东方国际（集团）有限公司';

// Handle the contact form submission.
$formMessage = '';
$formOk = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['name'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name === '' || $email === '' || $message === '') {
        $formMessage = '请填写所有字段。Please fill in all fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $formMessage = '请输入有效的邮箱地址。Please enter a valid email address.';
    } else {
        // Save the message to a local file. On a live server you could
        // use mail() here to send it to the company inbox instead.
        $line = sprintf("[%s] %s <%s>: %s\n",
            date('Y-m-d H:i:s'), $name, $email, str_replace(["\r", "\n"], ' ', $message));
        file_put_contents(__DIR__ . '/messages.log', $line, FILE_APPEND | LOCK_EX);

        $formOk = true;
        $formMessage = '感谢您的留言，我们会尽快回复。Thank you — we will get back to you soon.';
        $name = $email = $message = '';
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
          <?php echo htmlspecialchars($formMessage); ?>
        </div>
      <?php endif; ?>

      <div class="form-row">
        <label for="name">姓名 <small>Name</small></label>
        <input type="text" id="name" name="name" required
               value="<?php echo htmlspecialchars($name ?? ''); ?>">
      </div>
      <div class="form-row">
        <label for="email">邮箱 <small>Email</small></label>
        <input type="email" id="email" name="email" required
               value="<?php echo htmlspecialchars($email ?? ''); ?>">
      </div>
      <div class="form-row">
        <label for="message">留言 <small>Message</small></label>
        <textarea id="message" name="message" rows="5" required><?php echo htmlspecialchars($message ?? ''); ?></textarea>
      </div>
      <button type="submit" class="btn blue">提交 Submit</button>
    </form>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
