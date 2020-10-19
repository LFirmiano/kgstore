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
   ?>
   

   <!--form fornecedor-->
   <form method="POST" action="include/C_pedidoitem.php">
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
    <label for="exampleFormControlSelect1"><strong>Forma de Pagamento</strong></label>
    <select class="form-control" id="exampleFormControlSelect1" name="forma">
      <option value="Dinheiro (Espécie)">Dinheiro (Espécie)</option>
      <option value="Débito">Débito</option>
      <option value="Crédito">Crédito</option>
    </select>
  </div>

  <div class="form-group col-md-4">
    <label for="exampleFormControlSelect1"><strong>Desconto</strong></label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">$</span>
        <input type="text" class="form-control" name="desconto" aria-label="Amount (to the nearest dollar)" required>
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
// GERAR O CARRINHO ANTERIOR
$i = 0;
for ($i=0; $i<count($array);$i++){
    if (substr($array[$i],0,4) == "prod"){
        $produto = substr($array[$i],4,strlen($array[$i]));
        $i = $i+2;
?>
        <h5 class="text-info" style="margin-top:2%;"><?php echo $produto?> - R$<?php echo intval($array[$i-1])?>.00</h5>
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
<h5 class="text-info text-right" style="margin-top:2%;"><strong>Valor total: R$<?php echo $_POST['tot'] ?>.00</strong></h5>
    

</div>

<div id="ipth">

  <!-- GERAR INPUTS PARA SUBMIT -->

  <?php 
  $j=0;
  for($j=0;$j<count($array);$j++){
  ?>
    <input type="hidden" name="<?php echo $array[$j] ?>" value="<?php echo $array[$j] ?>">
  <?php
  }
  ?>

    <input type="hidden" name="tot" value="<?php echo $_POST['tot'] ?>">
  
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

</body>
</html>