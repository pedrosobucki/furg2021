<?php
	$query = 'SELECT id_cargo, cargo_nome FROM cargo';
	$stmt = mysqli_stmt_init($link);
	mysqli_stmt_prepare($stmt, $query);
	mysqli_stmt_execute($stmt);
	$res = mysqli_stmt_get_result($stmt);

	$numero_linhas = mysqli_num_rows($res);
	$linha_formatada = array();

	if($numero_linhas>0){
		echo '<p class="text-large">'.$numero_linhas.' registro(s) encontrados!<br><br></p>';

		while ($linha = mysqli_fetch_array($res)) {

			$id_cargo = $linha['id_cargo'];
			$cargo_nome = $linha['cargo_nome'];

			$tab =
			'<tr><td class="editar-excluir">
			<a href="index.php?pag=editar_cargo&id_cargo='.$id_cargo.'">Editar</a> || 
			<a href="acao_usuario.php?acao=excluir_cargo&id_cargo='.$id_cargo.'">Excluir</a></td>
			<td class="id">'.$id_cargo.'</td>
			<td class="cargo_nome">'.$cargo_nome.'</td></tr>';

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