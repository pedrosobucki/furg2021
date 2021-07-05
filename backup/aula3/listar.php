<?php
	$query = 'SELECT id_contato, nome, email, telefone, id_cargo FROM contato';
	$res = mysql_query($query, $link) or die(mysql_error());
	$numero_linhas = mysql_num_rows($res);

	if($numero_linhas>0){
		echo $numero_linhas." registro(s) encontrados!<br>";

		while ($linha = mysql_fetch_array($res)) {

			$id_contato = $linha['id_contato'];
			$nome = $linha['nome'];
			$email = $linha['email'];
			$telefone = $linha['telefone'];
			$id_cargo = $linha['id_cargo'];

			$query = 'SELECT cargo_nome FROM cargo WHERE id_cargo='.$id_cargo;
			$res_cargo = mysql_query($query, $link) or die(mysql_error());
			$res_cargo = mysql_fetch_array($res_cargo);
			$cargo_nome = $res_cargo['cargo_nome'];
			

			$tab = '<tr>';
			$tab .= '<td align="center">
			<a href="index.php?pag=editar_contato&id_contato='.$id_contato.'">Editar || </a>
			<a href="acao_usuario.php?acao=excluir&id_contato='.$id_contato.'">Excluir</a></td>';
			$tab .= '<td>'.$id_contato.'</td>';
			$tab .= '<td>'.$nome.'</td>';
			$tab .= '<td>'.$email.'</td>';
			$tab .= '<td>'.$telefone.'</td>';
			$tab .= '<td>'.$cargo_nome.'</td>';
			$tab .= '</tr>';

			$linha_formatada[] = $tab;
		}
	}else{
		echo "Nenhum registro encontrado!";
	}
?>

<table width=100% border="1">
	<tr align="center">
		<td>EDITAR/EXCLUIR</td>
		<td>ID</td>
		<td>NOME</td>
		<td>E-MAIL</td>
		<td>TELEFONE</td>
		<td>CARGO</td>
	</tr>

	<?php 
		foreach ($linha_formatada as $key => $value) {
			echo $value;
	} ?>
</table>