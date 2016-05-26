<?php

/**
 * Created by PhpStorm.
 * User: Marwen
 * Date: 5/23/16
 * Time: 5:06 PM
 */

class EtudiantController
{
    static function notes(){
        $id = Auth::getUserId();
        $notes = \Model\Note::where('id_etudiant ='.$id);
        return view('Etudiant/afficher',compact('notes'));
    }
}