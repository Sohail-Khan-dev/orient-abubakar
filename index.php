<?php
$page = 'home';
$pageTitle = '东方国际（集团）有限公司 | Orient International Holding';
include 'includes/header.php';

// Figures in the introduction: [icon, zh label, en label, value, unit]
$stats = [
  ['icons/home_icon01.png', '总资产', 'Total Assets', '604', '亿'],
  ['icons/home_icon03.png', '海外业务机构', 'Overseas Branches', '72', '家'],
  ['icons/home_icon05.png', '员工', 'Employees', '5.3', '万'],
  ['icons/home_icon02.png', '所属企业', 'Subsidiaries', '376', '家'],
  ['icons/home_icon04.png', '2025年营业收入', 'Revenue', '736', '亿'],
  ['icons/home_icon06.png', '上市公司', 'Listed Companies', '4', '家'],
];

// Overseas footprint: [icon, zh label, en label, value]
$footprint = [
  ['icons/home_icon07.png', '制造工厂', 'Factories', '32'],
  ['icons/home_icon08.png', '贸易公司', 'Trading Companies', '40'],
  ['icons/home_icon09.png', '研发中心', 'R&amp;D Centers', '4'],
  ['icons/home_icon10.png', '物流中心', 'Logistic Centers', '1'],
];

// Strategy tiles: [image, zh title, en title, link]
$strategy = [
  ['image_maoyi-new.jpg', '贸易与供应链服务', 'Trade and Supply Chain Services', 'business.php#trade'],
  ['image_pinpai-new.jpg', '时尚产业', 'Fashion Industry', 'business.php#fashion'],
  ['image_keji-new.jpg', '先进纺织制造', 'Advanced Textile Manufacturing', 'business.php#manufacture'],
  ['image_budongchan-new.jpg', '功能性平台', 'Functional Platforms', 'business.php#estate'],
  ['image_jinrong-new.jpg', '纺织材料与贸易科技', 'Textile Materials &amp; Technology', 'business.php#finance'],
  ['image_dajiankang-new.jpg', '产业金融投资', 'Industrial Financial Investments', 'business.php#health'],
];
?>

<!-- Side drawer, opened by the menu button in the header -->
<div class="hm-cover" id="hmCover"></div>
<aside class="hm-drawer" id="hmDrawer" aria-label="网站导航 Site menu">
  <ul>
    <?php foreach ($nav as $item): ?>
    <li><a href="<?php echo $item[0]; ?>"><span class="zh"><?php echo $item[1]; ?></span><span class="en"><?php echo $item[2]; ?></span></a></li>
    <?php endforeach; ?>
  </ul>
  <div class="hm-qr">
    <img src="assets/img/qrcode.jpg" alt="微信公众号 WeChat" width="120" height="120">
    <p>微信公众号 WeChat</p>
  </div>
</aside>

<!-- Hero: full-screen video -->
<section class="hm-hero" id="top">
  <?php if (has_asset('video/video1.mp4')): ?>
  <video class="hm-hero-video" autoplay muted loop playsinline
         <?php if (has_asset('img/headquarters.jpg')) echo 'poster="assets/img/headquarters.jpg"'; ?>>
    <source src="assets/video/video1.mp4" type="video/mp4">
  </video>
  <?php endif; ?>
  <h1 class="hm-sr">东方国际（集团）有限公司 ORIENT INTERNATIONAL HOLDING CO., LTD.</h1>
  <a class="hm-arrow" href="#intro" aria-label="向下浏览 Scroll down">
    <img src="assets/img/icons/icon_mouse.png" alt="">
  </a>
</section>

<!-- Introduction -->
<section class="hm-section hm-intro" id="intro">
  <div class="hm-textwapers">
    <?php asset_img('headquarters.jpg', '', 'hm-bg'); ?>
    <div class="hm-textwaper">
      <h4 class="anim-up">
        <span class="zh">关于我们</span>
        <span class="en">ABOUT US</span>
      </h4>
      <span class="hm-hr anim-up d1"></span>
      <div class="hm-text anim-up d2">
        <p class="zh">东方国际（集团）有限公司是一家拥有先进制造业与现代服务业，以贸易与供应链服务为主体，以时尚产业、先进纺织制造为两翼，以功能性平台、纺织材料与贸易科技、产业金融投资为支撑，构建“一体两翼三支撑”战略布局的大型综合性企业集团。</p>
        <p class="en">OIH is a large-scale comprehensive enterprise group that integrates advanced manufacturing and modern service industries. Structured with trade and supply chain services as its core, fashion industry and advanced textile manufacturing as dual wings, and supported by three strategic pillars, it forms a "One Core, Two Wings, Three Pillars" strategic framework.</p>
      </div>
      <a class="hm-more anim-up d3" href="about.php">
        <span class="zh">了解更多</span>
        <span class="en">Learn More</span>
      </a>
    </div>
  </div>

  <div class="hm-stats">
    <?php foreach ($stats as $s): ?>
    <div class="hm-stat">
      <?php asset_img($s[0], '', 'hm-stat-icon'); ?>
      <div class="hm-stat-label">
        <span class="zh"><?php echo $s[1]; ?></span>
        <span class="en"><?php echo $s[2]; ?></span>
      </div>
      <div class="hm-stat-value"><span class="num" data-value="<?php echo $s[3]; ?>"><?php echo $s[3]; ?></span><i><?php echo $s[4]; ?></i></div>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- Strategy -->
