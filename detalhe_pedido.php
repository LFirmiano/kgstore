<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Detalhes do pedido</title>
    <?php include "include/painel2.php" ?>

</head>

<style>
.botao-transp{
  background: transparent;
  border: none !important;
  color: blue;
  text-decoration: underline;
}

</style>

<body>
    <script>
        $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
        })
    </script>
    <style>
    .botao-transparente{
    }
    </style>
   <?php 
   include "include/menu.php";
   include "include/R_pedido.php";
   if (isset($_POST['data'])){
      $_SESSION['data'] = $_POST['data'];
    }
   ?>
   

   <!--info pedido-->
   <div class="container">
   
   <h1 class="display-4 text-center">Informações do Pedido</h1>

   <div style="margin-top:2%; margin-bottom:5%">
   <fieldset>
    <div class="form-group-inline">
      <label for="disabledTextInput"><strong>Quantidade Itens:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $row->qtd_pedidos_item ?>" disabled>
      <form method="POST" id="form_submit" action="detalhe_produto.php">
        <input type="hidden" value=<?php echo $_POST['visualizar'] ?> name="id_voltar">
        <input type="hidden" value="<?php echo $row->data ?>" name="data">
        <button type="submit" class="botao-transp" >Ver detalhes do pedido</button>
        <!-- <a href="javascript:pagamento.submit()" target='_blank'>Ver detalhes do produto</a> -->
      </form>

      <br>
   
      <label for="disabledTextInput"><strong>Valor:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $row->valor_final ?>" disabled>

      <label for="disabledTextInput"><strong>Cliente:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $row->cliente ?>" disabled>
 
      <label for="disabledTextInput"><strong>Pagamento:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $row->pagamento ?>" disabled>

      <label for="disabledTextInput"><strong>Desconto:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" value="<?php echo "R$" . $row->desconto . ".00" ?>" disabled>

      <label for="disabledTextInput"><strong>Parcelas:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $row->parcelas ?>" disabled>

      <label for="disabledTextInput"><strong>Observação:</strong></label>
      <textarea type="text" id="disabledTextInput" class="form-control" value="" disabled><?php echo $row->observacao ?></textarea>

      <label for="disabledTextInput"><strong>Hora Compra:</strong></label>
      <input type="text" id="disabledTextInput" class="form-control" value="<?php echo date_format(new DateTime($row->data),'H:i:s') ?>" disabled>

    </div>
        
  </fieldset>

  </div>
  <a href="pedidos_diario.php" class="btn btn-outline-dark" style="margin-bottom:2%;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
  </svg></a> 
   </div> 
     

</body>

</html>