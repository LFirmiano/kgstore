<!DOCTYPE html>
<html>
<head>
    <?php 
    include "include/grafs.php";
    $mes = "2020-".$mes_atual."-01";
    $mes = ucfirst(strftime('%B', strtotime($mes)));
    ?>
    <meta charset="UTF-8">
    <title>Parcelas do mês de <?php echo $mes; ?></title>
    <?php include "include/painel2.php" ?>
</head>
<?php 
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
?>
<body>
    <?php include "include/menu.php";
          include "include/L_parcelas.php";
    ?>

    <div class="container">
   <h1 class="display-4 text-center">Parcelas do mês de <?php echo $mes; ?> </h1>
   <a href="relatorio.php" class="btn btn-outline-dark" style="margin-bottom:2%;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
    </svg></a></div>
   </div>
        <table class="table table-striped container ">
            <thead>
              <tr>
                <th scope="col">Pedido</th>
                <th scope="col">N° Parcelas</th>
                <th scope="col">Valor</th>
              </tr>
            </thead>
            <tbody>
              <tr>
              <?php 
                    while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                ?>
                  <th scope="row">
                    <form method="POST" action="detalhe_pedido.php">
                      <a href="#" onclick="this.parentNode.submit()"><?= $row->pedido_id ?></a>
                      <input type="hidden" name="visualizar" value="<?= $row->pedido_id ?>">
                      <input type="hidden" value="<?php echo $row->ano ?>" name="data">
                    </form>
                  </th>
                <td><?= $row->n_parcelas ?></td>
                <td>R$ <?= $row->valor ?></td>

              </tr>
              <?php } ?>

            </tbody>
          </table>
          </div>
          </div>
          


</body>
</html>