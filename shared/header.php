<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
        <link rel="stylesheet" href="css/pagina.css">
        <title>Adega CasaBlancas - <?php echo $_SESSION['pageTitle'] ?></title>
    </head>
    <body>
    <header>
        <nav class="navbar navbar-light bg-gradient">
            <div>
                <img class="rounded-circle " src="img/logo.jpg" alt="Logo da loja">
                <a class="navbar-brand text-white m-3" href="index.php">Adega CasaBlanca</a>
            </div> 
            <ul class="nav">
                <?php 
                    if(isset($_SESSION['nome'])){
                        if(isset($_SESSION['cargo']) && $_SESSION['cargo'] == 0){
                            echo '
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#">Pedidos</a>
                                </li>
                                <li class="nav-item">
                                    <a role="button" href="./shared/sair.php" class="nav-link text-white">Sair</a>
                                </li>';
                        }
                        else{
                            echo '
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="clientes.php">Clientes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#">Pedidos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="produtos.php">Produtos</a>
                                </li>
                                <li class="nav-item">
                                    <a role="button" href="./shared/sair.php" class="nav-link text-white">Sair</a>
                                </li>';
                        }
                    }
                    else{
                        echo '
                            <li class="nav-item">
                                <a class="nav-link text-white" href="clienteForm.php">Cadastro</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="login.php">Login</a>
                            </li>';
                    }
                ?>
                <li>
                    <input type="text" class="form-control" placeholder="Pesquisar" aria-label="Pesquisar">
                </li>     
            </ul>  
        </nav>
    </header>