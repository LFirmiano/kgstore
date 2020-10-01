<?php

include "bd.php";

// CADASTRO DE PRODUTO

$query = "INSERT INTO produtos (produto,categoria,fornecedor,valor) VALUES (:produto,:categoria,:fornecedor,:valor)";

$stmt = $conn->prepare($query);
$stmt->bindParam(':produto',$_POST['produto'],PDO::PARAM_STR);
$stmt->bindParam(':categoria',$_POST['categoria'],PDO::PARAM_STR);
$stmt->bindParam(':fornecedor',$_POST['fornecedor'],PDO::PARAM_STR);
$stmt->bindParam(':valor',$_POST['valor'],PDO::PARAM_STR);

if($stmt->execute()){

     // CADASTRO DE ESTOQUE

    $i=0;
    $aux=1;
    $aux2=2;

    $array = array();

    foreach ($_POST as $row){
        if ($row == "CONTROLE"){
            break;
        }
        $array[$i] = $row;
        $i++;
    }

    $a1 = 3;
    $r = 2;
    $n = 1 + ($i - $a1)/$r;

    $query2 = "INSERT INTO estoque (produto,unidade,tamanho,quantidade) VALUES (:produto,:unidade,:tamanho,:quantidade)";
    $stmt2 = $conn->prepare($query2);

    for ($j=1;$j<=$n;$j++){

        $stmt2->bindParam(':produto',$_POST['produto'],PDO::PARAM_STR);
        $stmt2->bindParam(':unidade',$array[0],PDO::PARAM_STR);
        $stmt2->bindParam(':tamanho',$array[$aux],PDO::PARAM_STR);
        $stmt2->bindParam(':quantidade',$array[$aux2],PDO::PARAM_STR);

        $aux = $j + 2;
        $aux2 = $aux + 1;

        $stmt2->execute();

    }

    header("Location: ../estoque.php");

} else {
    header("Location: ../cad_produto.php");
}

?>