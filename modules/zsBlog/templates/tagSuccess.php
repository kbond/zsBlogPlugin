<?php include_partial('page_meta', array('title' => 'Articles tagged with '.$tag, 'description' => '', 'keywords' => '')) ?>

<h1>Articles tagged with "<?php echo $tag ?>" <a href="<?php echo url_for('zs_blog_tag', array('sf_subject' => $tag, 'sf_format' => 'atom')) ?>">Feed</a></h1>

<?php include_partial('list', array('pager' => $pager, 'routeName' => 'zs_blog_tag', 'params' => array('name' => $tag->getName()))) ?>