<?php 

include "bd.php";

$query = "INSERT INTO pedido (qtd_pedidos_item,valor_final,cliente,pagamento,data) VALUES (:qtd_pedidos_item,:valor_final,:cliente,:pagamento,:data)";

$stmt = $conn->prepare($query);
$stmt->bindParam(':qtd_pedidos_item',$_POST['qtd_pedidos_item'],PDO::PARAM_STR);
$stmt->bindParam(':valor_final',$_POST['valor_final'],PDO::PARAM_STR);
$stmt->bindParam(':cliente',$_POST['cliente'],PDO::PARAM_STR);
$stmt->bindParam(':pagamento',$_POST['pagamento'],PDO::PARAM_STR);
$stmt->bindParam(':data',$_POST['data'],PDO::PARAM_STR);
$stmt->execute();

header("Location: ../pedidos_diario.php");

?>