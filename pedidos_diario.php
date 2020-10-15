<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pedidos Diários</title>
    <?php include "include/painel.php";?>
    
</head>
<body>

    <script>
        $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
        })
    </script>
    <script>
$(document).ready(function() {
    $('#tabela').DataTable( {
      paging:   false,
      info:     false,
      dom: 'Bfrtip',

        "language": {
          "searchPlaceholder": "Pesquisar ",
          "sEmptyTable": "Nenhum registro encontrado",
          "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
          "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
          "sInfoFiltered": "(Filtrados de _MAX_ registros)",
          "sInfoPostFix": "",
          "sInfoThousands": ".",
          "sLengthMenu": "_MENU_ resultados por página",
          "sLoadingRecords": "Carregando...",
          "sProcessing": "Processando...",
          "sZeroRecords": "Nenhum registro encontrado",
          "sSearch": "",
        "oPaginate": {
          "sNext": "Próximo",
          "sPrevious": "Anterior",
          "sFirst": "Primeiro",
          "sLast": "Último"
                    },
        "oAria": {
          "sSortAscending": ": Ordenar colunas de forma ascendente",
          "sSortDescending": ": Ordenar colunas de forma descendente"
                }
                    }
    });
});

</script>
   <?php include "include/menu.php";?>
   <div class="container">
   <h1 class="display-4 text-center">Pedidos do dia</h1>
   <a href="cad_pedido.php" class="btn btn-outline-success" style="margin-bottom:2%;">Adicionar Pedido</a>
   </div>
        <table class="table table-striped container " id="tabela">
            <thead>
              <tr>
                <th scope="col">Qtd Itens</th>
                <th scope="col">Valor Total</th>
                <th scope="col">Hora compra</th>
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
          </div>
          </div>
          
          
          <!-- <script>

            $("#excluir").click(function(){
              // var valor = $('#inpt').val();
              window.location.href("../");
            });
          
          </script> -->

</body>
</html>