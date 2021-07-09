<?php
	(isset($_GET['id_contato'])) ? $id_contato=$_GET['id_contato'] : false;

	$query = 'SELECT id_contato, nome, email, telefone, id_cargo FROM contato WHERE id_contato = ?';
	$stmt = mysqli_stmt_init($link);
		
	try{
		mysqli_stmt_prepare($stmt, $query);
		mysqli_stmt_bind_param($stmt, "i", $id_contato);
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

		$id_contato = $linha['id_contato'];
		$nome = $linha['nome'];
		$email = $linha['email'];
		$telefone = $linha['telefone'];
		$id_cargo = $linha['id_cargo'];

	}

	//selector
		$option=array();
		$query = 'SELECT id_cargo, cargo_nome FROM cargo';
		$stmt = mysqli_stmt_init($link);
		mysqli_stmt_prepare($stmt, $query);
		mysqli_stmt_execute($stmt);

		$res=mysqli_stmt_get_result($stmt);
		$numero_linhas=mysqli_num_rows($res);

		while($linha = mysqli_fetch_array($res)){
			$cargo_id=$linha['id_cargo'];
			$cargo_nome=$linha['cargo_nome'];

			if($cargo_id==$id_cargo){
				$tab='<option value="'.$cargo_id.'" selected>'.$cargo_nome.'</option>';
			}else{
				$tab='<option value="'.$cargo_id.'">'.$cargo_nome.'</option>';
			}
			

			$option[]=$tab;
		}
?>
<div class="form-wrapper">
<form method="POST" action="acao_usuario.php" class="insert-form text-large uppercase">
	<input type="hidden" name="acao" value="editar_contato">
	<input type="hidden" name="id_contato" value="<?php echo $id_contato?>">
	
	<div class="information">
		<div class="insert-name">Nome<br><input type="text" name="nome" class="text-large" value="<?php echo $nome?>"></div>
		<div class="insert-email">e-mail<br><input type="text" name="email" class="text-large" value="<?php echo $email?>"></div>
		<div class="insert-telefone">Telefone<br><input type="text" name="telefone" class="text-large" value="<?php echo $telefone?>"></div>
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