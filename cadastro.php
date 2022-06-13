<?php 
  session_start();
  $_SESSION['pageTitle'] = 'Home';
  include './shared/header.php';
  require_once "./shared/conn.php";
  header('Content-Type: text/html; charset=utf-8');
  $dbh = DBConnection::get();
  $stmt = $dbh->prepare("SELECT * FROM produto");
  $stmt->execute();
  $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                <input type="senha" name="senha" required>
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

include './shared/footer.php' ?>