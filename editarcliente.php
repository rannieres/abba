<?php
	require 'config.php';
	$id=0;
	if(isset($_GET['id']) && !empty($_GET['id'])) {
		$id = addslashes($_GET['id']);
	}
	if(isset($_POST['cliente']) && !empty($_POST['cliente'])){
		$cliente = addslashes($_POST['cliente']);
		$sql = "UPDATE clientes SET cliente = '$cliente' WHERE id = '$id' ";
		$pdo -> query($sql);
		header("Location:clientes.php");
	}
	$sql = "SELECT * FROM clientes WHERE id = '$id' ";
	$sql = $pdo -> query($sql);
	if($sql -> rowCount() > 0){
		$dado = $sql -> fetch();
	}else{
		header('Location:clientes.php');
	}
?>
<form method="POST">
	cliente:<br/>
	<input type="text" name="cliente" value="<?php echo $dado['cliente']; ?>" /><br/><br/>
	<input type="submit" value="Atualizar" />
</form>