<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>Products - AppleChain</title>

<?php
include 'core/meta.php';


if(isset($_POST['emailmsg']) && isset($_SESSION['id']))
{
	include 'core/db.php';
	$con = mysql_connect($db_host,$db_user,$db_pwd);
	mysql_select_db($db_name,$con);
	$my_id = $_SESSION['id'];
	$id = $_POST['id'];
	$q = mysql_query("SELECT first_name,last_name,email FROM profile WHERE user_id='$my_id'");
	while($row = mysql_fetch_array($q))
	{
		$pfname = $row['first_name'];
		$plname = $row['last_name'];
		$pemail = $row['email'];
	}
	
	$q = mysql_query("SELECT first_name,last_name,email FROM profile WHERE user_id='$id'");
	while($row = mysql_fetch_array($q))
	{
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$email = $row['email'];
	}
	require 'class.phpmailer.php';
	$emailMsg = $_POST['emailMsg'];
	$mail = new PHPMailer;
	
	$mail->IsSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'cp-24.webhostbox.net';  // Specify main and backup server
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'appleh9h';                            // SMTP username
	$mail->Password = 'k123456k';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
	
	$mail->From = 'appleh9h@applechain.com';
	$mail->FromName = 'AplleChain';
	$mail->AddAddress($email, $first_name.' '.$last_name);  // Add a recipient
	
	$mail->IsHTML(true);                                  // Set email format to HTML
	
	$mail->Subject = 'Message for your Apple product';
	$msg = $pfname . ' ' . $plname . ' ( '. $pemail . ' ) messaged you form AppleChain <br> ' . $emailMsg;
	$mail->Body    = $msg;
	$mail->AltBody = $pfname . ' ' . $plname . ' messaged you form AppleChain......' . $emailMsg;
	
	if(!$mail->Send()) {
	   echo 'Message could not be sent.';
	   echo 'Mailer Error: ' . $mail->ErrorInfo;
	   exit;
	}
	
	echo 'Message has been sent to '.$email;
}
?>
<link rel="stylesheet" type="text/css" href="core/css/style.css" />
<script src="core/js/common.js" type="text/javascript"></script>
<script type="text/javascript">
function setPic(id)
{
		  $("#bigImage").attr("src",'http://localhost/onlyapple/images/' + id);
}
function product(id)
  {
	  $.getJSON("http://localhost/onlyapple/core/ajax/product.php",{id:id},function(data){
		  $("#productInfo").html(data.device + ' ' + data.model + ' ' + data.model_extra + ' Rs. ' + data.price);
		  $("#descrioptionBox").html($("#descrioptionBox").html()+data.description);
		  $("#bigImage").attr("src",'http://localhost/onlyapple/images/' + data.image[0]);
		  for(var i=0;i<count(data.image);i++)
		  {
			  $("#imageList").html($("#imageList").html() + '<a href="#" onclick="setPic(\''+data.image[i]+'\');return false;"><img src="http://localhost/onlyapple/images/' + data.image[i] + '" width="100" height="100" class="thumbnail" style="float:left;margin:5px; width:100px; height:100px;"></a>');
		  }
		  
		  if(data.warranty==1)
		  {
			  var warranty = "Yes";
		  }
		  else
		  {
			  var warranty = "No";
		  }
		  if(data.condition == 1)
		  {
			  var condition = "New";
		  }
		  else
		  {
			  var condition = "Used";
		  }
		  
		  if(data.unlock == 1)
		  {
			  var unlock = "Yes";
		  }
		  else
		  {
			  var unlock = "No";
		  }
		  
		  if(data.handsfree == 1)
		  {
			  var handsfree = "Included";
		  }
		  else
		  {
			  var handsfree = "Not included";
		  }
		  
		  if(data.box == 1)
		  {
			  var box = "Included";
		  }
		  else
		  {
			  var box = "Not included";
		  }
		  
		  if(data.gaurd == 1)
		  {
			  var gaurd = "Attached";
		  }
		  else
		  {
			  var gaurd = "Not attached";
		  }
		  
		  if(data.cable == 1)
		  {
			  var cable = "Included";
		  }
		  else
		  {
			  var cable = "Not included";
		  }
		  
		  if(data.p_case == 1)
		  {
			  var p_case = "Included";
		  }
		  else
		  {
			  var p_case = "Not included";
		  }
		  $("#productAnalysis").html($("#productAnalysis").html() + '<table class="table table-striped"><tr><td>Color</td><td>' + data.color + '</td></tr><tr><td>Capacity</td><td>' + data.storage + ' GB</td></tr><tr><td>In warranty?</td><td>' + warranty + '</td></tr><tr><td>Condition</td><td>' + condition + '</td></tr><tr><td>Factory unlock?</td><td>' + unlock + '</td></tr><tr><td>Handsfree</td><td>' + handsfree + '</td></tr><tr><td>Cable</td><td>' + cable + '</td></tr><tr><td>Box</td><td>' + box + '</td></tr><tr><td>Screenguard</td><td>' + gaurd + '</td></tr><tr><td>Mobile case</td><td>' + p_case + '</td></tr></table>');
		  
		  var str = data.address;
		  $("#address").html($("#address").html() + '<strong>' + data.first_name + ' ' + data.last_name + '</strong><br>' + str + '<br>'+data.city+'<br>'+data.state+'<br>'+data.country+' - '+data.pincode+'<br><abbr title="Phone">P:</abbr> ' + data.mobile + '<br><a href="mailto:' + data.email + '">' + data.email + '</a>');
		 // $("#overlaySeller").attr("href", 'http://localhost/onlyapple/product.php?id=' + data.product_id);
		 userMore(data.user_id);
		 $("#id").val(data.user_id);
		 related(data.device,data.model);
	  });
  }
  
