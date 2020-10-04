<?php

include "bd.php";

$query = "UPDATE produtos SET produto = :produto, categoria = :categoria, fornecedor = :fornecedor, valor = :valor WHERE id_produto = :id";

$stmt = $conn->prepare($query);
$stmt->bindParam(':produto',$_POST['produto'],PDO::PARAM_STR);
$stmt->bindParam(':categoria',$_POST['categoria'],PDO::PARAM_STR);
$stmt->bindParam(':fornecedor',$_POST['fornecedor'],PDO::PARAM_STR);
$stmt->bindParam(':valor',$_POST['valor'],PDO::PARAM_STR);
$stmt->bindParam(':id',$_POST['edit'],PDO::PARAM_STR);

$stmt->execute();

header("Location: ../estoque.php");

?>