<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar Estoque</title>
    <?php include "include/painel2.php" ?>
</head>
<body>
    <script>
        $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
        })
    </script>
   <?php include "include/menu.php";?>

   
   
   <div class="container"> 
   <h1 class="display-4 text-center">Editar Estoque</h1><hr>

   <!--Nome produto-->
   <label class="text-info"><h5><strong>Produto: </strong><?php echo $_POST['visualizar']?></h5></label>

   <!--form estoque-->
   <form action="edit_produto.php" method="POST">
        <input type="hidden" value="">
        <button type="submit" class="btn btn-outline-info" style="float: left; margin-right: 3%;">Editar Produto</button>
        <input type="hidden" id="prod" name="prod" value="<?php echo $_POST['visualizar']?>">
        <input type="hidden" id="edit" name="edit" value=<?php echo $_POST['edit']?>>
    </form>

    <br><br>

    <!--form estoque-->
   <form method="POST" action="include/U_estoque.php">

   <input type="hidden" id="prod" name="prod" value="<?php echo $_POST['visualizar']?>">
   
   <label><strong>Quantidades:</strong></label>
   <div class="row" style="margin-top:2%; margin-bottom:5%" id="unidades"> 
<br>
</div>
<a href="estoque.php" class="btn btn-outline-dark" style="margin-bottom:2%;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
</svg></a>
  <button type="submit" class="btn btn-outline-success" style="margin-bottom:2%;">Editar</button>
  </form>

  </div>

  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      var unidade = $('#prod').val();
      // console.log(unidade);
      $.getJSON('include/R_estoque.php?search=',{id: unidade, ajax: 'true'}, function(j){
          var divs = '<div></div>';	
          for (var i = 0; i < j.length; i++) {
            divs += '<div class="form-group col-md-2"><label for="exampleFormControlInput1">' + j[i].tamanhos + '</label><input type="hidden" name="' + j[i].tamanhos + 'H" value="' + j[i].tamanhos + '"><input type="number" name="' + j[i].tamanhos + '"class="form-control" min="0" value="' + j[i].quantidades + '"></div>';
          }	
          $('#unidades').html(divs).show();
    });
    })
  </script>
</body>
</html>