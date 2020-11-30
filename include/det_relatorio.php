<?php 

include "bd.php";

$query = "SELECT EXTRACT(DAY FROM data) AS dia, count(1) AS qtd FROM pedido GROUP BY EXTRACT(DAY FROM data) ORDER BY EXTRACT(DAY FROM data) ASC";
$stmt = $conn->prepare($query);
$stmt->execute();

?>