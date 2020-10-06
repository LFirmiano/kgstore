<?php

include "bd.php";

$query = "UPDATE usuarios SET nome = :nome, email = :email, senha = :senha, tipo = :tipo WHERE id_usuario = :id";

$stmt = $conn->prepare($query);
$stmt->bindParam(':nome',$_POST['nome'],PDO::PARAM_STR);
$stmt->bindParam(':email',$_POST['email'],PDO::PARAM_STR);
$stmt->bindParam(':senha',$_POST['senha'],PDO::PARAM_STR);
$stmt->bindParam(':tipo',$_POST['exampleRadios'],PDO::PARAM_STR);
$stmt->bindParam(':id',$_POST['edit'],PDO::PARAM_STR);

$stmt->execute();

header("Location: ../usuario.php");

?>