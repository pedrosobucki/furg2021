<?php
	require_once "conexao.php";
	$conteudo_recebido=$_POST;
	$acao=$conteudo_recebido["acao"];

	switch ($acao) {
		case "inserir":
			$nome=$conteudo_recebido["nome"];
			$email=$conteudo_recebido["email"];
			$telefone=$conteudo_recebido["telefone"];

			$query = 'INSERT INTO contato(nome, email, telefone) VALUES("'.$nome.'","'.$email.'","'.$telefone.'")';

			$res = mysql_query($query,$link) or die(mysql_error());
			
			break;
		case "editar":
				
			break;
		case "excluir":
				
			break;
		default:
			echo "acao invalida";
			break;
	}

	header("Location: index.php?pag=inserir&status=ok");
	exit();
?>