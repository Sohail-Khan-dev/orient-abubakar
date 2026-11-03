<?php
$page = 'about';
$pageTitle = '集团简介 Profile | 东方国际（集团）有限公司';
include 'includes/header.php';

$history = [
    ['1861', '外商第一家动力机器纺丝厂开工', 'The first foreign-owned powered silk-reeling mill opens', false],
    ['1878', '建立上海机器织布制造局', 'Shanghai Machine Weaving Bureau is established', false],
    ['1949', '新中国建立纺织工业部华东纺织管理局、上海市纺织工业局', 'East China Textile Administration and Shanghai Textile Industry Bureau are founded', false],
    ['1949', '全国最早的外贸服务公司成立', 'China\'s earliest foreign trade service companies are founded', false],
    ['1984', '纺织品、丝绸、服装、针织、家纺被誉为“五朵金花”', 'Textiles, silk, garments, knitwear and home textiles become known as the "Five Golden Flowers"', false],
    ['1993', '龙头股份、申达股份A股上市', 'Dragon Head and Shenda list on the A-share market', false],
    ['1994', '“五朵金花”组建东方国际（集团）有限公司', 'The "Five Golden Flowers" form Orient International Holding', true],
    ['1999', '首次名列中国最大的出口企业200强榜首', 'Ranks first among China\'s 200 largest exporters for the first time', false],
    ['2000', '东方创业A股上市', 'Orient International Enterprise lists on the A-share market', false],
    ['2001', '上海纺织（集团）有限公司成立', 'Shanghai Textile (Group) Co., Ltd. is established', false],
    ['2017', '东方国际集团和上海纺织集团联合重组为新的东方国际集团', 'OIH and Shanghai Textile Group merge to form the new OIH', true],
];
?>

<section class="page-hero">
  <div class="container">
    <h1>集团简介</h1>
    <p>GROUP PROFILE</p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-head">
      <h2>关于东方国际</h2>
      <span class="en">About OIH</span>
    </div>

    <div class="prose">
      <p class="slogan">东方先进制造通全球 · 国际现代服务达五洲</p>

      <p>东方国际（集团）有限公司由具有160年历史的上海纺织集团和具有70年外贸历史的原东方国际集团联合重组而成，是一家拥有先进制造业与现代服务业，以贸易与供应链服务为主体，以时尚产业、先进纺织制造为两翼，以功能性平台、纺织材料与贸易科技、产业金融投资为支撑，构建“一体两翼三支撑”战略布局的大型综合性企业集团。</p>

      <p>集团拥有总资产582亿元、员工5.8万人（海外员工占70%），2024年快报营业收入710亿元，进出口56.8亿美元（出口42.4亿美元、进口14.4亿美元）。集团在海外拥有73家业务机构，分布在五大洲20多个国家和地区。所属企业377家，上市公司4家（东方创业、申达股份、龙头股份、香港联泰控股）。</p>

      <p>集团在国内外建成了一批先进制造基地，拥有全球第二的汽车内饰、全球第二的时尚箱包、全球第四的毛衫制造能力和一批为贸易配套的服装（面料）制造工厂。</p>

      <p>集团已在世界190多个国家或地区拓展了业务，与众多著名跨国公司开展了合作，拥有“三枪”“衣架”“银河”等著名品牌和里奥竹等自主知识产权高新纤维。在国内有近1000家直营零售终端。</p>

      <p>集团打造了一批时尚产业服务平台，“上海时装周”影响力亚洲第一，跻身世界五大时装周行列；拥有M50、上海国际时尚中心等60多个时尚创意园区，总面积240万平米，园区建设和体量达到全国第一。集团正在成为中国最具影响力的时尚产业综合配套服务商。</p>

      <p>集团连续服务七届进博会，具备进博会招商、招展、特装施工服务商和主场运输服务商等全系列办展资质。虹桥品汇作为承接和放大进博会溢出效应“6天+365天”常年展示交易平台，打造虹桥国际咖啡港、上海国际友城港、“丝路电商”合作先行区等功能性平台，已服务全球120多个国家和地区的6000多个品牌，商品种类超过8.5万多种。</p>

      <p>集团中欧班列“上海号”开行超过三百列，覆盖中欧线、中亚线等主要线路，联通了欧亚15个国家、境外120多个城市与站点，运载产品超1300余类，为促进上海与共建“一带一路”国家贸易发挥重要作用。</p>

      <p>集团旗下上海国际棉花交易中心，是在上海自贸区内唯一的棉花、纺织原料及纺织品交易平台，拥有专业交易会员492家，交易规模近500亿元，已经发展成为“交易服务、期现联动、数据增信、智能物流、金融创新”为一体的大宗商品交易平台。</p>

      <p>东方国际集团将发挥产业链“链主”的“强强联手、强优互补”新优势，提升国际国内两个市场“双循环”的统筹能力，打造“全球布局、跨国经营”的综合贸易实业航母舰队，努力在上海“五个中心”建设和具有世界影响力的社会主义现代化国际大都市建设中发挥主力军的作用。</p>
    </div>

    <p class="lead">
      OIH was formed by the merger of the 160-year-old Shanghai Textile Group and the original
      Orient International Group, with 70 years of foreign trade history. It is a large-scale
      comprehensive enterprise group built on the "One Core, Two Wings, Three Pillars" framework:
      trade and supply chain services at its core, fashion and advanced textile manufacturing as
      its two wings, supported by functional platforms, textile materials &amp; trade technology,
      and industrial financial investment.
    </p>

    <div class="photo-row single">
      <?php asset_img('headquarters.jpg', '东方国际总部大楼 OIH headquarters', 'photo'); ?>
    </div>

    <div class="stats-grid">
      <div class="stat"><?php asset_img('icons/home_icon01.png', '', 'stat-icon'); ?><div class="num" data-value="604">0<i>亿</i></div><div class="label">总资产<small>Total Assets (¥100M)</small></div></div>
      <div class="stat"><?php asset_img('icons/home_icon04.png', '', 'stat-icon'); ?><div class="num" data-value="736">0<i>亿</i></div><div class="label">2025年营业收入<small>Revenue (¥100M)</small></div></div>
      <div class="stat"><?php asset_img('icons/home_icon05.png', '', 'stat-icon'); ?><div class="num" data-value="5.3">0<i>万</i></div><div class="label">员工<small>Employees (10K)</small></div></div>
      <div class="stat"><?php asset_img('icons/home_icon03.png', '', 'stat-icon'); ?><div class="num" data-value="376">0<i>家</i></div><div class="label">所属企业<small>Subsidiaries</small></div></div>
      <div class="stat"><?php asset_img('icons/home_icon06.png', '', 'stat-icon'); ?><div class="num" data-value="4">0<i>家</i></div><div class="label">上市公司<small>Listed Companies</small></div></div>
      <div class="stat"><?php asset_img('icons/home_icon02.png', '', 'stat-icon'); ?><div class="num" data-value="72">0<i>家</i></div><div class="label">海外业务机构<small>Overseas Branches</small></div></div>
    </div>
  </div>
