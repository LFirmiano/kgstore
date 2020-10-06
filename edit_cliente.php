<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
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
   <?php 
    include "include/menu.php";
    include "include/R_cliente.php";
    ?>
   

   <!--form cliente-->
   <form method="POST" action="include/U_cliente.php">
   <div class="container"> 
   <h1 class="display-4 text-center">Editar cliente</h1>

   <div class="row" style="margin-top:2%; margin-bottom:5%">

   <div class="form-group col-md-6">
    <label for="exampleFormControlInput1"><strong>Cliente</strong></label>
    <input type="text" class="form-control" name="nome" value="<?php echo $row->nome ?>">
  </div>

  <div class="form-group col-md-6">
    <label for="exampleFormControlInput1"><strong>Email</strong></label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" value="<?php echo $row->email ?>">
  </div>

  <div class="form-group col-md-4">
    <label for="exampleFormControlInput1"><strong>Telefone</strong></label>
    <input type="text" class="form-control" name="telefone" value="<?php echo $row->telefone ?>">
  </div>

  <div class="form-group col-md-8">
    <label for="inputAddress"><strong>Endereço</strong></label>
    <input type="text" class="form-control" name="endereco" id="inputAddress" value="<?php echo $row->endereco ?>">
  </div>

  <div class="form-group col-md-4">
    <label for="exampleFormControlInput1"><strong>Data Nascimento</strong></label>
    <input type="date" class="form-control" name="data_nascimento" value=<?php echo $row->data_nascimento?>>
  </div>

  <input type="hidden" name="edit" value=<?php echo $_POST['visualizar'] ?>>

<br>
</div>
<a href="cliente.php" class="btn btn-outline-dark" style="margin-bottom:2%;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
</svg></a>
  <button type="submit" class="btn btn-outline-success" style="margin-bottom:2%;">Editar</button>
  </form>

  </div>
</body>
</html>