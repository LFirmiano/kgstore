<?php 

include "bd.php";

$query = "SELECT * FROM registrotroca t JOIN produtos p ON t.produto_novo_id = p.id_produto WHERE troca_id = :troca";

$stmt = $conn->prepare($query);
$stmt->bindParam(':troca',$_POST['visualizar'],PDO::PARAM_STR);
$stmt->execute();

?>