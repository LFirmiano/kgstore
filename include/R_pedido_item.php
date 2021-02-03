<?php 

include "bd.php";

$_SESSION['data'] = $_POST['data'];

// var_dump($_SESSION['data']);

$query = "SELECT * FROM pedido_item JOIN produtos p ON pedido_item.produto_id = p.id_produto  WHERE hora_compra = :hora_compra";
$stmt = $conn->prepare($query);
$stmt->bindParam(':hora_compra',$_SESSION['data'],PDO::PARAM_STR);
$stmt->execute();

?>