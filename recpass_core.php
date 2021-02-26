  <?php 
	 require_once('config.php');
	 $email = $_POST['email'];
	 $pass = $_POST['pass'];
	 $cpass = $_POST['cpass'];
	 
	
	 if($pass==$cpass)
	 {
		 $PassAuthen = md5(sha1($cpass));
		 $UserAuthen = md5(sha1($email.$cpass));
		 $checkQuery = "SELECT * FROM login_system WHERE Email = '$email'";
		 $runCheckQuery = mysqli_query($con,$checkQuery);
		 if($runCheckQuery==true)
		 {
			 if(mysqli_num_rows($runCheckQuery)===1)
			 {
				 $updateQuery = "UPDATE login_system SET Password = '$PassAuthen', Authenticate = '$UserAuthen' WHERE Email = '$email'";
				 $runUpdateQuery = mysqli_query($con,$updateQuery);
				 if($runUpdateQuery==true)
				 {
					 echo "<b style='color:green'>Password recover successfully!</b>";
					 
				 
				 }
			}
			 else
			 {
				 echo "<b style='color:red'>User not found!!</b>";
			 }
		 
		}
	 }
	 else
	 {
		 echo "<b style='color:red'>Password & Confirm-Password not match!!</b>";
	 }
 
 ?>