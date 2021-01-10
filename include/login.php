<?php

include "bd.php";

session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];
$ident = $_POST['tipo'];

$query = "SELECT * FROM usuarios WHERE email = :email AND tipo = :tipo";
$stmt = $conn->prepare($query);
$stmt->bindParam(':email',$email,PDO::PARAM_STR);
$stmt->bindParam(':tipo',$ident,PDO::PARAM_STR);
if ($stmt->execute()){
    $row = $stmt->fetch(PDO::FETCH_OBJ);
    if (!empty($row)){
        $db_email = $row->email;
        $db_senha = $row->senha;
        if ($db_email == $email && $db_senha == $senha){
            $_SESSION['email'] = $db_email;
            $_SESSION['senha'] = $db_senha;
            $_SESSION['tipo'] = $ident;
            if ($ident == 0){
                $_SESSION['adm'] = true;
                $_SESSION['trocar'] = "Caixa";
                header("Location: ../home.php");
            }
            if ($ident == 1){
                $_SESSION['adm'] = false;
                header("Location: ../caixa.php");
            }
        } else {
            $_SESSION['msg'] = '<div class="alert alert-danger col" role="alert"><strong>Credenciais Incorretas!</strong> Tente Novamente.</div>';
            if ($ident == 0){
                header("Location: ../login_adm.php");
            } else {
                header("Location: ../login_caixa.php");
            }
        }
    } else {
        $_SESSION['msg'] = '<div class="alert alert-danger col" role="alert"><strong>Login Incorreto!</strong> Tente Novamente.</div>';
        if ($ident == 0){
            header("Location: ../login_adm.php");
        } else {
            header("Location: ../login_caixa.php");
        }
    }
} else {
    $_SESSION['msg'] = '<div class="alert alert-danger col" role="alert"><strong>Login Incorreto!</strong> Tente Novamente.</div>';
    header("Location: ../");
}

?>