<?php
$page = 'news';
$pageTitle = '集团新闻 News | 东方国际（集团）有限公司';
include 'includes/header.php';

// News list from oih.com.cn (集团资讯). Each item links to the full notice there.
$newsBase = 'https://www.oih.com.cn/groupnews/detail/';
$newsItems = [
    ['2026-09-11', '东方国际（集团）有限公司2026年—2028年产权交易代理业务服务机构遴选公告',
     '为进一步完善东方国际（集团）有限公司国有资产产权调整项目监管机制，规范国有资产产权管理，依据国家有关文件精神开展遴选。',
     'ca4d04800ea44cd98990a7b14ddab814'],
    ['2025-08-22', '东方国际（集团）有限公司2025-2027年国有资产评估业务评估机构备选库候选机构遴选结果公告',
     '', 'cf071112bd5c4acfba0ac7455f76f4ad'],
    ['2025-08-22', '东方国际（集团）有限公司2025-2027年会计师事务所备选库候选机构遴选结果公告',
     '', '794e5871b5924cb6bfd5227eefb6c3ad'],
    ['2025-07-07', '东方国际（集团）有限公司2025年-2027年国有资产评估业务评估机构备选库候选机构遴选公告',
     '为满足集团及下属企业国有资产评估业务相关服务需求，现开展国有资产评估业务评估机构备选库候选机构遴选工作。',
     '65653cb2d2e8483a8979b42395335ae8'],
    ['2025-07-07', '东方国际（集团）有限公司2025年-2027年会计师事务所备选库候选机构遴选公告',
     '', '4b37d6517609491bb6ae6dea912e6b98'],
    ['2023-08-25', '中共东方国际（集团）有限公司委员会关于十二届市委第一轮巡视集中整改进展情况的通报',
     '按照巡视工作有关要求，现将巡视整改进展情况予以公布。',
     'c0510ea942ac4be0a76dfaf545a544ec'],
    ['2023-01-20', '市委第七巡视组向东方国际党委反馈巡视情况',
     '1月7日，市委第七巡视组向东方国际党委反馈巡视情况。',
     'bf9b40b27b7e4f0cb6066527364a1a90'],
    ['2022-09-16', '巡视公告', '', '94d1e575820a47f6811352b0a47d7eff'],
    ['2022-02-17', '东方国际（集团）有限公司2022年—2024年产权交易代理业务服务机构遴选公告',
     '为进一步完善国有资产产权调整项目监管机制，规范国有资产产权管理，开展产权交易代理业务服务机构遴选。',
     '34d7b1e5ad654483a3def890358b6c2e'],
    ['2021-12-27', '东方国际（集团）有限公司2022-2024年度资产评估机构合格供应商遴选项目遴选结果公告',
     '此次对集团2022-2024年度资产评估机构合格供应商采取公开遴选方式进行遴选。',
     '2d7848ad50af44c48fccf353a0973e06'],
];
?>

<section class="page-hero">
  <div class="container">
    <h1>集团新闻</h1>
    <p>OIH NEWS</p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="news-list">
      <?php foreach ($newsItems as $item):
        $ts = strtotime($item[0]);
      ?>
      <article class="news-item">
        <div class="news-date">
          <b><?php echo date('d', $ts); ?></b>
          <span><?php echo date('Y-m', $ts); ?></span>
        </div>
        <div>
          <h3><?php echo htmlspecialchars($item[1]); ?></h3>
          <?php if ($item[2]): ?><p><?php echo htmlspecialchars($item[2]); ?></p><?php endif; ?>
          <a class="more" href="<?php echo $newsBase . $item[3]; ?>.html" target="_blank" rel="noopener">了解更多 Read more →</a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
