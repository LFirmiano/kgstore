<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Produto</title>
    <?php include "include/painel2.php" ?>
</head>
<body>
    <script>
        $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
        })
    </script>
   <?php include "include/menu.php";?>
   

       <!--form estoque tamanhos calçados-->
    <form method="POST" action="include/C_prod_estoque.php">
    <div class="container">
    
    <h1 class="display-4 text-center">Cadastro Estoque</h1><hr>

    <div style="margin-bottom:-2%; margin-top:2%">

    
    <label for="exampleFormControlSelect1"><strong>Unidade de Medida</strong></label>
    <select class="form-control" onchange="getval(this)" name="id" id="id">
    <!-- Unidadade que vai ser usada no estoque-->
      <option value="">Selecione a Unidade</option>
      <option value="Unidades Calçados">Unidades Calçados</option>
      <option value="Unidades Roupas Inferiores">Unidades Roupas Inferiores</option>
      <option value="Unidades Básicas">Unidades Básicas</option>
      <option value="Unidade Única">Unidade Única</option>
    </select>
    
    <br>

    <label for="exampleFormControlInput1"><strong>Quantidades</strong></label>
    </div>
    
    <div class="row" name="unidades" id="unidades" style="margin-top:2%; margin-bottom:5%">

    </div>
    
    <input type="hidden" name="controle" value="CONTROLE">
    <input type="hidden" name="produto" value="<?php echo $_POST['produto'] ?>">
    <input type="hidden" name="categoria" value="<?php echo $_POST['categoria'] ?>">
    <input type="hidden" name="fornecedor" value="<?php echo $_POST['fornecedor'] ?>">
    <input type="hidden" name="valor" value="<?php echo $_POST['valor'] ?>">
    <input type="hidden" name="valor_compra" value="<?php echo $_POST['valor_compra'] ?>">

    <a href="cad_produto.php" class="btn btn-outline-dark" style="margin-bottom:2%;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
    </svg></a> 
        
    <button type="submit" class="btn btn-outline-success" style="margin-bottom:2%;">Cadastrar</button>

    </div>
    </form>

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script>

        function getval(sel)
        {
            // window.alert(sel.value);
            $.getJSON('include/pegar_unidades.php?search=',{id: sel.value, ajax: 'true'}, function(j){
                        var divs = '<div></div>';	
						for (var i = 0; i < j.length; i++) {
							divs += '<div class="form-group col-md-2"><label for="exampleFormControlInput1">' + j[i].tamanhos + '</label><input type="hidden" name="' + j[i].tamanhos + 'H" value="' + j[i].tamanhos + '"><input type="number" name="' + j[i].tamanhos + '" class="form-control" placeholder="0" min="0"></div>';
						}	
						$('#unidades').html(divs).show();
			});
        }

    </script>
      

</body>
</html>