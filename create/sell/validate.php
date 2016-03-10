<?php session_start();
if(!isset($_SESSION['id']))
{
	header('Location: http://localhost/onlyapple/login/');
}
$id = $_SESSION['id'];
$device = $_POST['device'];
$model = $_POST['model'];
if($device == 'iPad' || $device == '$iPadmini')
{
	$model_extra = $_POST['model_extra'];
}
else
{
	$model_extra='';
}
$capacity = $_POST['capacity'];
$condition = $_POST['condition'];
$color = $_POST['color'];
$warranty = $_POST['warranty'];
$unlock = $_POST['unlock'];
$earphone = $_POST['earphone'];
$cable = $_POST['cable'];
$box = $_POST['box'];
$guard = $_POST['guard'];
$case = $_POST['case'];
$price = $_POST['price'];
$description = $_POST['description'];
$a ='';
	$tmp = array();
    $errors= array();
	foreach($_FILES['files']['name'] as $key => $name ){
		$file_name = $key.$_FILES['files']['name'][$key];
		$file_size =$_FILES['files']['size'][$key];
		$file_tmp =$_FILES['files']['tmp_name'][$key];
		$file_type=$_FILES['files']['type'][$key];	
        if($file_size > 2097152){
			$errors[]='File size must be less than 2 MB';
        }		
        //$query="INSERT into upload_data (USER_ID,FILE_NAME,FILE_SIZE,FILE_TYPE) VALUES('$user_id','$file_name','$file_size','$file_type'); ";
        $desired_dir="../../images";
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);		// Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
            }else{									//rename the file if another one exist
                $new_dir="$desired_dir/".$file_name.time();
                 rename($file_tmp,$new_dir) ;				
            }	
			$tmp[] = $file_name;		
        }else{
                $a = $errors;
        }
    }
	if(empty($errors)){
		include '../../core/db.php';
		$con = mysql_connect($db_host,$db_user,$db_pwd);
		mysql_select_db($db_name,$con);
		$tmp = implode(",",$tmp);
		mysql_query("INSERT INTO product (product_id, device, model, model_extra, storage, color, p_condition, condition_extra, f_unlock, warranty, warranty_extra, handsfree, cable, box, s_guard, p_case, description, price, images, is_purchased, validate, user_id) VALUES ('','$device','$model','$model_extra','$capacity','$color','$condition','','$unlock','$warranty','','$earphone','$cable','$box','$guard','$case','$description','$price','$tmp','0','0','$id')");
		$a = mysql_error();
		mysql_close();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Validate your request</title>
<link type="text/css" rel="stylesheet" href="../../core/css/style.css" />
<?php
	include '../../core/meta.php';
?>
</head>

<body>
<?php
	include '../../core/header.php';
?>
<div class="center_container"><?php echo $a; ?><br />
<h5>Your ad will be reviewd by approval team...It will take 1 business day...So please wait..</h5>
<center><a href="http://localhost/onlyapple" class="btn btn-primary">Return to homepage</a></center>
</div>

<?php
	include '../../core/footer.php';
?>
</body>
</html>