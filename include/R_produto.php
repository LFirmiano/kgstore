<?php 

include_once("bd.php");

$stmt = $conn->prepare("SELECT * FROM produtos WHERE id_produto = :id");
$stmt->bindParam(':id',$_POST['visualizar'],PDO::PARAM_STR);
if ($stmt->execute()){
    $prod = $stmt->fetch(PDO::FETCH_OBJ);
} else {
    echo "<br> NÃO FOI POSSIVEL EXECTUAR O SELECT <br>";
}

?>