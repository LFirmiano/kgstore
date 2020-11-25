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
    <script>
      $(document).ready(function(){
        $('#hide').hide();
      });
    </script>
   <?php 
   include "include/menu.php";
   include "include/L_estoque.php";
   ?>
   
   <div class="container">

   <?php 
   if (isset($_SESSION['msg_vazia'])){
     echo $_SESSION['msg_vazia'];
     unset($_SESSION['msg_vazia']);
   }
   if (isset($_SESSION['msg_forma'])){
    echo $_SESSION['msg_forma'];
    unset($_SESSION['msg_forma']);
  }
   ?>
   
   <h1 class="display-4 text-center">Novo Pedido</h1> <hr>   
   <div  class="row" style="margin-top:2%; margin-bottom:5%">
   <div class="col-8">

   <div class="form-group col-md-8">
    <label for="exampleFormControlSelect1"><strong>Produto</strong></label>
    <select class="form-control" onchange="getval(this)" name="id" id="id">
    <option value="">Selecione o Produto</option>
    <?php 
      //$i=0; 
      while ($row = $stmt->fetch(PDO::FETCH_OBJ)){ 
        $data[] = array(
          'produto' => $row->produto,
          'valor' => $row->valor
        );
      ?>
      <option value="<?php echo $row->produto ?>"><?php echo $row->produto ?></option>
    <?php } ?>
    </select>
  </div>

  <div class="form-group col-md-8">
  <label for="exampleFormControlSelect1"><strong>Tamanho e Quantidade</strong></label>
  
  <select class="form-control" id="unidades" name="tamanho">
      <option value="">Selecione o Tamanho</option>
  </select>

  <input type="number" class="form-control" id="quantidade" name="quantidade">
  </div>

  <?php 
    for($j=0;$j<count($data);$j++){ ?>
      <input type="hidden" id="<?php echo str_replace(' ','',$data[$j]['produto']) ?>" value=<?php echo $data[$j]['valor'] ?>>
  <?php }?>

    <!--botão add item carrinho-->
    <button type="button" class="btn btn-outline-info btn-lg" id="target" style="margin-bottom:2%;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
  <path fill-rule="evenodd" d="M8.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 .5-.5z"/>
</svg></button>


<br>
</div>

<div class="col-4">
<h2 class="text-center"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart text-info" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
</svg></h2> 

<br>

<div id="carrinho"></div>

<br>
<h5 class="text-info text-right" id="hide" style="margin-top:2%;"><strong id="entrarvalor"></strong></h5>

</div>
</div>
<form method="POST" action="cad_pedido2.php">
    <div id="vals"></div>
    <input type="hidden" name="tot" id="tot" value="">
<a href="pedidos_diario.php" class="btn btn-outline-dark" style="margin-bottom:2%;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
</svg></a> 
  <button type="submit" class="btn btn-outline-success" style="margin-bottom:2%;">Avançar</button>
  </form>

  </div>

  <div class="progress fixed-bottom">
  <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script>

    let valor_total = 0
    let i = []
    let aux = 0

    function getval(sel)
    {
        // window.alert(sel.value);
        $.getJSON('include/R_estoque.php?search=',{id: sel.value, ajax: 'true'}, function(j){
          var opt = '<option>Selecione o Tamanho</option>';	
          for (var i = 0; i < j.length; i++) {
            opt += '<option value="' + j[i].tamanhos + '">' + j[i].tamanhos + '</option>';
          }	
          $('#unidades').html(opt).show();
  });
    }

    $('#target').click(function(){
      var produto = $('#id').val()
      var tamanho = $('#unidades').val()
      var quantidade = $('#quantidade').val()
      id_val = '#'+ produto.replace(' ','') +''
      var valor = $(id_val).val()
      var hs = '<h5></h5>'
      var ipt_val = '<input type="hidden"></input>'

      if ( $(id_val+'-D').length ){
        console.log('#'+tamanho+'')
        if ( $('#'+tamanho+produto.replace(' ','')+'').length ){
          total_qtd = parseInt($('#qtd'+tamanho +produto.replace(' ','')+'').val()) + parseInt(quantidade)
          $('#qtd'+tamanho +produto.replace(' ','')+'').val(total_qtd)
          $('#'+tamanho+produto.replace(' ','')+'-SHOW').html('<strong>'+ tamanho +'</strong> -> x'+ total_qtd +'')
        } else {
          hs += '<h6 class="text-secundary" id="'+tamanho+produto.replace(' ','')+'-SHOW"><strong>'+ tamanho +'</strong> -> x'+ quantidade +'</h6>';
          ipt_val += '<input type="hidden" id="'+ tamanho +produto.replace(' ','')+'" name="'+ tamanho +produto.replace(' ','')+'" value="'+ tamanho +'"></input><input type="hidden" id="qtd'+ tamanho +produto.replace(' ','')+'" name="qtd'+ tamanho +produto.replace(' ','')+'" value="'+ quantidade +'"></input>';
          $(id_val+'-D').append(hs);
          $(id_val+'-I').append(ipt_val);
        }
      } else {
        hs += '<div id='+ produto.replace(' ','') +'-D><h5 class="text-info" style="margin-top:2%;">' + produto + ' - R$'+ valor +'</h5><h6 class="text-secundary" id="'+tamanho+produto.replace(' ','')+'-SHOW"><strong>'+ tamanho +'</strong> -> x'+ quantidade +'</h6></div><button id="delet'+produto.replace(' ','')+'" value="'+produto.replace(' ','')+'" onclick="deletar(this)" class="btn btn-outline-danger btn-sm"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg></button></input>';
        ipt_val += '<div id='+ produto.replace(' ','') +'-I><input type="hidden" name="prod'+ produto +'" value="prod'+ produto +'"></input><input type="hidden" name="'+ valor +produto.replace(' ','')+'" value="'+ valor +'"></input></input><input type="hidden" id="'+ tamanho +produto.replace(' ','')+'" name="'+ tamanho +produto.replace(' ','')+'" value="'+ tamanho +'"></input><input type="hidden" id="qtd'+ tamanho +produto.replace(' ','')+'" name="qtd'+ tamanho +produto.replace(' ','')+'" value="'+ quantidade +'"></div>'
        $('#carrinho').append(hs);
        $('#vals').append(ipt_val);
      }
      calcularTotal(valor,quantidade,produto)
    })

    function calcularTotal(valor,qtd,prod){
      qtd = parseInt(qtd)
      valor = valor*qtd
      valor_total += parseInt(valor)
      $('#hide').show();
      $('#entrarvalor').html('Valor total: R$'+ valor_total +'.00');
      $('#tot').val(valor_total)
      bol = false
      for (var j=0;j<i.length;j++){
        if (i[j][0] == prod.replace(' ','')){
          bol = true
          break
        }
      }
      if (bol == true){
        i[j][1] = parseInt(i[j][1]) + parseInt(valor)
      } else {
        i.push([prod.replace(' ',''),valor])
        aux++
      }
      console.log(i)
    }

    function deletar(deletar){
      $('#' + $(deletar).val() + '-D').remove();
      $('#' + $(deletar).val() + '-I').remove();
      $('#delet' + $(deletar).val() + '').remove();
      for (var j=0;j<i.length;j++){
        if (i[j][0] == $(deletar).val()){
          valor_total = valor_total - parseInt(i[j][1])
          if (valor_total == 0){
            $('#hide').hide();
          } else {
            $('#entrarvalor').html('Valor total: R$'+ valor_total +'.00');
          }
          $('#tot').val(valor_total)
          i[j][1] = 0
        }
      }
      console.log(i)
    }

</script>

</body>
</html>