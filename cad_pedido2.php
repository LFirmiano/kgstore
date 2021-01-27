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
   <?php 
    include "include/menu.php";
    include "include/L_cliente.php";   
    if (count($_POST) == 1){
      $_SESSION['msg_vazia'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Nenhum produto foi adicionado ao carrinho!</strong> Por favor, adicione antes de prosseguir.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
      header("Location: cad_pedido.php");
    }
   ?>
   

   <!--form fornecedor-->
   <form method="POST" action="sucesso_pedido.php">
   <div class="container">
   
   <h1 class="display-4 text-center">Novo Pedido</h1><hr> 
   <div  class="row" style="margin-top:2%; margin-bottom:5%">
   <div class="col-8">

   <div class="form-group col-md-8">
    <label for="exampleFormControlSelect1"><strong>Cliente</strong></label>
    <select class="form-control" id="exampleFormControlSelect1" name="cliente">
      <option value="Cliente Não Cadastrado">Cliente Não Cadastrado</option>
      <?php while ($row = $stmt->fetch(PDO::FETCH_OBJ)){ ?>
      <option value="<?php echo $row->nome ?>"><?php echo $row->nome ?></option>
    <?php } ?>
    </select>
  </div>

  <div class="form-group col-md-8">
    <label for="exampleFormControlSelect1"><strong>Modos de Pagamento</strong></label>
    <select class="form-control" id="plot-pag" onchange="plotarFormas()">
      <option value="">Modos</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
    </select>
  </div>

  <!--<div class="form-group col-md-8">
    <label for="exampleFormControlSelect1"><strong>Forma de Pagamento</strong></label>
    <select class="form-control" id="forma-pag" onchange="opcoesParcela()" name="forma">
      <option value="Dinheiro (Espécie)">Dinheiro (Espécie)</option>
      <option value="Débito">Débito</option>
      <option value="Crédito">Crédito</option>
    </select>
  </div>-->

  <div id="div-form"></div>

  <input type="hidden" name="control-parcelas" value="controle-parcelas">

  <hr>

  <div class="form-group col-md-4">
    <label for="exampleFormControlSelect1"><strong>Desconto</strong></label>
    <div class="input-group">
      <div class="input-group-prepend">
        <input type="text" class="form-control" name="desconto" value="0" id="desconto" aria-label="Amount (to the nearest dollar)">
        <button type="button" id="aplicar" onclick="aplicarDesconto()" class="btn btn-outline-info" style="margin-left:2%;">Aplicar</button>       
      </div>
     </div>
  </div>

<br>
</div>

<div class="col-4">
<h2 class="text-center"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart text-info" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
</svg></h2> 
<br>

<!-- LISTAR DADOS NO CARRINHO -->

<?php 
$i = 0;

// FORMAR ARRAY
foreach ($_POST as $row){
  if ($i == count($_POST) - 1){
    continue;
  }
    $array[$i] = $row;
    $i++;
}

$pesquisa_sql = "SELECT produto FROM produtos WHERE id_produto = :id";
$sql_pdo = $conn->prepare($pesquisa_sql);


// GERAR O CARRINHO ANTERIOR
$i = 0;
for ($i=0; $i<count($array);$i++){
    if (substr($array[$i],0,4) == "prod"){
        $produto = substr($array[$i],4,strlen($array[$i]));
        $sql_pdo->bindParam(':id',$produto,PDO::PARAM_STR);
        $sql_pdo->execute();
        $nome_produto = $sql_pdo->fetch(PDO::FETCH_OBJ);
        $i = $i+2; 
?>
        <h5 class="text-info" style="margin-top:2%;"><?php echo $nome_produto->produto?> - R$<?php echo $array[$i-1]?></h5>
<?php
        while (isset($array[$i]) && substr($array[$i],0,4) != "prod"){
?>
            <h6 class="text-secundary"><strong><?php echo $array[$i]; ?></strong> -> x<?php echo $array[$i + 1]; ?></h6>
<?php
        $i+=2;      
      }
    }
  $i--;
}
?>

<!-- FIM DA LISTAGEM -->

<br>
<h5 class="text-info text-right" id="tot-visual" style="margin-top:2%;"><strong>Valor total: R$<?php echo $_POST['tot'] ?></strong></h5>
    

</div>

<div id="ipth">

  <!-- GERAR INPUTS PARA SUBMIT -->

  <?php 
  $j=0;
  for($j=0;$j<count($array);$j++){
  ?>
    <input type="hidden" name="<?php echo $array[$j].$j ?>" value="<?php echo $array[$j] ?>">
  <?php
  }
  ?>

    <input type="hidden" name="tot" id="tot" value="<?php echo $_POST['tot'] ?>">
  
  <!-- FIM DA GERACAO -->

</div>

</div>
<a href="cad_pedido.php" class="btn btn-outline-dark" style="margin-bottom:2%;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
</svg></a> 
  <button type="submit" class="btn btn-outline-success" style="margin-bottom:2%;">Avançar</button>
  </form>

  </div>

  <div class="progress fixed-bottom">
  <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script>

let global_incre = 0

function opcoesParcela(object){
  val = $(object).val()
  identific = $(object).attr('id').substr(-1)
  //hid = '<input type="hidden" name="valor_da_parcela'+identific+'" value="PARCELA-VAL">'
  sel = '<div id="nova-div'+identific+'"><label for="exampleFormControlSelect1"><strong>Parcelas</strong></label><select class="form-control" id="exampleFormControlSelect1" name="parcelas'+identific+'"><option value="1">1x</option><option value="2">2x</option><option value="3">3x</option></div><option value="4">4x</option><option value="5">5x</option><option value="6">6x</option><option value="7">7x</option><option value="8">8x</option><option value="9">9x</option><option value="10">10x</option><option value="11">11x</option><option value="12">12x</option></select>'
  if (val == "Crédito"){
    //$('#div-parc').html(sel)
    $("#nova-div-form"+identific).append(sel)
  } else {
    $('#nova-div'+identific).remove()
  }
  global_incre += 1
}

function plotarFormas(){
  val = $('#plot-pag').val()
  div = "#div-form"
  $('#div-form-controle').remove()
  for (i=0;i<val;i++){
    if (val == 1){
      tot = $('#tot').val()
      valor = '<label for="exampleFormControlSelect1"><strong>Valor</strong></label><div class="input-group"><div class="input-group-prepend"><p id="p">'+tot+'</p><input type="hidden" class="form-control" id="parte'+i+'" name="parte'+i+'" value="'+tot+'" aria-label="Amount (to the nearest dollar)"></div></div>'
    }else {
      valor = '<label for="exampleFormControlSelect1"><strong>Valor</strong></label><div class="input-group"><div class="input-group-prepend"><span class="input-group-text">$</span><input type="text" class="form-control" name="parte'+i+'" value="" aria-label="Amount (to the nearest dollar)" required></div></div>'
    }
    if (i==0){
      sel = '<div id="div-form-controle"><div id="nova-div-form'+i+'" class="form-group col-md-8"><label for="exampleFormControlSelect1"><strong>Forma de Pagamento</strong></label><select class="form-control" id="forma-pag'+i+'" onchange="opcoesParcela(this)" name="forma'+i+'"><option value="Dinheiro (Espécie)">Dinheiro (Espécie)</option><option value="Débito">Débito</option><option value="Crédito">Crédito</option><option value="Pix">Pix</option><option value="Transferencia">Transferência</option></select></div></div>'
    } else {
      sel = '<div id="nova-div-form'+i+'" class="form-group col-md-8"><label for="exampleFormControlSelect1"><strong>Forma de Pagamento</strong></label><select class="form-control" id="forma-pag'+i+'" onchange="opcoesParcela(this)" name="forma'+i+'"><option value="Dinheiro (Espécie)">Dinheiro (Espécie)</option><option value="Débito">Débito</option><option value="Crédito">Crédito</option><option value="Pix">Pix</option><option value="Transferencia">Transferência</option></select></div>'
      div = '#div-form-controle'
    }
    $(div).append(sel)
    $("#nova-div-form"+i).append(valor)
  }
}

function aplicarDesconto(){
  desconto = $('#desconto').val()
  val_old = $('#tot').val()
  val_new = val_old - desconto
  $('#tot').val(val_new)
  val = $('#plot-pag').val()
  console.log(val)
  if (val == 1){
    $('#parte0').val(val_new)
    $('#p').html(val_new)
  }
  $('#tot-visual').html('<strong>Valor total: R$'+val_new+'.00</strong>')
}

</script>

</body>
</html>