<?php

include "bd.php";

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$dataLocal = date('Y-m-d H:i:s', time());
$dia = date('d', time());
$mes = date('m', time());
$ano = date('Y', time());

// PEGAR VALOR DO CAIXA ATUAL PERA EXECUTAR OPERACAO DE CADASTRO OU RETIRADA

$pegar_dados = "SELECT * FROM caixa WHERE id_caixa = :id";
$dados = $conn->prepare($pegar_dados);
$id = 7;
$dados->bindParam(':id',$id,PDO::PARAM_STR);
$dados->execute();
$row = $dados->fetch(PDO::FETCH_OBJ);

if (isset($_POST['valor'])){
    $val = intval($_POST['valor']);
    $valor_caixa = intval($row->valor) + $val; 
    $tipo = "DEPÓSITO";
} else if (isset($_POST['retirada'])){
    $val = intval($_POST['retirada']);
    $valor_caixa = intval($row->valor) - $val; 
    $tipo = "RETIRADA";
}

$query = "UPDATE caixa SET valor = :valor WHERE id_caixa = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':valor',$valor_caixa,PDO::PARAM_STR);
$stmt->bindParam(':id',$id,PDO::PARAM_STR);
$stmt->execute();

// if (empty($row)){
//     // INSERIR PELA PRIMEIRA VEZ O CAIXA
//     $ins = "INSERT INTO caixa (valor,data_caixa) VALUES (:valor,:data_caixa)";
//     $ins = $conn->prepare($ins);
//     $ins->bindParam(':valor',$_POST['valor'],PDO::PARAM_STR);
//     $ins->bindParam(':data_caixa',$dataLocal,PDO::PARAM_STR);
//     $ins->execute();
//     $valor_caixa = $_POST['valor'];
//     $tipo = "DEPÓSITO";
// } else {
//     if (isset($_POST['valor'])){
//         $mov = intval($_POST['valor']);
//         $valor_caixa = intval($row->valor) + $mov; 
//         $tipo = "DEPÓSITO";
//     } else if (isset($_POST['retirada'])){
//         $mov = intval($_POST['retirada']);
//         $valor_caixa = intval($row->valor) - $mov; 
//         $tipo = "RETIRADA";
//         echo "entrou";
//     }
//     // ATUALIZA O VALOR DO CAIXA
//     $query = "UPDATE caixa SET valor = :valor WHERE EXTRACT(DAY FROM data_caixa) = :dia_caixa AND EXTRACT(MONTH FROM data_caixa) = :mes_caixa AND EXTRACT(YEAR FROM data_caixa) = :ano_caixa";
//     $stmt = $conn->prepare($query);
//     $stmt->bindParam(':valor',$valor_caixa,PDO::PARAM_STR);
//     $stmt->bindParam(':dia_caixa',$dia,PDO::PARAM_STR);
//     $stmt->bindParam(':mes_caixa',$mes,PDO::PARAM_STR);
//     $stmt->bindParam(':ano_caixa',$ano,PDO::PARAM_STR);
//     $stmt->execute();
// }

$query2 = "INSERT INTO movimentacao_caixa (valor,obs,tipo,data_caixa) VALUES (:valor,:obs,:tipo,:data_caixa)";
$stmt2 = $conn->prepare($query2);
$stmt2->bindParam(':valor',$val,PDO::PARAM_STR);
$stmt2->bindParam(':obs',$_POST['obs'],PDO::PARAM_STR);
$stmt2->bindParam(':tipo',$tipo,PDO::PARAM_STR);
$stmt2->bindParam(':data_caixa',$dataLocal,PDO::PARAM_STR);
$stmt2->execute();

header("Location: ../caixa.php");

?>