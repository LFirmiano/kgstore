<?php 

include "bd.php";

$query = "SELECT EXTRACT(DAY FROM hora_compra) AS dia, count(1) AS qtd FROM pedido_item GROUP BY EXTRACT(DAY FROM hora_compra) ORDER BY EXTRACT(DAY FROM hora_compra) ASC";
$stmt = $conn->prepare($query);
$stmt->execute();

?>