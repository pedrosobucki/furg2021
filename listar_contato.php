<?php
	//mensagem de sucesso ou falha
	if(isset($_GET["status"]) and !empty($_GET["status"])){
		if($_GET["status"]=="ok"){
			echo '<p class="text-large">Dados inseridos com sucesso!<br><br></p>';
		}else if($_GET["status"]=="falha"){
			echo '<p class="text-large">Falha na inserção de dados!<br><br></p>';
		}
	}
	
	$query = 'SELECT id_contato, nome, email, telefone, id_cargo FROM contato';
	$stmt = mysqli_stmt_init($link);
	mysqli_stmt_prepare($stmt, $query);
	mysqli_stmt_execute($stmt);
	$res = mysqli_stmt_get_result($stmt);

	$numero_linhas = mysqli_num_rows($res);
	$linha_formatada = array();

	if($numero_linhas>0){
		echo '<p class="text-large">'.$numero_linhas.' registro(s) encontrados!<br><br></p>';

		while ($linha = mysqli_fetch_array($res)) {

			$id_contato = $linha['id_contato'];
			$nome = $linha['nome'];
			$email = $linha['email'];
			$telefone = $linha['telefone'];
			$id_cargo = $linha['id_cargo'];

			$query = 'SELECT cargo_nome FROM cargo WHERE id_cargo = ?';
			$stmt = mysqli_stmt_init($link);
			mysqli_stmt_prepare($stmt, $query);
			mysqli_stmt_bind_param($stmt, "i", $id_cargo);
			if(mysqli_stmt_execute($stmt)){
				$res_cargo = mysqli_stmt_get_result($stmt);
				$cargo_nome = mysqli_fetch_array($res_cargo)['cargo_nome'];
			}else{
				echo "Deu errado!<br>".mysqli_stmt_error($stmt);
				die;
			}
			

			$tab =
			'<tr><td class="editar-excluir">
			<a href="index.php?pag=editar_contato&id_contato='.$id_contato.'">Editar</a> || 
			<a href="acao_usuario.php?acao=excluir_contato&id_contato='.$id_contato.'">Excluir</a></td>
			<td class="id">'.$id_contato.'</td>
			<td class="nome">'.$nome.'</td>
			<td class="email">'.$email.'</td>
			<td class="telefone">'.$telefone.'</td>
			<td class="cargo">'.$cargo_nome.'</td></tr>';

			$linha_formatada[] = $tab;
		}
	}else{
		echo "Nenhum registro encontrado!";
	}
?>

	<table>
		<thead>
			<th>Editar / Excluir</th>
			<th>ID</th>
			<th>Nome</th>
			<th>e-mail</th>
			<th>Telefone</th>
			<th>Cargo</th>
		</thead>

		<tbody>
		<?php 
			foreach ($linha_formatada as $key => $value) {
				echo $value;
			}
		?>
		
		</tbody>
	</table>