<?php session_start();
if(!isset($_SESSION['id']))
{
	header('Location: http://localhost/onlyapple/login/');
}
$id = $_SESSION['id'];
$device = $_POST['device'];
$model = $_POST['model'];
$color = $_POST['color'];
$price = $_POST['price'];
$a ='';
		include '../../core/db.php';
		$con = mysql_connect($db_host,$db_user,$db_pwd);
		mysql_select_db($db_name,$con);
		mysql_query("INSERT INTO buy (id,device,model,color,price) VALUES ('','$device','$model','$color','$price')");
		echo mysql_error();
		mysql_close();
		header('Location: http://localhost/onlyapple/');
?>