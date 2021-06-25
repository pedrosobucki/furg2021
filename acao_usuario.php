<?php

	$conteudo_recebido=$_POST;
	$acao=$conteudo_recebido["acao"];

	switch ($acao) {
		case 'value':
			case "inserir":
				$nome=$conteudo_recebido["nome"];
				$email=$conteudo_recebido["email"];
				$telefone=$conteudo_recebido["telefone"];

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