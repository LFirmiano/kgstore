<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">      <!--mudar mês-->
    <title>Registros da Troca</title>
    <?php include "include/painel2.php" ?>
</head>
<body>
    <?php include "include/menu.php"; 
          include "include/L_registrotroca.php";
    ?>

    <div class="container">
   <h1 class="display-4 text-center">Registros da Troca</h1>
   
   <a href="troca.php" class="btn btn-outline-dark" style="margin-bottom:2%;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
    </svg></a></div>
        <table class="table table-striped container ">
            <thead>
              <tr>
                <th scope="col">Produto Antigo</th>
                <th scope="col">Tamanho trocado</th>
                <th scope="col">Quantidade trocada</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php 
                    while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                ?>
                <th scope="row"><?php echo $row->produto." ".$row->categoria ?></th>
                <td scope="row"><?php echo $row->tamanho_novo_trocado ?></td>
                <td scope="row"><?php echo $row->quantidade_nova_trocada ?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
          </div>
          </div>
          


</body>
</html>