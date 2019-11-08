<?php

if(!defined('APP')) die();

//Blip

use Posts\ListArticle;

$is_single_article_page = false;
$reader = new ListArticle();
$rc = $reader->indexCont("posts/");
// post request
if ( isset($_REQUEST['id']) && $_SERVER['REQUEST_METHOD'] === 'GET'){

    $is_single_article_page = true;
    $single_article = '';
    if (count($rc) > 0):
        foreach ($rc as $article){
            if ($article['slug'] === $_REQUEST['id']){
                $single_article = $article;
            }
        }
    endif;
}

(new Views\Layout(
    "Blog Post", new Views\Blog\Post($single_article), true
))();