<?php 

include_once("bd.php");

$stmt = $conn->prepare("SELECT * FROM usuarios WHERE id_usuario = :id");
$stmt->bindParam(':id',$_POST['visualizar'],PDO::PARAM_STR);
if ($stmt->execute()){
    $user = $stmt->fetch(PDO::FETCH_OBJ);
} else {
    echo "<br> NÃO FOI POSSIVEL EXECTUAR O SELECT <br>";
}

?>