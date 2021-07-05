<?php
	(isset($_GET['id_contato'])) ? $id_contato=$_GET['id_contato'] : false;

	$query = 'SELECT id_contato, nome, email, telefone FROM contato WHERE id_contato = '.$id_contato;

	$res=mysql_query($query, $link);
	while ($linha = mysql_fetch_array($res)) {

		$id_contato = $linha['id_contato'];
			$nome = $linha['nome'];
			$email = $linha['email'];
			$telefone = $linha['telefone'];

	}
?>

<form method="POST" action="acao_usuario.php">
	<input type="hidden" name="acao" value="editar">
	<input type="hidden" name="id_contato" value="<?php echo $id_contato?>">

	Nome: <input type="text" name="nome" value="<?php echo $nome?>"><br>
	e-mail: <input type="text" name="email" value="<?php echo $email?>"><br>
	Telefone: <input type="text" name="telefone" value="<?php echo $telefone?>"><br><br>

	<input type="submit" name="botao" value="Enviar">
</form>