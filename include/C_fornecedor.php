<?php

include "bd.php";

// ini_set('display_errors', true); error_reporting(E_ALL);

$query = "INSERT INTO fornecedor (fornecedor,email,telefone,endereco) VALUES (:fornecedor,:email,:telefone,:endereco)";

$stmt = $conn->prepare($query);
$stmt->bindParam(':fornecedor',$_POST['fornecedor'],PDO::PARAM_STR);
$stmt->bindParam(':email',$_POST['email'],PDO::PARAM_STR);
$stmt->bindParam(':telefone',$_POST['telefone'],PDO::PARAM_STR);
$stmt->bindParam(':endereco',$_POST['endereco'],PDO::PARAM_STR);

if($stmt->execute()){
    header("Location: ../fornecedor.php");
} else {
    header("Location: ../cad_fornecedor.php");
}

?>