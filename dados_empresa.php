<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dados da empresa</title>
    <?php include "include/painel2.php" ?>
</head>
<body>
    <script>
        $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
        })
    </script>
   <?php include "include/menu.php";?>
   

   <!--info kg store-->
   <form method="POST" action="">
   <div class="container">
   
   <h1 class="display-4 text-center text-info">Dados da empresa</h1>    
   <div  class="row" style="margin-top:2%; margin-bottom:5%">


<div class="col text-center">
<h2 class="text-center"><svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-briefcase text-info" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-6h-1v6a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-6H0v6z"/>
  <path fill-rule="evenodd" d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5v2.384l-7.614 2.03a1.5 1.5 0 0 1-.772 0L0 6.884V4.5zM1.5 4a.5.5 0 0 0-.5.5v1.616l6.871 1.832a.5.5 0 0 0 .258 0L15 6.116V4.5a.5.5 0 0 0-.5-.5h-13zM5 2.5A1.5 1.5 0 0 1 6.5 1h3A1.5 1.5 0 0 1 11 2.5V3h-1v-.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5V3H5v-.5z"/>
</svg></h2> 

<h5 class="text-info" style="margin-top:2%;"><strong>Empresa:</strong> KG Store</h5>
<h5 class="text-info" style="margin-top:2%;"><strong>Nome Empresário(a):</strong> Gabrielle Feliciano da Rocha</h5> 
<h5 class="text-info" style="margin-top:2%;"><strong>CNPJ:</strong> 36.496.261/0001-85</h5>
<h5 class="text-info" style="margin-top:2%;"><strong>Logradouro:</strong> Rua Argentina, 184</h5> 
<h5 class="text-info" style="margin-top:2%;"><strong>CEP:</strong> 60442-440</h5> 
<h5 class="text-info" style="margin-top:2%;"><strong>Bairro:</strong> Bela Vista</h5>   


</div>
</div>
  </form>
  <!--botão voltar-->
  <a href="javascript:history.back()" class="btn btn-outline-dark " style="margin-bottom:2%;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
  </svg></a>
  </div>
</body>
</html>