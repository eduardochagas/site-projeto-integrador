<?php
	include_once 'sqlcmd.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agendamento Clientes</title>
	<link rel="stylesheet" href="_css/styleTabelaAgendamento.css">
</head>
<body>
	<h2 id="titulo">Agendamento dos Clientes</h2>


	<div>
		<table id="tabela">
			
				<!--<td>Id</td>-->
				<th>Nome</th>
				<th>Empresa</th>
				<th>Email</th>
				<th>Telefone</th>
				<th>DiaDaVisita</th>
				<th>HorárioDaVisita</th>
				<th>Assunto</th>
				<th>Descrição</th>
			
				<?php

				$con = new SqlCmd();
				//$resultado = $con->selectSql("SELECT * FROM usuario");
				$resultado = $con->selectSql("SELECT * FROM agendaVisita");

				//var_dump($resultado);

				foreach ($resultado as $res) {

					echo '<tr>';
						//echo '<td>'. $res['id'] .'</td>';
						echo '<td>'. $res['nome'] .'</td>';
						echo '<td>'. $res['empresa'] .'</td>';
						echo '<td>'. $res['email'] .'</td>';
						echo '<td>'. $res['telefone'] .'</td>';
						echo '<td>'. $res['diaDaVisita'] .'</td>';
						echo '<td>'. $res['horarioDaVisita'] .'</td>';
						echo '<td>'. $res['assunto'] .'</td>';
						echo '<td>'. $res['descricao'] .'</td>';
					echo '</tr>';
				}		


				
				?>
			</tr>
			<br/>
		</table>
	</div>
	
</body>
</html>