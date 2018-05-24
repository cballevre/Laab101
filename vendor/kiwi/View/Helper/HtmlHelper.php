<?php

namespace Kiwi\View\Helper;

use Kiwi\View\Helper;

class HtmlHelper extends Helper{
    
    public function image($name){
        return WEBROOT . 'webroot' . DS . 'img' . DS . $name;
    }

    public function js($name){
        return WEBROOT . 'webroot' . DS . 'js' . DS . $name . '.js';
    }

    public function css($name){
        return WEBROOT . 'webroot' . DS . 'css' . DS . $name .'.css';
    }

    public function link($url = array()){
        return WEBROOT . $url['controller'] . DS . $url['action'] . DS . $url['parameter'];
    }

    function truncate($words, $limit, $append = ' &hellip;') {
        // Add 1 to the specified limit becuase arrays start at 0
        $limit = $limit+1;
        // Store each individual word as an array element
        // Up to the limit
        $words = explode(' ', $words, $limit);
        // Shorten the array by 1 because that final element will be the sum of all the words after the limit
        array_pop($words);
        // Implode the array for output, and append an ellipse
        $words = implode(' ', $words) . $append;
        // Return the result
        return $words;
    }
    

}