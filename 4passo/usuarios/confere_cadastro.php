<?php include("../cabecalho.php"); ?>
<?php 
	if(file_exists("usuarios.xml")){
		$arquivo = 'usuarios.xml';
		$xml = simplexml_load_file($arquivo);
		for($i=0; $i<count($xml->usuario); $i++) {
			$usuario = (string)$xml->usuario[$i]->usuario;
			$senha = (string)$xml->usuario[$i]->password;
			$nome = (string)$xml->usuario[$i]->nome;
			$email = (string)$xml->usuario[$i]->email;
			$saldo = (string)$xml->usuario[$i]->saldo;
			if($_POST["usuario"]==$usuario && $_POST["password"]==$senha){
				$_SESSION["usuario"] = $usuario; 
				$_SESSION["senha"] = $senha; 
				$_SESSION["nome"] = $nome; 
				$_SESSION["email"] = $email; 
				$_SESSION["saldo"] = $saldo; 
				header("location:saldo.php");
			}
		}
	}else{
		$arquivo = 'usuarios.xml';
			if(!file_exists($arquivo)){		
				$fp = fopen($arquivo,"a");	
				$conteudo_inicial = '<?xml version = "1.0"?><usuarios></usuarios>';	
				fwrite($fp,$conteudo_inicial);
				fclose($fp);
			}			
	}
	echo "Usuário ou Senha incorretos...<br />";
	echo "<a href = '../index.php'>Tente novamente</a>";
	
?>
<?php include("../rodape.php"); ?>