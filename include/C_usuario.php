<?php 

include "bd.php";

$query = "INSERT INTO usuarios (nome,email,senha,tipo) VALUES (:nome,:email,:senha,:tipo)";

$tipo = intval($_POST['exampleRadios']);

$stmt = $conn->prepare($query);
$stmt->bindParam(':nome',$_POST['nome'],PDO::PARAM_STR);
$stmt->bindParam(':email',$_POST['email'],PDO::PARAM_STR);
$stmt->bindParam(':senha',$_POST['senha'],PDO::PARAM_STR);
$stmt->bindParam(':tipo',$tipo,PDO::PARAM_STR);

if($stmt->execute()){
    header("Location: ../usuario.php");
}

?>