<?php

if(!defined('APP')) die();

//Blip

$is_single_article_page = false;
$reader = new Posts\ListArticle();
$rc = $reader->indexCont("posts/");

$current_page = 0;
if (isset($_GET['pg'])) {
    $current_page = (int)$_GET['pg'] - 1;
}
$per_page = 5;
$item_count = count($rc);
$divide_by = ceil($item_count / $per_page);

$pagi_data = array_chunk($rc, $per_page  );
$pagi_links = count( $pagi_data );

(new Views\Layout(
"Blog - Listing", new Views\Blog\Listing($current_page,$pagi_data,$pagi_links), true
))();