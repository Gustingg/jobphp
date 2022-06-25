<?php 
    session_start();
    $_SESSION['pageTitle'] = 'Login';
    include './shared/header.php';
    require_once "./shared/conn.php";
    header('Content-Type: text/html; charset=utf-8');
    echo '
        <div>
            <h1>Login</h1>
            <form class="form-signin" name="form1" action="./shared/validateuser.php" method="post">
                <input type="text" id="inputCpf" name="cpf" class="form-control" placeholder="CPF" required="" autofocus="">
                <br><br>
                <input type="password" id="inputPassword" name="senha" class="form-control" placeholder="Senha" required="">
                <br><br>
                <button>Entrar</button>
            </form>
        </div>';

    include './shared/footer.php' ?>