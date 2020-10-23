<?php 

include "bd.php";

date_default_timezone_set('America/Sao_Paulo');

$dataLocal = date('Y-m-d H:i:s', time());
$val_tot = $_POST['tot'];
$qtd_pedidos_item = 0;

// FORMAR ARRAY
$i=0;$j=0;
foreach ($_POST as $row){
    if ($i == count($_POST) - 1){
        continue;
    }
    if ($i>2){
        $array[$j] = $row;
        $j++;
    }
    $i++;
}

// PREAPRACAO PARA PEGAR E COLOCAR INFORMACOES NO BANCO
$query = "INSERT INTO pedido_item (produto,tamanho,quantidade,valor,cliente,pagamento,desconto,hora_compra) VALUES (:produto,:tamanho,:quantidade,:valor,:cliente,:pagamento,:desconto,:hora_compra)";
$s_estoque = "SELECT quantidade FROM estoque WHERE produto=:produto AND tamanho=:tamanho";
$u_estoque = "UPDATE estoque SET quantidade=:quantidade WHERE produto=:produto AND tamanho=:tamanho";
$stmt = $conn->prepare($query);
$select = $conn->prepare($s_estoque);
$update = $conn->prepare($u_estoque);
$stmt->bindParam(':cliente',$_POST['cliente'],PDO::PARAM_STR);
$stmt->bindParam(':pagamento',$_POST['forma'],PDO::PARAM_STR);
$stmt->bindParam(':desconto',$_POST['desconto'],PDO::PARAM_STR);
$stmt->bindParam(':hora_compra',$dataLocal,PDO::PARAM_STR);

// INSERIR NA TABELA
$i=0;
for ($i=0; $i<count($array);$i++){
    if (substr($array[$i],0,4) == "prod"){
        $produto = substr($array[$i],4,strlen($array[$i]));
        $stmt->bindParam(':produto',$produto,PDO::PARAM_STR);
        $val = $i+1;
        $stmt->bindParam(':valor',$array[$val],PDO::PARAM_STR);
        $i = $i+2;
        while (isset($array[$i]) && substr($array[$i],0,4) != "prod"){
            // EXECUTAR O SELECT NA TABELA DE ESTOQUE PARA EDITAR AS QUANTIDADES
            $select->bindParam(':produto',$produto,PDO::PARAM_STR);
            $select->bindParam(':tamanho',$array[$i],PDO::PARAM_STR);
            $select->execute();
            $qtd_old = $select->fetch(PDO::FETCH_OBJ);
            // OPERACAO PARA DIMINUIR O VALOR DO ESTOQUE
            $qtd_new = intval($qtd_old->quantidade) - intval($array[$i+1]);
            // EXECUTAR UPDATE DO ESTOQUE
            $update->bindParam(':quantidade',$qtd_new,PDO::PARAM_STR);
            $update->bindParam(':produto',$produto,PDO::PARAM_STR);
            $update->bindParam(':tamanho',$array[$i],PDO::PARAM_STR);
            $update->execute();
            // INSERIR NA TABELA PEDIDO ITEM
            $qtd_pedidos_item += intval($array[$i+1]);
            $stmt->bindParam(':tamanho',$array[$i],PDO::PARAM_STR);
            $stmt->bindParam(':quantidade',$array[$i+1],PDO::PARAM_STR);
            $stmt->execute();
            $i+=2;
        }
    }
    $i--;
}

?>