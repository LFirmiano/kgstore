<?php

include "bd.php";

// ini_set('display_errors', true); error_reporting(E_ALL);

$query = "INSERT INTO cliente (nome,email,telefone,endereco,data_nascimento) VALUES (:nome,:email,:telefone,:endereco,:data_nascimento)";

$stmt = $conn->prepare($query);
$stmt->bindParam(':nome',$_POST['nome'],PDO::PARAM_STR);
$stmt->bindParam(':email',$_POST['email'],PDO::PARAM_STR);
$stmt->bindParam(':telefone',$_POST['telefone'],PDO::PARAM_STR);
$stmt->bindParam(':endereco',$_POST['endereco'],PDO::PARAM_STR);
$stmt->bindParam(':data_nascimento',$_POST['data_nascimento'],PDO::PARAM_STR);

if($stmt->execute()){
    header("Location: ../cliente.php");
} else {
    header("Location: ../cad_cliente.php");
}

?>