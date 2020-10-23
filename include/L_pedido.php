<?php 

include "bd.php";

date_default_timezone_set('America/Sao_Paulo');

$diaLocal = date('d', time());

$query = "SELECT * FROM pedido WHERE EXTRACT(DAY FROM data) = :diaLocal";
$stmt = $conn->prepare($query);
$stmt->bindParam(':diaLocal',$diaLocal,PDO::PARAM_STR);
$stmt->execute();

?>