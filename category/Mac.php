<?php session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mac - AppleChain</title>
<link type="text/css" rel="stylesheet" href="../core/css/style.css" />
<script type="text/javascript" src="../core/js/common.js"></script>
<script type="text/javascript">
var deviceModel;
function setDevice(id)
{
	//$("#deviceImg").attr("src","../applechain_photos/applechain_photos/iphone/"+id+".png");
	$("#deviceName").html(id);
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
		device:'iPhone',
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
function sortcat(type)
{
	
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
  <li class="active"><a href="#iPhone3gs" onclick="setDevice('iMac');"><img src="../applechain_photos/applechain_photos/mac/imac.png" width="100" height="100" /><br /><center>iMac</center></a></li>
  <li><a href="#iPhone4" onclick="setDevice('MacBook Pro');"><img src="../applechain_photos/applechain_photos/mac/macbookpro.png" width="100" height="100" /><br /><center>MacBook Pro</center></a></li>
  <li><a href="#iPhone4s" onclick="setDevice('MacBook Air');"><img src="../applechain_photos/applechain_photos/mac/macbookair.png" width="100" height="100" /><br /><center>MacBook Air</center></a></li>
  <li><a href="#iPhone5" onclick="setDevice('MacMini');"><img src="../applechain_photos/applechain_photos/mac/macmini.png" width="100" height="100" /><br /><center>MacMini</center></a></li>
  <li><a href="#iPhone5c" onclick="setDevice('MacPro');"><img src="../applechain_photos/applechain_photos/mac/macpro.png" width="100" height="100" /><br /><center>MacPro</center></a></li>
</ul>

<div class="tab-content">
  <div class="tab-pane active" id="iMac"></div>
  <div class="tab-pane" id="MacBook Pro"></div>
  <div class="tab-pane" id="MacBook Air"></div>
  <div class="tab-pane" id="Mac Mini"></div>
  <div class="tab-pane" id="MacPro"></div>
</div>

<div class="row">
  <div class="col-xs-6 col-md-3">
  	<div class="thumbnail" style="margin-top: 17px;
text-align: center;">Search Criteria</div>
  </div>
  <div class="col-xs-6 col-md-9">
  	<center><h3 id="deviceName"></h3></center>
    
  </div>
</div>
<div class="row">
  <div class="col-xs-6 col-md-3">
    <div id="searchFilter" class=" img-thumbnail" style="width:100%;">
    	<!--<h4>Model</h4>
        
        <label class="checkbox">
          <input type="checkbox" id="c3gs" value="3gs"> iPhone 3gs
        </label>
        <label class="checkbox">
          <input type="checkbox" id="c4" value="4"> iPhone 4
        </label>
        <label class="checkbox">
          <input type="checkbox" id="c4s" value="c4s"> iPhone 4s
        </label>
        <label class="checkbox">
          <input type="checkbox" id="c5" value="5"> iPhone 5
        </label>
        <label class="checkbox">
          <input type="checkbox" id="5c" value="5c"> iPhone 5c
        </label>
        <label class="checkbox">
          <input type="checkbox" id="5s" value="5s"> iPhone 5s
        </label>-->
        <h4>Range</h4>
        <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="400000" data-slider-step="100" data-slider-value="[54000,200000]" id="range">
        <h4>Color</h4>
        <select class="form-control" id="color">
        	<option value="Silver">Silver</option> 
        </select>
        
        <h4>RAM</h4>
        
        <select class="form-control" id="ram">
        	<option value="4">4 GB</option>
          	<option value="8">8 GB</option>
            <option value="16">16 GB</option>
		</select>
        
        <h4>Hard Disk</h4>
        
        <select class="form-control" id="hdd">
        	<option value="250">250 GB</option>
          	<option value="500">500 GB</option>
            <option value="720">720 GB</option>
            <option value="1">1 TB</option>
            <option value="2">2 TB</option>
		</select>
        
        
        <h4>Display</h4>
        
        <select class="form-control" id="disp">
        	<option value="nonretina">Non Retina Display</option>
          	<option value="retina">Retina Display</option>
		</select>
        
        <h4>Proccessor</h4>
        
        <select class="form-control" id="proccessor">
        	<option value="i7">Intel Core i7 3rd Gen</option>
          	<option value="i5">Intel Core i5 3rd Gen</option>
            <option value="i3">Intel Core i3 3rd Gen</option>
		</select>
        
        
        
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
        <center>
        <input type="button" class="btn btn-default" value="Search device" onclick="search(0);" /></center>
    <br />
    <br />
    <br />
    </div>
  </div>
  <div class="col-xs-12 col-md-9">
      <div id="searchBox">
        
            <div class='thumbnail'>Enter your search criteria from left pane.</div>
        
      </div>
  </div>
</div></div>

<br /><br />
<script>
setDevice('iMac');
$("#range").slider();

  $(function () {
    $('#myTab a:first').tab('show')
  })
  $('#myTab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})
search(0);
</script>
</div>
<?php
	include '../core/footer.php';
?>
</body>
</html>