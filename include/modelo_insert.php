<?php

include "bd.php";

$texto = "teste2";

$stmt = $conn->prepare("INSERT INTO teste (texto) VALUES (:nome)");
$stmt->bindParam(':nome',$texto,PDO::PARAM_STR);
if($stmt->execute()){
    echo " <br> CADASTRADO COM SUCESSO";
} else {
    echo "<br> NÃO FOI POSSIVEL CADASTRAR <br>";
}

?>