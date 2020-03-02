<?php

include 'acoplado.php';
require 'rb.php';

$uri = 'localhost';
$escola = 'escola';
$usuario = 'root';
$senha = '';

R::setup("mysql:host=$uri;dbname=$escola", $usuario, $senha);

if (!R::testConnection()) {
    exit;
}

//$book = R::dispense('book');
//$book->title = 'Learn to Program';
//$book->rating = 10;
//$id = R::store($book);
//echo file_get_contents('php://input');

//echo $_SERVER['REQUEST_URI'];
//echo file_get_contents('php://input');

$databaseObject = json_decode(file_get_contents('php://input'), true);
//print_r($databaseObject);
//print_r($databaseObject['book']);
$abc = new NestedEntities();
$abc->parseFields($databaseObject);
