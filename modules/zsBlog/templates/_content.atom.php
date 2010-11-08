<?php echo $sf_data->getRaw('article')->getContent()->xmlEscape()->preview() ?>
<p><a href="<?php echo url_for('zs_blog_article', $article) ?>">Read More...</a></p>