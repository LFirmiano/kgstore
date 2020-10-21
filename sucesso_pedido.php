<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pedido Realizado!</title>
    <?php 
    include "include/painel2.php" ;
    include "include/C_pedidoitem.php";
    ?>
</head>
<body>
    <script>
        $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
        })
    </script>
   <?php include "include/menu.php";?>
   

   <!--info pedido-->
   <form method="POST" action="">
   <div class="container">
   
   <h1 class="display-4 text-center text-success">Pedido Efetuado com Sucesso!</h1>    
   <div  class="row" style="margin-top:2%; margin-bottom:5%">


<div class="col text-center">
<h2 class="text-center"><svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-cart-check text-success" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
  <path fill-rule="evenodd" d="M11.354 5.646a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708 0z"/>
</svg></h2> 

<?php
// INSERIR DADOS DO CARRINHO
$w=0;
for ($w=0; $w<count($array);$w++){
    if (substr($array[$w],0,4) == "prod"){
        $produto = substr($array[$w],4,strlen($array[$w]));
        $val = $w+1;
?>
        <h5 class="text-success" style="margin-top:2%;"><?php echo $produto ?> - R$<?php echo $array[$val] ?></h5>
<?php
        $w = $w+2;
        while (isset($array[$w]) && substr($array[$w],0,4) != "prod"){ 
?>
        <h6><strong><?php echo $array[$w] ?></strong> -> x<?php echo $array[$w+1] ?></h6>
<?php
            $w+=2;
        }
    }
    $w--;
}
?>

<br>
<h5 class="text-success" style="margin-top:2%;"><strong>Valor total: R$<?php echo $val_tot ?>.00</strong></h5>
    

</div>
</div>
<a href="cad_pedido2.php" class="btn btn-outline-dark" style="margin-bottom:2%;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
</svg></a> 
  <button type="submit" class="btn btn-outline-success" style="margin-bottom:2%;">Finalizar</button>
  </form>

  </div>

  <div class="progress fixed-bottom">
  <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
</body>
</html>