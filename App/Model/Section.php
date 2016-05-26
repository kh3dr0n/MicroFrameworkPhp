<?php
/**
 * Created by PhpStorm.
 * User: Marwen
 * Date: 5/24/16
 * Time: 9:41 PM
 */

namespace Model;

use ORM;
class Section extends ORM
{
    static $table = "section";
    static $attributes = ["nom"];
}