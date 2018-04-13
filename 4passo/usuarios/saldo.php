<?php include("../cabecalho.php"); ?>
<?php
	$arquivo = 'usuarios.xml';
	$xml = simplexml_load_file($arquivo);
	echo "Nome: " . $_SESSION["nome"] . "<br />";
	echo "Usuário: " . $_SESSION["usuario"] . "<br />";
	foreach($xml->usuario as $usuario){
		if(str_replace(" ","",$usuario->usuario)==str_replace(" ","",$_SESSION["usuario"])){
			$_SESSION["saldo"] = (float)$usuario->saldo;
		}
	}
	echo "Saldo: R$" . $_SESSION["saldo"] . "<br />";
?>

<div class = "saldo">
	<form method = "post" action = "../deposito/deposito.php">
		<input type = "submit" value = "Depósito" />
	</form>

	<form method = "post" action = "../saque/saque.php">
		<input type = "submit" value = "Saque" />
	</form>

	<form method = "post" action = "../transferencia/transferencia.php">
		<input type = "submit" value = "Transferência" />
	</form>
</div>

<form method = "post" action = "logout.php">
	<input type = "submit" value = "Logout" />
</form>
<?php include("../rodape.php"); ?>