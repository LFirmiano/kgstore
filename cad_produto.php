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
   

   <!--form produto-->
   <form>
   <div class="container"> 
   <h1 class="display-4 text-center">Cadastro de Produto</h1>

   <div class="row" style="margin-top:2%; margin-bottom:5%">

   <div class="form-group col-md-4">
    <label for="exampleFormControlInput1"><strong>Produto</strong></label>
    <input type="text" class="form-control" placeholder="Short Jeans">
  </div>

  <div class="form-group col-md-4">
    <label for="exampleFormControlSelect1"><strong>Categoria</strong></label>
    <select class="form-control" id="exampleFormControlSelect1">
    <!-- Puxar da tabela categoria(na verdade vai pegar as subcategorias)-->
      <option value="">Short Masculino Praia</option>
      <option value="">Blusa Tie Dye</option>
      <option value="">Blusa Feminina Tomara que caia</option>
      <option value="">Blusa Masculina GolaPolo</option>
    </select>
  </div>

  <div class="form-group col-md-4">
    <label for="exampleFormControlSelect1"><strong>Fornecedor</strong></label>
    <select class="form-control" id="exampleFormControlSelect1">
    <!-- Puxar da tabela fornecedor-->
      <option value="">Fornecedor A</option>
      <option value="">Fornecedor B</option>
      <option value="">Fornecedor C</option>
      <option value="">Fornecedor D</option>
    </select>
  </div>

  <div class="form-group col-md-4">
  <label for="exampleFormControlSelect1"><strong>Valor do Produto</strong></label>
  <div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text">$</span>
  <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
  <div class="input-group-append">
    <span class="input-group-text">.00</span>
  </div>
  </div>
  </div>
  </div>
  </div>
  
  <a href="estoque.php" class="btn btn-outline-dark" style="margin-bottom:2%;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
  </svg></a>
  <a href="cad_estoque.php" class="btn btn-outline-success" style="margin-bottom:2%;">Avançar</a>
  </div>
  </form>

</body>
</html>