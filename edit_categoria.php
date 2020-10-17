<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar de categoria</title>
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
   include "include/R_categoria.php";
   $array_uni = ["Unidades Calçados","Unidades Roupas Inferiores","Unidades Básicas","Unidade Única"];
   ?>
   

   <!--form categoria-->
   <form method="POST" action="include/U_categoria.php">
   <div class="container">
   
   <h1 class="display-4 text-center">Editar de Categoria</h1><hr>

   <div class="row" style="margin-top:2%; margin-bottom:5%">

   <div class="form-group col-md-4">
    <label for="exampleFormControlInput1"><strong>Categoria</strong></label>
    <input type="text" name="categoria" class="form-control" value="<?php echo $row->categoria ?>">
  </div>

  <div class="form-group col-md-4">
    <label for="exampleFormControlInput1"><strong>SubCategoria</strong></label>
    <input type="text" class="form-control" name="subcategoria" value="<?php echo $row->subcategoria?>">
  </div>
      
   <div class="form-group col-md-4">      
   <label for="exampleFormControlSelect1"><strong>Unidade de Medida</strong></label>
    <select class="form-control" name="unidade" id="unidade">
    <!-- Unidadade que vai ser usada no estoque-->
    <option value="<?php echo $row->unidade ?>" selected><?php echo $row->unidade ?></option>
    <?php for($i=0;$i<count($array_uni);$i++){ 
            if ($row->unidade != $array_uni[$i]){  ?>
      <option value="<?php echo $array_uni[$i] ?>"><?php echo $array_uni[$i] ?></option>
    <?php }} ?>
    </select>
    </div>

    <input type="hidden" name="edit" value=<?php echo $_POST['editar'] ?>>
  
    </div>
  <a href="categoria.php" class="btn btn-outline-dark" style="margin-bottom:2%;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
  </svg></a> 
  
  <button type="submit" class="btn btn-outline-success" style="margin-bottom:2%;">Editar</button>
  
  </form>

  </div>
</body>
</html>