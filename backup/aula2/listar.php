<?php
	$query = 'SELECT id_contato, nome, email, telefone FROM contato';
	$res = mysql_query($query, $link) or die(mysql_error());
	$numero_linhas = mysql_num_rows($res);

	if($numero_linhas>0){
		echo $numero_linhas." registro(s) encontrados!<br>";

		while ($linha = mysql_fetch_array($res)) {

			$id_contato = $linha['id_contato'];
			$nome = $linha['nome'];
			$email = $linha['email'];
			$telefone = $linha['telefone'];

			$tab = '<tr>';
			$tab .= '<td align="center"><a href="">Editar || </a><a href="">Excluir</a></td>';
			$tab .= '<td>'.$id_contato.'</td>';
			$tab .= '<td>'.$nome.'</td>';
			$tab .= '<td>'.$email.'</td>';
			$tab .= '<td>'.$telefone.'</td>';
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
	</tr>

	<?php 
		foreach ($linha_formatada as $key => $value) {
			echo $value;
	} ?>
</table>