<?php

include "bd.php";

session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];
$ident = $_POST['tipo'];

$query = "SELECT * FROM usuarios WHERE email = :email";
$stmt = $conn->prepare($query);
$stmt->bindParam(':email',$email,PDO::PARAM_STR);
if ($stmt->execute()){
    $row = $stmt->fetch(PDO::FETCH_OBJ);
    $db_email = $row->email;
    $db_senha = $row->senha;
    if ($db_email == $email && $db_senha == $senha){
        $_SESSION['email'] = $db_email;
        $_SESSION['senha'] = $db_senha;
        $_SESSION['tipo'] = $ident;
        if ($ident == 0){
            header("Location: ../home.php");
        }
        if ($ident == 1){
            header("Location: ../pedidos_diario.php");
        }
    }
} else {
    echo "<br> NÃO FOI POSSIVEL EXECTUAR O LOGIN <br>";
}

?>