<?php
	$query = 'SELECT id_contato, nome, email, telefone FROM contato';
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

			$tab =
			'<div class="row">
				<div class="cell" data-title="editar-excluir">
					<a href="">Editar || </a><a href="">Excluir</a></td>
				</div>
				<div class="cell" data-title="id">
					'.$id_contato.'
				</div>
				<div class="cell" data-title="nome">
					'.$nome.'
				</div>
				<div class="cell" data-title="email">
					'.$email.'
				</div>
				<div class="cell" data-title="telefone">
					'.$telefone.'
			</div>';

			$tab =
			'<tr><td class="editar-excluir"><a href="">Editar</a> || <a href="">Excluir</a></td>
			<td class="id">'.$id_contato.'</td>
			<td class="nome">'.$nome.'</td>
			<td class="email">'.$email.'</td>
			<td class="telefone">'.$telefone.'</td></tr>';

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
		</thead>

		<tbody>
		<?php 
			foreach ($linha_formatada as $key => $value) {
				echo $value;
			}
		?>
		
		</tbody>
	</table>
	<!--
	<div class="wrapper">
		<div class="table">
			<div class="row-header">
				<div class="cell">
					Editar/Excluir
				</div>
				<div class="cell">
					ID
				</div>
				<div class="cell">
					Nome
				</div>
				<div class="cell">
					e-mail
				</div>
				<div class="cell">
					Telefone
				</div>
			</div>
		</div>
	</div>-->