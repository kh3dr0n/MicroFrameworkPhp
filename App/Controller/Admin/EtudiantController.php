<?php
/**
 * Created by PhpStorm.
 * User: Marwen
 * Date: 5/24/16
 * Time: 10:43 PM
 */

namespace Admin;


use Model\Etudiant;
use Model\Matiere;
use Model\Note;
use Model\Section;

class EtudiantController
{
    static function index(){
        $etudiants = \Model\Etudiant::search(\Request::get('chercher'));

        return view("Admin/Etudiant/lister",compact('etudiants'));
    }

    static function ajouter(){
        $sections = Section::all();
        return view("Admin/Etudiant/ajouter",compact('sections'));
    }

    static function save(){
        Etudiant::save([
            'cin'=>\Request::post('cin'),
            'nom'=>\Request::post('nom'),
            'prenom'=>\Request::post('prenom'),
            'dn'=>\Request::post('dn'),
            'id_section'=>\Request::post('section'),
            'sexe' => \Request::post('sexe')
        ]);
        redirect('/etudiant');
    }

    static function afficher($id){
        $etudiant = Etudiant::get($id);
        $notes = Note::where("id_etudiant = $id");

        $matieres = Matiere::where("id_section = ".$etudiant['id_section']);

        return view('Admin/Etudiant/afficher',compact('etudiant','notes','matieres'));
    }


    static function modifer($id){
        $etudiant = Etudiant::get($id);
        $sections = Section::all();
        return view('Admin/Etudiant/modifier',compact('etudiant','sections'));
    }

    static function update($id){

        Etudiant::update($id,[
            'nom'=>\Request::post('nom'),
            'prenom'=>\Request::post('prenom'),
            'dn'=>\Request::post('dn'),
            'id_section'=>\Request::post('section'),
            'sexe' => \Request::post('sexe')
        ]);
        redirect('/etudiant/'.$id.'/modifer');
    }


    static function ajouterNote($id){
        Note::save([
            'valeur'=>\Request::post('valeur'),
            'type'=>\Request::post('type'),
            'id_etudiant'=>$id,
            'id_matiere'=>\Request::post('matiere')
        ]);
        redirect('/etudiant/'.$id);
    }

    static function supprimer($id){
        Etudiant::detele($id);
        redirect('/etudiant');
    }
}