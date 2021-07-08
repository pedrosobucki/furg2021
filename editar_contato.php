<?php
	(isset($_GET['id_contato'])) ? $id_contato=$_GET['id_contato'] : false;

	$query = 'SELECT id_contato, nome, email, telefone, id_cargo FROM contato WHERE id_contato = ?';
	$stmt = mysqli_stmt_init($link);
		
	try{
		mysqli_stmt_prepare($stmt, $query);
		mysqli_stmt_bind_param($stmt, "i", $id_contato);
		if(mysqli_stmt_execute($stmt)){
			echo mysqli_stmt_affected_rows($stmt)." row(s) affected!<br>";
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
?>

<form method="POST" action="acao_usuario.php">
	<input type="hidden" name="acao" value="editar_contato">
	<input type="hidden" name="id_contato" value="<?php echo $id_contato?>">

	<?php
		$option=array();
		$query = 'SELECT id_cargo, cargo_nome FROM cargo';
		$stmt = mysqli_stmt_init($link);
		mysqli_stmt_prepare($stmt, $query);
		mysqli_stmt_execute($stmt);

		$res=mysqli_stmt_get_result($stmt);
		$numero_linhas=mysqli_num_rows($res);

		while($linha = mysqli_fetch_array($res)){
			$id_cargo_seletor=$linha['id_cargo'];
			$cargo_nome=$linha['cargo_nome'];

			if($id_cargo_seletor==$id_cargo){
				$tab='<option selected="selected" value="'.$id_cargo_seletor.'">'.$cargo_nome.'</option>';	
			}else{
				$tab='<option value="'.$id_cargo_seletor.'">'.$cargo_nome.'</option>';
			}
		

			$option[]=$tab;
		}
	?>

	<div class="text-insert">
			<p class="text-large">NOME:<input type="text" name="nome" value="<?php echo $nome?>" class="text-large"><br></p>
			<p class="text-large">E-MAIL: <input type="text" name="email" value="<?php echo $email?>" class="text-large"><br></p>
			<p class="text-large">TELEFONE: <input type="number" name="telefone" value="<?php echo $telefone?>" class="text-large"><br><br></p>

			<select name="cargo" class="text-large">
				<?php 
				foreach ($option as $key => $value) {
					echo $value;
				} ?>
			</select>
	</div>

	<input type="submit" name="botao" value="ENVIAR" class="button text-large bold">
</form>