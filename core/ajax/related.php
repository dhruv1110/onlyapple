<?php

include '../db.php';
$con = mysql_connect($db_host,$db_user,$db_pwd);
$model =$_GET['model'];
$device = $_GET['device'];
mysql_select_db($db_name,$con);
$q = mysql_query("SELECT product_id,device,model,color,storage,price FROM product WHERE validate=0 AND device LIKE '$device' AND model LIKE '$model' ORDER BY product_id DESC LIMIT 5");
echo mysql_error();
$results = array();
while($row = mysql_fetch_array($q))
{
	$result = array();
	$result['product_id'] = $row['product_id'];
	$result['device'] = $row['device'];
	$result['model'] = $row['model'];
	$result['color'] = $row['color'];
	$result['capacity'] = $row['storage'];
	$result['price'] = $row['price'];
	$results[] = $result;
}
echo json_encode(array("product"=>$results));
?>
