<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pedidos</title>
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
   <h1 class="display-4 text-center">Pedidos</h1>
   </div>
        <table class="table table-striped container " id="tabela">
            <thead>
              <tr>
                <th scope="col">Qtd Itens</th>
                <th scope="col">Valor Total</th>
                <th scope="col">Data compra</th>
                <th scope="col">Detalhes</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php 
                    include "include/L_todos_pedidos.php";
                      while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                ?>
                <th scope="row"><?php echo $row->qtd_pedidos_item ?></th>
                <td><?php echo $row->valor_final ?></td>
                <td><?php echo date_format(new DateTime($row->data),'d/m/Y') ?></td>
                <td>

                <!--botao detalhes-->
                <form action="detalhe_pedido.php" method="POST">
                  <input type="hidden" value="<?php echo $row->id_pedido ?>" name="visualizar">
                  <input type="hidden" value="<?php echo $row->data ?>" name="data">
                  <button type="submit" class="btn btn-outline-dark" style="float: left; margin-right: 3%;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                  </svg></button>
                </form>

                <!--botão visualizar produtos-->
                <form action="produtos_pedido.php" method="POST">
                  <input type="hidden" value="<?php echo $row->id_pedido ?>" name="visualizar">
                  <input type="hidden" value="<?php echo $row->data ?>" name="data">
                  <button type="submit" class="btn btn-outline-dark" style="float: left; margin-right: 3%;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
                  <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
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