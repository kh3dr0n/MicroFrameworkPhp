<?php
/**
 * Created by PhpStorm.
 * User: Marwen
 * Date: 5/25/16
 * Time: 1:14 PM
 */

namespace Admin;


use Model\Enseignanement;
use Model\Enseignant;
use Model\Matiere;
use Model\Section;

class EnseignantController
{
    static function index(){
        $enseignants = Enseignant::search(\Request::get('chercher'));
        view("Admin/Enseignant/lister",compact('enseignants'));
    }

    static function ajouter(){
        view("Admin/Enseignant/ajouter");
    }
    static function add(){
        Enseignant::save([
            'nom'=>\Request::post('nom'),
            'prenom'=>\Request::post('prenom'),
            'dn'=>\Request::post('dn'),
            'grade'=>\Request::post('grade')
        ]);
        redirect('/enseignant');
    }

    static function seule($id){
        $ens = Enseignant::get($id);
        $sections = Section::all();
        $matiere = [];
        foreach($sections as $section){
            $m =Matiere::where('id_section='.$section['id']);
            $matiere[$section['nom']] = $m;
        }
        $enseignanements = Enseignanement::where('id_enseignant='.$id);
        view("Admin/Enseignant/seule",compact('enseignanements','matiere','ens'));
    }

    static function addMatiere($id){
        Enseignanement::save([
            'id_enseignant'=>$id,
            'id_matiere'=>\Request::post('matiere')
        ]);
        redirect('/enseignant/'.$id);

    }

    static function supprimer($id){
        Enseignant::detele($id);
        redirect('/enseignant');
    }

}