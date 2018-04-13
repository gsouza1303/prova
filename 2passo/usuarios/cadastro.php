<head>
	<meta charset = "utf-8"> 
	<link rel="stylesheet" type="text/css" href="../style.css" />
</head>
		<div align="center">
			<fieldset class = "index">
				<legend>Bank Ricardo Monstrão</legend>
				<form method = "post" action = "">
					Nome: <input type = "text" name = "nome" placeholder = "ex: Ricardo" /><br />
					Data de Nascimento: <input type = "date" name = "date" /><br />
					Email: <input type = "email" name = "email" /><br />
					CPF: <input type = "text" name = "cpf" /><br />
					Sexo: <input type = "text" name = "sexo" /><br />
					Usuario: <input type = "text" name = "usuario" placeholder = "ex: Bodybuilder" required /><br />
					Password: <input type = "password" name = "password" required /><br />
					<!-- Botão --> <input type = "submit" value = "Cadastrar" />
				</form>
			</fieldset>	
		</div>
		<?php 
			if(isset($_POST["nome"])){
				$arquivo = 'usuarios.xml';
				if(!file_exists($arquivo)){		
					$fp = fopen($arquivo,"w");	
					$conteudo_inicial = '<?xml version = "1.0"?><usuarios></usuarios>';	
					fwrite($fp,$conteudo_inicial);
					fclose($fp);
				}	
				$xml = simplexml_load_file($arquivo);
				
				foreach($xml->usuario as $usuario){
					if((str_replace(" ","",$_POST["usuario"])==str_replace(" ","",$usuario->usuario)) ||
						(str_replace(" ","",$_POST["email"])==str_replace(" ","",$usuario->email))){
						die ('Erro 404: Email ou Usuário já utilizados em outro cadastro');
					}
				}
				
				$nova_posicao = sizeof($xml->usuario);
				
				$xml->usuario[$nova_posicao]->nome = $_POST["nome"];
				$xml->usuario[$nova_posicao]->data = $_POST["date"];
				$xml->usuario[$nova_posicao]->email = $_POST["email"];
				$xml->usuario[$nova_posicao]->cpf = $_POST["cpf"];
				$xml->usuario[$nova_posicao]->sexo = $_POST["sexo"];
				$xml->usuario[$nova_posicao]->usuario = $_POST["usuario"];
				$xml->usuario[$nova_posicao]->password = $_POST["password"];
				$xml->usuario[$nova_posicao]->saldo = 0;
					 
				str_replace(" ","",$xml->usuario->usuario);
				str_replace(" ","",$xml->usuario->data);
				str_replace(" ","",$xml->usuario->email);
				str_replace(" ","",$xml->usuario->cpf);
				str_replace(" ","",$xml->usuario->sexo);
				str_replace(" ","",$xml->usuario->password);
				str_replace(" ","",$xml->usuario->nome);
				
				
				$xml->asXML($arquivo);
				header("location:../index.php");
				
				
			}
		?>
<?php include("../rodape.php"); ?>
