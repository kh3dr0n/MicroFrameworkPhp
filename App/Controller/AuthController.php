<?php

/**
 * Created by PhpStorm.
 * User: Marwen
 * Date: 5/23/16
 * Time: 5:45 PM
 */
class AuthController{

    static function index(){
        if(Auth::isConnected())
            return redirect('/');
        return view('connecter');
    }

    static function login(){
        if(Request::post('login') == 'admin' && Request::post('password') == "admin" && Request::post('role') == 'admin'){
            Auth::login(0,"admin");
            return redirect('/');
        }
        if(Request::post('login') == 'bib' && Request::post('password') == "bib" && Request::post('role') == 'bib'){
            Auth::login(0,"bib");
            return redirect('/');
        }
        if(Request::post('role') == 'etudiant'){
            $cin = Request::post('login');
            $dn = Request::post('password');

                if(count(\Model\Etudiant::where("cin='$cin' and dn='$dn'")) != 0){
                    Auth::login($cin,"etudiant");
                    return redirect('/');
                }
            return redirect('/connecter');

        }


        //return redirect('/connecter');
    }

    static function logout(){
        Auth::logout();
        return redirect('/connecter');
    }

    static function menu(){
        view('menu');
    }
}