<?php 

session_start();

if ($_SESSION['tipo'] == 0){
    $_SESSION['trocar'] = "Administrador";
    $_SESSION['tipo'] = 1;
    header('Location: ../caixa.php');
} else {
    $_SESSION['trocar'] = "Caixa";
    $_SESSION['tipo'] = 0;
    header('Location: ../home.php');
}

?>