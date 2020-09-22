<?php

// ini_set('display_errors', true); error_reporting(E_ALL);

$host = "localhost"	;
$database = "kg";
$user = "postgres";
$password = "cabemce2014";

//MUDAR PARA MYSQL COM A PORTA CORRETA

$dsn = "pgsql:host=$host;port=5432;dbname=$database;user=$user;password=$password";

try{
    // create a PostgreSQL database connection
    $conn = new PDO($dsn);
    
    // display a message if connected to the PostgreSQL successfully
    if($conn){
    echo "Connected to the <strong>$database</strong> database successfully!";
    }
   }catch (PDOException $e){
    // report error message
    echo $e->getMessage();
   }

?>