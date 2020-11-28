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
          include "include/L_movcaixa.php";
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
                <?php
                    while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                      if (substr($row->tipo,0,3) == "DEP"  || substr($row->tipo,0,3) == "COM"){
                        if (substr($row->tipo,0,3) == "DEP"){
                          $tipo = "Depósito";
                        } else {
                          $tipo = "Compra";
                        }
                        $class = "text-success";
                        $span = '<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/></svg>';
                      }else {
                        $tipo = "Retirada";
                        $class = "text-danger";
                        $span = '<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/></svg>';
                      }
                ?>
                <th scope="row" class="<?=$class ?>"><?=$span?> R$ <?= $row->valor ?></th>
                <td><?= $tipo ?></td>
                <td><?= date_format(new DateTime($row->data_caixa),'d/m/Y H:i:s') ?></td>
                <td><?= $row->obs ?></td>
              </tr>
                <?php } ?>

            </tbody>
          </table>
          </div>
          </div>
          


</body>
</html>