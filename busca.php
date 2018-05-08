<html>
<head>
	<meta charset="utf-8">
	<title>Laboratorio Abba</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
</head>
<body>
	<?php 
		require 'config.php';
	?>
	<div class="container">
		<table>
			<tr>
				<th class="numero">Nº</th>
				<th class="data">Data</th>
				<th class="desc">Descrição</th>
				<th class="paciente">Paciente</th>
				<th class="valor">Valor</th>
			</tr>
			<?php
			$data = $_POST('data');
			$dentista = array_values($_POST('dentista'));
			$sql = "SELECT * FROM fechamento WHERE ano = '&data' AND cliente = '$dentista' ";
			$sql = $pdo->query($sql);
			if($sql->rowCount() > 0){
				foreach($sql -> fetchAll() as $info){
					echo '<tr>';
					echo '<td>'.$info['numero'].'</td>';
					echo '<td>'.$info['dia'].'/';
					echo $info['mes'].'/';
					echo $info['ano'].'</td>';
					echo '<td>'.$info['descricao'].'</td>';
					echo '<td>'.$info['paciente'].'</td>';
					echo '<td>'.$info['valor'].'</td>';
					echo '</tr>';
				}
			}else{
				echo "Nenhum dado encontrado";
			}
			?>
		</table>
		
	</div>
</body>
</html>