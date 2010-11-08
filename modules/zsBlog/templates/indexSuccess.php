<?php include_partial('page_meta', array('title' => '', 'description' => '', 'keywords' => '')) ?>
<h1>Articles</h1>

<?php include_partial('list', array('pager' => $pager, 'routeName' => 'zs_blog', 'params' => array())) ?>