<?php
$device = $_GET['device'];
$model = $_GET['model'];
$color = $_GET['color'];
$minRange = $_GET['minRange'];
$maxRange = $_GET['maxRange'];
$capacity = $_GET['capacity'];
$unlock = $_GET['unlock'];
$warranty = $_GET['warranty'];
$sid = $_GET['sid'];

include '../db.php';
$con = mysql_connect($db_host,$db_user,$db_pwd);
mysql_select_db($db_name);

if($sid==0)
{
$q = mysql_query("SELECT product_id,device,model,images,description,price FROM product WHERE device LIKE '$device' AND model LIKE '$model' AND color='$color' AND price>=$minRange AND price<=$maxRange AND storage='$capacity' AND f_unlock='$unlock' AND warranty='$warranty' ORDER BY product_id");
}
else
{
$q = mysql_query("SELECT product_id,device,model,images,description,price FROM product WHERE device LIKE '$device' AND model LIKE '$model' AND color='$color' AND price>=$minRange AND price<=$maxRange AND storage='$capacity' AND f_unlock='$unlock' AND warranty='$warranty' AND product_id>'$sid' ORDER BY product_id");
}
$results = array();
while($row = mysql_fetch_array($q))
{
	$result = array();
	$result['product_id'] = $row['product_id'];
	$result['device'] = $row['device'];
	$result['model'] = $row['model'];
	$result['description'] = $row['description'];
	$result['price'] = $row['price'];
	$img = explode(",",$row['images']);
	$result['image'] = $img[0];
	$results[] = $result;
}
echo json_encode(array("product"=>$results));
?>
