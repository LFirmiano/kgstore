<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Meus Dados</title>
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
   include "include/R_perfil.php";
   if ($_SESSION['tipo'] == 0){
      $cargo = "ADMINISTRADOR";
   } else {
      $cargo = "CAIXA";
   }
   ?>
   

   <!--info dados pessoais-->
   <form method="POST" action="">
   <div class="container">
   
   <h1 class="display-4 text-center text-info">Meus Dados</h1>    
   <div  class="row" style="margin-top:2%; margin-bottom:5%">


<div class="col text-center">
<h2 class="text-center"><svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-person-circle text-info" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
  <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
</svg></h2> 

<h5 class="text-info" style="margin-top:2%;"><strong>Nome:</strong> <?php echo $row->nome ?></h5>
<h5 class="text-info" style="margin-top:2%;"><strong>Email:</strong> <?php echo $_SESSION['email'] ?></h5>
<h5 class="text-info" style="margin-top:2%;"><strong>Tipo:</strong> <?php echo $cargo ?></h5>    

</div>
</div>
  </form>
  <!--botão voltar NÃO FUNCIONAL-->
  <a href="javascript:history.back()" class="btn btn-outline-dark" style="margin-bottom:2%;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
  </svg></a>
  </div>
</body>
</html>