<form method="POST" action="acao_usuario.php">
	<input type="hidden" name="acao" value="inserir_contato">

	<?php
		if(isset($_GET["status"]) and !empty($_GET["status"])){
			if($_GET["status"]=="ok"){
				echo '<p class="text-large">Dados inseridos com sucesso!<br><br></p>';
			}else if($_GET["status"]=="falha"){
				echo '<p class="text-large">Falha na inserção de dados!<br><br></p>';
			}
		}
	?>

	<div class="text-insert">
			<p class="text-large">NOME:<input type="text" name="nome" class="text-large"><br></p>
			<p class="text-large">E-MAIL: <input type="text" name="email" class="text-large"><br></p>
			<p class="text-large">TELEFONE: <input type="number" name="telefone" class="text-large"><br><br></p>
	</div>
	

	<input type="submit" name="botao" value="ENVIAR" class="button text-large bold">
</form>