<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>Only Apple</title>

<?php
include 'core/meta.php';
?>
<link rel="stylesheet" type="text/css" href="core/css/style.css" />
<link href="slider/js-image-slider.css" rel="stylesheet" type="text/css" />
<script src="slider/js-image-slider.js" type="text/javascript"></script>
<script src="core/js/common.js" type="text/javascript"></script>
<script type="text/javascript">
function loadElements()
{
	$.getJSON('core/ajax/userProducts.php',{},function(data){
		if(count(data.product)==0)
		{
			$("#sellerList").html("<li>No products available from you</li>");
		}
		for(i=0;i<count(data.product);i++)
		{
			$("#sellerList").html($("#sellerList").html() + '<li style="border-bottom:1px solid #ccc;padding:10px;padding-left:0px;"><a  href="product.php?id=' + data.product[i].product_id + '"><img src="images/'+ data.product[i].image+'" width="100" height="100" style="margin-right:10px;">'+data.product[i].device + ' ' +data.product[i].model + '  (' + data.product[i].capacity + ' GB ' + data.product[i].color + ')</a><button style="float:right;" class="btn btn-primary" onclick="deleteP('+data.product[i].product_id+');">Remove</button></li>');
		}
	});
	
	
}

function deleteP(id)
{
	$.getJSON('core/ajax/deleteProduct.php',{id:id},function(data){
		document.location = "http://localhost/onlyapple/myproducts.php";
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
    <center><h3>My products</h3></center>
    <ul id="sellerList" class="" style=" list-style-type:none;">
    </ul>
</div>
<script>loadElements(); </script> 
    
    
    
    
    
    
    
    
    
    
</body>
</html>




