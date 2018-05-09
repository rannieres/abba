<html>
<head>
	<meta charset="utf-8">
	<title>Laboratorio Abba</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
</head>
<body>
	<div class="container">
		<div class="nomedentista">
			<div class="nomedent"><?php echo $_POST['dentista']; ?></div>
			<div class="datam">Fechamento <?php echo $_POST['mes'].'/'.$_POST['ano'];?></div>
		</div>
		<table>
			<tr>
				<th class="numero">Nº</th>
				<th class="data">Data</th>
				<th class="desc">Descrição</th>
				<th class="paciente">Paciente</th>
				<th class="valor">Valor</th>
			</tr>
			<?php
			require 'config.php';
			if(isset($_POST['ano']) && isset($_POST['mes']) && isset($_POST['dentista']) && empty($_POST['ano']) == false && empty($_POST['mes']) == false && empty($_POST['dentista']) == false) {
				$ano = $_POST['ano'];
				$mes = $_POST['mes'];
				$dentista = $_POST['dentista'];
				$sql = "SELECT * FROM fechamento WHERE ano = '$ano' AND cliente = '$dentista' AND mes = '$mes' ORDER BY dia";
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
					echo '<tr><td colspan="5">Nenhum dado encontrado</td></tr>';
				}
			}else{
				header("Location: index.php");
			}
			?>
		</table>
		
	</div>
</body>
</html>