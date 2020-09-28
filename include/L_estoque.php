<?php 

// ini_set('display_errors', true); error_reporting(E_ALL);

include_once("bd.php");

$stmt = $conn->prepare("SELECT * FROM produtos");
$stmt->execute();

?>