<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Visualizar Produto</title>
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
   include "include/R_produto.php";
   ?>
   

   <!--info produto-->
   <form>
   <div  class="container">
   
   <h1 class="display-4 text-center">Informações de Produto</h1><hr>

   <div style="margin-top:2%; margin-bottom:5%">
   <fieldset disabled>
    <div class="form-group-inline">
      <label for="disabledTextInput"><strong>Produto:</strong></label>
      <input type="text" id="prod" class="form-control" placeholder="<?php echo $prod->produto ?>" value="<?php echo $prod->produto ?>">

      <label for="disabledTextInput"><strong>Categoria:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $prod->categoria ?>">

      <label for="disabledTextInput"><strong>Fornecedor:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $prod->fornecedor ?>">
 
      <label for="disabledTextInput"><strong>Valor:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder="R$ <?php echo $prod->valor ?> ">

      <label for="disabledTextInput"><strong>Valor de Compra:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder="R$ <?php echo $prod->valor_compra ?> ">
    </div>

  </fieldset>

  </div>
  <hr>

    <!--info estoque-->
    <form class="container">
    <h1 class="display-4 text-center">Informações de Estoque</h1><hr>
    
    <fieldset disabled>
    <div class="form-group-inline" id="unidades" style="margin-bottom: 5%">
    </div>
    </fieldset>
    <a href="estoque.php" class="btn btn-outline-dark" style="margin-bottom:2%;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
    </svg></a> 
    </div>
    </form>

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
	  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script>
      $(document).ready(function(){
        var unidade = $('#prod').val();
        // console.log(unidade);
        $.getJSON('include/R_estoque.php?search=',{id: unidade, ajax: 'true'}, function(j){
            var divs = '<div></div>';	
						for (var i = 0; i < j.length; i++) {
							divs += '<label for="disabledTextInput"><strong>' + j[i].tamanhos + '</strong></label><input type="text" id="disabledTextInput" class="form-control" placeholder="' + j[i].quantidades + '">';
						}	
						$('#unidades').html(divs).show();
			});
      })
    </script>
      

</body>
</html>