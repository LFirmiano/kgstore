<?php 

include "bd.php";

$id = intval($_POST['id_del']);

$stmt = $conn->prepare("SELECT * FROM produtos WHERE id_produto = :id");
$stmt->bindParam(':id',$id,PDO::PARAM_STR);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_OBJ);

$del_prod = $conn->prepare("DELETE FROM produtos WHERE id_produto = :id");
$del_prod->bindParam(':id',$id,PDO::PARAM_STR);
$del_prod->execute();

$del_est = $conn->prepare("DELETE FROM estoque WHERE produto = :produto");
$del_est->bindParam(':produto',$row->produto,PDO::PARAM_STR);
$del_est->execute();

header("Location: ../estoque.php");

?>