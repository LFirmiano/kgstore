<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Movimentações do caixa</title>
    <?php include "include/painel2.php" ?>
</head>
<?php 
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
?>
<body>
    <?php include "include/menu.php";
          include "include/L_relatorio.php";
    ?>

    <div class="container">
   <h1 class="display-4 text-center">Movimentações de caixa </h1>
   </div>
        <table class="table table-striped container ">
            <thead>
              <tr>
                <th scope="col">Valor</th>
                <th scope="col">Tipo</th>
                <th scope="col">Data</th>
                <th scope="col">Observação</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">R$12,00</th>
                <td>Retirada</td>
                <td>11/11/2020</td>
                <td>Almoço</td>
              </tr>

            </tbody>
          </table>
          </div>
          </div>
          


</body>
</html>