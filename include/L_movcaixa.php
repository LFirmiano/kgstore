<?php 

include "bd.php";

$stmt = $conn->prepare("SELECT * FROM movimentacao_caixa ORDER BY data_caixa DESC");
$stmt->execute();

?>