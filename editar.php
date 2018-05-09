<?php 
	require 'config.php';
	$id = 0;
	if(isset($_GET['id']) && !empty($_GET['id'])) {
		$id = addslashes($_GET['id']);
	}
	if(isset($_POST['dia']) && isset($_POST['mes']) && isset($_POST['ano']) && isset($_POST['descricao']) && isset($_POST['valor']) && isset($_POST['cliente']) && empty($_POST['dia']) == false && empty($_POST['mes']) == false && empty($_POST['ano']) == false && empty($_POST['descricao']) == false && empty($_POST['valor']) == false && empty($_POST['cliente']) == false ){
		$numero = $_POST['numero'];
		$dia = $_POST['dia'];
		$mes = $_POST['mes'];
		$ano = $_POST['ano'];
		$descricao = $_POST['descricao'];
		$valor = $_POST['valor'];
		$cliente = $_POST['cliente'];
		$paciente = $_POST['paciente'];
		$sql = "UPDATE fechamento SET numero = '$numero', dia ='$dia', mes = '$mes', ano = '$ano', descricao = '$descricao', valor = '$valor', cliente = '$cliente', paciente = '$paciente' WHERE id = '$id' ";
		$pdo->query($sql);
		header("Location:index.php");
	}
	$sql = "SELECT * FROM fechamento WHERE id = '$id' ";
	$sql = $pdo -> query($sql);
	if($sql -> rowCount() > 0){
		$dado = $sql -> fetch();
	}else{
		header('Location:index.php');
	}
?>
<form method="POST">
	Numero:<br/>
	<input type="number" name="numero" value="<?php echo $dado['numero']; ?>" /><br/><br/>
	Data:<br/>
	<select name="dia" value="<?php echo $dado['dia']; ?>">
		<?php echo '<option value="'.$dado['dia'].'" selected="selected">'.$dado['dia'].' (atual)</option>' ;?>
		<option value="01">01</option>
		<option value="02">02</option>
		<option value="03">03</option>
		<option value="04">04</option>
		<option value="05">05</option>
		<option value="06">06</option>
		<option value="07">07</option>
		<option value="08">08</option>
		<option value="09">09</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
		<option value="13">13</option>
		<option value="14">14</option>
		<option value="15">15</option>
		<option value="16">16</option>
		<option value="17">17</option>
		<option value="18">18</option>
		<option value="19">19</option>
		<option value="20">20</option>
		<option value="21">21</option>
		<option value="22">22</option>
		<option value="23">23</option>
		<option value="24">24</option>
		<option value="25">25</option>
		<option value="26">26</option>
		<option value="27">27</option>
		<option value="28">28</option>
		<option value="29">29</option>
		<option value="30">30</option>
		<option value="31">31</option>
	</select>
	<select name="mes" value="<?php echo $dado['mes']; ?>">
		<?php 
			if($dado['mes'] == 01){
				echo '<option value="01">Janeiro (atual)</option>' ;
			}
			if($dado['mes'] == 02){
				echo '<option value="02">fevereiro (atual)</option>' ;
			}
			if($dado['mes'] == 03){
				echo '<option value="03">Março (atual)</option>' ;
			}
			if($dado['mes'] == 04){
				echo '<option value="04">Abril (atual)</option>' ;
			}
			if($dado['mes'] == 05){
				echo '<option value="05">Maio (atual)</option>' ;
			}
			if($dado['mes'] == 06){
				echo '<option value="06">Junho (atual)</option>' ;
			}
			if($dado['mes'] == 07){
				echo '<option value="07">Julho (atual)</option>' ;
			}
			if($dado['mes'] == 08){
				echo '<option value="08">Agosto (atual)</option>' ;
			}
			if($dado['mes'] == 09){
				echo '<option value="09">Setembro (atual)</option>' ;
			}
			if($dado['mes'] == 10){
				echo '<option value="10">Outubro (atual)</option>' ;
			}
			if($dado['mes'] == 11){
				echo '<option value="11">Novembro (atual)</option>' ;
			}
			if($dado['mes'] == 12){
				echo '<option value="12">Dezembro (atual)</option>' ;
			}
		?>
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
	<select name="ano" value="<?php echo $dado['ano']; ?>" >
		<?php echo '<option value="'.$dado['ano'].'" selected="selected">'.$dado['ano'].' (atual)</option>' ;?>
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
	</select><br/><br/>
	Descrição:<br/>
	<input type="text" name="descricao" value="<?php echo $dado['descricao']; ?>" required/><br/><br/>
	Paciente:<br/>
	<input type="text" name="paciente" value="<?php echo $dado['paciente']; ?>" required/><br/><br/>
	Valor:<br/>
	<input type="number" name="valor" value="<?php echo $dado['valor']; ?>" ><br/><br/>
	Cliente:<br/>
	<select name="cliente" value="<?php echo $dado['cliente']; ?>" >
		<?php echo '<option value="'.$dado['cliente'].'" selected="selected">'.$dado['cliente'].' (atual)</option>' ;?>
		<?php
			$sql = "SELECT cliente FROM clientes ";
			$sql = $pdo -> query($sql);
				foreach ($sql->fetchAll() as $cliente) {
					echo '<option value="'.$cliente['cliente'].'">'.$cliente['cliente'].'</option>';
				}
		?>
	</select><br/><br/>
	<input type="submit" value="Enviar" />
</form>