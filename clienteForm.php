<?php 
    session_start();
    if(isset($_GET['acao']) && $_GET['acao'] == 'editar')
        $_SESSION['pageTitle'] = 'Editar Cliente';
    else
        $_SESSION['pageTitle'] = 'Cadastrar Cliente';
    include './shared/header.php';
    require_once "./shared/conn.php";
    header('Content-Type: text/html; charset=utf-8');
    if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){
        $dbh = DBConnection::get();
        $stmt = $dbh->prepare("SELECT * FROM cliente as cli INNER JOIN endereco as ende ON cli.cpf = ende.fk_cpfCliente WHERE cli.cpf = :cpf; ");
        $stmt->bindParam(':cpf', $_GET['cpf']);
        $stmt->execute();
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);
        echo '
            <form name="cadCli" action="./actions/editarcliente.php" method="post">
                <legend>Dados Gerais</legend>
                <input type="text" name="cpf" required value='.$dados['cpf'].' style="display:none">
                <div>
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" required value="'.$dados['nome'].'">
                </div>
                <div>
                    <label for="telefone">Telefone:</label>
                    <input type="text" name="telefone" required value="'.$dados['telefone'].'" placeholder="(17) 99999-9999">
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" name="email" required value="'.$dados['email'].'">
                </div>
                <legend>Endereco</legend>
                <div>
                    <label for="cep">CEP</label>
                    <input type="text" name="cep" required value="'.$dados['cep'].'">
                </div>
                <div>
                    <label for="endereco">Endereço:</label>
                    <input type="text" name="endereco" required value="'.$dados['endereco'].'">
                </div>
                <div>
                    <label for="complemento">Complemento:</label>
                    <input type="text" name="complemento" required value="'.$dados['complemento'].'">
                </div>
                <div>
                    <label for="numero">Numero:</label>
                    <input type="numero" name="numero" required value="'.$dados['numero'].'">
                </div>
                <div>
                    <input class="submit" type="submit" value="Enviar">
                </div>
            </form>';
    }
    else{
        echo '
            <form name="cadCli" action="./actions/cadastrarcliente.php" method="post">
                <legend>Dados Gerais</legend>
                <div>
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" required autofocus>
                </div>
                <div>
                    <label for="cpf">CPF:</label>
                    <input type="text" name="cpf" required>
                </div>
                <div>
                    <label for="telefone">Telefone:</label>
                    <input type="text" name="telefone" required placeholder="(17) 99999-9999">
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" name="email" required>
                </div>
                <div>
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" required>
                </div>
                <legend>Endereco</legend>
                <div>
                    <label for="cep">CEP</label>
                    <input type="text" name="cep" required>
                </div>
                <div>
                    <label for="endereco">Endereço:</label>
                    <input type="text" name="endereco" required>
                </div>
                <div>
                    <label for="complemento">Complemento:</label>
                    <input type="text" name="complemento" required>
                </div>
                <div>
                    <label for="numero">Numero:</label>
                    <input type="numero" name="numero" required>
                </div>
                <div>
                    <input class="submit" type="submit" value="Enviar">
                </div>
            </form>';
    }

include './shared/footer.php' ?>