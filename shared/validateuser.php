<?php
session_start();
require_once "conn.php";

if(isset($_POST['cpf']) && isset($_POST['senha'])){
    $dbh = DBConnection::get();

    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    $sql = $dbh->prepare("Select * from cliente where cpf='$cpf' and senha='$senha'");
    $sql->execute();
    
    $result = $sql->fetch();
    if($result != null){
        $_SESSION['cargo']=$result['cargo'];
        $_SESSION['nome']=$result['nome'];
        header('Location: ../index.php');
    }
    else{
        header('Location: login.php');
    }
}else {
    echo "Algum campo vazio";
}
?>