<?php 

// ini_set('display_errors', true); error_reporting(E_ALL);

include "bd.php";

$id = intval($_POST['id_cl']);

$stmt = $conn->prepare("DELETE FROM cliente WHERE id_cliente = :id");
$stmt->bindParam(':id',$id,PDO::PARAM_STR);
$stmt->execute();

header("Location: ../cliente.php");
?>