<?php

//Blip

namespace Views\Blog;

if(!defined('APP')) die();

class Post
{
    protected $single_article;

    public function __construct($single_article)
    {
        $this->single_article = $single_article;
    }

    // Blog post template here
    public function blog_post() {
        // Blog Title
        echo "<h2 class='blog-head'>" . $this->single_article['title'] . "</h2>";
        // Blog post author
        echo "<p>By: <em>" . $this->single_article['auth'] . "</em> - " . $this->single_article['date'] . "</p>";
        // Blog post main content
        echo "<p>". $this->single_article['content']."</p>";
        // Read more...
        echo "<a href='".site_link()."'><br />&laquo; Back to the Blog</a>";
        echo "<hr>";
    }

    public function __invoke(): void
    {
        ?>
        <div class="col-sm-8 col-sm-offset-2">

            <div class="panel panel-info">

                <div class="panel-body">
                    <h1>My Sample Blog</h1>

                    <?php
                    $this->blog_post();
                    ?>

                </div>
            </div>
        </div>
        <?php
    }
}