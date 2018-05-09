<html>
<head>
	<title>Laboratorio Abba</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
</head>
<body>
<div class="corpocliente">
	Clientes:<br/>
<?php
	require 'config.php';
	$sql = "SELECT * FROM clientes ORDER BY cliente ASC";
	$sql = $pdo->query($sql);
	if($sql->rowCount() > 0){
		foreach($sql -> fetchAll() as $info){
			echo '</div><a href="editarcliente.php?id='.$info['id'].'"><div class="listlink">Editar</div></a><div class="listacl">'.$info['cliente'].'<br/>';
		}
	}else{
		echo "Nenhum dado encontrado";
	}
?>
</div>
</body>