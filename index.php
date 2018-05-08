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
			$sql = "SELECT * FROM fechamento";
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
	<div class='container'>
		<form method="POST" action="busca.php">
			<select name="dentista">
				<?php
				$sql = "SELECT * FROM clientes";
				$sql = $pdo->query($sql);
				if($sql->rowCount() > 0){
					foreach($sql -> fetchAll() as $clientes){ 
						echo '<option value="'.$clientes['cliente'].'">'.$clientes['cliente'].' </option>';
					}
				}else{
					echo "Nenhum dado encontrado";
				}
				?>

			</select>
			<select name="data">
				<option value="2018">2018</option>
				<option value="2019">2019</option>
				<option value="2020">2020</option>
				<option value="2021">2021</option>
				<option value="2022">2022</option>
				<option value="2023">2023</option>
				<option value="2024">2024</option>
				<option value="2025">2025</option>
				<option value="2026">2026</option>
				<option value="2027">2027</option>
				<option value="2028">2028</option>
				<option value="2029">2029</option>
				<option value="2030">2030</option>*/
			</select>
			<input type="submit" value="Buscar">
		</form>
	</div>
</body>
</html>