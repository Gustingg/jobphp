<?php
	include_once("../shared/conn.php");

	$dbh = DBConnection::get();

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$sth = $dbh->prepare('INSERT INTO produto(`nome`, `qtd`, `preco`, `img`) VALUES(:nome, :qtd, :preco, :img)');
		$imgFinal = 'img/vinhos/'.$_FILES['img']['name'];

		$sth->bindParam(':nome', $_POST['nome']);
		$sth->bindParam(':qtd', $_POST['qtd']);
		$sth->bindParam(':preco', $_POST['preco']);
		$sth->bindParam(':img', $imgFinal);

		move_uploaded_file($_FILES['img']['tmp_name'], '../img/vinhos/'.$_FILES['img']['name']);

		$sth->execute();

		header('Location: ../produtos.php');
	}
	else {
		header('Location: ../produtoForm.php');
	}

?>