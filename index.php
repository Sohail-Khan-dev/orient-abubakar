<?php
$page = 'home';
$pageTitle = '东方国际（集团）有限公司 | Orient International Holding';
include 'includes/header.php';
?>

<!-- Hero -->
<section class="hero">
  <?php if (has_asset('video/video1.mp4')): ?>
  <video class="hero-video" autoplay muted loop playsinline
         <?php if (has_asset('img/headquarters.jpg')) echo 'poster="assets/img/headquarters.jpg"'; ?>>
    <source src="assets/video/video1.mp4" type="video/mp4">
  </video>
  <div class="hero-overlay"></div>
  <?php endif; ?>
  <div class="container hero-inner">
    <h1>东方国际（集团）有限公司</h1>
    <p class="hero-en">ORIENT INTERNATIONAL HOLDING CO., LTD.</p>
    <p class="hero-slogan">一体两翼三支撑 · 构建全球贸易与供应链服务网络<br>
      "One Core, Two Wings, Three Pillars" — Building a Global Trade &amp; Supply Chain Network</p>
    <a href="about.php" class="btn">了解更多 LEARN MORE</a>
  </div>
  <svg class="hero-waves" viewBox="0 0 1440 90" preserveAspectRatio="none" aria-hidden="true">
    <path d="M0,40 C240,90 480,0 720,30 C960,60 1200,10 1440,50 L1440,90 L0,90 Z" fill="#ffffff"/>
  </svg>
</section>

<!-- About -->
<section class="section">
  <div class="container">
    <div class="section-head">
      <h2>关于我们</h2>
      <span class="en">About Us</span>
    </div>
    <p class="lead">
      东方国际（集团）有限公司是一家拥有先进制造业与现代服务业，以贸易与供应链服务为主体，
      以时尚产业、先进纺织制造为两翼，以功能性平台、纺织材料与贸易科技、产业金融投资为支撑，
      构建“一体两翼三支撑”战略布局的大型综合性企业集团。
    </p>
    <p class="lead">
      OIH is a large-scale comprehensive enterprise group that integrates advanced manufacturing
      and modern service industries, structured with trade and supply chain services as its core,
      fashion industry and advanced textile manufacturing as dual wings, supported by three
      strategic pillars.
    </p>

    <div class="stats-grid">
      <div class="stat"><?php asset_img('icons/home_icon01.png', '', 'stat-icon'); ?><div class="num" data-value="604">0<i>亿</i></div><div class="label">总资产<small>Total Assets (¥100M)</small></div></div>
      <div class="stat"><?php asset_img('icons/home_icon02.png', '', 'stat-icon'); ?><div class="num" data-value="72">0<i>家</i></div><div class="label">海外业务机构<small>Overseas Branches</small></div></div>
      <div class="stat"><?php asset_img('icons/home_icon05.png', '', 'stat-icon'); ?><div class="num" data-value="5.3">0<i>万</i></div><div class="label">员工<small>Employees (10K)</small></div></div>
      <div class="stat"><?php asset_img('icons/home_icon03.png', '', 'stat-icon'); ?><div class="num" data-value="376">0<i>家</i></div><div class="label">所属企业<small>Subsidiaries</small></div></div>
      <div class="stat"><?php asset_img('icons/home_icon04.png', '', 'stat-icon'); ?><div class="num" data-value="736">0<i>亿</i></div><div class="label">2025年营业收入<small>Revenue (¥100M)</small></div></div>
      <div class="stat"><?php asset_img('icons/home_icon06.png', '', 'stat-icon'); ?><div class="num" data-value="4">0<i>家</i></div><div class="label">上市公司<small>Listed Companies</small></div></div>
    </div>

    <p class="center"><a href="about.php" class="btn blue">了解更多 LEARN MORE</a></p>
  </div>
</section>

