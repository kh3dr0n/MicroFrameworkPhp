<?php
/**
 * Created by PhpStorm.
 * User: Marwen
 * Date: 5/24/16
 * Time: 9:43 PM
 */

namespace Admin;


use Model\Etudiant;
use Model\Matiere;
use Model\Section;

class SectionController
{
    static function index(){
        $sections = Section::search(\Request::get('chercher'));
        return view("Admin/Section/lister",["sections"=>$sections]);
    }

    static function ajouter(){

        Section::save(['nom'=>\Request::post('section')]);
        redirect('/section');
    }

    static function afficher($id){
        $matieres = Matiere::where("id_section = $id");
        $section = Section::get($id);
        return view("Admin/Section/seule",compact("matieres","section"));
    }

    static function ajoutermateire($id){
        Matiere::save([
            'id_section'=>$id,
            'nom' => \Request::post('matiere'),
            'coefficient' => \Request::post('coefficient')
        ]);
        redirect('/section/'.$id);
    }
    static function supprimer(){
        Section::detele(\Request::get('id'));
        redirect('/section');
    }

    static function listetudiant($id){
        $etudiants = Etudiant::search(\Request::get('chercher'),'id_section = '.$id);
        view('Admin/Section/listeetudiant',compact('etudiants'));
    }
}