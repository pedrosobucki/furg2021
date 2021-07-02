<?php require_once "conexao.php"; ?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>Aula 1</title>
		<link rel="stylesheet" type="text/css" href="estilo.css">
	</head>
	<body>
		<header>
			<div id="header-wrapper">
				<h1 id="header-text" class="bold">HEADER</h1>
			</div>
		</header>
			<!--BANNER-->
			<div id="banner-wrapper">
				<div id="banner-text" class="centered">
					<h1 class="bold">BANNER</h1>
					<br><br><br>
				</div>
			</div>
			

			<!--MENU-->
			<!--<nav>-->
				<ul class="menu" class="centered">
					<li><a href="index.php?pag=home"><p class="bold">HOME</p></a></li>
					<li><a href="index.php?pag=listar"><p class="bold">LISTAR</p></a></li>
					<li><a href=""><p class="bold">INSERIR</p></a>
						<ul class="submenu">
							<li><a href="index.php?pag=inserir_contato"><p class="bold">CONTATO</p></a></li>
							<li><a href="index.php?pag=inserir_cargo"><p class="bold">CARGO</p></a></li>
						</ul>
					</li>
					<li><a href="index.php?pag=buscar"><p class="bold">BUSCAR</p></a></li>
				</ul>
			<!--</nav>-->
			

			<!--CORPO-->
			<div id="corpo-wrapper">
				<div id="corpo" class="centered">
					<?php
						if(isset($_GET["pag"]) and !empty($_GET["pag"])){
							$pg = $_GET["pag"];
							require_once($pg.'.php');
						}else{						
							require_once("home.php");
						}	
					?>
				</div>
			</div>
	</body>

	<!--CONTATO-->
	<div class="footer-wrapper">
			<footer class="centered">
				<h1>CONTATO</h1>
			</footer>
	</div>

</html>