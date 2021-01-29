<?php 

include "bd.php";
include "functions/RelatorioFunction.php";


date_default_timezone_set('America/Sao_Paulo');

$query = "INSERT INTO pedido (qtd_pedidos_item,valor_final,cliente,pagamento,desconto,parcelas,observacao,data) VALUES (:qtd_pedidos_item,:valor_final,:cliente,:pagamento,:desconto,:parcelas,:observacao,:data)";

$stmt = $conn->prepare($query);
$stmt->bindParam(':qtd_pedidos_item',$_POST['qtd_pedidos_item'],PDO::PARAM_STR);
$stmt->bindParam(':valor_final',$_POST['valor_final'],PDO::PARAM_STR);
$stmt->bindParam(':cliente',$_POST['cliente'],PDO::PARAM_STR);
$stmt->bindParam(':pagamento',$_POST['pagamento'],PDO::PARAM_STR);
$stmt->bindParam(':desconto',$_POST['desconto'],PDO::PARAM_STR);
$stmt->bindParam(':parcelas',$_POST['parcela'],PDO::PARAM_STR);
$stmt->bindParam(':observacao',$_POST['obs'],PDO::PARAM_STR);
$stmt->bindParam(':data',$_POST['data'],PDO::PARAM_STR);
if($stmt->execute()){
    $diaLocal = date('d', time());
    $id_pedido = $conn->lastInsertId();
    $stat = "pendente";
    // VERIFICAR SE JA EXISTE RELATORIO
    $mes_ano = date('Y-m-d',time());
    $mes = date('m', time());
    $select = $conn->prepare("SELECT * FROM relatorio WHERE EXTRACT(MONTH FROM mes) = :mesVig");
    $select->bindParam(':mesVig',$mes,PDO::PARAM_STR);
    $select->execute();
    // VERIFICAR SE EXISTE RELATORIO
    if (empty($select->fetch(PDO::FETCH_OBJ))){

        AdicionarRel($_POST['valor_final'],$_POST['lucro'],$stat,$mes_ano);

        // INSERIR VALORES NA TABELA PARCELAS
        if (isset($_POST['prox'])){
            $a = "1/".intval($_POST['prox']);
            if  (intval($_POST['prox']) > 1) {
                AdicionarParcela($a,$_POST['val_parcela'],$id_pedido,$mes_ano);
                for ($p=1;$p<intval($_POST['prox']);$p++){

                    $mes = intval($mes)+1;
                    if ($mes == 13){
                        $mes = 1;
                    }

                    // ADICIONAR NA TABELA PARCELAS
                    $mes_ano = date('Y', time())."-".str_pad($mes,2,"0",STR_PAD_LEFT)."-".date('d', time());
                    $a = ($p+1)."/".intval($_POST['prox']);
                    echo $a . " -> ". $_POST['val_parcela'] . "<br>";
                    AdicionarParcela($a,$_POST['val_parcela'],$id_pedido,$mes_ano);

                    $verificador = VerificarMes($mes);
                    if ($verificador == 0){
                        // ADICIONAR RELATORIO
                        AdicionarRel($_POST['val_parcela'],$_POST['val_parcela'],$stat,$mes_ano);
                    } else {
                        continue;
                    }
                }
            } else if (intval($_POST['prox']) == 1) {
                // ADICIONAR SOMENTE UMA PARCELA COM MES ATUAL
                AdicionarParcela($a,$_POST['val_parcela'],$id_pedido,$mes_ano);
            }
        }
    } else {
        $select->execute();
        $row = $select->fetch(PDO::FETCH_OBJ);
        $pedidos_tot = intval($row->pedidos) + 1;
        $valor_tot = $row->valor + $_POST['valor_final'];
        $lucro_tot = $row->lucro + $_POST['lucro'];
        UpdateRelMes($pedidos_tot,$valor_tot,$lucro_tot,$stat,$mes);

        // INSERIR VALORES NA TABELA PARCELAS
        if (isset($_POST['prox'])){
            $a = "1/".intval($_POST['prox']);
            if  (intval($_POST['prox']) > 1) {
                AdicionarParcela($a,$_POST['val_parcela'],$id_pedido,$mes_ano);
                for ($p=1;$p<intval($_POST['prox']);$p++){

                    $mes = intval($mes)+1;
                    if ($mes == 13){
                        $mes = 1;
                    }

                    // ADICIONAR NA TABELA PARCELAS
                    $mes_ano = date('Y', time())."-".str_pad($mes,2,"0",STR_PAD_LEFT)."-".date('d', time());
                    $a = ($p+1)."/".intval($_POST['prox']);
                    AdicionarParcela($a,$_POST['val_parcela'],$id_pedido,$mes_ano);

                    $verificador = VerificarMes($mes);
                    if ($verificador == 0){
                        // ADICIONAR RELATORIO INEXISTENTE
                        AdicionarRel($_POST['val_parcela'],$_POST['val_parcela'],$stat,$mes_ano);
                    } else {
                        $pedidos_tot = intval($verificador->pedidos) + 1;
                        $valor_tot = $verificador->valor + $_POST['val_parcela'];
                        $lucro_tot = $verificador->lucro + $_POST['val_parcela'];
                        UpdateRelMes($pedidos_tot,$valor_tot,$lucro_tot,$stat,$mes);
                    }
                }
            } else if (intval($_POST['prox']) == 1) {
                // ADICIONAR SOMENTE UMA PARCELA COM MES ATUAL
                AdicionarParcela($a,$_POST['val_parcela'],$id_pedido,$mes_ano);
            }
        }
    }
}

header("Location: ../pedidos_diario.php");

?>