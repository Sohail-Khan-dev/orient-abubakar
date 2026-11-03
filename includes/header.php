<?php
// Shared header: set $page and $pageTitle before including this file.
$page = $page ?? '';
$pageTitle = $pageTitle ?? '东方国际（集团）有限公司 | Orient International Holding';

// Refuse attacks, abusive clients and crawlers before anything is rendered.
require_once __DIR__ . '/request_guard.php';
guard_all();

// Security headers. Sent from PHP (not .htaccess) so they reach the server with the deploy.
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');
header('Referrer-Policy: strict-origin-when-cross-origin');
header('Permissions-Policy: camera=(), microphone=(), geolocation=(), payment=()');
header("Content-Security-Policy: default-src 'self'; img-src 'self' data:; media-src 'self'; style-src 'self'; script-src 'self'; object-src 'none'; base-uri 'self'; form-action 'self'; frame-ancestors 'self'");
if (!empty($_SERVER['HTTPS'])) {
    header('Strict-Transport-Security: max-age=31536000');
}

$nav = [
    'home'     => ['index.php',    '首页',     'Homepage'],
    'about'    => ['about.php',    '集团简介', 'Profile'],
    'business' => ['business.php', '主营业务', 'Core Business'],
    'global'   => ['global.php',   '跨国经营', 'Transnational'],
    'ciie'     => ['ciie.php',     '进博会',   'CIIE'],
    'news'     => ['news.php',     '集团新闻', 'News'],
    'contact'  => ['contact.php',  '联系我们', 'Contact Us'],
];

// Output an <img> only when the file exists in assets/img, so the layout
// still looks finished before the media files have been added.
function asset_img($file, $alt = '', $class = '') {
    $path = 'assets/img/' . $file;
    if (!is_file(__DIR__ . '/../' . $path)) return;
    echo '<img src="' . $path . '" alt="' . htmlspecialchars($alt) . '"'
       . ($class ? ' class="' . $class . '"' : '') . ' loading="lazy">';
}

function has_asset($path) {
    return is_file(__DIR__ . '/../assets/' . $path);
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="noindex, nofollow, noarchive, nosnippet, noimageindex">
<title><?php echo htmlspecialchars($pageTitle); ?></title>
<link rel="icon" type="image/x-icon" href="favicon.ico">
<link rel="stylesheet" href="assets/css/style.css">
<?php if ($page === 'home'): ?>
<link rel="stylesheet" href="assets/css/home.css">
<?php endif; ?>
</head>
<body<?php echo $page === 'home' ? ' class="page-home"' : ''; ?>>

<header class="site-header">
  <div class="container header-inner">
    <a href="index.php" class="logo">
      <?php if ($page === 'home' && has_asset('img/logo.png')): ?>
      <img src="assets/img/logo.png" alt="东方国际（集团）有限公司 ORIENT INTERNATIONAL HOLDING" class="logo-full">
      <?php else: ?>
      <?php if (has_asset('img/logo-mark.png')): ?>
      <img src="assets/img/logo-mark.png" alt="" class="logo-img">
      <?php else: ?>
      <svg viewBox="0 0 48 48" width="44" height="44" aria-hidden="true">
        <path d="M10 24 a14 14 0 0 1 28 0 Z" fill="#e60012"/>
        <path d="M6 30 q6 -5 12 0 t12 0 t12 0 v4 q-6 5 -12 0 t-12 0 t-12 0 Z" fill="#004098"/>
        <path d="M6 38 q6 -5 12 0 t12 0 t12 0 v3 q-6 4 -12 0 t-12 0 t-12 0 Z" fill="#004098" opacity="0.65"/>
      </svg>
      <?php endif; ?>
      <span class="logo-text">
        <strong>东方国际（集团）有限公司</strong>
        <small>ORIENT INTERNATIONAL HOLDING CO., LTD.</small>
      </span>
      <?php endif; ?>
    </a>

    <button class="nav-toggle" id="navToggle" aria-label="菜单 Menu">☰</button>

    <nav class="main-nav" id="mainNav">
      <?php foreach ($nav as $key => $item): ?>
        <a href="<?php echo $item[0]; ?>" class="<?php echo $key === $page ? 'active' : ''; ?>">
          <?php echo $item[1]; ?><small><?php echo $item[2]; ?></small>
        </a>
      <?php endforeach; ?>
    </nav>
  </div>
</header>
