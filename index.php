<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>Apple Chain</title>
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
	$.getJSON('core/ajax/sellerList.php',{},function(data){
		if(count(data.product)==0)
		{
			$("#sellerList").html("<li>No products available for selling</li>");
		}
		for(i=0;i<count(data.product);i++)
		{
			$("#sellerList").html($("#sellerList").html() + '<a class="list-group-item" href="product.php?id=' + data.product[i].product_id + '"><img src="images/'+ data.product[i].image+'" width="100" height="100" style="margin-right:10px;">'+data.product[i].device + ' ' +data.product[i].model + '  (' + data.product[i].capacity + ' GB ' + data.product[i].color + ')<span class="badge">' + data.product[i].price + '</span></a>');
		}
	});
	
	
	$.getJSON('core/ajax/buyerList.php',{},function(data){
		if(count(data.product)==0)
		{
			$("#buyerList").html("<li>No requests for products</li>");
		}
		for(i=0;i<count(data.product);i++)
		{
			$("#buyerList").html($("#buyerList").html() + '<a class="list-group-item" href="buy.php?id=' + data.product[i].product_id + '"><img src="applechain_photos/applechain_photos/'+ data.product[i].device+'/'+data.product[i].model+'.png" width="100" height="100" style="margin-right:10px;">'+data.product[i].device + ' ' +data.product[i].model + '  (' + data.product[i].color + ')<span class="badge">' + data.product[i].price + '</span></a>');
		}
	});
}
</script>
</head>

<body>
	
	<?php
	include 'core/header.php';
	?>
    
<div class="center_container">
<div id="sliderFrame">
        <div id="slider">
            <img src="slider/images/1.jpg" />
            <img src="slider/images/2.jpg" />
            <img src="slider/images/3.jpg" />
            <img src="slider/images/4.jpg" />
            <img src="slider/images/5.jpg" />
            <img src="slider/images/6.jpg" />
            <img src="slider/images/7.jpg" />
            <img src="slider/images/8.jpg" />
        </div>
        <div id="htmlcaption" style="display: none;">
            <em>HTML</em> caption. Link to <a href="http://www.google.com/">Google</a>.
        </div>
    </div>
	<div class="row">
    	<div class="col-xs-12 col-md-6 thumbnail">
        	<h4>Products for sell</h4>
            <div id="sellerList" class="list-group">
            </div>
        </div>
        <div class="col-xs-12 col-md-6 thumbnail">
        	<h4>Products that people wants</h4>
            <div id="buyerList" class="list-group">
            </div>
        </div>
    </div>
</div>
<script>loadElements(); </script> 
    
    
    
    
    
   <?php 
	include 'core/footer.php';?> 
    
    
    
    
</body>
</html>




