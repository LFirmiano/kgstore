<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">      <!--mudar mês-->
    <title>Relatórios Do Mês de <?php echo $_POST['mes'] ?></title>
    <?php include "include/painel2.php" ?>
</head>
<body>
    <?php include "include/menu.php";
          include "include/det_relatorio_mes.php";
    ?>

    <div class="container">
      <h1 class="display-4 text-center">Relatórios do dia <?php echo $_POST['visualizar'] ?></h1>
      <form action="detalhe_relatorio.php" method="POST">
        <input type="hidden" value="<?php echo $_POST['mes'] ?>" name="visualizar">
        <button type="submit" class="btn btn-outline-dark" style="margin-bottom:2%;">
          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
          </svg>
        </button>
      </form>
    </div>
        <table class="table table-striped container ">
            <thead>
              <tr>
                <th scope="col">Pedido</th>
                <th scope="col">Qtd Itens</th>
                <th scope="col">Valor</th>
                <th scope="col">Hora</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php 
                  while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                ?>
                <th scope="row"><?php echo $row->id_pedido ?></th>
                <td><?php echo $row->qtd_pedidos_item ?></td>
                <td>R$ <?php echo $row->valor_final ?></td>
                <td><?php echo date_format(new DateTime($row->data),'H:i:s') ?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
          </div>
          </div>
          


</body>
</html>