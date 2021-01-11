<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Troca de Produto</title>
    <?php include "include/painel2.php";
    include "include/R_pedido_item_troca.php"; ?>
</head>
<body>
    <script>
        $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
        })
    </script>
   <?php include "include/menu.php";
   include "include/L_estoque.php";
   ?>
   
   <form method="POST" action="">
   <div class="container">
   
   <h1 class="display-4 text-center">Trocar de Produto</h1><hr>
   <fieldset disabled>
    <div class="form-group-inline">
      <label for="disabledTextInput"><strong>Produto:</strong></label>
      <input type="text" id="prod" class="form-control"  value="<?php echo $row->produto." ".$row->categoria ?>">

      <label for="disabledTextInput"><strong>Dia da compra:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" value="<?php echo date_format(new DateTime($row->hora_compra),'d/m/Y') ?>">

      <label for="disabledTextInput"><strong>Valor de venda:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" value="R$ <?php echo $row->valor ?> ">
      <input type="hidden" id="pegartot" value="<?php echo $row->valor ?>">

      <label for="disabledTextInput"><strong>Tamanho:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $row->tamanho ?> ">

      <label for="disabledTextInput"><strong>Quantidade:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $row->quantidade ?> ">
    </div>

  </fieldset>

   <!--form troca de produto-->

   <div class="row" style="margin-top:2%; margin-bottom:5%">
  
   <div class="form-group col-md-3">
  <label for="exampleFormControlSelect1"><strong>Quantidade para troca</strong></label>
  
  <select class="form-control" id="" name="qtdantiga" onchange="calculartot(this)">
      <option value="">Selecione a Quantidade</option>
      <?php 
        for ($l = 1; $l <= $row->quantidade; $l++){
      ?>
        <option value="<?=$l?>"><?=$l?></option>
      <?php } ?>
  </select>

  </div>

  <div class="form-group col-md-3">
    <label for="exampleFormControlSelect1"><strong>Valor</strong></label>
    <input type="text" class="form-control" id="valtot" name="" disabled>
  </div>

  <div class="form-group col-md-6"></div>

   <div class="form-group col-md-8">
    <label for="exampleFormControlSelect1"><strong>Novo produto</strong></label>
    <select class="form-control" onchange="getval(this)" name="id" id="id">
    <option value="">Selecione o Produto</option>
    <?php 
      $i=0; 
      while ($row = $stmt->fetch(PDO::FETCH_OBJ)){ 
        $data[] = array(
          'produto' => $row->produto,
          'valor' => $row->valor,
          'id' => $row->id_produto
        );
      ?>
      <option value="<?php echo $row->id_produto ?>"><?php echo $row->produto." ".$row->categoria." (R$".$row->valor.")" ?></option>
    <?php } ?>
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

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script>
function getval(sel)
    {
        // window.alert(sel.value);
        $.getJSON('include/R_estoque_ajax.php?search=',{id: sel.value, ajax: 'true'}, function(j){
          var opt = '<option>Selecione o Tamanho</option>';	
          for (var i = 0; i < j.length; i++) {
            opt += '<option value="' + j[i].tamanhos + '">' + j[i].tamanhos + '</option>';
          }	
          $('#unidades').html(opt).show();
  });
    }

function calculartot(sel){
  qtd = $(sel).val()
  valor = $('#pegartot').val()
  result = qtd*valor
  $('#valtot').val('R$ '+result+'.00')
}
</script>