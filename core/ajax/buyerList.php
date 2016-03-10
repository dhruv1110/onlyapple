<?php

include '../db.php';
$con = mysql_connect($db_host,$db_user,$db_pwd);
mysql_select_db($db_name);


$q = mysql_query("SELECT id,device,model,color,price FROM buy ORDER BY id DESC LIMIT 5");
$results = array();
while($row = mysql_fetch_array($q))
{
	$result = array();
	$result['product_id'] = $row['id'];
	$result['device'] = $row['device'];
	$result['model'] = $row['model'];
	$result['color'] = $row['color'];
	$result['price'] = $row['price'];
	$results[] = $result;
}
echo json_encode(array("product"=>$results));
?>