<section class="hm-section hm-business" id="business">
  <canvas class="hm-canvas" aria-hidden="true"></canvas>
  <div class="hm-wrap">
    <div class="hm-desc anim-up">
      <span class="zh">构筑“一体两翼三支撑”战略布局</span>
      <span class="en">One Core, Two Wings, Three Pillars" Strategic Framework</span>
    </div>
    <span class="hm-hr hm-hr--grey"></span>

    <div class="hm-biz-grid">
      <?php foreach ($strategy as $i => $card): ?>
      <a class="hm-biz-card anim-up d<?php echo $i + 1; ?>" href="<?php echo $card[3]; ?>">
        <?php asset_img($card[0], $card[1], 'hm-bg hm-biz-img'); ?>
        <span class="hm-biz-ts">
          <span class="hm-biz-zh"><?php echo $card[1]; ?></span>
          <span class="hm-biz-en"><?php echo $card[2]; ?></span>
        </span>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Overseas branches -->
<section class="hm-section hm-overseas" id="overseas">
  <div class="hm-overseas-head hm-wrap anim-up">
    <h4>
      <span class="zh">东方国际（集团）有限公司海外业务机构</span>
      <span class="en">OIH Overseas Branches</span>
    </h4>
    <span class="hm-hr hm-hr--wide"></span>
    <p class="zh lead">集团在海外有72家经营性机构，遍布五大洲20多个国家和地区，并与众多著名跨国公司开展合作，在全球190多个国家和地区拓展了国际贸易业务，货物发送全球280多个目的港。</p>
    <p class="en lead">OIH owns 72 operational overseas institutions spread across more than 20 countries and regions in five continents. It has established cooperation with numerous world-famous multinational corporations, expanded international trade business in over 190 countries and regions worldwide, and delivered goods to more than 280 destination ports globally.</p>
  </div>

  <div class="hm-mbg">
    <?php asset_img('home_image11.jpg', '全球业务网络 Global network', 'hm-bg'); ?>
    <a class="hm-more" href="global.php">
      <span class="zh">了解更多</span>
      <span class="en">Learn More</span>
    </a>
  </div>

  <div class="hm-wrap hm-overseas-list">
    <?php foreach ($footprint as $f): ?>
    <div class="hm-overseas-item">
      <?php asset_img($f[0], '', 'hm-stat-icon'); ?>
      <div>
        <span class="zh"><?php echo $f[1]; ?></span>
        <span class="en"><?php echo $f[2]; ?></span>
      </div>
      <span class="num" data-value="<?php echo $f[3]; ?>"><?php echo $f[3]; ?></span>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- CIIE -->
<section class="hm-section hm-ciie" id="ciie">
  <div class="hm-ciie-left">
    <?php asset_img('image_pinpai-new.jpg', '', 'hm-bg'); ?>
    <div class="hm-overlay"></div>
    <div class="hm-ciie-text anim-up">
      <p class="zh">深度参与&nbsp;&nbsp;&nbsp;&nbsp;全面服务</p>
      <p class="en">Deep Engagement, Comprehensive Service</p>
      <p class="zh hm-ciie-title">中国国际进口博览会</p>
      <p class="en">China International Import Expo</p>
    </div>
  </div>

  <div class="hm-ciie-right">
    <div class="hm-cell">
      <?php asset_img('image_dajiankang-new.jpg', '', 'hm-bg'); ?>
      <div class="hm-overlay"></div>
      <div class="hm-cell-text anim-up d1">
        <p class="zh">6天</p>
        <p class="en">6 Days</p>
      </div>
    </div>
    <div class="hm-cell">
      <?php asset_img('image_jinrong-new.jpg', '', 'hm-bg'); ?>
      <div class="hm-overlay"></div>
      <div class="hm-cell-text anim-up d2">
        <p class="zh">365天</p>
        <p class="en">365 Days</p>
      </div>
    </div>
    <div class="hm-cell">
      <?php asset_img('gongyinglian.jpg', '', 'hm-bg'); ?>
      <div class="hm-overlay"></div>
      <div class="hm-cell-text anim-up d3">
        <p class="zh">一站式服务</p>
        <p class="en">One-stop Service</p>
        <p class="zh2">全系列办展资质：常年招展合作单位、区域性招商合作单位、主场运输服务商、特装施工服务商。</p>
        <p class="en2">Full-spectrum exhibition qualifications: permanent exhibition recruitment partner, regional investment promotion partner, official on-site logistics service provider, custom booth construction service provider.</p>
      </div>
    </div>
    <div class="hm-cell">
      <?php asset_img('zoblshh.jpg', '', 'hm-bg'); ?>
      <div class="hm-overlay"></div>
      <div class="hm-cell-text anim-up d4">
        <p class="zh">中欧班列（上海号）</p>
        <p class="en">China-Europe Railway Express (Shanghai)</p>
      </div>
    </div>
  </div>
</section>

<!-- Contact -->
<section class="hm-section hm-contact" id="contact">
  <div class="hm-contact-map">
    <?php asset_img('nanhongqiao.jpg', '东方国际 虹桥路1488号 OIH, 1488 Hongqiao Road', 'hm-bg'); ?>
  </div>
  <div class="hm-wedge"></div>
  <div class="hm-tex">
    <h3 class="anim-up d1">联系我们 Contact Us</h3>
    <ul class="anim-up d2">
      <li>上海市长宁区虹桥路1488号</li>
      <li>No. 1488 Hongqiao Road, Changning District, Shanghai</li>
      <li class="hm-tex-sep">电话 Tel：021-22110288</li>
    </ul>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
