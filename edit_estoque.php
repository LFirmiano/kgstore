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
   <?php 
   include "include/menu.php";
   include "include/R_estoque.php";
   ?>

   
   
   <div class="container"> 
   <h1 class="display-4 text-center">Editar Estoque</h1><hr>

   <!--Nome produto-->
   <label class="text-info"><h5><strong>Produto: </strong><?php echo $_POST['edit']?></h5></label>

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
    <?php 
      for ($i=0;$i<count($estoque_info);$i++){
    ?>
    <div class="form-group col-md-2"><label for="exampleFormControlInput1"><?= $estoque_info[$i]['tamanhos'] ?></label><input type="hidden" name="<?= $estoque_info[$i]['tamanhos'] ?>H" value="<?= $estoque_info[$i]['tamanhos'] ?>"><input type="number" name="<?= $estoque_info[$i]['tamanhos'] ?>"class="form-control" min="0" value="<?= $estoque_info[$i]['quantidades'] ?>"></div>
    <?php 
      }
    ?>
<br>
</div>
<a href="estoque.php" class="btn btn-outline-dark" style="margin-bottom:2%;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
</svg></a>
  <button type="submit" class="btn btn-outline-success" style="margin-bottom:2%;">Editar</button>
  </form>

  </div>

</body>
</html>