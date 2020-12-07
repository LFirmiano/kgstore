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

$query2 = "UPDATE estoque SET quantidade = :quantidade WHERE produto_id = :produto_id AND tamanho = :tamanho";
$stmt2 = $conn->prepare($query2);

for ($j=1;$j<=$n;$j++){

    $stmt2->bindParam(':quantidade',$array[$aux2],PDO::PARAM_STR);
    $stmt2->bindParam(':produto_id',$array[0],PDO::PARAM_STR);
    $stmt2->bindParam(':tamanho',$array[$aux],PDO::PARAM_STR);

    $aux = $j + 2;
    $aux2 = $aux + 1;

    $stmt2->execute();

}

header("Location: ../estoque.php");

?>