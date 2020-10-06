<?php

session_start();

if (isset($_SESSION['tipo'])){
    session_destroy();
}


?>