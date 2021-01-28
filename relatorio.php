<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Relatórios</title>
    <?php include "include/painel2.php" ?>
</head>
<?php 
header('Content-Type: text/html; charset=utf-8');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
?>
<body>
    <?php include "include/menu.php";
          include "include/L_relatorio.php";
    ?>

    <div class="container">
   <h1 class="display-4 text-center">Relatórios disponíveis</h1>
   </div>
        <table class="table table-striped container ">
            <thead>
              <tr>
                <th scope="col">Mês</th>
                <th scope="col">Ano</th>
                <th scope="col">Valor Mensal</th>
                <th scope="col">Lucro Mensal</th>
                <th scope="col">Detalhes</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php 
                    while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                      $partes = explode("-", $row->mes);
                      if ($partes[1] == "03"){
                        $mes = "Março";
                      } else {
                        $mes = ucfirst(strftime('%B', strtotime($row->mes)));
                      }
                ?>
                <th scope="row"><?php echo $mes?></th>
                <th><?php echo date_format(new DateTime($row->mes),'Y') ?></th>
                <th><?php echo $row->valor?></th>
                <th><?php echo $row->lucro?></th>
                <td>
                <!--botao detalhes-->
                <form action="detalhe_relatorio.php" method="POST">
                  <input type="hidden" value="<?php echo date_format(new DateTime($row->mes),'m') ?>" name="visualizar">
                  <button type="submit" class="btn btn-outline-dark" style="float: left; margin-right: 3%;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                  </svg></button>
                </form>
                <form action="detalhe_parcela_mes.php" method="POST">
                  <input type="hidden" value="<?php echo date_format(new DateTime($row->mes),'m') ?>" name="visualizar">
                  <button type="submit" class="btn btn-outline-success" style="float: left; margin-right: 3%;">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cash-stack" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14 3H1a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1h-1z"/>
                    <path fill-rule="evenodd" d="M15 5H1v8h14V5zM1 4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H1z"/>
                    <path d="M13 5a2 2 0 0 0 2 2V5h-2zM3 5a2 2 0 0 1-2 2V5h2zm10 8a2 2 0 0 1 2-2v2h-2zM3 13a2 2 0 0 0-2-2v2h2zm7-4a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"/>
                    </svg>
                  </button>
                </form>
             
             
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
          </div>
          </div>
          


</body>
</html>