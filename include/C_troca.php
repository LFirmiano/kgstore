<?php

include "bd.php";
include "functions/RelatorioFunction.php";

$query = "INSERT INTO troca (valor_diferenca,data_troca,produto_antigo_id,tamanho_antigo_trocado,quantidade_antiga_trocada,pedido_id) VALUES (:valor_diferenca,NOW(),:produto_antigo_id,:tamanho_antigo_trocado,:quantidade_antiga_trocada,:pedido_id)";
$select_estoque = "SELECT quantidade FROM estoque WHERE produto_id = :produto_id AND tamanho = :tamanho";
$select_estoque_novo = "SELECT quantidade FROM estoque WHERE produto_id = :produto_id AND tamanho = :tamanho";
$estoque = "UPDATE estoque SET quantidade = :quantidade WHERE produto_id = :produto_id AND tamanho = :tamanho";
$query_registro = "INSERT INTO registrotroca (produto_novo_id,tamanho_novo_trocado,quantidade_nova_trocada,troca_id) VALUES (:produto_novo_id,:tamanho_novo_trocado,:quantidade_nova_trocada,:troca_id)";
$query_trocado = "UPDATE pedido_item SET is_trocado = :is_trocado, troca_id = :troca_id WHERE id_pedido_item = :id_pedido_item";
$trocado_is = true;

$mes_atual = intval(date('m', time()));

// FORMAR ARRAY
$i=0;$j=0;$aux=0;
foreach ($_POST as $row){
    if ($i == count($_POST) - 2){
        continue;
    }
    if ($row == "CONTROL"){
        $aux++;
        continue;
    }
    if ($aux>0){
        $array[$j] = $row;
        $j++;
    }
    $i++;
}

// 1. ADICIONA TROCA
// 2. ACRESCENTA NO ESTOQUE DO PRODUTO ANTIGO
// 3. ENTRA NO LOOP
// 4. ADICIONA O REGISTRO DA TROCA
// 5. DIMINUI O ESTOQUE DO PRODUTO A CADA ITERACAO DO LOOP PARAR CADA PRODUTO

$stmt = $conn->prepare($query);
$stmt->bindParam(':valor_diferenca',$_POST['valAdc'],PDO::PARAM_STR);
$stmt->bindParam(':produto_antigo_id',$_POST['prodAntigo'],PDO::PARAM_STR);
$stmt->bindParam(':tamanho_antigo_trocado',$_POST['tamAntigo'],PDO::PARAM_STR);
$stmt->bindParam(':quantidade_antiga_trocada',$_POST['qtdantiga'],PDO::PARAM_STR);
$stmt->bindParam(':pedido_id',$_POST['pedido_id'],PDO::PARAM_STR);

// ADICIONA TROCA
if($stmt->execute()){

    $troca_id = $conn->lastInsertId();

    $select_trocado = $conn->prepare($query_trocado);
    $select_trocado->bindParam(':is_trocado',$trocado_is,PDO::PARAM_STR);
    $select_trocado->bindParam(':id_pedido_item',$_POST['pedido_item_id'],PDO::PARAM_STR);
    $select_trocado->bindParam(':troca_id',$troca_id,PDO::PARAM_STR);
    $select_trocado->execute();

    $stmt_select_estoque = $conn->prepare($select_estoque);
    $stmt_select_estoque->bindParam(':produto_id',$_POST['prodAntigo'],PDO::PARAM_STR);
    $stmt_select_estoque->bindParam(':tamanho',$_POST['tamAntigo'],PDO::PARAM_STR);
    $stmt_select_estoque->execute();
    $sel_estoque = $stmt_select_estoque->fetch(PDO::FETCH_OBJ);
    $qtdOld = intval($sel_estoque->quantidade) + intval($_POST['qtdantiga']);

    // ACRESCENTA NO ESTOQUE DO PRODUTO ANTIGO
    $stmt_estoque = $conn->prepare($estoque);
    $stmt_estoque->bindParam(':quantidade',$qtdOld,PDO::PARAM_STR);
    $stmt_estoque->bindParam(':produto_id',$_POST['prodAntigo'],PDO::PARAM_STR);
    $stmt_estoque->bindParam(':tamanho',$_POST['tamAntigo'],PDO::PARAM_STR);
    $stmt_estoque->execute();


    $stmt_registro = $conn->prepare($query_registro);
    $stmt_registro->bindParam(':troca_id',$troca_id,PDO::PARAM_STR);

    $stmt_select_estoque_novo = $conn->prepare($select_estoque_novo);

    for ($iteracao=0;$iteracao<count($array);$iteracao++){

        if (isset($array[$iteracao]) && substr($array[$iteracao],0,4) == "prod"){

            $produto_id = substr($array[$iteracao],4,strlen($array[$iteracao]));

            $iteracao++;

            while (isset($array[$iteracao]) && substr($array[$iteracao],0,4) != "prod"){

                // ADICIONA O REGISTRO DA TROCA
                $stmt_registro->bindParam(':produto_novo_id',$produto_id,PDO::PARAM_STR);
                $stmt_registro->bindParam(':tamanho_novo_trocado',$array[$iteracao],PDO::PARAM_STR);
                $stmt_registro->bindParam(':quantidade_nova_trocada',$array[$iteracao+1],PDO::PARAM_STR);
                $stmt_registro->execute();

                // PEGAR A QUANTIDADE QUE SERA ALTERADA DO PRODUTO NOVO
                $stmt_select_estoque_novo->bindParam(':produto_id',$produto_id,PDO::PARAM_STR);
                $stmt_select_estoque_novo->bindParam(':tamanho',$array[$iteracao],PDO::PARAM_STR);
                $stmt_select_estoque_novo->execute();
                $sel_estoque_novo = $stmt_select_estoque_novo->fetch(PDO::FETCH_OBJ);
                $qtdNew = intval($sel_estoque_novo->quantidade) - intval($array[$iteracao+1]);

                // ACRESCENTA NO ESTOQUE DO PRODUTO NOVO
                $stmt_estoque = $conn->prepare($estoque);
                $stmt_estoque->bindParam(':quantidade',$qtdNew,PDO::PARAM_STR);
                $stmt_estoque->bindParam(':produto_id',$produto_id,PDO::PARAM_STR);
                $stmt_estoque->bindParam(':tamanho',$array[$iteracao],PDO::PARAM_STR);
                $stmt_estoque->execute();

                $iteracao = $iteracao + 2;

            }
        
        }

        $iteracao--;

    }

    $mes_ano = date('Y', time())."-".str_pad($mes_atual,2,"0",STR_PAD_LEFT)."-".date('d', time());
    $stat = "pendente";

    $verificador = VerificarMes($mes_atual);
    if ($verificador == 0){
        // ADICIONAR RELATORIO INEXISTENTE
        AdicionarRel($_POST['valAdc'],$_POST['valAdc'],$stat,$mes_ano);
    } else {
        // PEGA OS DADOS DO RELATORIO EXISTENTE
        $pedidos_tot = intval($verificador->pedidos) + 1;
        $valor_tot = $verificador->valor + $_POST['valAdc'];
        $lucro_tot = $verificador->lucro + $_POST['valAdc'];
        
        //ATUALIZA OS DADOS DO RELATORIO
        UpdateRelMes($pedidos_tot,$valor_tot,$lucro_tot,$stat,$mes_atual);
    }

    header('Location: ../troca.php');

} else {
    
    header('Location: ../pedios.php');

}

?>