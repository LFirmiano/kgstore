<?php 

include "bd.php";

$query = "SELECT * FROM pedido_item JOIN produtos p ON pedido_item.produto_id = p.id_produto WHERE id_pedido_item = :id_pedido_item";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id_pedido_item',$_POST['visualizar'],PDO::PARAM_STR);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_OBJ);

?>