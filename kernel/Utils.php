<?php
/**
 * Created by PhpStorm.
 * User: Marwen
 * Date: 5/23/16
 * Time: 5:34 PM
 */

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function view($view,$params = []){
        foreach($params as $key=>$param){
            ${$key} = $param;
        }
        if(!include '../App/View/'.$view.'.php'){
            echo "Error view $view not found";
        }
}

function redirect($URL){
    header('Location: '.$URL);
    die();
}

function includeDir($path) {
    $dir      = new RecursiveDirectoryIterator($path);
    $iterator = new RecursiveIteratorIterator($dir);
    foreach ($iterator as $file) {
        $fname = $file->getFilename();
        if (preg_match('%\.php$%', $fname)){
            require_once $file->getPathname();
        }
    }
}

function URL($lien=""){
    $uri = rtrim($_SERVER['REQUEST_URI'], "/");
    $lien = ltrim($lien,"/");
    echo $uri."/".$lien;
}