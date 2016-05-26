<?php

/**
 * Created by PhpStorm.
 * User: Marwen
 * Date: 5/24/16
 * Time: 11:32 AM
 */
namespace Model;
use ORM;
class Etudiant extends ORM
{
    static $attributes = ["cin","nom","prenom","sexe","dn"];
    static $table = "etudiant";
    static $idcol = "cin";
}