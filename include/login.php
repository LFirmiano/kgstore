<?php

include "bd.php";

session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];
$ident = $_POST['tipo'];

$query = "SELECT * FROM usuario WHERE email = :email";
$stmt = $conn->prepare($query);
$stmt->bindParam(':email',$email,PDO::PARAM_STR);
if ($stmt->execute()){
    $row = $stmt->fetch(PDO::FETCH_OBJ);
    $db_email = $row['email'];
    $db_senha = $row['senha'];
    if ($db_email == $email && $db_senha == $senha){
        $_SESSION['email'] = $db_email;
        $_SESSION['senha'] = $db_senha;
        if ($ident == 0){
            header("Location: cliente.php");
        }
        if ($ident == 1){
            header("Location: cliente.php");
        }
    }
} else {
    echo "<br> NÃO FOI POSSIVEL EXECTUAR O LOGIN <br>";
}

?>