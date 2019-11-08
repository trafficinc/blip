<?php

//Blip

namespace Views\Blog;

if(!defined('APP')) die();


class Listing
{
    protected $current_page;
    protected $pagi_data;
    protected $pagi_links;
    protected $show_pagination = true;

    public function __construct($current_page, $pagi_data, $pagi_links)
    {
        $this->current_page = $current_page;
        $this->pagi_data = $pagi_data;
        $this->pagi_links = $pagi_links;
    }

    public function show_pagination_links() {
        if ($this->show_pagination):
            if ($this->pagi_links):
                $pagi_page = $this->current_page + 1;
                for ($i = 1; $this->pagi_links >= $i; $i++) {
                    if ($i === (int)$pagi_page) {
                        echo sprintf("&nbsp; <a class='pagi-current-pge' href='?pg=%d'>%d</a> &nbsp;", $i, $i);
                    } else {
                        echo sprintf("&nbsp; <a class='' href='?pg=%d'>%d</a> &nbsp;", $i, $i);
                    }
                }
            endif;
        endif;
    }

    public function blog_post() {
        if (isset($this->pagi_data[$this->current_page ]) && count($this->pagi_data[$this->current_page ]) > 0):
            foreach ($this->pagi_data[$this->current_page ] as $articles){
                echo "<a class='blog-title' href='".sprintf("%sarticle/%s",site_link(),$articles['slug'])."'><h2 class='blog-head'>" . $articles['title'] . "</h2></a>";
                echo sprintf("<p>By: <em>%s</em> - %s </p>",$articles['auth'],$articles['date']);
                $content = strip_tags($articles['content']);
                $content = substr($content, 0, 200);
                echo "<p>". $content . "...</p> <p><a href='".sprintf("%sarticle/%s",site_link(),$articles['slug'])."'><br />Read More &raquo;</a></p>";
                echo "<hr>";
            }
        else:
            if (isset($_GET['pg']) && $_GET['pg'] > 1) {
                echo "<p></p>";
                $this->show_pagination = false;
            } else {
                echo "<p>Blog Posts Coming Soon!</p>";
            }
        endif;
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

                    $this->show_pagination_links();

                    ?>
                </div>
            </div>
        </div>
        <?php
    }
}