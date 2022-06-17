<?php
    require_once "../shared/conn.php";
    $dbh = DBConnection::get();
    $sth = $dbh->prepare('DELETE FROM cliente WHERE cpf = :cpf; DELETE FROM endereco WHERE fk_cpfCliente = :cpf;');
    
    $sth->bindParam(':cpf', $_GET['cpf']);
    
    $sth->execute();
    header('Location: ../clientes.php');
?>