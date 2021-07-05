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

			if($res = mysql_query($query,$link)){
				$estado='ok';
			}else{
				$estado='falha';
				echo mysql_error()."<br>";
			}
			
			break;
		case "cargo":
			$cargo=$conteudo_recebido["cargo"];
			
			$query = 'INSERT INTO cargo(cargo_nome) VALUES("'.$cargo.'")';

			if($res = mysql_query($query,$link)){
				$estado='ok';
			}else{
				$estado='falha';
				echo mysql_error()."<br>";
			}

			break;
		case "editar":
				
			break;
		case "excluir":
				
			break;
		default:
			echo "acao invalida";
			break;
	}

	header('Location: index.php?pag='.$acao.'&status='.$estado);
	exit();
?>