<!-- Strategy -->
<section class="section alt">
  <div class="container">
    <div class="section-head">
      <h2>构筑“一体两翼三支撑”战略布局</h2>
      <span class="en">One Core, Two Wings, Three Pillars</span>
    </div>

    <div class="cards-grid">
      <div class="card">
        <?php asset_img('image_maoyi-new.jpg', '贸易与供应链服务', 'card-img'); ?>
        <span class="tag core">一体 CORE</span>
        <h3>贸易与供应链服务</h3>
        <p class="en">Trade and Supply Chain Services</p>
        <a class="card-link" href="business.php#trade">了解更多 Learn more →</a>
      </div>
      <div class="card">
        <?php asset_img('image_pinpai-new.jpg', '时尚产业', 'card-img'); ?>
        <span class="tag wing">两翼 WING</span>
        <h3>时尚产业</h3>
        <p class="en">Fashion Industry</p>
        <a class="card-link" href="business.php#fashion">了解更多 Learn more →</a>
      </div>
      <div class="card">
        <?php asset_img('image_keji-new.jpg', '先进纺织制造', 'card-img'); ?>
        <span class="tag wing">两翼 WING</span>
        <h3>先进纺织制造</h3>
        <p class="en">Advanced Textile Manufacturing</p>
        <a class="card-link" href="business.php#manufacture">了解更多 Learn more →</a>
      </div>
      <div class="card">
        <?php asset_img('image_budongchan-new.jpg', '功能性平台', 'card-img'); ?>
        <span class="tag pillar">支撑 PILLAR</span>
        <h3>功能性平台</h3>
        <p class="en">Functional Platforms</p>
        <a class="card-link" href="business.php#estate">了解更多 Learn more →</a>
      </div>
      <div class="card">
        <?php asset_img('image_jinrong-new.jpg', '纺织材料与贸易科技', 'card-img'); ?>
        <span class="tag pillar">支撑 PILLAR</span>
        <h3>纺织材料与贸易科技</h3>
        <p class="en">Textile Materials &amp; Trade Technology</p>
        <a class="card-link" href="business.php#finance">了解更多 Learn more →</a>
      </div>
      <div class="card">
        <?php asset_img('image_dajiankang-new.jpg', '产业金融投资', 'card-img'); ?>
        <span class="tag pillar">支撑 PILLAR</span>
        <h3>产业金融投资</h3>
        <p class="en">Industrial Financial Investments</p>
        <a class="card-link" href="business.php#health">了解更多 Learn more →</a>
      </div>
    </div>
  </div>
</section>

<!-- Overseas -->
<section class="section">
  <div class="container split">
    <div>
      <h2>东方国际海外业务机构</h2>
      <p class="en">OIH Overseas Branches</p>
      <p>集团在海外有72家经营性机构，遍布五大洲20多个国家和地区，并与众多著名跨国公司开展合作，
         在全球190多个国家和地区拓展了国际贸易业务，货物发送全球280多个目的港。</p>
      <p>OIH owns 72 operational overseas institutions spread across more than 20 countries and
         regions in five continents, with international trade business in over 190 countries and
         goods delivered to more than 280 destination ports globally.</p>
      <a href="global.php" class="btn blue">了解更多 LEARN MORE</a>
    </div>
    <div class="world-visual">
      <?php asset_img('home_image11.jpg', '全球业务网络 Global network', 'visual-img'); ?>
      <div class="big">72 <i>家海外机构 Overseas Institutions</i></div>
      <ul>
        <li><span><?php asset_img('icons/home_icon07.png', '', 'li-icon'); ?>制造工厂 Factories</span> <b>32</b></li>
        <li><span><?php asset_img('icons/home_icon08.png', '', 'li-icon'); ?>贸易公司 Trading Companies</span> <b>40</b></li>
        <li><span><?php asset_img('icons/home_icon09.png', '', 'li-icon'); ?>研发中心 R&amp;D Centers</span> <b>4</b></li>
        <li><span><?php asset_img('icons/home_icon10.png', '', 'li-icon'); ?>物流中心 Logistic Centers</span> <b>1</b></li>
      </ul>
    </div>
  </div>
</section>

<!-- CIIE -->
<section class="section alt">
  <div class="container">
    <div class="ciie-banner">
      <h2>深度参与 · 全面服务</h2>
      <p class="en">Deep Engagement, Comprehensive Service — China International Import Expo (CIIE)</p>
      <div class="ciie-days">
        <div class="day"><b>6天</b><span>6 Days</span></div>
        <div class="arrow">→</div>
        <div class="day"><b>365天</b><span>365 Days</span></div>
        <div class="arrow">→</div>
        <div class="day"><b>一站式服务</b><span>One-stop Service</span></div>
      </div>
      <p>全系列办展资质：常年招展合作单位、区域性招商合作单位、主场运输服务商、特装施工服务商。</p>
      <p>Full-spectrum exhibition qualifications for CIIE: permanent exhibition recruitment partner,
         regional investment promotion partner, official on-site logistics service provider,
         custom booth construction service provider.</p>
      <a href="ciie.php" class="btn">了解更多 LEARN MORE</a>
    </div>

    <div class="photo-row">
      <?php asset_img('nanhongqiao.jpg', '南虹桥 South Hongqiao', 'photo'); ?>
      <?php asset_img('gongyinglian.jpg', '供应链服务 Supply chain services', 'photo'); ?>
      <?php asset_img('zoblshh.jpg', '中欧班列（上海号）China-Europe Railway Express (Shanghai)', 'photo'); ?>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
