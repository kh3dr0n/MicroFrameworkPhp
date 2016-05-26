<?php
/**
 * Created by PhpStorm.
 * User: Marwen
 * Date: 5/23/16
 * Time: 4:13 PM
 */


require_once 'Router.php';
require_once 'ORM.php';
require_once 'Auth.php';
require_once 'Request.php';
require_once 'Utils.php';
Auth::startSession();
$db = new PDO('mysql:host=localhost;dbname=web;charset=utf8mb4', 'root', '');

//global $Router;
//global $Auth;

require_once '../App/routes.php';
/*require_once '../App/models.php';
require_once '../App/controllers.php';*/

includeDir('../App/Model');
includeDir('../App/Controller');