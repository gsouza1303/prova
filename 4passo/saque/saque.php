<?php include("../cabecalho.php"); ?>
<div align="center">
	<fieldset class = "index">
		<legend>Bank Ricardo Monstrão</legend>
		<form method="post" action="">
			Valor a ser sacado: R$<input type="number" min="0" step="0.01" name="saque" />
			<input type="submit" value="Sacar"/>
		</form>
	</fieldset>
</div>
<?php
	if(isset($_POST["saque"])){
		$arquivo = '../usuarios/usuarios.xml';
		$xml = simplexml_load_file($arquivo);
		if(isset($_SESSION["usuario"])){
			foreach($xml->usuario as $usuario){
				if(str_replace(" ","",$usuario->usuario) == str_replace(" ","",$_SESSION["usuario"])){    
					if($usuario->saldo<$_POST["saque"]){
						die("Sem saldo sufisciente");
					}
					$usuario->saldo-=$_POST["saque"];
					$xml->asXML($arquivo);
				}
			}
		}
		echo "<h3>Saque efetuado com sucesso!</h3>";
		echo "<a href='../usuarios/saldo.php'>Voltar a página saldo</a>";
	}	
?>
<?php include("../rodape.php"); ?>