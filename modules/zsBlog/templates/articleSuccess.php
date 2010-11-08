<?php include_partial('page_meta', array(
        'title' => $article->getTitle(),
        'description' => $article->getContent()->stripTags()->truncate(150),
        'keywords' => $article->getTagList())) ?>

<?php include_partial('article', array('article' => $article)) ?>