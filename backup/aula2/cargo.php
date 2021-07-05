<form method="POST" action="acao_usuario.php">
	<input type="hidden" name="acao" value="cargo">

	<?php
		if(isset($_GET["status"]) and !empty($_GET["status"])){
			if($_GET["status"]=="ok"){
				echo "Cargo inserido com sucesso!<br><br>";
			}else if($_GET["status"]=="falha"){
				echo 'Falha na inserção de cargo!<br><br>';
			}
		}
	?>

	Cargo: <input type="text" name="cargo"><br><br>

	<input type="submit" name="botao" value="Enviar">
</form>