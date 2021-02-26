<?php 
	session_start();
	
	require_once('config.php');
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$remind = $_POST['remind'];
	
	$UserAuthen = md5(sha1($user.$pass));
	$check = "SELECT * FROM login_system WHERE Authenticate = '$UserAuthen'";
	$runCheckQuery = mysqli_query($con,$check);
	if($runCheckQuery==true)
	{
		if(mysqli_num_rows($runCheckQuery)===1)
		{
			if($remind!='')
			{
				setcookie("user",$user,time()+(86400*7));
				setcookie("pass",$pass,time()+(86400*7));
				
			}
			else
			{
				setcookie("user","");
				setcookie("pass","");
			}
			setcookie("CurrentUser",$UserAuthen,time()+(86400*7));
		}
			
	}
	
	?>