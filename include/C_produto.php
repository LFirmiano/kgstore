<?php

include "bd.php";

$query = "INSERT INTO produtos (produto,categoria,fornecedor,valor) VALUES (:produto,:categoria,:fornecedor,:valor)";

$stmt = $conn->prepare($query);
$stmt->bindParam(':produto',$_POST['produto'],PDO::PARAM_STR);
$stmt->bindParam(':categoria',$_POST['categoria'],PDO::PARAM_STR);
$stmt->bindParam(':fornecedor',$_POST['fornecedor'],PDO::PARAM_STR);
$stmt->bindParam(':valor',$_POST['valor'],PDO::PARAM_STR);

if($stmt->execute()){
    header("Location: ../cad_estoque.php");
} else {
    header("Location: ../cad_produto.php");
}

?>