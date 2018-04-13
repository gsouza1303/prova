<head> 
	<meta charset = "utf-8">	
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
		<div align="center">
			<fieldset class = "index">
			<legend>Bank Ricardo Monstrão</legend>
			<form method = "post" action = "usuarios/confere_cadastro.php" >
				Usuario: <input type = "text" name = "usuario" required /><br /><br />
				Password: <input type = "password" name = "password" required /><br /><br />
				<!-- Botão --> <input type = "submit" value = "Login" /><br /><br />
				<a href = "usuarios/cadastro.php">Não tem cadastro? Clique aqui..</a>
			</form>
			</fieldset>
		</div>
</body>		