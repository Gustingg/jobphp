<?php
	include_once("../shared/conn.php");

	$dbh = DBConnection::get();

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$sth = $dbh->prepare('INSERT INTO tipopagamento(`nomeTipo`) VALUES(:nome)');

			$sth->bindParam(':nomeTipo', $_POST['nomeTipo']);

			$sth->execute();

			header('Location: ../produtos.php');
		}
		else {
			header('Location: ../produtoForm.php');
		}
	}
?>