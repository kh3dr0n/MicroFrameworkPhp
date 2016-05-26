#Micro Php Framwork
The kernel folder contains the framework fonctions :
###Router
Load the route list from App/routes.php and try to match it to the current URL the class has two main static function **get** and **post** both of them has two argument the route with using :id or :val as url param and the second argument is the methode call (You need to define the full Namesapce\class::methode)

```
Router::post('Route','NameSpace\Controller::Methode')
Router::get('Route','NameSpace\Controller::Methode')
```
Example :
 
```
Router::get('/etudiant','Admin\EtudiantController::index');
    Router::get('/etudiant/ajouter','Admin\EtudiantController::ajouter');
    
```

###ORM
A simple ORM class used for generic and simple SQL operation, like fetching all element with **Model::all()** , **Model::where('condition')** , **Model::get($id)** , **Model::save(['Name'=>'Paul','SecondName'=>'Taylor'])** 

Your model needs to extend the ORM class

```
<?php

namespace Model;
use ORM;
class Student extends ORM
{
    static $attributes = ["id","name","seconde","sexe"];
    static $table = "student"; // defines the table name in db
    static $idcol = "id"; //defines the primary key of the table, the default is "id"
}
```


A simple code is included in the source

This project is licensed under the MIT license.