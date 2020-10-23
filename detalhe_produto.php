<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Detalhes do produto</title>
    <?php include "include/painel2.php" ?>
</head>
<body>
    <script>
        $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
        })
    </script>
   <?php 
   include "include/menu.php";
   include "include/R_pedido_item.php";
   ?>
   
   <!--info produto-->
   <form>
   <div class="container">
   
   <h1 class="display-4 text-center">Informações do Produto</h1>

   <div style="margin-top:2%; margin-bottom:5%">
    <h2 class="text-center"><svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-basket text-info" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
    </svg></h2> 

    <?php 
    $i=0;
    while ($row = $stmt->fetch(PDO::FETCH_OBJ)){
        $array_aux[$i] = $row->produto;
        if ( $i==0 || ($i>0 && $array_aux[$i-1] != $row->produto)){ ?>
            <h5 class="text-info" style="margin-top:2%;"><?php echo $row->produto ?> - R$<?php echo $row->valor?>.00</h5>
            <h6 class="text-secundary"><strong><?php echo $row->tamanho?></strong> -> x<?php echo $row->quantidade ?></h6>
    <?php

        } else { ?>
            <h6 class="text-secundary"><strong><?php echo $row->tamanho?></strong> -> x<?php echo $row->quantidade ?></h6>
    <?php
        }
        $i++;
    }
    ?>
    

  </div>
  <a href="detalhe_pedido.php" class="btn btn-outline-dark" style="margin-bottom:2%;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
  </svg></a> 
   </div> 
     

</body>
</html>