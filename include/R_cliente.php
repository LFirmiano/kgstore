<?php 

include_once("bd.php");

$stmt = $conn->prepare("SELECT * FROM cliente WHERE id_cliente = :id");
$stmt->bindParam(':id',$_POST['visualizar'],PDO::PARAM_STR);
if ($stmt->execute()){
    $row = $stmt->fetch(PDO::FETCH_OBJ);
} else {
    echo "<br> NÃO FOI POSSIVEL EXECTUAR O SELECT <br>";
}

?>