</section>

<section class="section alt">
  <div class="container">
    <div class="section-head">
      <h2>历史沿革</h2>
      <span class="en">History</span>
    </div>
    <div class="timeline">
      <?php foreach ($history as $h): ?>
      <div class="timeline-item<?php echo $h[3] ? ' key' : ''; ?>">
        <b><?php echo $h[0]; ?></b>
        <p><?php echo htmlspecialchars($h[1]); ?><br><small><?php echo htmlspecialchars($h[2]); ?></small></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-head">
      <h2>企业文化</h2>
      <span class="en">Corporate Culture</span>
    </div>
    <div class="culture-grid">
      <div class="culture-item">
        <h3>使命<small>Mission</small></h3>
        <p>集成全球资源，服务美好生活</p>
      </div>
      <div class="culture-item">
        <h3>愿景<small>Vision</small></h3>
        <p>致力于成为全球综合贸易服务商和时尚生活引领者</p>
      </div>
      <div class="culture-item">
        <h3>价值观<small>Values</small></h3>
        <p>以诚为本 包容共赢 以人为本 追求卓越</p>
      </div>
      <div class="culture-item">
        <h3>企业精神<small>Corporate Spirit</small></h3>
        <p>爱国 经纬 时尚 创新</p>
      </div>
      <div class="culture-item">
        <h3>领导行为守则<small>Leadership Code</small></h3>
        <p>知责，尽责，能负责<br>敢为，善为，能作为<br>明变，求变，能驭变<br>识人，容人，能育人</p>
      </div>
      <div class="culture-item">
        <h3>员工行为准则<small>Employee Code</small></h3>
        <p>诚实守纪 勤勉敬业 合作创新</p>
      </div>
      <div class="culture-item">
        <h3>企业作风 · 四个顽强<small>Work Style · Four Tenacities</small></h3>
        <p>顽强拼搏、顽强意志、顽强转型、顽强担当</p>
      </div>
      <div class="culture-item">
        <h3>企业作风 · 四个不怕<small>Work Style · Four Fearlesses</small></h3>
        <p>不怕不懂、不怕第一个吃螃蟹、不怕一时没资源、不怕困难矛盾阻挡</p>
      </div>
      <div class="culture-item">
        <h3>企业作风 · 四个特能<small>Work Style · Four Excellences</small></h3>
        <p>特别能吃苦、特别能战斗、特别能创新、特别能奉献</p>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
