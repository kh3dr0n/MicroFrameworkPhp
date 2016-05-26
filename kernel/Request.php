<?php

/**
 * Created by PhpStorm.
 * User: Marwen
 * Date: 5/24/16
 * Time: 12:14 PM
 */
class Request
{

    static function get($key){
        if(isset($_GET[$key])){
            return $_GET[$key];
        }
        return null;
    }

    static function post($key){
        if(isset($_POST[$key])){
            return $_POST[$key];
        }
        return null;
    }
}