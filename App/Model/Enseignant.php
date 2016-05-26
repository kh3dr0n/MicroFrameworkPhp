<?php
/**
 * Created by PhpStorm.
 * User: Marwen
 * Date: 5/25/16
 * Time: 1:13 PM
 */

namespace Model;

use ORM;
class Enseignant extends ORM
{
    static $table = "enseignant";
    static $attributes = ["nom","prenom","grade","dn"];
}