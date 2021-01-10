<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Produto do pedido</title>
    <?php include "include/painel.php";?>
    
</head>
<body>
   <?php include "include/menu.php";?>
   <div class="container">
   <h1 class="display-4 text-center">Produtos do pedido</h1>
   </div>
        <table class="table table-striped container " id="tabela">
            <thead>
              <tr>
                <th scope="col">Produto</th>
                <th scope="col">Valor</th>
                <th scope="col">Hora compra</th>
                <th scope="col">Trocar</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php 
                    include "include/L_pedido.php";
                      while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                ?>
                <th scope="row">Short Jeans<?php //echo $row->qtd_pedidos_item ?></th>
                <td>R$ 50<?php //echo $row->valor_final ?></td>
                <td>15:20:15<?php //echo date_format(new DateTime($row->data),'H:i:s') ?></td>
                <td>

                <!--botão visualizar produtos-->
                <form action="trocar_produto.php" method="POST">
                  <input type="hidden" value="<?php //echo $row->id_pedido ?>" name="visualizar">
                  <input type="hidden" value="<?php //echo $row->data ?>" name="data">
                  <button type="submit" class="btn btn-outline-dark" style="float: left; margin-right: 3%;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-up" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5zm-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5z"/>
                </svg></button>
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