<?php 

include "bd.php";

$query = "SELECT * FROM parcelas WHERE EXTRACT(MONTH FROM ano) = :mes";
$stmt = $conn->prepare($query);
$stmt->bindParam(':mes',$_POST['visualizar'],PDO::PARAM_STR);
$stmt->execute();

?>