<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Resultados</title>
<link href="nova.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	background-image: url(img/100_1524edit3.jpg);
}
</style>
</head>
<?php 

$nome = $_POST['nome'];
$erro = 0; //vari�vel que informar� a ocorr�ncia de erros

if(empty($nome)){ // verifica se foi digitado o nome 
$erro = 1;
$msg = "Informe o nome";
}

if($erro){
	echo "<html><body>";
	echo "<p align='center'>$msg</p>";
	echo "<p align='center'><a href='javascript:history.back()'>Voltar</a></p>";
	echo "</body></html>";
}else{
	include('conectar.php');
	$query="SELECT * FROM rms WHERE nome LIKE '%$nome%' ORDER BY nome";
	$resultado = mysql_query($query) or die (mysql_error(1));
	$num_linha = mysql_affected_rows(); //conta a quantidade de linhas afetadas
	if($num_linha >= 1){ ?>
		<center>
		<table width="496" height="67" border="0" align="center">
		<tr><td width="72" bgcolor="#D6D6D6"> RMS</td><td width="358" bgcolor="#D6D6D6">Nome</td><td width="52">
		<?php while ($reg = mysql_fetch_array($resultado)){?>
		<tr><td bgcolor="#D6D6D6"><?php echo  $reg['rm'] ?></td>
		<td bgcolor="#D6D6D6"><?php echo  $reg['nome'] ?> </td> 
		</td></tr>
	    <?php } ?>
	    </table>
</center>
		<p align='center'><a href='javascript:history.back()'>Voltar</a></p>
	<?php } 
	else{
		echo" Nome n�o encontrado<br>";
		echo"<a href='javascript:history.back()'>voltar</a>";
		mysql_close($con);
	}
}	
?>
