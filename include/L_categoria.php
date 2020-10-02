<?php 

include_once("bd.php");

$stmt = $conn->prepare("SELECT * FROM categoria");
$stmt->execute();

?>