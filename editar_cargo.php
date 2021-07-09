<?php
	(isset($_GET['id_cargo'])) ? $id_cargo=$_GET['id_cargo'] : false;

	$query = 'SELECT id_cargo, cargo_nome FROM cargo WHERE id_cargo = ?';
	$stmt = mysqli_stmt_init($link);
		
	try{
		mysqli_stmt_prepare($stmt, $query);
		mysqli_stmt_bind_param($stmt, "i", $id_cargo);
		if(mysqli_stmt_execute($stmt)){
			//echo mysqli_stmt_affected_rows($stmt)." row(s) affected!<br>";
			//die;
			$estado='ok';
		}else{
			$estado='falha';
		}
	}catch(Exception $e){
		echo "An exception occurred, unable to update item!";
		die;
	}

	$res=mysqli_stmt_get_result($stmt);
	while ($linha = mysqli_fetch_array($res)) {

		$id_cargo = $linha['id_cargo'];
		$cargo_nome = $linha['cargo_nome'];

	}
?>
<div class="form-wrapper">
<form method="POST" action="acao_usuario.php" class="insert-form text-large uppercase">
	<input type="hidden" name="acao" value="editar_cargo">
	<input type="hidden" name="id_cargo" value="<?php echo $id_cargo?>">

	<div class="information">
		<div class="insert-nome-cargo">Cargo<br><input type="text" name="cargo" class="text-large" value="<?php echo $cargo_nome?>"><br></div>
		<br>
		<input type="submit" name="botao" value="Enviar" class="button text-large">
	</div>

	
</form>
</div>
