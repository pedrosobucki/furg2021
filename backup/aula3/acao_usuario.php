<?php
	require_once "conexao.php";
	$acao=$_REQUEST["acao"];

	switch ($acao) {
		case "inserir":
			$nome=$_POST["nome"];
			$email=$_POST["email"];
			$telefone=$_POST["telefone"];
			$id_cargo=$_POST["cargo"];

			$query = 'INSERT INTO contato(nome, email, telefone, id_cargo) VALUES("'.$nome.'","'.$email.'","'.$telefone.'","'.$id_cargo.'")';

			$res = mysql_query($query,$link) or die(mysql_error());
			
			header("Location: index.php?pag=inserir&status=ok");
			exit();

			break;
		case "cargo":
			$cargo=$_POST["cargo"];
			
			$query = 'INSERT INTO cargo(cargo_nome) VALUES("'.$cargo.'")';

			if($res = mysql_query($query,$link)){
				$estado='ok';
			}else{
				$estado='falha';
				echo mysql_error()."<br>";
			}

			header("Location: index.php?pag=cargo&status=ok");
			exit();

			break;
		case "editar":

			$id_contato=$_POST["id_contato"];
			$nome=$_POST["nome"];
			$email=$_POST["email"];
			$telefone=$_POST["telefone"];

			$query = 'UPDATE contato 
					  SET nome="'.$nome.'",
					  	  email="'.$email.'",
					      telefone="'.$telefone.'"
					      WHERE id_contato = '.$id_contato;

			$res = mysql_query($query,$link) or die(mysql_error());

			header("Location: index.php?pag=listar&status=ok");
			exit();

			break;
		case "excluir":
			$id_contato=$_GET['id_contato'];

			$query = 'DELETE FROM contato WHERE id_contato='.$id_contato;

			$res = mysql_query($query,$link) or die(mysql_error());
			
			header("Location: index.php?pag=listar&status=ok");
			exit();

			break;
		default:
			echo "acao invalida";
			break;
	}

	header("Location: index.php?pag=home&status=ok");
	exit();
?>