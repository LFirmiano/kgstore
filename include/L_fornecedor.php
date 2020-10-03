<?php 

include_once("bd.php");

$forn = $conn->prepare("SELECT * FROM fornecedor");
$forn->execute();

?>