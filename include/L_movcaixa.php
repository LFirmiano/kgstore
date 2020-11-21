<?php 

include "bd.php";

$stmt = $conn->prepare("SELECT * FROM movimentacao_caixa");
$stmt->execute();

?>