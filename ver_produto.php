<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Visualizar Produto</title>
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
   <?php include "include/menu.php";?>
   

   <!--info produto-->
   <form>
   <div  class="container">
   
   <h1 class="display-4 text-center">Informações de Produto</h1>

   <div style="margin-top:2%; margin-bottom:5%">
   <fieldset disabled>
    <div class="form-group-inline">
      <label for="disabledTextInput"><strong>Produto:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder="Peça A">

      <label for="disabledTextInput"><strong>Categoria:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder="Short Jeans">

      <label for="disabledTextInput"><strong>Fornecedor:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder="Fornecedor A">
 
      <label for="disabledTextInput"><strong>Valor:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder="R$ 15,00">
    </div>

  </fieldset>

  </div>
  <hr>

    <!--info estoque-->
    <form class="container">
    <h1 class="display-4 text-center">Informações de Estoque</h1>
    
    <fieldset disabled>
    <div class="form-group-inline" style="margin-bottom: 5%">
      <label for="disabledTextInput"><strong>Tamanho PP:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder="10">

      <label for="disabledTextInput"><strong>Tamanho P:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder="10">

      <label for="disabledTextInput"><strong>Tamanho M:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder="10">

      <label for="disabledTextInput"><strong>Tamanho G:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder="10">

      <label for="disabledTextInput"><strong>Tamanho GG:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder="10">

      <label for="disabledTextInput"><strong>Tamanho GG+:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder="10">

      <label for="disabledTextInput"><strong>Tamanho Unitario:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder="10">


    </div>
    </fieldset>
    <a href="estoque.php" class="btn btn-outline-dark" style="margin-bottom:2%;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
    </svg></a> 
    </div>
    </form>
      

</body>
</html>