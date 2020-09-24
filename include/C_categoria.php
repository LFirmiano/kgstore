<?php

include "bd.php";

$query = "INSERT INTO categoria (categoria,subcategoria) VALUES (:categoria,:subcategoria)";

$stmt = $conn->prepare($query);
$stmt->bindParam(':categoria',$_POST['categoria'],PDO::PARAM_STR);
$stmt->bindParam(':subcategoria',$_POST['subcategoria'],PDO::PARAM_STR);

if($stmt->execute()){
    header("Location: ../categoria.php");
} else {
    header("Location: ../cad_categoria.php");
}

?>