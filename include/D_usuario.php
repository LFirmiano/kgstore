<?php 

// ini_set('display_errors', true); error_reporting(E_ALL);

include "bd.php";

$id = intval($_POST['id_del']);

$stmt = $conn->prepare("DELETE FROM usuarios WHERE id_usuario = :id");
$stmt->bindParam(':id',$id,PDO::PARAM_STR);
$stmt->execute();

header("Location: ../usuario.php");

?>