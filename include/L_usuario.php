<?php 

include "bd.php";

$stmt = $conn->prepare("SELECT * FROM usuarios");
$stmt->execute();

?>