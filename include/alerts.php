<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Alerts</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="icon" type="text/css" href="../img/logo.png"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
   <div class="container">
   <h1 class="display-4 text-center">Alerts</h1>
   <div class="alert alert-danger col-4" role="alert"><strong>Login Incorreto!</strong> Tente Novamente.</div>

   <div class="alert alert-danger text-center" role="alert"><strong>Erro!</strong> Página restrita para seu usuário.</div>

   <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Alteração feita com sucesso!</strong> Confira na tabela abaixo.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Exclusão feita com sucesso!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Cadastro realizado!</strong> Confira na tabela abaixo.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
   
<div class="alert alert-warning" role="alert"><strong>Email</strong> já atribuído a outro usuário.</div>
</div>

</body>
</html>