<?php
	require_once "conexao.php";
	$conteudo_recebido=$_POST;
	$acao=$conteudo_recebido["acao"];

	switch ($acao) {
		case "inserir_contato":
			$nome=$conteudo_recebido["nome"];
			$email=$conteudo_recebido["email"];
			$telefone=$conteudo_recebido["telefone"];
			
			$query = 'INSERT INTO contato(nome, email, telefone) VALUES (?,?,?)';
			$stmt = mysqli_stmt_init($link);
			
			try{
				mysqli_stmt_prepare($stmt, $query);
				mysqli_stmt_bind_param($stmt, "ssi", $nome, $email, $telefone);
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
		
			break;
		case "inserir_cargo":
			$cargo=$conteudo_recebido["cargo"];
			
			$query = 'INSERT INTO cargo(cargo_nome) VALUES (?)';
			//$query = 'INSERT INTO cargo(cargo_nome) VALUES ("'.$cargo.'")';
			//mysqli_query($link, $query);

			//*
			$stmt = mysqli_stmt_init($link);

			try{
				mysqli_stmt_prepare($stmt, $query);
				mysqli_stmt_bind_param($stmt, "s", $cargo);
				if(mysqli_stmt_execute($stmt)){
					echo mysqli_stmt_affected_rows($stmt)." row(s) affected!<br>";
					//die;
					$estado='ok';
				}else{
					$estado='falha';
				}
			}catch(Exception $e){
				echo "An exception occurred, unable to update item!";
				$estado='falha';
				die;
			}
			//*/
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
	//mysqli_close($link);
	exit();
?>