<?php
/**
 * Created by PhpStorm.
 * User: Marwen
 * Date: 5/23/16
 * Time: 4:18 PM
 */


Router::get('/connecter','AuthController::index');
Router::post('/connecter','AuthController::login');

Router::get('/logout','AuthController::logout');
Router::get('/', 'AuthController::menu');

if(Auth::isConnected() && Auth::hasRole('admin')) {

    Router::get('/section','Admin\SectionController::index');

    Router::get('/section/supprimer','Admin\SectionController::supprimer');
    Router::post('/section/ajouter','Admin\SectionController::ajouter');
    Router::post('/section/:id/matiere','Admin\SectionController::ajoutermateire');
    Router::get('/section/:id/etudiants','Admin\SectionController::listetudiant');
    Router::get('/section/:id','Admin\SectionController::afficher');

    Router::get('/etudiant','Admin\EtudiantController::index');
    Router::get('/etudiant/ajouter','Admin\EtudiantController::ajouter');
    Router::post('/etudiant/ajouter','Admin\EtudiantController::save');


    Router::post('/etudiant/:id/note','Admin\EtudiantController::ajouterNote');
    Router::get('/etudiant/:id/modifer','Admin\EtudiantController::modifer');
    Router::post('/etudiant/:id/modifer','Admin\EtudiantController::update');
    Router::get('/etudiant/:id/supprimer','Admin\EtudiantController::supprimer');
    Router::get('/etudiant/:id','Admin\EtudiantController::afficher');

    Router::get('/livre','Admin\LivreController::index');
    Router::get('/livre/:id/emprint','Admin\LivreController::emprint');
    Router::get('/livre/:id/retourner','Admin\LivreController::retourner');
    Router::post('/livre/:id/emprint','Admin\LivreController::emprinter');
    Router::get('/livre/ajouter','Admin\LivreController::ajouter');
    Router::post('/livre/ajouter','Admin\LivreController::save');

    Router::get('/enseignant','Admin\EnseignantController::index');
    Router::get('/enseignant/ajouter','Admin\EnseignantController::ajouter');
    Router::post('/enseignant/ajouter','Admin\EnseignantController::add');

    Router::get('/enseignant/:id/supprimer','Admin\EnseignantController::supprimer');
    Router::get('/enseignant/:id','Admin\EnseignantController::seule');
    Router::post('/enseignant/:id','Admin\EnseignantController::addMatiere');
}

if(Auth::isConnected() && Auth::hasRole('bib')) {
    Router::get('/livre','Admin\LivreController::index');
    Router::get('/livre/ajouter','Admin\LivreController::ajouter');
    Router::post('/livre/ajouter','Admin\LivreController::save');
    Router::get('/livre/:id/emprint','Admin\LivreController::emprint');
    Router::get('/livre/:id/retourner','Admin\LivreController::retourner');
    Router::post('/livre/:id/emprint','Admin\LivreController::emprinter');

}

if(Auth::isConnected() && Auth::hasRole('etudiant')) {
    Router::get('/notes', 'EtudiantController::notes');
}


