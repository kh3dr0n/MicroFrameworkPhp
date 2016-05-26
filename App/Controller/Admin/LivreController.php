<?php
/**
 * Created by PhpStorm.
 * User: Marwen
 * Date: 5/25/16
 * Time: 11:23 AM
 */

namespace Admin;


use Model\Emprin;
use Model\Etudiant;
use Model\Livre;

class LivreController
{
    static function index(){
        $livres = Livre::search(\Request::get('chercher'));
        view('Admin/Livre/lister',compact('livres'));
    }

    static function ajouter(){
        view('Admin/Livre/ajouter');
    }
    static function save(){
        Livre::save([
           'titre'=>\Request::post('titre'),
            'auteur'=>\Request::post('auteur'),
            'theme'=>\Request::post('theme'),
            'annee'=>\Request::post('annee')
        ]);
        redirect('/livre');
    }


    static function emprint($id){
        $etudiants = Etudiant::all();
        $livre = Livre::get($id);
        view('Admin/livre/emprint',compact('etudiants','livre'));
    }

    static function emprinter($id){
        Emprin::save([
            'id_livre'=>$id,
            'id_etudiant'=>\Request::post('etudiant'),
            'date'=>\Request::post('date'),
            'etat'=>'emprinte'
        ]);
        redirect('/livre/');
    }

    static function retourner($id){
        $emprint = Emprin::where("id_livre=$id and etat='emprinte'")[0];
        $etud = $emprint['id_etudiant'];
        Emprin::Customupdate(
            [
                'etat'=>'disponible'
            ]
            ,"id_livre='$id' and etat='emprinte' and id_etudiant='$etud'");
        redirect('/livre/');
    }
}