<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Troca de Produto</title>
    <?php include "include/painel2.php" ?>
</head>
<body>
    <script>
        $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
        })
    </script>
   <?php include "include/menu.php";?>
   
   <form method="POST" action="">
   <div class="container">
   
   <h1 class="display-4 text-center">Trocar de Produto</h1><hr>
   <fieldset disabled>
    <div class="form-group-inline">
      <label for="disabledTextInput"><strong>Produto:</strong></label>
      <input type="text" id="prod" class="form-control"  value="Short Jeans<?php //echo $prod->produto ?>">

      <label for="disabledTextInput"><strong>Dia da compra:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" value="02/02/2021<?php //echo $prod->categoria ?>">

      <label for="disabledTextInput"><strong>Valor de Compra:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" value="R$ 20.00<?php //echo $prod->valor_compra ?> ">

      <label for="disabledTextInput"><strong>Tamanho:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" value="M <?php //echo $prod->valor_compra ?> ">

      <label for="disabledTextInput"><strong>Quantidade:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" value="2<?php //echo $prod->valor_compra ?> ">
    </div>

  </fieldset>

   <!--form troca de produto-->

   <div class="row" style="margin-top:2%; margin-bottom:5%">


   <div class="form-group col-md-8">
    <label for="exampleFormControlSelect1"><strong>Novo produto</strong></label>
    <select class="form-control" onchange="getval(this)" name="id" id="id">
    <option value="">Selecione o Produto</option>
    <?php 
      //$i=0; 
      /*while ($row = $stmt->fetch(PDO::FETCH_OBJ)){ 
        $data[] = array(
          'produto' => $row->produto,
          'valor' => $row->valor,
          'id' => $row->id_produto
        );*/
      ?>
      <option value="<?php //echo $row->id_produto ?>">teste<?php //echo $row->produto." ".$row->categoria." (R$".$row->valor.")" ?></option>
    <?php //} ?>
    </select>
  </div>
  <div class="form-group col-md-4">
  <label for="exampleFormControlSelect1"><strong>Tamanho e Quantidade</strong></label>
  
  <select class="form-control" id="unidades" name="tamanho">
      <option value="">Selecione o Tamanho</option>
  </select>

  <input type="number" class="form-control" id="quantidade" name="quantidade">
  </div>

    <!--data atual--->
    <input type="hidden" class="form-control" name="data">

    <div class="form-group col-md-4">
    <label for="exampleFormControlSelect1"><strong>Valor adicional da troca</strong></label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">$</span>
        <input type="text" class="form-control" name="valor_compra" aria-label="Amount (to the nearest dollar)" required>
      </div>
      <small class="form-text text-muted">Caso tenha valor adicional</small>
     </div>
  </div>

<br>
</div>

<a href="produtos_pedido.php" class="btn btn-outline-dark" style="margin-bottom:2%;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
</svg></a> 

  <button type="submit" class="btn btn-outline-success" style="margin-bottom:2%;">Trocar</button>
  </form>

  </div>
</body>
</html>