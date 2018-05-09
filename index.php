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
		<a href="index.php"><button class="add">Atualizar Página</button></a>
		<table>
			<tr>
				<th class="numero">Nº</th>
				<th class="data">Data</th>
				<th class="desc">Descrição</th>
				<th class="paciente">Paciente</th>
				<th class="valor">Valor</th>
				<th class="clinica">Clinica</th>
				<th class="blank"></th>
			</tr>
			<?php
			$sql = "SELECT * FROM fechamento ORDER BY id DESC";
			$sql = $pdo->query($sql);
			if($sql->rowCount() > 0){
				foreach($sql -> fetchAll() as $info){
					echo '<tr>';
					echo '<td class="centro">'.$info['numero'].'</td>';
					echo '<td>'.$info['dia'].'/';
					echo $info['mes'].'/';
					echo $info['ano'].'</td>';
					echo '<td>'.$info['descricao'].'</td>';
					echo '<td>'.$info['paciente'].'</td>';
					echo '<td class="centro">'.$info['valor'].'</td>';
					echo '<td>'.$info['cliente'].'</td>';
					echo '<td><a href="editar.php?id='.$info['id'].'"><button>Editar</button></a></td>' ;
					echo '</tr>';
				}
			}else{
				echo "Nenhum dado encontrado";
			}
			?>
		</table>
		
	</div>
	<div class='container busca'>
		<form method="POST" action="busca.php" class="campodebusca" target="_blank" />
			Clinica: 
			<select name="dentista">
				<?php
				$sql = "SELECT cliente FROM fechamento GROUP BY cliente";
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
			Data:
			<select name="mes">
				<option value="01">Janeiro</option>
				<option value="02">Fevereiro</option>
				<option value="03">Março</option>
				<option value="04">Abril</option>
				<option value="05">Maio</option>
				<option value="06">Junho</option>
				<option value="07">Julho</option>
				<option value="08">Agosto</option>
				<option value="09">Setembro</option>
				<option value="10">Outubro</option>
				<option value="11">Novembro</option>
				<option value="12">Dezembro</option>
			</select>
			<select name="ano">
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
				<option value="2030">2030</option>
			</select>
			<input type="submit" value="Buscar" target="_blank" />
		</form>
		<a href="index.php"><button class="add">Atualizar Página</button></a>
	</div>
	<iframe src="adicionar.php" class="iframeadicionar"></iframe>
	<iframe src="addcliente.php" class="iframenovocliente"></iframe>
	<div class="listacliente">
		
	</div>
</body>
</html>