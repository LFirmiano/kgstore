<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Detalhes do pedido</title>
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