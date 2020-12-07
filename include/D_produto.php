<?php 

include "bd.php";

$id = intval($_POST['id_del']);

$del_prod = $conn->prepare("DELETE FROM produtos WHERE id_produto = :id");
$del_prod->bindParam(':id',$id,PDO::PARAM_STR);
$del_prod->execute();

$del_est = $conn->prepare("DELETE FROM estoque WHERE produto_id = :produto_id");
$del_est->bindParam(':produto_id',$id,PDO::PARAM_STR);
$del_est->execute();

header("Location: ../estoque.php");

?>