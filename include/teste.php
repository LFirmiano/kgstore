<?php 

include "bd.php";

$query = "INSERT INTO usuarios (nome,email,senha,tipo) VALUES ('LUCAS','a@gmail.com','123','0')";

$stmt = $conn->prepare($query);

if($stmt->execute()){
    echo $conn->lastInsertId();
}

?>