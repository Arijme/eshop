<?php
//error_reporting(0);

//$data = file_get_contents('https://dummyjson.com/products');
try{
    $cnx = new PDO('mysql:host=localhost;dbname=eshopme','root','');

}
catch(PDOException $e){
    $msg    ="erreur de cnx base de donnée  ";
}


