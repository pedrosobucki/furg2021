<form method="POST" action="acao_usuario.php">
	<input type="hidden" name="acao" value="inserir">

	<?php
		if(isset($_GET["status"]) and !empty($_GET["status"])){
			if($_GET["status"]=="ok"){
				echo "Dados inseridos com sucesso!<br><br>";
			}else{
				echo "Falha na inserção de dados!<br><br>";
			}
		}
	?>

	Nome: <input type="text" name="nome"><br>
	e-mail: <input type="text" name="email"><br>
	Telefone: <input type="number" name="telefone"><br><br>

	<input type="submit" name="botao" value="Enviar">
</form>