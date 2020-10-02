<?php

include "bd.php";

$query = "UPDATE fornecedor SET fornecedor = :fornecedor, email = :email, telefone = :telefone, endereco = :endereco WHERE id_fornecedor = :id";

$stmt = $conn->prepare($query);
$stmt->bindParam(':fornecedor',$_POST['fornecedor'],PDO::PARAM_STR);
$stmt->bindParam(':email',$_POST['email'],PDO::PARAM_STR);
$stmt->bindParam(':telefone',$_POST['telefone'],PDO::PARAM_STR);
$stmt->bindParam(':endereco',$_POST['endereco'],PDO::PARAM_STR);
$stmt->bindParam(':id',$_POST['edit'],PDO::PARAM_STR);

$stmt->execute();

header("Location: ../fornecedor.php");

?>