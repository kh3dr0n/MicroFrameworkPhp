<?php
/**
 * Created by PhpStorm.
 * User: Marwen
 * Date: 5/23/16
 * Time: 4:13 PM
 */
class Router{
    static $routes_post = [];
    static $routes_get = [];


    static function  get($route,$call){
        self::$routes_get[] = [
            'route'=>$route,
            'call'=>$call
        ];
    }


    static function post($route,$call){
        self::$routes_post[] = [
            'route'=>$route,
            'call'=>$call
        ];
    }

    static function matchOne($url,$route){
        $url = explode("?",$url)[0];

        if($url == $route && $route == "/"){
            return [
                'matches'=>[],
                'state'=>true
            ];
        }

        $url = rtrim($url, "/");
        $route = rtrim($route, "/");

        $pattern = "@^" . preg_replace('/\\\:[a-zA-Z0-9\_\-]+/', '([a-zA-Z0-9\-\_]+)', preg_quote($route)) . "$@D";
        $matches = Array();
        if(preg_match($pattern, $url, $matches) == 1){
            array_shift($matches);
            return [
                'matches'=>$matches,
                'state'=>true
            ];
        }
        return [
            'matches'=>[],
            'state'=>false
        ];;
    }
    static function match($url,$methode){
        if($methode == "POST"){
            foreach(self::$routes_post as $route){
                $x = self::matchOne($url,$route['route']);
                if($x['state'])
                    return [
                        'call'=>$route['call'],
                        'parms'=>$x['matches']
                    ];
            }
        }

        if($methode == "GET"){
            foreach(self::$routes_get as $route){
                $x = self::matchOne($url,$route['route']);
                if($x['state'])
                    return [
                        'call'=>$route['call'],
                        'parms'=>$x['matches']
                    ];
            }
        }
        return null;
    }


    static function execute(){

        $togo = self::match($_SERVER['REQUEST_URI'],$_SERVER['REQUEST_METHOD']);
        if($togo != null)
            call_user_func_array($togo['call'],$togo['parms']);
        else{
            redirect("/connecter");
        }

    }



}