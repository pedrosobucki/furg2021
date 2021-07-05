<form method="POST" action="acao_usuario.php">
	<input type="hidden" name="acao" value="inserir">

	Nome: <input type="text" name="nome"><br>
	e-mail: <input type="text" name="email"><br>
	Telefone: <input type="text" name="telefone"><br><br>

	<?php
		$option=array();
		$query = 'SELECT id_cargo, cargo_nome FROM cargo';
		$res=mysql_query($query,$link);
		$numero_linhas=mysql_num_rows($res);

		while($linha = mysql_fetch_array($res)){
			$id_cargo=$linha['id_cargo'];
			$cargo_nome=$linha['cargo_nome'];

			$tab='<option value="'.$id_cargo.'">'.$cargo_nome.'</option>';

			$option[]=$tab;
		}
	?>

	<select name="cargo">
		<?php 
		foreach ($option as $key => $value) {
			echo $value;
	} ?>
	</select>

	<input type="submit" name="botao" value="Enviar">
</form>