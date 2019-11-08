<?php

//Blip

namespace Posts;

if(!defined('APP')) die();

use SplFileInfo;

class ListArticle {

    private $directory;
    public $article;
    public $dir;
    protected $file;
    public $output;

    public function __construct($file = '') {
        $this->file = $file;
    }

    public function indexCont($directory) {

        $dir = opendir($directory);
        //store filenames in array
        $results_array = array();

        while (($file = readdir($dir)) !== false) {

            $filename = $directory . $file;

            $info = new SplFileInfo($filename);
            $res = $info->getExtension();

            //make sure its a .txt file
            $type = filetype($filename);
            if ($type == 'file' && $res == 'txt') {
                //If its a file and its type is txt
                //store filenames in array
                $results_array[] = $filename;
            }

        }
        closedir($dir);

        $articles = array();

        foreach ($results_array as $filename){
            //get the contents of each file.. store in $articles array and return

            //open file
            $open = fopen($filename, 'r');

            //get the contents of the file
            $content = stream_get_contents($open);

            //get the json meta data.
            $content = explode("#content#", $content);
            $raw = array_shift($content);

            //decode json meta data in each .txt
            $json = json_decode($raw,true);

            //now implode, and grab after #content#.
            $content = implode("#content#", $content);

            $title = $json['title'];
            $author = $json['author'];
            $date = trim($json['date']);

            //$content = $json['content'];
            $slug = $json['slug'];

            //store everything in an array.
            $articles[$filename] = array('auth' => "$author",
                'title' => "$title",
                'date' => "$date",
                'slug' => "$slug",
                'content' => "$content"
            );
        }
        //sort articles by date, latest first
        usort($articles, [$this,'custom_sort']);
        return $articles;
    }

    public function custom_sort($a, $b) {
        return strtotime($b['date']) - strtotime($a['date']);

    }

}