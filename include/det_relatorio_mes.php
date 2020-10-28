<?php 

include "bd.php";

$query = "SELECT * FROM pedido WHERE EXTRACT(DAY FROM data) = :dia";
$stmt = $conn->prepare($query);
$stmt->bindParam(':dia',$_POST['visualizar'],PDO::PARAM_STR);
$stmt->execute();

?>