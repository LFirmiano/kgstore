<?php 

include "bd.php";

date_default_timezone_set('America/Sao_Paulo');

$diaLocal = date('d', time());
echo $diaLocal;

$query = "SELECT * FROM pedido_item WHERE EXTRACT(DAY FROM hora_compra) = :diaLocal";
$stmt = $conn->prepare($query);
$stmt->bindParam(':diaLocal',$diaLocal,PDO::PARAM_STR);

?>