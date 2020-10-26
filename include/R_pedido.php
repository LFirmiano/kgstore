<?php 

include "bd.php";

$query = "SELECT * FROM pedido WHERE id_pedido = :id_pedido";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id_pedido',$_POST['visualizar'],PDO::PARAM_STR);
if ($stmt->execute()){
    $row = $stmt->fetch(PDO::FETCH_OBJ);
}

?>