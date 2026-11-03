<?php
// Shown for every missing page. Running the request guard here lets scanners
// that probe for missing files (.env, wp-login.php, ...) be refused and banned.
require_once __DIR__ . '/includes/request_guard.php';
guard_all();

http_response_code(404);
$page = '404';
$pageTitle = '页面未找到 Page Not Found | 东方国际（集团）有限公司';
include 'includes/header.php';
?>

<section class="page-hero">
  <div class="container">
    <h1>页面未找到</h1>
    <p>PAGE NOT FOUND</p>
  </div>
</section>

<section class="section">
  <div class="container">
    <p class="lead">您访问的页面不存在。The page you requested does not exist.</p>
    <p class="lead"><a href="index.php">返回首页 Back to homepage</a></p>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
