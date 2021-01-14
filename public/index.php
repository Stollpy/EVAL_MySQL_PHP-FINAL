<?php


require '../vendor/autoload.php';
require '../src/function.php';
require '../autoload.php';



$path = $_SERVER['PATH_INFO'] ?? '/';


$route = [
    '/' => 'conducteur.php',
    '/conducteur/delete' => 'delete_conducteur.php',
    '/conducteur/edit' => 'edit_conducteur.php',
    '/vehicule' => 'vehicule.php',
    '/vehicule/delete' => 'delete_vehicule.php',
    '/vehicule/edit' => 'edit_vehicule.php',
    '/association' => 'association.php',
    '/association/delete' => 'delete_association.php',
    '/association/edit' => 'edit_association.php',

];


if(array_key_exists($path, $route)){
    require '../src/controllers/'.$route[$path];
}
else{
    http_response_code(404);

    //render('404', ['pageTitle'=>'Erreur 404 : page non trouvé']);
}