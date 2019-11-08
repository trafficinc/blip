<?php

if(!defined('APP')) die();

//Blip

// Put the link to the blog with ending slash /
define('SITEURL', 'http://www.yoursite.com/blog/');

function site_link($query = '') {
    if ($query === '') {
        return SITEURL;
    } else {
        return SITEURL . $query;
    }
}

function redirect($url = '') {
    if ($url === '') {
        header("Location: " . site_link());
        exit();
    } else {
        header("Location: " . site_link($url) );
        exit();
    }

}

function site_image($image) {
    return SITEURL . 'images/' . $image;
}

function site_assets($asset) {
    return SITEURL . 'assets/' . $asset;
}