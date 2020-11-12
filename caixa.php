<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Caixa</title>
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
    ?>

   <div class="container"> 
   <h1 class="text text-info">Caixa: R$ 60,00</h1><hr>

    <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample1">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
        </svg>
    </button>
    <button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
        </svg>
    </button>

    <div class="row">
  <div>
    <div class="collapse multi-collapse" id="multiCollapseExample1">
      <div class="card card-body">
        <div class="form-group col-md-10">
        <label for="exampleFormControlInput1">Digite o valor que quer <strong>colocar</strong> em caixa</label>
          <input type="text" class="form-control" name="valor">
        </div>
      </div>
    </div>
  </div>
  <div>
    <div class="collapse multi-collapse" id="multiCollapseExample2">
      <div class="card card-body">
        <div class="form-group col-md-10">
          <label for="exampleFormControlInput1">Digite o valor que quer <strong>retirar</strong> do caixa</label>
          <input type="text" class="form-control" name="retirada">
        </div>
      </div>
    </div>
  </div>
</div>
<br><br><br>


<h1 class="text-info">Pedidos do dia</h1><hr>
<table class="table">
  <thead>
    <tr>
    <th scope="col">Qtd Itens</th>
    <th scope="col">Valor Total</th>
    <th scope="col">Hora compra</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php 
        include "include/L_pedido.php";
          while($row = $stmt->fetch(PDO::FETCH_OBJ)){
    ?>
    <th scope="row"><?php echo $row->qtd_pedidos_item ?></th>
    <td><?php echo $row->valor_final ?></td>
    <td><?php echo date_format(new DateTime($row->data),'H:i:s') ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>

  <a href="pedidos_diario.php" class="btn btn-outline-info" style="margin-bottom:2%;">Ver mais...</a>

</div>
</body>
</html>