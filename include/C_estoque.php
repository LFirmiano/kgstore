<?php

include "bd.php";

$i=0;
$j=1;

$array = array();

foreach ($_POST as $row){
    $array[$i] = $row;
    $i++;
}

$query = "INSERT INTO estoque (unidade,tamanho,quantidade) VALUES (:unidade,:tamanho,:quantidade)";
$stmt = $conn->prepare($query);

$aux = 1;
$aux2 = 2;

// 5 -> 2
// 7 -> 3
// 9 -> 4

for ($j=0;$j<$i;$j++){

    echo $array[$j+$aux] . "<br>";
    echo $array[$j+$aux2];

    echo "<br>";

    $aux = $aux + 2;
    $aux2 = $aux + 1;
    // $stmt->bindParam(':unidade',$array[0],PDO::PARAM_STR);
    // $stmt->bindParam(':tamanho',$array[$j],PDO::PARAM_STR);
    // $stmt->bindParam(':quantidade',$array[$k],PDO::PARAM_STR);

    // $stmt->execute();

}

// header("Location: ../");

// // ISSO NÃO SERÁ ASSIM
// if($stmt->execute()){
//     header("Location: ../cad_estoque.php");
// } else {
//     header("Location: ../cad_produto.php");
// }


// $_POST = {
//     "id" => "Unidades Calçados",
//     "35-36" => "60",
//     "38-39" => "100"
// }

// foreach ($_POST as $row){

// }

// $array = {
//     "0" => "Unidades Calçados",
//     "1" => "60",
//     "2" => "100"
// }

// $referencia = ["35-36","38-39"]

// for ($i=1;$i<len($array);$i++){
//     $j = $i-1;
//     $sql = "INSERT INTO estoque (unidade,tamanho,valor) VALUES ($array["0"],$referencia[$j],$array[$i])"
// }


?>