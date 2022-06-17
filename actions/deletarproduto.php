<?php
    require_once "../shared/conn.php";
    $dbh = DBConnection::get();
    $sth = $dbh->prepare('DELETE FROM produto WHERE id = :id;');
    
    $sth->bindParam(':id', $_GET['id']);
    
    $sth->execute();
    header('Location: ../produtos.php');
?>