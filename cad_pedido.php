<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Novo Pedido</title>
    <?php include "include/painel2.php" ?>
  </head>
<body>
    <script>
        $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
        })
    </script>
   <?php include "include/menu.php";?>
   

   <!--form fornecedor-->
   <form method="POST" action="">
   <div class="container">
   
   <h1 class="display-4 text-center">Novo Pedido</h1> <hr>   
   <div  class="row" style="margin-top:2%; margin-bottom:5%">
   <div class="col-8">

   <div class="form-group col-md-8">
    <label for="exampleFormControlSelect1"><strong>Produto</strong></label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option value="">Produto A</option>
      <option value="">Produto B</option>
      <option value="">Produto C</option>
      <option value="">Produto D</option>
      <option value="">Produto E</option>
    </select>
  </div>

  <div class="form-group col-md-8">
  <label for="exampleFormControlSelect1"><strong>Tamanho e Quantidade</strong></label>
  
  <select class="form-control" id="exampleFormControlSelect1">
      <option value="">P</option>
      <option value="">M</option>
      <option value="">G</option>
    </select>
  <input type="number" class="form-control">
  </div>

    <!--botão add item carrinho-->
    <button type="submit" class="btn btn-outline-info btn-lg" style="margin-bottom:2%;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
  <path fill-rule="evenodd" d="M8.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 .5-.5z"/>
</svg></button>


<br>
</div>

<div class="col-4">
<h2 class="text-center"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart text-info" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
</svg></h2> 

<h5 class="text-info" style="margin-top:2%;">Produto A - R$20,00(valor unitário)</h5>
<h6 class="text-secundary">P x2</h6>
<h6 class="text-secundary">G x1</h6>

<br>
<h5 class="text-info text-right" style="margin-top:2%;"><strong>Valor total: R$60,00</strong></h5>
    

</div>
</div>
<a href="pedidos_diario.php" class="btn btn-outline-dark" style="margin-bottom:2%;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
</svg></a> 
  <button type="submit" class="btn btn-outline-success" style="margin-bottom:2%;"><a href="cad_pedido2.php">Avançar</a></button>
  </form>

  </div>

  <div class="progress fixed-bottom">
  <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
</body>
</html>