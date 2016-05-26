<?php
/**
 * Created by PhpStorm.
 * User: Marwen
 * Date: 5/25/16
 * Time: 11:24 AM
 */

namespace Model;

use ORM;
class Livre extends ORM
{
    static $table = "livre";
    static $attributes = ["titre","auteur","annee","theme"];
}