<?php include("../cabecalho.php"); ?>
<?php
	$arquivo = '../usuarios/usuarios.xml';
	$xml = simplexml_load_file($arquivo);
	foreach($xml->usuario as $usuario){
		$_SESSION["saldo"] = (string)$usuario->saldo;
	} ?>
<div align="center">
	<fieldset class = "index">
		<legend>Bank Ricardo Monstrão</legend>
		<form method = "post" action = "">
			Selecione um usuário:
			<select name = "transf">
			<?php
				foreach($xml->usuario as $usuario){ ?>
					<option><?=$usuario->usuario?></option><br/>
			<?php
				}
				?>
			</select><br />
			Valor a ser transferido: R$<input type = "number" min = "0" name = "valor" />
			<input type = "submit" value = "Transferir" />
		</form>
	</fieldset>
</form>
	
<?php
	if(isset($_POST["valor"])){
		foreach($xml->usuario as $usuario){ 
			if($usuario->saldo<$_POST["valor"]){
				die("Sem saldo sufisciente");
			}
			if(str_replace(" ","",$usuario->usuario)==(str_replace(" ","",$_SESSION["usuario"]))){
				(float)$usuario->saldo-=$_POST["valor"];
			}	
			if(str_replace(" ","",$usuario->usuario)==(str_replace(" ","",$_POST["transf"]))){
				(float)$usuario->saldo+=$_POST["valor"];
			}		
		}
		$xml->asXML($arquivo);
	echo "<h3>Transferência feita com sucesso</h3>";
	echo "<a href = '../usuarios/saldo.php'>Voltar a página saldo..</a>";
	}
	
	
?>
<?php include("../rodape.php"); ?>
