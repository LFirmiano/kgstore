<?php 

include "bd.php";

$query = "SELECT * FROM pedido";
$stmt = $conn->prepare($query);
$stmt->execute();

?>