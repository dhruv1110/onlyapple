<?php
session_start();
	$auth = false;
	if(isset($_SESSION['id']))
	{
		unset($_SESSION['id']);
	}
	setcookie("remember","",time()-3600,'/');
		
	
	header('Location: http://localhost/onlyapple/');
	?>