function userMore(id)
  {
	  $.getJSON("http://localhost/onlyapple/core/ajax/user.php",{id:id},function(data){
		if(count(data.product)==0)
		{
			$("#userBox").html("<li>No other products from this seller.</li>");
		}
		for(i=0;i<count(data.product);i++)
		{
			$("#userBox").html($("#userBox").html() + '<a class="list-group-item" href="product.php?id=' + data.product[i].product_id + '">'+data.product[i].device + ' ' +data.product[i].model + '  (' + data.product[i].capacity + ' GB ' + data.product[i].color + ')<span class="badge">Rs. ' + data.product[i].price + '</span></a>');
		}
	});
  }
  
  
function related(device,model)
  {
	  $.getJSON("http://localhost/onlyapple/core/ajax/related.php",{device:device,model:model},function(data){
		if(count(data.product)==0)
		{
			$("#relativeBox").html("<li>No related products found</li>");
		}
		for(i=0;i<count(data.product);i++)
		{
			$("#relativeBox").html($("#relativeBox").html() + '<a class="list-group-item" href="product.php?id=' + data.product[i].product_id + '">'+data.product[i].device + ' ' +data.product[i].model + '  (' + data.product[i].capacity + ' GB ' + data.product[i].color + ')<span class="badge">Rs. ' + data.product[i].price + '</span></a>');
		}
	});
  }
</script>
</head>

<body>
	
	<?php
	include 'core/header.php';
	include 'core/footer.php';
	?>
    
<div class="center_container">
	<h3 id="productInfo"></h3>
	<div class="row">
    
    
    
    	<div class="col-xs-12 col-md-6">
        	<img id="bigImage" style="width:100%;" />
            <div id="imageList" class="clearfix">
            </div>
            <hr color="#ccc" />
            <p id="descriptionP"></p>
            <div id="productAnalysis"></div>
        </div>
        
        
        
        <div class="col-xs-12 col-md-6">
        
        	<div id="descrioptionBox" class="list-group">
            	<a class="list-group-item active" href="return false;">About product</a>
            </div>
            
            
            <hr color="#ccc" />
            
            <address id="address" class="list-group">
            	<a class="list-group-item active" href="return false;">Contact seller</a>
            </address>
            
            
            <div class="list-group">
            	<a class="list-group-item active" href="return false;">Email seller</a>
                <form method="post" action="#">
                	<textarea rows="5" class="form-control" placeholder="Enter your message here" name="emailMsg" id="emailMsg"></textarea>
                    <input type="submit" class="btn btn-default" value="Send mail" />
                    <input type="hidden" name="id" id="id" />
                </form>
            </div>
            
            
            <div id="userBox" class="list-group">
            	<a class="list-group-item active" href="return false;">Other products from this user</a>
            </div>
            <hr color="#cccccc" />
            <div id="relativeBox" class="list-group">
            	<a class="list-group-item active" href="return false;">Related products matching this product</a>
            </div>
            
            
        </div>
        
        
        
    </div>
    <br />
    <br />
    <br />
    <br />
    <br />
</div>
 <?php
 echo '<script>product('.$_GET['id'].');</script>';
 ?>   
</body>
</html>




