<?php 

include "bd.php";

date_default_timezone_set('America/Sao_Paulo');

$dataLocal = date('Y-m-d H:i:s', time());
$qtd_pedidos_item = 0;

$i=0;$aux=0;$val_tot=0;

foreach ($_POST as $post){
    if ($post == "controle-parcelas"){
        break;
    }
    if ($post == "PARCELA-VAL"){
        $glob[$aux] = $aux;
    }
    if ($i>0 && $post != "PARCELA-VAL"){
        $array_formas[$aux] = $post;
        $aux++;
    }
    $i++;
}

for ($i=0;$i<count($array_formas);$i++){
    if ($array_formas[$i] == "Dinheiro (Espécie)"){
        $formas[] = $array_formas[$i];
        $val_formas[] = $array_formas[$i+1];
        $val_tot += $array_formas[$i+1];
        $i++;
        continue;
    } else if ($array_formas[$i] == "Débito"){
        $formas[] = $array_formas[$i];
        $val_parcial = $array_formas[$i+1]*(0.9801);
        $val_formas[] = $array_formas[$i+1];
        $val_tot += $val_parcial;
        $i++;
    } else {
        if (isset($array_formas[$i+2])){
            $formas[] = $array_formas[$i];
            $parcelas[] = $array_formas[$i+2];
            if ($array_formas[$i+2]=="1"){
                $val_parcial = $array_formas[$i+1]*(0.9501);
                $val_formas[] = $array_formas[$i+1];
                $val_tot += $val_parcial;
                $i++;
            } else {
                $val_parcial = $array_formas[$i+1]*(0.9441);
                $val_parcial = $val_parcial/intval($array_formas[$i+2]);
                $val_formas[] = $array_formas[$i+1];
                $val_tot += $val_parcial;
                $i++;
            }
            $i++;
        }  
    }
}
if (isset($parcelas)){
    for ($m=0;$m<count($parcelas);$m++){
        if ($m==0){
            $texto = str_pad($parcelas[$m],2,"0",STR_PAD_LEFT)."x";
        }else {
            $texto .= "/".str_pad($parcelas[$m], 2, "0", STR_PAD_LEFT)."x";
        }
    }
} else {
    $texto = "NÃO FOI COMPRADO NO CRÉDITO";
}

if (count($formas)==1){
    $obs = "O PAGAMENTO FOI EFETUADO EM ". $formas[0] ." NO VALOR DE ". $val_formas[0] ." REAIS";
    $forma = $formas[0];
} else if (count($formas)==2){
    $obs = "O PAGAMENTO FOI EFETUADO EM DUAS FORMAS, SENDO ELAS: ". $formas[0] ." NO VALOR DE ". $val_formas[0] ." REAIS E ". $formas[1] ." NO VALOR DE ". $val_formas[1] ." REAIS";
    $forma = $formas[0]."/".$formas[1];
} else if (count($formas)==3){
    $obs = "O PAGAMENTO FOI EFETUADO EM TRêS FORMAS, SENDO ELAS: ". $formas[0] ." NO VALOR DE ". $val_formas[0] ." REAIS, ". $formas[1] ." NO VALOR DE ". $val_formas[1] ." REAIS E ". $formas[2] ." NO VALOR DE ". $val_formas[2] ." REAIS";
    $forma = $formas[0]."/".$formas[1]."/".$formas[2];
}

// FORMAR ARRAY
$i=0;$j=0;$aux=0;
foreach ($_POST as $row){
    if ($i == count($_POST) - 1){
        continue;
    }
    if (substr($row,0,4) == "prod" || $aux>0){
        $array[$j] = $row;
        $j++;
        $aux++;
    }
    $i++;
}

// PREAPRACAO PARA PEGAR E COLOCAR INFORMACOES NO BANCO
$query = "INSERT INTO pedido_item (produto,tamanho,quantidade,valor,cliente,pagamento,hora_compra) VALUES (:produto,:tamanho,:quantidade,:valor,:cliente,:pagamento,:hora_compra)";
$s_estoque = "SELECT quantidade FROM estoque WHERE produto=:produto AND tamanho=:tamanho";
$u_estoque = "UPDATE estoque SET quantidade=:quantidade WHERE produto=:produto AND tamanho=:tamanho";
$stmt = $conn->prepare($query);
$select = $conn->prepare($s_estoque);
$update = $conn->prepare($u_estoque);
$stmt->bindParam(':cliente',$_POST['cliente'],PDO::PARAM_STR);
$stmt->bindParam(':pagamento',$forma,PDO::PARAM_STR);
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