<?php
/**
 * Created by PhpStorm.
 * User: Marwen
 * Date: 5/23/16
 * Time: 4:13 PM
 */

class Auth{


    function __construct(){
        $this->startSession();
    }

    static function startSession(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    static function login($id=0,$role = ""){
        $_SESSION['token'] = generateRandomString(30);
        $_SESSION['id'] = $id;
        $_SESSION['role'] = $role;
    }

    static function isConnected(){
        if(isset($_SESSION['token'])){
            return true;
        }
        return false;
    }

    static function hasRole($role){
        if(isset($_SESSION['role'])){
            if($role == $_SESSION['role'])
                return true;
            else
                return false;
        }
        return false;
    }

    static function logout(){
        session_unset('token');
        session_destroy();
    }
    static function getUserId(){
        if(isset($_SESSION['id']))
            return $_SESSION['id'];
        return null;
    }
}