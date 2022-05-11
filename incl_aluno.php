<?php
$rm = $_POST['rm'];
$nome = $_POST['nome'];

include('conectar.php');

$erro = 0;

if(empty($nome)){
$erro= 1;
$msg = "Nome não informado";
}
elseif(empty($rm)){
$erro= 1;
$msg = "RM não informado";
}
elseif(!is_numeric($rm)) {
$erro= 1;
$msg = "O RM deve conter somente numeros";
}
if($erro){
	echo "<html><body>";
	echo "<p align='center'>$msg</p>";
	echo "<p align='center'><a href='javascript:history.back()'>Voltar</a></p>";
	echo "</body></html>";
}else{

$query = "INSERT INTO rms VALUES('$rm','$nome');";
$grava=mysql_query($query);
	$num_linha=mysql_affected_rows();
	if ($num_linha==1){
		echo "<p align='center'>Cadastro Realizado com sucesso!<br><a href='javascript:history.back()'>Voltar</a></p>";
	}else{
		echo"<p align='center'>Não foi possivel cadastrar.<br> <a href='javascript:history.back()'>Voltar</a><br></p>";
	}
	mysql_close($con);
}
?>
