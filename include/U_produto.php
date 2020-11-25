<?php

include "bd.php";

$query = "UPDATE produtos SET produto = :produto, categoria = :categoria, fornecedor = :fornecedor, valor = :valor,valor_compra = :valor_compra WHERE id_produto = :id";
$sql = "UPDATE estoque SET produto = :produtoest WHERE produto = :produtold";

$stmt = $conn->prepare($query);
$stmt2 = $conn->prepare($sql);
$stmt->bindParam(':produto',$_POST['produto'],PDO::PARAM_STR);
$stmt2->bindParam(':produtoest',$_POST['produto'],PDO::PARAM_STR);
$stmt2->bindParam(':produtold',$_POST['produto_old'],PDO::PARAM_STR);
$stmt->bindParam(':categoria',$_POST['categoria'],PDO::PARAM_STR);
$stmt->bindParam(':fornecedor',$_POST['fornecedor'],PDO::PARAM_STR);
$stmt->bindParam(':valor',$_POST['valor'],PDO::PARAM_STR);
$stmt->bindParam(':valor_compra',$_POST['valor_compra'],PDO::PARAM_STR);
$stmt->bindParam(':id',$_POST['edit'],PDO::PARAM_STR);



$stmt->execute();
$stmt2->execute();

header("Location: ../estoque.php");

?>