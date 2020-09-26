<?php

// ini_set('display_errors', true); error_reporting(E_ALL);

// CONFIG CABEMCE
// $host = "localhost"	;
// $database = "kg";
// $user = "postgres";
// $password = "cabemce2014";

// $dsn = "pgsql:host=$host;port=5432;dbname=$database;user=$user;password=$password";

// CONFIG CASA

$host = "localhost"	;
$database = "kg";
$user = "root";
$password = "";

//MUDAR PARA MYSQL COM A PORTA CORRETA

$dsn = "mysql:host=$host;dbname=$database;user=$user;password=$password";

try{
    $conn = new PDO($dsn);
   }catch (PDOException $e){
    echo $e->getMessage();
   }

?>