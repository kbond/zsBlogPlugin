<?php echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n" ?>
<feed xmlns="http://www.w3.org/2005/Atom">
  <title><?php echo sfConfig::get('app_zsBlogPlugin_title', 'My Blog') ?> category &quot;<?php echo $category ?>&quot;</title>
  <subtitle>Latest Articles</subtitle>
  <link href="<?php echo url_for('zs_blog_category', array('sf_subject' => $category, 'sf_format' => 'atom'), true) ?>" rel="self"/>
  <link href="<?php echo url_for('zs_blog_category', $category, true) ?>"/>
  <updated><?php echo gmstrftime('%Y-%m-%dT%H:%M:%SZ', $pager->getResults()->getFirst()->getDateTimeObject('published_at')->format('U')) ?></updated>
  <author>
    <name><?php echo sfConfig::get('app_zsBlogPlugin_author', 'kevin') ?></name>
  </author>
  <id><?php echo sha1(url_for('zs_blog_category', array('sf_subject' => $category, 'sf_format' => 'atom'), true)) ?></id>

  <?php include_partial('list', array('articles' => $pager->getResults())) ?>
</feed>