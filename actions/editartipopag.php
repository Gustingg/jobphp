<?php
    include_once("../shared/conn.php");
    $dbh = DBConnection::get();
    $sth = $dbh->prepare('UPDATE tipopagamento SET nome = :nome WHERE id = :id;');

    $sth->bindParam(':nome', $_POST['nome']);
    $sth->bindParam(':id', $_POST['id']);
    
    $sth->execute();
    header('Location: ../produtos.php');
?>