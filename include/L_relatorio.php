<?php 

include "bd.php";

$stmt = $conn->prepare("SELECT * FROM relatorio");
$stmt->execute();

?>