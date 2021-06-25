<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Aula 1</title>
		<link rel="stylesheet" href="estilo.css">
	</head>
	<body>
	<header align="center"><h1>HEADER</h1></header>
		<table border="1" align="center" width="80%">
			<tr>
				<!--BANNER-->
				<td align="center"><h1>BANNER</h1>
					<br><br><br>
				</td>	
			</tr>
			<tr>
				<!--MENU-->
				<td align="center">
					|| <a href="index.php?pag=home">Home</a> ||
					<a href="index.php?pag=listar">Listar</a> ||
					<a href="index.php?pag=inserir">Inserir</a> ||
					<a href="index.php?pag=buscar">Buscar</a> ||
				</td>	
			</tr>
			<tr>
				<!--CORPO-->
				<td align="center">
					<br><br><br>
						<?php
							if(isset($_GET["pag"]) and !empty($_GET["pag"])){
								$pg = $_GET["pag"];
								require_once($pg.'.php');
							}else{
								require_once("home.php");
							}
							
						?>
					<br><br><br>
				</td>	
			</tr>
			<tr>
				<!--CONTATO-->
				<td align="center"><h1>Contato</h1>
				</td>	
			</tr>
		</table>
	</body>
</html>