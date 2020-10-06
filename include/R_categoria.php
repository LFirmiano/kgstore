<?php 

include_once("bd.php");

$stmt = $conn->prepare("SELECT * FROM categoria WHERE id_categoria = :id");
$stmt->bindParam(':id',$_POST['editar'],PDO::PARAM_STR);
if ($stmt->execute()){
    $row = $stmt->fetch(PDO::FETCH_OBJ);
} else {
    echo "<br> NÃO FOI POSSIVEL EXECTUAR O SELECT <br>";
}

?>