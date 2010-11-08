<?php include_partial('page_meta', array('title' => $category, 'description' => '', 'keywords' => '')) ?>

<h1>Articles in the "<?php echo $category ?>" Category <a href="<?php echo url_for('zs_blog_category', array('sf_subject' => $category, 'sf_format' => 'atom')) ?>">Feed</a></h1>

<?php include_partial('list', array('pager' => $pager, 'routeName' => 'zs_blog_category', 'params' => array('slug' => $category->getSlug()))) ?>