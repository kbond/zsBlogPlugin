<?php foreach ($articles as $article): ?>
<entry>
  <title><?php echo $article->getTitle() ?></title>
  <link href="<?php echo url_for('zs_blog_article', $article, true) ?>" />
  <id><?php echo sha1($article->getId()) ?></id>
  <updated><?php echo gmstrftime('%Y-%m-%dT%H:%M:%SZ', $article->getDateTimeObject('published_at')->format('U')) ?></updated>
  <summary type="xhtml">
    <div xmlns="http://www.w3.org/1999/xhtml">
      <?php echo $article->getRaw('content')->preview() ?>
      <p><a href="<?php echo url_for('zs_blog_article', $article, true) ?>">Full Article...</a></p>
    </div>
  </summary>
  <author>
    <name><?php echo sfConfig::get('app_zsBlogPlugin_author', 'kevin') ?></name>
  </author>
</entry>
<?php endforeach; ?>