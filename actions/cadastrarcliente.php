<?php
	include_once("../shared/conn.php");

	$dbh = DBConnection::get();

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$sth = $dbh->prepare('SELECT COUNT(*) as res FROM cliente WHERE cpf = :cpf');
		print_r($_POST['cpf']);
		$sth->bindParam(':cpf', $_POST['cpf']);
		$sth->execute();
		$checkReg = $sth->fetch(PDO::FETCH_ASSOC);

		if($checkReg['res'] == 0){
			$sth = $dbh->prepare('INSERT INTO cliente(`nome`, `cpf`, `telefone`, `email`, `senha`, `cargo`) VALUES(:nome, :cpf, :telefone, :email, :senha, :cargo)');
			$cargo = 0;

			$sth->bindParam(':nome', $_POST['nome']);
			$sth->bindParam(':cpf', $_POST['cpf']);
			$sth->bindParam(':telefone', $_POST['telefone']);
			$sth->bindParam(':email', $_POST['email']);
			$sth->bindParam(':senha', $_POST['senha']);
			$sth->bindParam(':cargo', $cargo);


			$sth->execute();

			$sth = $dbh->prepare('INSERT INTO endereco(`cep`, `endereco`, `complemento`, `numero`, `fk_cpfCliente`) VALUES(:cep, :endereco, :complemento, :numero, :fk_cpfCliente)');

			$sth->bindParam(':cep', $_POST['cep']);
			$sth->bindParam(':endereco', $_POST['endereco']);
			$sth->bindParam(':complemento', $_POST['complemento']);
			$sth->bindParam(':numero', $_POST['numero']);
			$sth->bindParam(':fk_cpfCliente', $_POST['cpf']);
			$sth->execute();
			header('Location: ../index.php');
		}
		else {
			header('Location: ../clienteForm.php');
		}
	}
?>