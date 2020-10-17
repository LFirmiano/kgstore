<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Usuários</title>
    <?php include "include/painel2.php" ?>
</head>
<body>
    <script>
        $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
        })
    </script>
   <?php 
    include "include/menu.php";
  ?>
   <div class="container">
   <h1 class="display-4 text-center">Usuários</h1>
   <a href="cad_usuario.php" class="btn btn-outline-success" style="margin-bottom:2%;">Adicionar Usuário</a>
   </div>
        <table class="table table-striped container ">
            <thead>
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Tipo</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php
                    include "include/L_usuario.php";
                    while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                ?>
                <th scope="row"><?php echo $row->nome ?></th>
                <td><?php echo $row->email ?></td>
                <td><?php if ($row->tipo == 0){ echo "Administração";} else{ echo "Caixa"; } ?></td>
                <td>

                <!--botao edição-->
                <form action="edit_usuario.php" method="POST">
                  <input type="hidden" value="<?php echo $row->id_usuario ?>" name="visualizar">
                  <button type="submit" class="btn btn-outline-dark" style="float: left; margin-right: 3%;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                  </svg></button>
                </form>

                <!--botao excluir-->
                <form method="">
                  <button type="button" class="btn btn-outline-danger" style="float: left; margin-right: 3%;" data-toggle="modal" value="<?php echo $row->id_usuario ?>" onclick="deletar(this)" data-target="#exampleModal">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                  </svg>
                  </button>
                </form>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>

          <!--
              Inicio Modal Excluir
          -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Excluir Usuário</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p><strong>Deseja Excluir o Usuário Selecionado?</strong></p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Fechar</button>
                  <form action="include/D_usuario.php" method="POST">
                    <input type="hidden" id="id_del" name="id_del">
                    <button type="submit" class="btn btn-danger">Excluir</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <script>
            function deletar(del){
              $('#id_del').val($(del).val())
            }
          </script>

</body>
</html>