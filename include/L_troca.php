<?php 

include "bd.php";

$query = "SELECT * FROM troca t JOIN produtos p ON t.produto_antigo_id = p.id_produto";

$stmt = $conn->prepare($query);
$stmt->execute();

?>