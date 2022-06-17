<?php
    include_once("../shared/conn.php");
    $dbh = DBConnection::get();
    $sth = $dbh->prepare('UPDATE produto SET nome = :nome, qtd = :qtd, preco = :preco, img = :img WHERE id = :id;');

    $sth->bindParam(':nome', $_POST['nome']);
    $sth->bindParam(':telefone', $_POST['qtd']);
    $sth->bindParam(':email', $_POST['preco']);
    $sth->bindParam(':img', $_POST['img']);
    $sth->bindParam(':id', $_POST['id']);
    
    $sth->execute();
    header('Location: ../produtos.php');
?>