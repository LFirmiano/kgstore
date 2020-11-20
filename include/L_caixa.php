<?php 

include_once("bd.php");

$stmt2 = $conn->prepare("SELECT * FROM caixa ORDER BY id_caixa DESC limit 1");
if ($stmt2->execute()){
    $row2 = $stmt2->fetch(PDO::FETCH_OBJ);
} else {
    echo "<br> NÃO FOI POSSIVEL EXECTUAR O SELECT <br>";
}

?>