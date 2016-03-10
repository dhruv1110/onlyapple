<?php
session_start();
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$pwd = md5($_POST['pwd']);
$address = $_POST['address'];
$city  =$_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$pincode = $_POST['pincode'];
$mobile = $_POST['mobile'];
$time=time();
include '../core/db.php';
$con = mysql_connect($db_host,$db_user,$db_pwd);
mysql_select_db($db_name,$con);
$query = "INSERT INTO profile (user_id, first_name, last_name, email, address, city, state, country, pincode, mobile, join_date) VALUES ('','$firstname','$lastname','$email','$address','$city','$state','$country','$pincode','$mobile','$time')";
mysql_query($query);
echo mysql_error();
$id = mysql_insert_id();
$query = "INSERT INTO login (user_id,pwd) VALUES ('$id','$pwd')";
mysql_query($query);
echo mysql_error();
$_SESSION['id'] = $id;
mysql_close();
header('Location: http://localhost/onlyapple/');
?>