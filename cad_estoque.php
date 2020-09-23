<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastro de produto</title>
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
   

       <!--form estoque tamanhos calçados-->
    <form>
    <div class="container">
    
    <h1 class="display-4 text-center">Cadastro Estoque</h1>

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

    <a href="cad_produto.php" class="btn btn-outline-dark" style="margin-bottom:2%;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
    </svg></a> 
        
    <a href="estoque.php" class="btn btn-outline-success" style="margin-bottom:2%;">Cadastrar</a>

    </div>
    </form>

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script>

        function getval(sel)
        {
            // window.alert(sel.value);
            $.getJSON('include/pegar_unidades.php?search=',{id: sel.value, ajax: 'true'}, function(j){
                        var divs = '<div></div>';	
						for (var i = 0; i < j.length; i++) {
							divs += '<div class="form-group col-md-2"><label for="exampleFormControlInput1">' + j[i].tamanhos + '</label><input type="number" class="form-control" placeholder="0" min="0"></div>';
						}	
						$('#unidades').html(divs).show();
			});
        }

    </script>
      

</body>
</html>