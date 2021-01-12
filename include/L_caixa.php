<?php 

include_once("bd.php");

$stmt2 = $conn->prepare("SELECT * FROM caixa WHERE id_caixa = :id ORDER BY data_caixa DESC");
$id = 1;
$stmt2->bindParam(':id',$id,PDO::PARAM_STR);
if ($stmt2->execute()){
    $row2 = $stmt2->fetch(PDO::FETCH_OBJ);
} else {
    echo "<br> NÃO FOI POSSIVEL EXECTUAR O SELECT <br>";
}

?>