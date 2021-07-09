<div class="form-wrapper">
<form method="POST" action="acao_usuario.php" class="insert-form text-large uppercase">
	<input type="hidden" name="acao" value="inserir_contato">

	<?php
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
	
	<div class="information">
		<?php
		//mensagem de sucesso ou falha
		if(isset($_GET["status"]) and !empty($_GET["status"])){
			if($_GET["status"]=="ok"){
				echo '<p class="text-large">Dados inseridos com sucesso!<br><br></p>';
			}else if($_GET["status"]=="falha"){
				echo '<p class="text-large">Falha na inserção de dados!<br><br></p>';
			}
		}
		?>
	
		<div class="insert-name">Nome<br><input type="text" name="nome" class="text-large"></div>
		<div class="insert-email">e-mail<br><input type="text" name="email" class="text-large"></div>
		<div class="insert-telefone">Telefone<br><input type="text" name="telefone" class="text-large"></div>
		<div class="insert-cargo">Cargo<br><select name="cargo" class="text-large">
					<?php 
					foreach ($option as $key => $value) {
						echo $value;
					} ?>
			</select>
			</div>

			<br>

		<input type="submit" name="botao" value="Enviar" class="button text-large">
	</div>

</form>
</div>