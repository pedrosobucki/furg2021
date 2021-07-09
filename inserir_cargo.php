<div class="form-wrapper">
<form method="POST" action="acao_usuario.php" class="insert-form text-large uppercase">
	<input type="hidden" name="acao" value="inserir_cargo">

    <div class="text-insert">
	<?php
		//mensagem de sucesso ou falha
		if(isset($_GET["status"]) and !empty($_GET["status"])){
			if($_GET["status"]=="ok"){
				echo '<p class="text-large">Cargo inserido com sucesso!<br><br></p>';
			}else if($_GET["status"]=="falha"){
				echo '<p class="text-large">Falha na inserção de cargo!<br><br></p>';
			}
		}
	?>
        <p class="text-large">CARGO<br><input type="text" name="cargo" class="text-large"><br><br></p>
		<input type="submit" name="botao" value="ENVIAR" class="button text-large bold">
    </div>

</form>
</div>