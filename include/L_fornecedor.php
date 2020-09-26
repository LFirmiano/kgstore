<?php 

include_once("bd.php");

$stmt = $conn->prepare("SELECT * FROM fornecedor");
$stmt->execute();

?>