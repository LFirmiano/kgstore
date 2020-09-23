<?php

include "bd.php";

// var_dump($_POST);

$i=0;

foreach ($_POST as $row){
    $array = array("[$i]" => "$row");
    $i++;
}

var_dump($array);

// $query = "INSERT INTO estoque (unidade,tamanhos) VALUES (:unidade,:tamanhos)";

// $stmt = $conn->prepare($query);
// $stmt->bindParam(':unidade',$_POST['id'],PDO::PARAM_STR);
// $stmt->bindParam(':tamanhos',$_POST['tamanhos'],PDO::PARAM_STR);

// // ISSO NÃO SERÁ ASSIM
// if($stmt->execute()){
//     header("Location: ../cad_estoque.php");
// } else {
//     header("Location: ../cad_produto.php");
// }

?>