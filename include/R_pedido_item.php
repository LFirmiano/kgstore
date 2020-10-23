<?php 

include "bd.php";

$query = "SELECT * FROM pedido_item WHERE hora_compra = :hora_compra";
$stmt = $conn->prepare($query);
$stmt->bindParam(':hora_compra',$_SESSION['data'],PDO::PARAM_STR);
$stmt->execute();
?>