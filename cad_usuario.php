<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
    <?php include "include/painel2.php" ?>
</head>
<body>
    <script>
        $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
        })
    </script>
   <?php include "include/menu.php";?>
   

   <!--form usuário-->
   <form method="POST" action="include/C_usuario.php">
   <div class="container">
   
   <h1 class="display-4 text-center">Cadastro de Usuário</h1><hr>

   <div class="row" style="margin-top:2%; margin-bottom:5%">

   <div class="form-group col-md-4">
    <label for="exampleFormControlInput1"><strong>Nome</strong></label>
    <input type="text" class="form-control" name="nome" placeholder="Jorge Costa Mendes" required>
  </div>

  <div class="form-group col-md-6">
    <label for="exampleFormControlInput1"><strong>Email</strong></label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email@email.com" required>
  </div>

  <div class="form-group col-md-4">
    <label for="exampleFormControlInput1"><strong>Senha</strong></label>
    <input type="password" class="form-control" name="senha" required>
  </div>

  <div class="form-group col-md-4">
    <label for="exampleFormControlInput1"><strong>Tipo</strong></label>      
    <div class="form-check">
    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value=0 checked>
    <label class="form-check-label" for="exampleRadios1" value="0">
        ADMINISTRAÇÃO
    </label>
    </div>
    <div class="form-check">
    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value=1>
    <label class="form-check-label" for="exampleRadios2">
        CAIXA
    </label>
    </div>
  </div> 

  <input type="hidden" name="tipo">

<br>
</div>
<a href="usuario.php" class="btn btn-outline-dark" style="margin-bottom:2%;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
</svg></a> 
  <button type="submit" class="btn btn-outline-success" style="margin-bottom:2%;">Cadastrar</button>
  </form>

  </div>
</body>
</html>