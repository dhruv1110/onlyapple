<?php session_start();
if(!isset($_SESSION['id']))
{
	header('Location: http://localhost/onlyapple/login/');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Request product to AppleChain</title>
<link type="text/css" rel="stylesheet" href="../../core/css/style.css" />
<?php
	include '../../core/meta.php';
?>
<script type="text/javascript">
function validate()
{
	var error=false;
	if($("#device").val()=='0')
	{
		error=true;
		$("#device").focus();
	}
	else if($("#model").val()=='0')
	{
		error=true;
		$("#model").focus();
	}
	else if($("#color").val()=='0')
	{
		error=true;
		$("#color").focus();
	}
	else if($("#price").val()=='')
	{
		error=true;
		$("#price").focus();
	}
	else{}
	if(error==true)
	{
		return false;
	}
}


$(document).ready(function(e) {
	$("#device").change(function(){
		if($(this).val()=='iPhone')
		{
			$("#model_extra1,#model_extra2").attr("disabled","disabled");
			$("#model").html('<option value="3gs">iPhone 3gs</option><option value="4">iPhone 4</option><option value="4s">iPhone 4s</option><option value="5">iPhone 5</option><option value="5c">iPhone 5c</option><option value="5s">iPhone 5s</option>');
		}
		else if($(this).val()=='iPod')
		{
			$("#model_extra1,#model_extra2").attr("disabled","disabled");
			$("#model").html('<option value="1">iPod 1</option><option value="2">iPod 2</option><option value="3">iPod 3</option><option value="4">iPod 4</option><option value="5">iPod 5</option>');
			
		}
		else if($(this).val()=='iPad')
		{
			$("#model_extra1,#model_extra2").removeAttr("disabled");
			$("#model").html('<option value="1">iPad 1</option><option value="2">iPad 2</option><option value="3">iPad 3</option><option value="4">iPad 4</option>');
		}
		else if($(this).val()=='iPadmini')
		{
			$("#model_extra1,#model_extra2").removeAttr("disabled");
			$("#model").html('<option value="1">iPad Mini</option>');
		}
		else if($(this).val()=='Mac')
		{
			$("#model_extra1,#model_extra2").removeAttr("disabled");
			$("#model").html('<option value="1">iMac</option><option value="2">MacBook Pro</option><option value="3">MacBook Air</option><option value="4">MacMini</option><option value="5">MacPro</option>');
		}
		else{}
	});
	
	
	
	
	$("#model,#device").change(function(){
		if($('#device').val()=='iPhone')
		{
			if($("#model").val()=='3gs' || $("#model").val()=='4' || $("#model").val()=='4s' )
			{
				$("#color").html('<option value="black">Black</option><option value="white">White</option>');
			}
			else if($("#model").val()=='5' )
			{
				$("#color").html('<option value="slate">Slate</option><option value="white">White</option>');
			}
			else if($("#model").val()=='5s' )
			{
				$("#color").html('<option value="golden">Golden</option><option value="space gray">Space Gray</option><option value="silver">Silver</option>');
			}
			else if($("#model").val()=='5c' )
			{
				$("#color").html('<option value="Green">Green</option><option value="white">White</option><option value="Yellow">Yellow</option><option value="Blue">Blue</option><option value="Pink">Pink</option>');
			}else{}
		}
		else if($('#device').val()=='iPod')
		{
			if($("#model").val()=='1' || $("#model").val()=='2' || $("#model").val()=='3' )
			{
				$("#color").html('<option value="black">Black</option>');
			}
			else if($("#model").val()=='4' )
			{
				$("#color").html('<option value="slate">Slate</option><option value="white">White</option>');
			}
			else if($("#model").val()=='5' )
			{
				$("#color").html('<option value="Silver">Silver</option><option value="space gray">Space Gray</option><option value="Red">Red</option><option value="Yellow">Yellow</option><option value="Blue">Blue</option><option value="Pink">Pink</option>');
			}else{}
		}
		else if($('#device').val()=='iPad')
		{
			$("#color").html('<option value="slate">Slate</option><option value="white">White</option>');
		}
		else if($('#device').val()=='iPadmini')
		{
			$("#color").html('<option value="slate">Slate</option><option value="white">White</option>');
		}
		else{}
	});
	
	  
});

</script>
</head>

<body>
<?php
	include '../../core/header.php';
?>
<div class="center_container">
  <center>
      <h1>Request apple product</h1>
      <h5>Please enter your details in form below</h5>
  </center>
  <br />
  <form class="form-horizontal" role="form" method="post" action="register.php" id="loginForm" onsubmit="return validate()" enctype="multipart/form-data">
      
      
      <div class="form-group">
        <label for="device" class="col-lg-2 control-label">Product</label>
        <div class="col-lg-10">
          <select class="form-control" id="device" name="device">
          	<option value="0">Select one</option>
          	<option value="iPhone">iPhone</option>
            <option value="iPod">iPod</option>
            <option value="iPad">iPad</option>
            <option value="iPadmini">iPad Mini</option>
            <option value="Mac">Mac</option>
          </select>
        </div>
      </div>
      
      <div class="form-group">
        <label for="model" class="col-lg-2 control-label">Model</label>
        <div class="col-lg-10">
          <select class="form-control" id="model" name="model">
          	<option value="0">Select device above</option>
          </select>
          
        </div>
      </div>
      
      
      
      <div class="form-group">
        <label for="color" class="col-lg-2 control-label">Color</label>
        <div class="col-lg-10">
          <select class="form-control" id="color" name="color">
          	<option value="0">Complete above fields</option>
          </select>
        </div>
      </div>
      
      
      
      <div class="form-group">
        <label for="price" class="col-lg-2 control-label">Expected price</label>
        <div class="col-lg-10">
        	<input type="text" class="form-control" id="price" name="price" placeholder="Price in rupees..."/>
        </div>
      </div>
      
      
  
      <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
          <button type="submit" class="btn btn-default">Submit request</button>
        </div>
      </div>
      
      <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
          <br /><br />
        </div>
      </div>
    </form>
</div>
<?php
	include '../../core/footer.php';
?>
</body>
</html>