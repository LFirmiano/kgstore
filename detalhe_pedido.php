<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Detalhes do pedido</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <script>
        $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
        })
    </script>
   <?php 
   include "include/menu.php";
   //include "include/R_cliente.php";
   ?>
   

   <!--info pedido-->
   <form>
   <div class="container">
   
   <h1 class="display-4 text-center">Informações do Pedido</h1>

   <div style="margin-top:2%; margin-bottom:5%">
   <fieldset disabled>
    <div class="form-group-inline">
      <label for="disabledTextInput"><strong>Quantidade Itens:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" value="<?php //echo $row->nome ?>">
      <a href="detalhe_produto.php">Ver detalhes do produto</a>

      <br>
   
      <label for="disabledTextInput"><strong>Valor:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" value="<?php //echo $row->email ?>">

      <label for="disabledTextInput"><strong>Cliente:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" value="<?php //echo $row->telefone ?>">
 
      <label for="disabledTextInput"><strong>Pagamento:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" value="<?php //echo $row->endereco ?>">

      <label for="disabledTextInput"><strong>Hora Compra:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" value="<?php //echo $row->data_nascimento ?>">

    </div>
        
  </fieldset>

  </div>
  <a href="pedidos_diario.php" class="btn btn-outline-dark" style="margin-bottom:2%;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
  </svg></a> 
   </div> 
     

</body>
</html>