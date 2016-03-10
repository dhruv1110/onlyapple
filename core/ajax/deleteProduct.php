<?php

include '../db.php';
$con = mysql_connect($db_host,$db_user,$db_pwd);
mysql_select_db($db_name);
$id = $_GET['id'];

mysql_query("DELETE FROM product WHERE product_id='$id'");
echo mysql_error();
?>