<?php
/**
 * Created by PhpStorm.
 * User: Marwen
 * Date: 5/24/16
 * Time: 10:07 PM
 */

namespace Admin;


use Model\Matiere;

class MatiereController
{

    static function index(){
        $matieres = Matiere::all();
        return view('Admin/Matiere/lister',['matieres'=>$matieres]);
    }



}