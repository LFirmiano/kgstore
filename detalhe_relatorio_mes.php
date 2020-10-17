<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">      <!--mudar mês-->
    <title>Relatórios Do Mês de Outubro</title>
    <?php include "include/painel2.php" ?>
</head>
<body>
    <?php include "include/menu.php" ?>

    <div class="container">
   <h1 class="display-4 text-center">Relatórios dia <!--Puxar Dia--> de <!--Puxar mês--></h1>
   
    <a href="detalhe_relatorio.php" class="btn btn-outline-dark" style="margin-bottom:2%;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
    </svg></a></div>
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
                <th scope="row">25185<?php //echo $row->nome ?></th>
                <td>4<?php //echo $row->nome ?></td>
                <td>R$ 51,50<?php //echo $row->nome ?></td>
                <td>12:30:45</td>
              </tr>
              <?php// } ?>
            </tbody>
          </table>
          </div>
          </div>
          


</body>
</html>