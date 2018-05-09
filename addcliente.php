<?php 
	require 'config.php';
	if (isset($_POST['cliente']) && !empty($_POST['cliente'])) {
		$cliente = addslashes($_POST['cliente']);
		$sql = "INSERT INTO clientes SET cliente = '$cliente' ";
		$pdo -> query($sql);
		header("Location: addcliente.php");
	}
?>
<form method="POST">
	Novo Cliente:<br/>
	<input type="text" name="cliente"><br/><br/>
	<input type="submit" value="Enviar">
</form>