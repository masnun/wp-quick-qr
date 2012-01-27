<?php
/*
Plugin Name: WP Quick QR
Version: 1
Plugin URI: http://masnun.net/wp-quick-qr/
Description: Generates QR Code with the URL of a single post. Uses the shortest form of post url to generate valid and quickly readable QR codes.
Author: Abu Ashraf Masnun
Author URI: http://masnun.me
*/


add_filter('the_content', 'google_qr_generator');

function google_qr_generator($content)
{

    if (is_single())
    {
        global $post;
        $postId = $post->ID;
        return $content ."<h2>QR Code:</h2> Scan the following image with a QR Code Reader to navigate to this post quickly. <br/>". "<img src=\"https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=" . urlencode(get_bloginfo('wpurl') . "?p=" . $postId) . "\" alt=\"QR Code\" />";
    }
    else
    {
        return $content;
    }
}

