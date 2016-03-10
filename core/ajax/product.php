<?php
$product = $_GET['id'];

include '../db.php';
$con = mysql_connect($db_host,$db_user,$db_pwd);
mysql_select_db($db_name);

$q = mysql_query("SELECT product_id,device,model,model_extra,storage,color,p_condition,f_unlock,warranty,handsfree,cable,box,s_guard,p_case,images,description,price,user_id FROM product WHERE product_id='$product' AND validate='0' ORDER BY product_id");

$result = array();
while($row = mysql_fetch_array($q))
{
	$result['product_id'] = $row['product_id'];
	$result['device'] = $row['device'];
	$result['model'] = $row['model'];
	$result['description'] = $row['description'];
	$result['price'] = $row['price'];
	$img = explode(",",$row['images']);
	$result['image'] = $img;
	$result['model_extra']=$row['model_extra'];
	$result['storage'] = $row['storage'];
	$result['color'] = $row['color'];
	$result['condition'] = $row['p_condition'];
	$result['unlock'] = $row['f_unlock'];
	$result['warranty'] = $row['warranty'];
	$result['handsfree'] = $row['handsfree'];
	$result['cable'] = $row['cable'];
	$result['box'] = $row['box'];
	$result['guard'] = $row['s_guard'];
	$result['p_case'] = $row['p_case'];
	$result['user_id'] = $row['user_id'];
	$uid = $row['user_id'];
	
	$q1 = mysql_query("SELECT * FROM profile WHERE user_id='$uid'");
	
	while($row1 = mysql_fetch_array($q1))
	{
		$result['first_name'] = $row1['first_name'];
		$result['last_name'] = $row1['last_name'];
		$result['email'] = $row1['email'];
		$result['address'] = $row1['address'];
		$result['city'] = $row1['city'];
		$result['state'] = $row1['state'];
		$result['country'] = $row1['country'];
		$result['pincode'] = $row1['pincode'];
		$result['mobile'] = $row1['mobile'];
	}
}
echo json_encode($result);
?>
