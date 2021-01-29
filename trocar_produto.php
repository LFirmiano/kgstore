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
   
   <form method="POST" action="include/C_troca.php">
   <div class="container">
   
   <h1 class="display-4 text-center">Trocar Produto</h1><hr>
   <fieldset disabled>
    <div class="form-group-inline">
      <label for="disabledTextInput"><strong>Produto:</strong></label>
      <input type="text" id="prod" class="form-control" value="<?php echo $row->produto." ".$row->categoria ?>">

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
  
  <input type="hidden" name="pedido_item_id" value="<?php echo $_POST['visualizar'] ?>">
  <input type="hidden" name="pedido_id" value="<?php echo $_POST['pedido_id'] ?>">
  <input type="hidden" name="prodAntigo" value="<?php echo $row->id_produto ?>">
  <input type="hidden" name="tamAntigo" value="<?php echo $row->tamanho ?>">

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

   <div class="form-group col-md-4">
    <label for="exampleFormControlSelect1"><strong>Novo produto</strong></label>
    <select class="form-control" onchange="getval(this)" id="id">
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
      <option value="<?php echo $row->id_produto ?>" id="<?php echo $row->id_produto ?>OPT"><?php echo $row->produto." ".$row->categoria." (R$".$row->valor.")" ?></option>
    <?php } ?>
    </select>
  </div>
  <div class="form-group col-md-3">
  <label for="exampleFormControlSelect1"><strong>Tamanho</strong></label>
  <select class="form-control" id="unidades" onchange="getQtd(this)">
      <option value="">Selecione o Tamanho</option>
  </select>
  </div>

  <div class="form-group col-md-3">
  <label for="exampleFormControlSelect1"><strong>Quantidade</strong></label>
  <!-- <input type="number" class="form-control" id="quantidade" value=""> -->
  <select class="form-control" id="quantidade">
      <option value="">Selecione a Quantidade</option>
  </select>
  </div>

  <div class="form-group col-md-2">
  <label for="exampleFormControlSelect1"><strong>Adicionar Produto</strong></label>
  <button type="button" id="adicionarProd" class="btn btn-outline-success" style="margin-bottom:2%;">Adicionar</button>
  </div>
        <br><br>
  <div class="container">
    <h1 class="display-4 text-center">Produtos Selecionados</h1>
  </div>
  
  <table class="table table-striped container " id="tabela">
    <thead>
      <tr>
        <th scope="col">Produto</th>
        <th scope="col">Tamanho</th>
        <th scope="col">Quantidade</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody id="inserir">
    </tbody>
  </table>

    <input type="hidden" name="CONTROL" value="CONTROL">

    <div id="novosProds"></div>

    <div class="form-group col-md-4">
    <label for="exampleFormControlSelect1"><strong>Valor adicional da troca</strong></label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">$</span>
        <input type="text" class="form-control" name="valAdc" id="valAdc" aria-label="Amount (to the nearest dollar)" required>
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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
<script>

$(document).ready(function(){
  $('#valAdc').maskMoney({ decimal: '.', thousands: '', precision: 2 });
})

let soma = 0
let id_pai = ''

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

function getQtd(sel)
{
    // window.alert(sel.value);
    console.log(sel.value)
    $.getJSON('include/R_qtd_ajax.php?search=',{id: $('#id').val(),tam: sel.value, ajax: 'true'}, function(j){
      var opt = '<option value="">Selecione a Quantidade</option>';	
      for (var i = 1; i <= j[0].quantidades; i++) {
        opt += '<option value="' + i + '">' + i + '</option>';
      }	
      $('#quantidade').html(opt).show();
    });
}

function calculartot(sel){
  qtd = $(sel).val()
  valor = $('#pegartot').val()
  result = qtd*valor
  $('#valtot').val('R$ '+result+'')
}

$('#adicionarProd').click(function(e){
  e.preventDefault()
  preenchido = verificaPreenchimento()
  if (preenchido == true){
    id = $('#id').val()
    prod = $('#'+id+'OPT').html()
    tamanho = $('#unidades').val()
    quantidade = $('#quantidade').val()
    if ($('#tr'+id+tamanho).val() === undefined){
      inserir = '<tr id="tr'+id+tamanho+'">' +
            '<th scope="row">'+prod+'</th>'+
            '<td>'+tamanho+'</td>'+
            '<td>'+quantidade+'</td>'+
            '<td>'+
            '<form action="" method="POST">'+
              '<button type="button" title="Excluir Produto" value="'+id+tamanho+'" id="'+id+'-DELETE" class="btn btn-outline-danger" style="float: left; margin-right: 3%;" data-toggle="modal" onclick="excluirlabel(this)" data-target="#exampleModal">'+
              '<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">'+
              '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>'+
              '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'+
              '</svg>'+
              '</button>'+
            '</form>'+
            '</td>'+
          '</tr>'
      $('#inserir').append(inserir)
      valoresInsert(id,tamanho,quantidade)
    } else {
      swal("Produto ja adicionado!")
    }
  }
})

function excluirlabel(lbl){
  id = $(lbl).val()
  $('#tr'+id).remove()
  excluirinput(lbl)
}

function excluirinput(lbl){
  id = $(lbl).val()
  id_pai = $(lbl).attr('id')
  id_pai = id_pai.substring(0,(id_pai.length - 7))
  $('#'+id).remove()
  $('#qtd'+id).remove()
  console.log(id_pai)
  if ($('#'+id_pai+'-I').children().length == 1){
    $('#'+id_pai+'-I').remove()
  }
}

function verificaPreenchimento(){
  if ($('#unidades').val() == ""){
    swal("Preencha o tamanho!")
    return false
  } else if ($('#quantidade').val() == "") {
    swal("Preencha a quantidade!")
    return false
  } else {
    return true
  }
}

function valoresInsert(id,tamanho,quantidade){
  if ( $('#'+id+'-I').length ){
    ipt_val = '<input type="hidden" id="'+ id+tamanho+'" name="'+ id+tamanho+'" value="'+ tamanho +'"></input><input type="hidden" id="qtd'+ id+tamanho+'" name="qtd'+ id+tamanho+'" value="'+ quantidade +'">'
    $('#'+id+'-I').append(ipt_val)
  } else {
    ipt_val = '<div id='+ id +'-I><input type="hidden" name="prod'+ id+tamanho +'"  id="prod'+ id+tamanho +'" value="prod'+ id +'"></input><input type="hidden" id="'+ id+tamanho+'" name="'+ id+tamanho+'" value="'+ tamanho +'"></input><input type="hidden" id="qtd'+ id+tamanho+'" name="qtd'+ id+tamanho+'" value="'+ quantidade +'"></div>'
    $('#novosProds').append(ipt_val)
  }
}
</script>