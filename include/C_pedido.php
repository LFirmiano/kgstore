<?php 

include "bd.php";


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
    $stat = "pendente";
    // VERIFICAR SE JA EXISTE RELATORIO
    $mes_ano = date('Y-m-d',time());
    $mes = date('m', time());
    $select = $conn->prepare("SELECT * FROM relatorio WHERE EXTRACT(MONTH FROM mes) = :mesVig");
    $select->bindParam(':mesVig',$mes,PDO::PARAM_STR);
    $select->execute();
    // VERIFICAR SE EXISTE RELATORIO
    if (empty($select->fetch(PDO::FETCH_OBJ))){
        $q_rel = "INSERT INTO relatorio (mes,pedidos,valor,lucro,status) VALUES (:mes,:pedidos,:valor,:lucro,:status)";
        $p = 1;
        $sql = $conn->prepare($q_rel);
        $sql->bindParam(':mes',$mes_ano,PDO::PARAM_STR);
        $sql->bindParam(':pedidos',$p,PDO::PARAM_STR);
        $sql->bindParam(':valor',$_POST['valor_final'],PDO::PARAM_STR);
        $sql->bindParam(':lucro',$_POST['lucro'],PDO::PARAM_STR);
        $sql->bindParam(':status',$stat,PDO::PARAM_STR);
        $sql->execute();
    } else {
        $select->execute();
        $row = $select->fetch(PDO::FETCH_OBJ);
        $pedidos_tot = intval($row->pedidos) + 1;
        $valor_tot = intval($row->valor) + intval($_POST['valor_final']);
        $lucro_tot = intval($row->lucro) + intval($_POST['lucro']);
        $q_rel = "UPDATE relatorio SET pedidos = :pedidos, valor = :valor, lucro = :lucro,status = :status";
        $sql = $conn->prepare($q_rel);
        $sql->bindParam(':pedidos',$pedidos_tot,PDO::PARAM_STR);
        $sql->bindParam(':valor',$valor_tot,PDO::PARAM_STR);
        $sql->bindParam(':lucro',$lucro_tot,PDO::PARAM_STR);
        $sql->bindParam(':status',$stat,PDO::PARAM_STR);
        $sql->execute();
    }
}

header("Location: ../pedidos_diario.php");

?>