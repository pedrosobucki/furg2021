<form method="POST" action="acao_usuario.php">
	<input type="hidden" name="acao" value="inserir_cargo">

	<?php
		if(isset($_GET["status"]) and !empty($_GET["status"])){
			if($_GET["status"]=="ok"){
				echo '<p class="text-large">Cargo inserido com sucesso!<br><br></p>';
			}else if($_GET["status"]=="falha"){
				echo '<p class="text-large">Falha na inserção de cargo!<br><br></p>';
			}
		}
	?>

    <div class="text-insert">
        <p class="text-large">CARGO: <input type="text" name="cargo" class="text-large"><br><br></p>
    </div>

	<input type="submit" name="botao" value="ENVIAR" class="button text-large bold">
</form>