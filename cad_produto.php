<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastro de produto</title>
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
    include "include/L_categoria.php";
    include "include/L_fornecedor.php";
   ?>
   

   <!--form produto-->
   <form method="POST" action="cad_estoque.php">
   <div class="container"> 
   <h1 class="display-4 text-center">Cadastro de Produto</h1><hr>

   <div class="row" style="margin-top:2%; margin-bottom:5%">

  <div class="form-group col-md-4">
    <label for="exampleFormControlInput1"><strong>Produto</strong></label>
    <input type="text" class="form-control" name="produto" placeholder="Short Jeans" required>
  </div>

  <div class="form-group col-md-4">
    <label for="exampleFormControlSelect1"><strong>Categoria</strong></label>
    <select class="form-control" name = "categoria" id="exampleFormControlSelect1" required>
      <option value="">Selecione a Categoria</option>
    <?php while($row = $stmt->fetch(PDO::FETCH_OBJ)){ ?>
    <!-- Puxar da tabela categoria(na verdade vai pegar as subcategorias)-->
      <option value="<?php echo $row->subcategoria; ?>"><?php echo $row->subcategoria; ?></option>
    <?php } ?>
    </select>
  </div>

  <div class="form-group col-md-4">
    <label for="exampleFormControlSelect1"><strong>Fornecedor</strong></label>
    <select class="form-control" name="fornecedor" id="exampleFormControlSelect1" required>
    <!-- Puxar da tabela fornecedor-->
      <option value="">Selecione o Fornecedor</option>
      <?php while($row_forn = $forn->fetch(PDO::FETCH_OBJ)){ ?>
      <option value="<?php echo $row_forn->fornecedor; ?>"><?php echo $row_forn->fornecedor; ?></option>
      <?php } ?>
    </select>
  </div>

  <div class="form-group col-md-4">
    <label for="exampleFormControlSelect1"><strong>Valor do Produto</strong></label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">$</span>
        <input type="text" class="form-control" name="valor" aria-label="Amount (to the nearest dollar)" required>
      </div>
     </div>
  </div>
  <!--Valor que a KG comprou o produto-->
  <div class="form-group col-md-4">
    <label for="exampleFormControlSelect1"><strong>Valor da Compra</strong></label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">$</span>
        <input type="text" class="form-control" name="valor_compra" aria-label="Amount (to the nearest dollar)" required>
      </div>
      <small class="form-text text-muted">Valor que a KG comprou do fornecedor</small>
     </div>
  </div>
  </div>
  
  <a href="estoque.php" class="btn btn-outline-dark" style="margin-bottom:2%;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
  </svg></a>
  <button type="submit" class="btn btn-outline-success" style="margin-bottom:2%;">Avançar</button>
  </div>
  </form>

</body>
</html>