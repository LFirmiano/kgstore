<?php

include "bd.php";

$i=0;
$aux=1;
$aux2=2;

$array = array();

foreach ($_POST as $row){
    $array[$i] = $row;
    $i++;
}

$a1 = 3;
$r = 2;
$n = 1 + ($i - $a1)/$r;

$query = "INSERT INTO estoque (unidade,tamanho,quantidade) VALUES (:unidade,:tamanho,:quantidade)";
$stmt = $conn->prepare($query);

for ($j=1;$j<=$n;$j++){

    $stmt->bindParam(':unidade',$array[0],PDO::PARAM_STR);
    $stmt->bindParam(':tamanho',$array[$aux],PDO::PARAM_STR);
    $stmt->bindParam(':quantidade',$array[$aux2],PDO::PARAM_STR);

    $aux = $j + 2;
    $aux2 = $aux + 1;

    $stmt->execute();

}

header("Location: ../");


?>