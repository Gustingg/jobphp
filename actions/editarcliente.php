<?php
    include_once("../shared/conn.php");
    $dbh = DBConnection::get();
    $sth = $dbh->prepare('UPDATE cliente SET nome = :nome, telefone = :telefone, email = :email WHERE cpf = :cpf;
                          UPDATE endereco SET cep = :cep, endereco = :endereco, complemento = :complemento, numero = :numero WHERE fk_cpfCliente = :cpf;');

    $sth->bindParam(':nome', $_POST['nome']);
    $sth->bindParam(':telefone', $_POST['telefone']);
    $sth->bindParam(':email', $_POST['email']);
    $sth->bindParam(':cep', $_POST['cep']);
    $sth->bindParam(':endereco', $_POST['endereco']);
    $sth->bindParam(':complemento', $_POST['complemento']);
    $sth->bindParam(':numero', $_POST['numero']);
    $sth->bindParam(':cpf', $_POST['cpf']);

    print_r($_POST['cpf']);
    
    $sth->execute();
    header('Location: ../clientes.php');
?>