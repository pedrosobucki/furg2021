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
<<<<<<< Updated upstream
				echo "An exception occurred, unable to update item!";
				$estado='falha';
				die;
			}
			//*/
			break;
		case "editar":
				
			break;
		case "excluir":
				
=======
				echo "An exception occurred, unable to update item!<br>".$e;
				$estado='falha';
				die;
			}
			
			header('Location: index.php?pag=inserir_cargo&status='.$estado);
			exit();

			break;
		case "editar_contato":

			$id_contato=$_POST["id_contato"];
			$nome=$_POST["nome"];
			$email=$_POST["email"];
			$telefone=$_POST["telefone"];
			$id_cargo=$_POST["cargo"];

			$query = 'UPDATE contato 
					  SET nome = ?, 
					  	  email = ?,
					      telefone = ?,
						  id_cargo = ?
					  WHERE id_contato = ?';

			$stmt = mysqli_stmt_init($link);
			try{
				mysqli_stmt_prepare($stmt, $query);
				mysqli_stmt_bind_param($stmt, "ssiii", $nome, $email, $telefone, $id_cargo, $id_contato);

				if(mysqli_stmt_execute($stmt)){
					echo mysqli_stmt_affected_rows($stmt)."row(s) affected!<br>";
					$estado='ok';
				}else{
					echo mysqli_stmt_error($stmt);
					die;
					$estado='falha';
				}
			}catch(Exception $e){
				echo "An exception occurred, unable to update item!<br>".$e;
				$estado='falha';
				die;
			}

			header("Location: index.php?pag=listar_contato&status=".$estado);
			exit();

			break;
		case "editar_cargo":

			$id_cargo=$_POST["id_cargo"];
			$cargo_nome=$_POST["cargo_nome"];

			$query = 'UPDATE cargo 
					  SET cargo_nome = ?
					  WHERE id_cargo = ?';

			$stmt = mysqli_stmt_init($link);
			try{
				mysqli_stmt_prepare($stmt, $query);
				mysqli_stmt_bind_param($stmt, "si", $cargo_nome, $id_cargo);

				if(mysqli_stmt_execute($stmt)){
					//echo mysqli_stmt_affected_rows($stmt)."row(s) affected!<br>";
					$estado='ok';
				}else{
					$estado='falha';
				}
			}catch(Exception $e){
				echo "An exception occurred, unable to update item!<br>".$e;
				$estado='falha';
				die;
			}

			header("Location: index.php?pag=listar_cargo&status=".$estado);
			exit();

			break;
		case "excluir_contato":
			$id_contato=$_GET['id_contato'];

			$query = 'DELETE FROM contato WHERE id_contato = ?';

			$stmt = mysqli_stmt_init($link);
			try{
				mysqli_stmt_prepare($stmt, $query);
				mysqli_stmt_bind_param($stmt, "i", $id_contato);

				if(mysqli_stmt_execute($stmt)){
					echo mysqli_stmt_affected_rows($stmt)."row(s) affected!<br>";
					$estado='ok';
				}else{
					$estado='falha';
				}
			}catch(Exception $e){
				echo "An exception occurred, unable to update item!<br>".$e;
				$estado='falha';
				die;
			}
			
			header("Location: index.php?pag=listar_contato&status=".$estado);
			exit();

			break;
		case "excluir_cargo":
			$id_cargo=$_GET['id_cargo'];

			$query = 'DELETE FROM cargo WHERE id_cargo = ?';

			$stmt = mysqli_stmt_init($link);
			try{
				mysqli_stmt_prepare($stmt, $query);
				mysqli_stmt_bind_param($stmt, "i", $id_cargo);

				if(mysqli_stmt_execute($stmt)){
					echo mysqli_stmt_affected_rows($stmt)."row(s) affected!<br>";
					$estado='ok';
				}else{
					$estado='falha';
				}
			}catch(Exception $e){
				echo "An exception occurred, unable to update item!<br>".$e;
				$estado='falha';
				die;
			}
			
			header("Location: index.php?pag=listar_cargo&status=".$estado);
			exit();

>>>>>>> Stashed changes
			break;
		default:
			echo "acao invalida";
			break;
	}

	header('Location: index.php?pag='.$acao.'&status='.$estado);
	//mysqli_close($link);
	exit();
?>