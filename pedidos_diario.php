<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pedidos Diários</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <script>
        $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
        })
    </script>
   <?php include "include/menu.php";?>
   <div class="container">
   <h1 class="display-4 text-center">Pedidos do dia</h1>
   <a href="cad_pedido.php" class="btn btn-outline-success" style="margin-bottom:2%;">Adicionar Pedido</a>
   </div>
        <table class="table table-striped container ">
            <thead>
              <tr>
                <th scope="col">Qtd Itens</th>
                <th scope="col">Valor Total</th>
                <th scope="col">hora compra</th>
                <th scope="col">Detalhes</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php 
                    //include "include/L_cliente.php";
                    //while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                      // echo $row->produto;
                ?>
                <th scope="row">01<?php //echo $row->nome ?></th>
                <td>R$20,00<?php //echo $row->data_nascimento ?></td>
                <td>11:07:30<?php //echo $row->telefone ?></td>
                <td>

                <!--botao visualizar-->
                <form action="detalhe_pedido.php" method="POST">
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
          
          
          <!-- <script>

            $("#excluir").click(function(){
              // var valor = $('#inpt').val();
              window.location.href("../");
            });
          
          </script> -->

</body>
</html>