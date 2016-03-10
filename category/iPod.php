<?php session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>iPod - AppleChain</title>
<link type="text/css" rel="stylesheet" href="../core/css/style.css" />
<script type="text/javascript" src="../core/js/common.js"></script>
<script type="text/javascript">
var deviceModel;
function setDevice(id)
{
	$("#deviceImg").attr("src","../applechain_photos/applechain_photos/iPod/"+id+".png");
	$("#deviceName").html('iPod '+id);
	deviceModel = id;
}


function fetchResult()
{
}
function search(sid)
{
	var r = $(".tooltip-inner").html();
	r = r.split(":");
	var r1 = r[0];
	var r2 = r[1];
	var color = $("#color").val();
	var capacity = $("#capacity").val();
	if($("#unlock1").is(":checked"))
	{
		var unlock = 1;
	}
	else
	{
		var unlock = 0;
	}
	if($("#warranty1").is(":checked"))
	{
		var warranty = 1;
	}
	else
	{
		var warranty = 0;
	}
	
	var params = {
		device:'iPod',
		model:deviceModel,
		minRange:r1,
		maxRange:r2,
		color:color,
		capacity:capacity,
		unlock:unlock,
		warranty:warranty,
		sid:sid
	};
	$.getJSON("../core/ajax/search.php",params,function(data){
		$("#searchBox").html('');
		if(count(data.product)==0)
		{
			$("#searchBox").html("<div class='thumbnail'>No results found matching your criteria.</div>");
		}
		for(i=0;i<count(data.product);i++)
		{
			$("#searchBox").html($("#searchBox").html() + '<div class="thumbnail"><div class="row"><div class="col-md-8"><h3 class="text-primary">' + data.product[i].device + ' ' + data.product[i].model + '</h3></div><div class="col-md-4" style="text-align:right;"><h3 class="text-primary">Rs. ' + data.product[i].price + ' </h3></div></div><div class="row"><div class="col-md-4"><img src="../images/'+data.product[i].image+'" class="thumbnail" style="width:100%;"></div><div class="col-md-8"><p>' + data.product[i].description + '</p><br><button type="button" class="btn btn-default" title="Open as overlay popup" onclick="productOverlay('+data.product[i].product_id+');"><a  data-toggle="modal"  href="#overlayModal"><span class="glyphicon glyphicon-resize-full"></span></a></button><button type="button" class="btn btn-default" title="Open as new link"><a href="../product.php?id='+data.product[i].product_id+'"><span class="glyphicon glyphicon-log-in"></span></a></button></div></div></div>');
		}
	});
}
</script>
<link type="text/css" rel="stylesheet" href="../core/css/slider.css" />
<?php
	include '../core/meta.php';
?>
<script src="../core/js/bootstrap-slider.js" type="text/javascript"></script>
<style type="text/css">
h4
{
	width: 100%;
background: #EAEAEA;
padding: 5px;
}
input
{
	margin-left:5px;
}
</style>
</head>

<body>
<?php
	include '../core/header.php';
?>
<div class="center_container">
<ul class="nav nav-tabs" id="myTab">
  <li class="active"><a href="#iPod1" onclick="setDevice('1');"><img src="../applechain_photos/applechain_photos/iPod/1.png" width="100" height="100" /><br /><center>iPod 1</center></a></li>
  <li><a href="#iPod2" onclick="setDevice('2');"><img src="../applechain_photos/applechain_photos/iPod/2.png" width="100" height="100" /><br /><center>iPod 2</center></a></li>
  <li><a href="#iPod3" onclick="setDevice('3');"><img src="../applechain_photos/applechain_photos/iPod/3.png" width="100" height="100" /><br /><center>iPod 3</center></a></li>
  <li><a href="#iPod4" onclick="setDevice('4');"><img src="../applechain_photos/applechain_photos/iPod/4.png" width="100" height="100" /><br /><center>iPod 4</center></a></li>
  <li><a href="#iPod5" onclick="setDevice('5');"><img src="../applechain_photos/applechain_photos/iPod/5.png" width="100" height="100" /><br /><center>iPod 5</center></a></li>
</ul>

<div class="tab-content">
  <div class="tab-pane" id="iPod1"></div>
  <div class="tab-pane" id="iPod2"></div>
  <div class="tab-pane" id="iPod3"></div>
  <div class="tab-pane" id="iPod4"></div>
  <div class="tab-pane active" id="iPod5"></div>
</div> 

<div class="row">
  <div class="col-xs-6 col-md-3">
  		<div class="thumbnail" style="margin-top: 17px; text-align: center;">Search Criteria</div>
  	</div>
    <div class="col-xs-12 col-md-9">
  	<div><center><h3 id="deviceName"></h3></center></div>  
    </div>
</div>
<div class="row" >
  <div class="col-xs-6 col-md-3">
    <div id="searchFilter" class=" img-thumbnail" style="width:100%;">
    	<!--<h4>Model</h4>
        
        <label class="checkbox">
          <input type="checkbox" id="c3gs" value="3gs"> iPod 3gs
        </label>
        <label class="checkbox">
          <input type="checkbox" id="c4" value="4"> iPod 4
        </label>
        <label class="checkbox">
          <input type="checkbox" id="c4s" value="c4s"> iPod 4s
        </label>
        <label class="checkbox">
          <input type="checkbox" id="c5" value="5"> iPod 5
        </label>
        <label class="checkbox">
          <input type="checkbox" id="5c" value="5c"> iPod 5c
        </label>
        <label class="checkbox">
          <input type="checkbox" id="5s" value="5s"> iPod 5s
        </label>-->
        <h4>Range</h4>
        <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="70000" data-slider-step="100" data-slider-value="[25000,45000]" id="range">
        <h4>Color</h4>
        <select class="form-control" id="color">
        	<option value="White">White</option>
            <option value="Black">Black</option>
            <option value="Green">Green</option>
            <option value="Silver">Silver</option>
            <option value="Gray">Gray</option>
            <option value="Slate">Slate</option>
            <option value="Yellow">Yellow</option>
            <option value="Pink">Pink</option>
            <option value="Golden">Golden</option>
        </select>
        
        <h4>Capacity</h4>
        
        <select class="form-control" id="capacity">
          	<option value="8">8 GB</option>
            <option value="16">16 GB</option>
            <option value="32">32 GB</option>
            <option value="64">64 GB</option>
            <option value="128">128 GB</option>
        </select>
        
        <h4>Factory unlock</h4>
        
        <div class="radio">
              <label>
                <input type="radio" name="unlock" id="unlock1" value="1" checked>
                	Yes
              </label>
        </div>
        <div class="radio">
              <label>
                <input type="radio" name="unlock" id="unlock2" value="0">
                	No
              </label>
        </div>
        
        
        <h4>In warranty</h4>
        
        <div class="radio">
              <label>
                <input type="radio" name="warranty" id="warranty1" value="1" checked>
                	Yes
              </label>
        </div>
        <div class="radio">
              <label>
                <input type="radio" name="warranty" id="warranty2" value="0">
                	No
              </label>
        </div>
        
        <input type="button" class="form-control" value="Search device" onclick="search(0);" />
    </div>
  </div>
  <div class="col-xs-12 col-md-9">     
    <div id="searchBox">
            <div class='thumbnail'>Enter your search criteria from left pane.</div>
      </div>
  </div>
</div>
<br /><br />
<script>
setDevice('5');
$("#range").slider();

  $(function () {
    $('#myTab a:last').tab('show')
  })
  $('#myTab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})
</script>
</div>
<?php
	include '../core/footer.php';
?>
</body>
</html>