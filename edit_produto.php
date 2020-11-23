<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edição de produto</title>
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
    require_once("include/bd.php");
    $state = $conn->prepare("SELECT * FROM produtos WHERE produto = :produto");
    $state->bindParam(':produto',$_POST['prod'],PDO::PARAM_STR);
    if ($state->execute()){
      $col = $state->fetch(PDO::FETCH_OBJ);
    }
   ?>
   

   <!--form produto-->
   <form method="POST" action="include/U_produto.php">
   <div class="container"> 
   <h1 class="display-4 text-center">Edição de Produto</h1><hr>

   <div class="row" style="margin-top:2%; margin-bottom:5%">

   <div class="form-group col-md-4">
    <label for="exampleFormControlInput1"><strong>Produto</strong></label>
    <input type="text" class="form-control" name="produto" value="<?php echo $col->produto ?>" required>
    <input type="hidden" class="form-control" name="produto_old" value="<?php echo $col->produto ?>" required>
  </div>

  <div class="form-group col-md-4">
    <label for="exampleFormControlSelect1"><strong>Categoria</strong></label>
    <select class="form-control" name ="categoria" id="exampleFormControlSelect1" required>
    <!-- Puxar da tabela categoria(na verdade vai pegar as subcategorias)-->
      <option value="<?php echo $col->categoria ?>" selected><?php echo $col->categoria ?></option>
      <?php 
        while($row = $stmt->fetch(PDO::FETCH_OBJ)){ 
          if ($row->subcategoria != $col->categoria){
      ?>
        <option value="<?php echo $row->subcategoria; ?>"><?php echo $row->subcategoria; ?></option>
      <?php }} ?>
    </select>
  </div>

  <div class="form-group col-md-4">
    <label for="exampleFormControlSelect1"><strong>Fornecedor</strong></label>
    <select class="form-control" name="fornecedor" id="exampleFormControlSelect1" required>
    <!-- Puxar da tabela fornecedor-->
    <option value="<?php echo $col->fornecedor ?>" selected><?php echo $col->fornecedor ?></option>
    <?php 
      while($row_forn = $forn->fetch(PDO::FETCH_OBJ)){ 
        if ($row_forn->fornecedor != $col->fornecedor){
    ?>
      <option value="<?php echo $row_forn->fornecedor; ?>"><?php echo $row_forn->fornecedor; ?></option>
    <?php }} ?>
    </select>
  </div>

  <input type="hidden" name="edit" value=<?php echo $_POST['edit']?>>

  <div class="form-group col-md-4">
  <label for="exampleFormControlSelect1"><strong>Valor do Produto</strong></label>
  <div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text">$</span>
  <input type="text" class="form-control" name="valor" aria-label="Amount (to the nearest dollar)" value=<?php echo $col->valor?>>
  </div>
  </div>
  </div>
  <div class="form-group col-md-4">
  <label for="exampleFormControlSelect1"><strong>Valor de Compra</strong></label>
  <div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text">$</span>
  <input type="text" class="form-control" name="valor_compra" aria-label="Amount (to the nearest dollar)" value=<?php echo $col->valor_compra?>>
  </div>
  </div>
  </div>
  </div>
  
  <a href="edit_estoque.php" class="btn btn-outline-dark" style="margin-bottom:2%;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
  </svg></a>
  <button type="submit" class="btn btn-outline-success" style="margin-bottom:2%;">Editar</button>
  </div>
  </form>
        
</body>
</html>