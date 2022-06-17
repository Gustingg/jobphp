<?php 
    session_start();
    if(isset($_GET['acao']) && $_GET['acao'] == 'editar')
        $_SESSION['pageTitle'] = 'Editar Produto';
    else
        $_SESSION['pageTitle'] = 'Cadastrar Produto';
    include './shared/header.php';
    require_once "./shared/conn.php";
    header('Content-Type: text/html; charset=utf-8');
    if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){
        $dbh = DBConnection::get();
        $stmt = $dbh->prepare("SELECT * FROM produto WHERE id = :id; ");
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->execute();
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);
        echo '
            <form name="cadProd" action="./actions/editarproduto.php" method="post">
                <legend>Dados do Produto</legend>
                <input type="text" name="id" required value='.$dados['id'].' style="display:none">
                <div>
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" required value='.$dados['nome'].'>
                </div>
                <div>
                    <label for="telefone">Telefone:</label>
                    <input type="text" name="qtd" required value='.$dados['qtd'].'>
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" name="preco" required value='.$dados['preco'].'>
                </div>
                <div>
                    <label for="img">Imagem:</label>
                    <input type="file" name="img" accept="image/png, image/jpeg" required value='.$dados['img'].'>
                </div>
                <div>
                    <input class="submit" type="submit" value="Enviar">
                </div>
            </form>';
    }
    else{
        echo '
            <form enctype="multipart/form-data" name="cadProd" action="./actions/cadastrarproduto.php" method="post">
                <legend>Dados do Produto</legend>
                <div>
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" required>
                </div>
                <div>
                    <label for="qtd">Quantidade:</label>
                    <input type="text" name="qtd" required>
                </div>
                <div>
                    <label for="preco">Preço:</label>
                    <input type="text" name="preco" required>
                </div>
                <div>
                    <label for="img">Imagem:</label>
                    <input type="file" name="img" accept="image/png, image/jpeg" required>
                </div>
                <div>
                    <input class="submit" type="submit" value="Enviar">
                </div>
            </form>';
    }

include './shared/footer.php' ?>