<?php include("../cabecalho.php"); ?>

<div align="center">
	<fieldset class = "index">
		<legend>Bank Ricardo Monstrão</legend>
		<form method = "post" action = "">
			Valor a ser depositado: R$<input type = "number" min = "0" name = "depo" step = "0.01" />
			<input type = "submit" value = "Depositar" />
		</form>
	</fieldset>
</div>
<?php
	if(isset($_POST["depo"])){
		$arquivo = '../usuarios/usuarios.xml';
		$xml = simplexml_load_file($arquivo);
		if(isset($_SESSION["usuario"])){
			foreach($xml->usuario as $usuario){
				if(str_replace(" ","", $usuario->usuario)==str_replace(" ","",$_SESSION["usuario"])){
					$usuario->saldo+=$_POST["depo"];
					$xml->asXML($arquivo);
				}
			}
		}
		echo "<h3>Depósito efetuado com sucesso</h3>";
		echo "<a href = '../usuarios/saldo.php'>Voltar á página saldo</a>";
	}
	
	
?>
<?php include("../rodape.php"); ?>
	
