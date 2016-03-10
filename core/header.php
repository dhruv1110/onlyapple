
<?php
	$auth = false;
	if(isset($_SESSION['id']))
	{
		$auth = true;
	}
	else if(isset($_COOKIE['remember']))
	{
		 $_SESSION['id'] = $_COOKIE['remember'];
		$auth = true;
		
	}
	if($auth == true)
	{
		
		 $id = $_SESSION['id'];
		$con = mysql_connect('localhost','root','');
		mysql_select_db('onlyappledb',$con);
		$result = mysql_query("SELECT first_name,last_name FROM profile WHERE user_id = '$id'");
		echo mysql_error();
		while($row = mysql_fetch_array($result))
		  {
			 $firstname = $row['first_name'];
			 $lastname = $row['last_name'];
		  }
		  mysql_close();
	}
?>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="http://localhost/onlyapple/">Apple Chain</a>
      </div>
    
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
          <li><a href="http://localhost/onlyapple/category/iPhone.php">iPhone</a></li>
          <li><a href="http://localhost/onlyapple/category/iPod.php">iPod</a></li>
          <li><a href="http://localhost/onlyapple/category/iPad.php">iPad</a></li>
          <li><a href="http://localhost/onlyapple/category/Mac.php">Mac</a></li>
        </ul>
        <form class="navbar-form navbar-left" role="search" action="http://localhost/onlyapple/search.php">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search" style="width:400px;" name="q" >
          </div>
          <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
        </form>
        <ul class="nav navbar-nav navbar-right">
        	<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"  style="padding: 8px 8px 0px 8px !important;"><span class="btn btn-primary">Submit free advertise</span></a>
                <ul class="dropdown-menu">
                  <li><a href="http://localhost/onlyapple/create/sell/">I wish to sell a product</a></li>
                  <li><a href="http://localhost/onlyapple/create/buy/">I wish to buy a product</a></li>
                </ul>
          </li>
          <?php
		  	if($auth == false)
			{
			?>
          <li><a href="http://localhost/onlyapple/login/" style="padding: 8px 8px 0px 0px !important;"><span class="btn btn-success">Login</span></a></li>
          <li><a href="http://localhost/onlyapple/new/" style="padding: 8px 8px 0px 0px !important;"><span class="btn btn-success">Register</span></a></li>
          <?php
			}
			else
			{
			?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $firstname . ' ' . $lastname; ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="http://localhost/onlyapple/myproducts.php">My ads</a></li>
                  <li><a href="http://localhost/onlyapple/settings.php">Settings</a></li>
                  <li><a href="http://localhost/onlyapple/logout.php">Logout</a></li>
                </ul>
          </li>
          <?php
			}
			?>
        </ul>
      </div><!-- /.navbar-collapse -->
    </nav>
    
    

  <!-- Modal -->
  <div class="modal fade" id="overlayModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title" id="overlayTitle"></h3>
        </div>
        <div class="modal-body" id="overlayBody">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <a class="btn btn-primary" id="overlaySeller">Contact seller</a>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  
  <script type="text/javascript">
  function productOverlay(id)
  {
	  $.getJSON("http://localhost/onlyapple/core/ajax/product.php",{id:id},function(data){
		  $("#overlayTitle").html(data.device + ' ' + data.model + ' ' + data.model_extra + ' Rs. ' + data.price);
		  $("#overlayBody").html($("#overlayBody").html() + '<img src="http://localhost/onlyapple/images/' + data.image[0] + '" style="width:100%;">');
		  for(var i=1;i<count(data.image) - 1;i++)
		  {
			  $("#overlayBody").html($("#overlayBody").html() + '<img src="http://localhost/onlyapple/images/' + data.image[i] + '" width="75" height="75" class="thumbnail" style="float:left;">');
		  }
		  $("#overlayBody").html($("#overlayBody").html() + '<img src="http://localhost/onlyapple/images/' + data.image[count(data.image) - 1] + '" width="75" height="75" class="thumbnail">');
		  $("#overlayBody").html($("#overlayBody").html() +'<div><p>' + data.description + '</p></div>');
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
		  $("#overlayBody").html($("#overlayBody").html() + '<table class="table table-striped"><tr><td>Color</td><td>' + data.color + '</td></tr><tr><td>Capacity</td><td>' + data.storage + ' GB</td></tr><tr><td>In warranty?</td><td>' + warranty + '</td></tr><tr><td>Condition</td><td>' + condition + '</td></tr><tr><td>Factory unlock?</td><td>' + unlock + '</td></tr><tr><td>Handsfree</td><td>' + handsfree + '</td></tr><tr><td>Cable</td><td>' + cable + '</td></tr><tr><td>Box</td><td>' + box + '</td></tr><tr><td>Screenguard</td><td>' + gaurd + '</td></tr><tr><td>Mobile case</td><td>' + p_case + '</td></tr></table>');
		  
		  $("#overlaySeller").attr("href", 'http://localhost/onlyapple/product.php?id=' + data.product_id);
		 
	  });
  }
  </script>