<?php

include "bd.php";

// ini_set('display_errors', true); error_reporting(E_ALL);

$upd = "UPDATE cliente SET nome = :nome , email = :email , telefone = :telefone, endereco = :endereco, data_nascimento = :data_nascimento WHERE id_cliente = :id";

$insert = $conn->prepare($upd);
$insert->bindParam(':nome',$_POST['nome'],PDO::PARAM_STR);
$insert->bindParam(':email',$_POST['email'],PDO::PARAM_STR);
$insert->bindParam(':telefone',$_POST['telefone'],PDO::PARAM_STR);
$insert->bindParam(':endereco',$_POST['endereco'],PDO::PARAM_STR);
$insert->bindParam(':data_nascimento',$_POST['data_nascimento'],PDO::PARAM_STR);
$insert->bindParam(':id',$_POST['edit'],PDO::PARAM_STR);

$insert->execute();

header("Location: ../cliente.php");

?>