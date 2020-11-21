<?php 

include "bd.php";

$query = "SELECT * FROM usuarios WHERE email = :email";
$stmt = $conn->prepare($query);
$stmt->bindParam(':email',$_SESSION['email'],PDO::PARAM_STR);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_OBJ);
?>