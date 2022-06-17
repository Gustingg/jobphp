<?php
    include_once("../shared/conn.php");
    $dbh = DBConnection::get();
    $sth = $dbh->prepare('UPDATE produto SET nome = :nome, qtd = :qtd, preco = :preco, img = :img WHERE id = :id;');
    $imgFinal = 'img/vinhos/'.$_FILES['img']['name'];

    $sth->bindParam(':nome', $_POST['nome']);
    $sth->bindParam(':qtd', $_POST['qtd']);
    $sth->bindParam(':preco', $_POST['preco']);
    $sth->bindParam(':img', $imgFinal);
    $sth->bindParam(':id', $_POST['id']);

    move_uploaded_file($_FILES['img']['tmp_name'], '../img/vinhos/'.$_FILES['img']['name']);
    
    $sth->execute();
    header('Location: ../produtos.php');
?>