<?php
	(isset($_GET['id_contato'])) ? $id_contato=$_GET['id_contato'] : false;

	$query = 'SELECT id_contato, nome, email, telefone FROM contato WHERE id_contato = ?';
	$stmt = mysqli_stmt_init($link);
		
	try{
		mysqli_stmt_prepare($stmt, $query);
		mysqli_stmt_bind_param($stmt, "s", $id_contato);
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

	}
?>

<form method="POST" action="acao_usuario.php">
	<input type="hidden" name="acao" value="editar_contato">
	<input type="hidden" name="id_contato" value="<?php echo $id_contato?>">

	Nome: <input type="text" name="nome" value="<?php echo $nome?>"><br>
	e-mail: <input type="text" name="email" value="<?php echo $email?>"><br>
	Telefone: <input type="text" name="telefone" value="<?php echo $telefone?>"><br><br>

	<input type="submit" name="botao" value="Enviar">
</form>