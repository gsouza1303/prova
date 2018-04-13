<html lang="pt-br">
	<head>
		<meta charset="UTF-8" />
		<title>Bank Ricardão Monstrão</title>
		<link rel="stylesheet" type="text/css" href="../style.css" />
	</head>
	<body>
		<?php 
			session_start();
			if(isset($_SESSION["usuario"])){
		?>
		<div class = "cabecalho">
		<a href="../usuarios/saldo.php">Início</a> | 
		<a href="../deposito/deposito.php">Depositar</a> | 
		<a href="../saque/saque.php">Sacar</a> | 
		<a href="../transferencia/transferencia.php">Transferência</a>
		</div>
		<?php		
			}else{
				echo "<img src='../imagens/bodybuilder.jpg' name='logo'/>";
				header("location:../index.php?");
			}
		?>
		<br />