<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Visualizar Cliente</title>
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
   include "include/R_cliente.php";
   ?>
   

   <!--info Cliente-->
   <form>
   <div class="container">
   
   <h1 class="display-4 text-center">Informações do Cliente</h1><hr>

   <div style="margin-top:2%; margin-bottom:5%">
   <fieldset disabled>
    <div class="form-group-inline">
      <label for="disabledTextInput"><strong>Cliente:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $row->nome ?>">

      <label for="disabledTextInput"><strong>Email:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $row->email ?>">

      <label for="disabledTextInput"><strong>Telefone:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $row->telefone ?>">
 
      <label for="disabledTextInput"><strong>Endereço:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $row->endereco ?>">

      <label for="disabledTextInput"><strong>Data Nascimento:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" value="<?= date_format(new DateTime($row->data_nascimento),'d/m/Y') ?>">

    </div>
        
  </fieldset>

  </div>
  <a href="cliente.php" class="btn btn-outline-dark" style="margin-bottom:2%;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
</svg></a> 
   </div> 
     

</body>
</html>