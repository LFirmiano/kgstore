<?php 

include "bd.php";

$query = "INSERT INTO pedido (qtd_pedidos_item,valor_final,cliente,pagamento,desconto,data) VALUES (:qtd_pedidos_item,:valor_final,:cliente,:pagamento,:desconto,:data)";

$val_final = intval($_POST['valor_final']) - intval($_POST['desconto']);

$stmt = $conn->prepare($query);
$stmt->bindParam(':qtd_pedidos_item',$_POST['qtd_pedidos_item'],PDO::PARAM_STR);
$stmt->bindParam(':valor_final',$val_final,PDO::PARAM_STR);
$stmt->bindParam(':cliente',$_POST['cliente'],PDO::PARAM_STR);
$stmt->bindParam(':pagamento',$_POST['pagamento'],PDO::PARAM_STR);
$stmt->bindParam(':desconto',$_POST['desconto'],PDO::PARAM_STR);
$stmt->bindParam(':data',$_POST['data'],PDO::PARAM_STR);
if($stmt->execute()){
    // VERIFICAR SE JA EXISTE RELATORIO
    $mes = date_format(new DateTime($_POST['data']),'m');
    $select = $conn->prepare("SELECT * FROM pedido WHERE EXTRACT(MONTH FROM data) = :mesVig");
    $select->bindParam(':mesVig',$mes,PDO::PARAM_STR);
    $select->execute();
    // VERIFICAR SE EXISTE RELATORIO
    if (empty($select->fetch(PDO::FETCH_OBJ))){
        $q_rel = "INSERT INTO relatorio (mes,pedidos,valor,status) VALUES (:mes,:pedidos,:valor,:status)";
        $sql = $conn->prepare($q_rel);
        $sql->bindParam(':mes',$_POST['mes'],PDO::PARAM_STR);
        $sql->bindParam(':pedidos',$_POST['pedidos'],PDO::PARAM_STR);
        $sql->bindParam(':valor',$_POST['valor'],PDO::PARAM_STR);
        $sql->bindParam(':status',$_POST['status'],PDO::PARAM_STR);
        $sql->execute();
    } else {
        $row = $select->fetch(PDO::FETCH_OBJ);
        $pedidos_tot = intval($row->pedidos) + invtal($_POST['qtd_pedidos_item']);
        $valor_tot = intval($row->valor) + $val_final;
        $q_rel = "UPDATE relatorio SET mes = :mes, pedidos = :pedidos, valor = :valor, status = :status)";
        $sql = $conn->prepare($q_rel);
        $sql->bindParam(':mes',$_POST['mes'],PDO::PARAM_STR);
        $sql->bindParam(':pedidos',$pedidos_tot,PDO::PARAM_STR);
        $sql->bindParam(':valor',$valor_tot,PDO::PARAM_STR);
        $sql->bindParam(':status',$_POST['status'],PDO::PARAM_STR);
        $sql->execute();
    }
}

header("Location: ../pedidos_diario.php");

?>