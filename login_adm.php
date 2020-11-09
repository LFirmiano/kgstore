<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login Administração</title>
    <?php include "include/painel2.php" ?>
</head>
<body>
    
<div class="card text-center">
  <div class="card-header bg-info">
  
  <h1 class="display-4 text-center text-light">Login Administração</h1>
    
  </div>
  <div class="card-body">
    <!--form login-->
    <form class="container" method="POST" action="include/login.php">
    <a href="index.php" class="btn btn-outline-info " style="margin-bottom:2%;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
    </svg></a> 
    <div class="form-group">
        <label for="exampleInputEmail1"><strong>Email</strong></label>
        <input type="email" class="form-control border border-info" name="email" aria-describedby="emailHelp">
        
    </div>
    <div class="form-group ">
        <label for="exampleInputPassword1"><strong>Senha</strong></label>
        <input type="password" class="form-control border border-info" name="senha">
        <a class="link" data-toggle="modal" data-target="#exampleModal">
        <small>Esqueci a senha</small>
        </a>
    </div>

    <input type="hidden" name="tipo" value=0>

    <button type="submit" class="btn btn-outline-success">Entrar</button>
   </div> 
  </form>

  <div class="card-footer text-muted fixed-bottom">
  copyright © 2020 . all rights reserved
  </div>
</div>


<!-- Modal -->
<form method="POST" action="include/recuperarsenha.php">
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Recuperação de Senha</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <div class="form-group">
          <p><strong>Coloque seu email para ser enviado sua senha.</strong></p>
          <label for="exampleInputEmail1">Email para Recuperação</label>
          <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <small class="text-info">Verifique se seu email está certo</small>
          
      </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-primary">Solicitar</button>
        </div>
      </div>
    </div>
  </div>
</form>



</body>
</html>
