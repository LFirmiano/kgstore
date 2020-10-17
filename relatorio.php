<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Relatórios</title>
    <?php include "include/painel2.php" ?>
</head>
<body>
    <?php include "include/menu.php" ?>

    <div class="container">
   <h1 class="display-4 text-center">Relatórios disponível</h1>
   </div>
        <table class="table table-striped container ">
            <thead>
              <tr>
                <th scope="col">Mês</th>
                <th scope="col">Ano</th>
                <th scope="col">Detalhes</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">Outubro<?php //echo $row->nome ?></th>
                <th>2020<?php //echo $row->nome ?></th>
                <td>
                <!--botao detalhes-->
                <form action="detalhe_relatorio.php" method="POST">
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