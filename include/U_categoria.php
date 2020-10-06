<?php

include "bd.php";

// ini_set('display_errors', true); error_reporting(E_ALL);

$upd = "UPDATE categoria SET categoria = :categoria , subcategoria = :subcategoria , unidade = :unidade WHERE id_categoria = :id";

$insert = $conn->prepare($upd);
$insert->bindParam(':categoria',$_POST['categoria'],PDO::PARAM_STR);
$insert->bindParam(':subcategoria',$_POST['subcategoria'],PDO::PARAM_STR);
$insert->bindParam(':unidade',$_POST['unidade'],PDO::PARAM_STR);
$insert->bindParam(':id',$_POST['edit'],PDO::PARAM_STR);

$insert->execute();

header("Location: ../categoria.php");

?>