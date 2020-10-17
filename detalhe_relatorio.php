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
   <h1 class="display-4 text-center">Relatórios do mês de <!--Puxar mês--></h1>
   
   <a href="relatorio.php" class="btn btn-outline-dark" style="margin-bottom:2%;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
    </svg></a></div>
        <table class="table table-striped container ">
            <thead>
              <tr>
                <th scope="col">Dia</th>
                <th scope="col">Qtd Vendas</th>
                <th scope="col">Detalhes</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1<?php //echo $row->nome ?></th>
                <td scope="row">21<?php //echo $row->nome ?></td>
                <td>
                <!--botao detalhes-->
                <form action="detalhe_relatorio_mes.php" method="POST">
                  <input type="hidden" value="<?php echo $row->id_cliente ?>" name="visualizar">
                  <button type="submit" class="btn btn-outline-dark" style="float: left; margin-right: 3%;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                  </svg></button>
                </form>
             
                </td>
              </tr>
              <?php// } ?>
            </tbody>
          </table>
          </div>
          </div>
          


</body>
</html>