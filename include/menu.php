<?php include "include/is_logado.php"; ?>
<nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color:#f8a381; margin-bottom:1%">

  <a class="navbar-brand" href="#">
    <img src="img/logo.png" width="35" height="35" class="d-inline-block align-top" alt="" loading="lazy">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <?php if ($_SESSION['tipo']==1){ ?>
          <li class="nav-item ">
          <a class="nav-link text-dark" href="caixa.php">Home</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-dark" href="pedidos_diario.php">Pedidos</a>
        </li>
        <?php } ?>
        <?php if ($_SESSION['tipo']==0){ ?>
        <li class="nav-item ">
          <a class="nav-link text-dark" href="home.php">Home</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-dark" href="estoque.php">Estoque</a>
        </li>
        <?php } ?>
        <li class="nav-item ">
          <a class="nav-link text-dark" href="cliente.php">Clientes</a>
        </li>
        <?php if ($_SESSION['tipo']==1){ ?>
        <li class="nav-item ">
          <a class="nav-link text-dark" href="fornecedor.php">Fornecedores</a>
        </li>
        <?php } ?>
        <?php if ($_SESSION['tipo']==0){ ?>
        <li class="nav-item ">
          <a class="nav-link text-dark" href="relatorio.php">Relatórios</a>
        </li>
        <?php } ?>
        <?php if ($_SESSION['tipo']==1){ ?>
        <li class="nav-item ">
          <a class="nav-link text-dark" href="relatorio_caixa.php">Movimentações Caixa</a>
        </li>
        <?php } ?>

        <li class="nav-item ">
          <a class="nav-link text-dark" href="troca.php">Produtos trocados</a>
        </li>
          
        <?php if ($_SESSION['tipo']==0){ ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Outros
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="nav-link text-dark" href="categoria.php">Categorias</a>
          <a class="nav-link text-dark" href="fornecedor.php">Fornecedores</a>
          <a class="nav-link text-dark" href="usuario.php">Usuários</a>
        </li>
        <?php } ?>
        </ul> 

        <!--botão canto direito-->
        <div class="dropdown drop" style="margin-right:8%">
        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
        </svg>
        </button>
        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="perfil.php">Meus Dados</a>
          <a class="dropdown-item" href="dados_empresa.php">Dados da Empresa</a>
          <?php 
            if ($_SESSION['adm'] == true){?>
              <a class="dropdown-item" href="include/trocar.php">Logar como <?=$_SESSION['trocar']?> </a>
          <?php }
          ?>
          <div class="dropdown-divider"></div>
          <!--Sair provissorio-->
          <a href="include/logout.php" class="dropdown-item">Sair</a>
        </div>
</div> 
    </div>
  </nav>
  