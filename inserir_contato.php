<form method="POST" action="acao_usuario.php">
	<input type="hidden" name="acao" value="inserir_contato">

	<?php
		//mensagem de sucesso ou falha
		if(isset($_GET["status"]) and !empty($_GET["status"])){
			if($_GET["status"]=="ok"){
				echo '<p class="text-large">Dados inseridos com sucesso!<br><br></p>';
			}else if($_GET["status"]=="falha"){
				echo '<p class="text-large">Falha na inserção de dados!<br><br></p>';
			}
		}

		//seletor de cargo
		$option=array();
		$query = 'SELECT id_cargo, cargo_nome FROM cargo';
		$stmt = mysqli_stmt_init($link);
		mysqli_stmt_prepare($stmt, $query);
		mysqli_stmt_execute($stmt);

		$res=mysqli_stmt_get_result($stmt);
		$numero_linhas=mysqli_num_rows($res);

		while($linha = mysqli_fetch_array($res)){
			$id_cargo=$linha['id_cargo'];
			$cargo_nome=$linha['cargo_nome'];

			$tab='<option value="'.$id_cargo.'">'.$cargo_nome.'</option>';

			$option[]=$tab;
		}
	?>

	<div class="text-insert">
			<p class="text-large">NOME:<input type="text" name="nome" class="text-large"><br></p>
			<p class="text-large">E-MAIL: <input type="text" name="email" class="text-large"><br></p>
			<p class="text-large">TELEFONE: <input type="number" name="telefone" class="text-large"><br><br></p>

			<select name="cargo" class="text-large">
				<?php 
				foreach ($option as $key => $value) {
					echo $value;
				} ?>
			</select>
	</div>
	

	<input type="submit" name="botao" value="ENVIAR" class="button text-large bold">
</form>