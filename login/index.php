<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login to AppleChain</title>
<link type="text/css" rel="stylesheet" href="../core/css/style.css" />
<?php
$login = '';
	include '../core/meta.php';
	if(isset($_POST['email']))
	{
		$email = $_POST['email'];
		$pwd = md5($_POST['pwd']);
		include '../core/db.php';
		$con = mysql_connect($db_host,$db_user,$db_pwd);
		mysql_select_db($db_name,$con);
		$result = mysql_query("SELECT l.pwd,p.user_id FROM login l,profile p WHERE p.email='$email' AND p.user_id=l.user_id");
		$i = 0;
		while($row = mysql_fetch_array($result))
		  {
			  $i=1;
			  if($pwd==$row['pwd'])
			  {
				  if($_POST['remember'] == "yes")
				  {
					  setcookie("remember", $row['user_id'],time()+3600*24*30,'/');
				  }
				  $_SESSION['id'] = $row['user_id'];
				  header('Location: http://localhost/onlyapple/');
			  }
			  else
			  {
				  $login = '<div class="alert alert-danger">Password does not match with this email</div>';
			  }
		  }
		
		if($i==0)
		{
			$login = '<div class="alert alert-danger">Email not available</div>';
		}
		mysql_close();
	}
?>
<script type="text/javascript">
function validate()
{
	var error=false;
	if($("#email").val()=='')
	{
		error=true;
		$("#email").focus();
	}
	else if($("#pwd").val()=='')
	{
		error=true;
		$("#pwd").focus();
	}
	else{}
	if(error==true)
	{
		return false;
	}
}
</script>
</head>

<body>
<?php
	include '../core/header.php';
?>
<div class="center_container">
  <center>
      <h1>Login to AppleChain Family</h1>
      <h5>Please enter your details in form below</h5>
  </center>
  <br />
  <form class="form-horizontal" role="form" method="post" action="index.php" id="loginForm" onsubmit="return validate()">
      <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
  			<?php echo $login; ?>
        </div>
      </div>
      
      <div class="form-group">
        <label for="email" class="col-lg-2 control-label">Email</label>
        <div class="col-lg-10">
          <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        </div>
      </div>
      
      <div class="form-group">
        <label for="pwd" class="col-lg-2 control-label">Password</label>
        <div class="col-lg-10">
          <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password"  />
        </div>
      </div>
      
      <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
          <div class="checkbox">
            <label>
              <input type="checkbox" name="remember" id="remember" value="yes" checked="checked"> Remember me
            </label>
          </div>
        </div>
      </div>
  
      <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
          <button type="submit" class="btn btn-default">Sign in</button>
        </div>
      </div>
    </form>
</div>
<?php
	include '../core/footer.php';
?>
</body>
</html>