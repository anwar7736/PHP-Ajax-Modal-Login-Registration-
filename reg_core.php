 <?php 
	 require_once('config.php');
	 $name = $_POST['name'];
	 $email = $_POST['email'];
	 $phone = $_POST['phone'];
	 $pass = $_POST['pass'];
	 $cpass = $_POST['cpass'];
	 
	 $PassAuthen = md5(sha1($cpass));
	 $UserAuthen = md5(sha1($email.$cpass));
	
	 if($pass==$cpass)
	 {
		 $checkQuery = "SELECT * FROM signup_form WHERE Email = '$email' || Phone = '$phone'";
		 $runCheckQuery = mysqli_query($con,$checkQuery);
		 if($runCheckQuery==true)
		 {
			 if(mysqli_num_rows($runCheckQuery)>0)
			 {
				 echo "<b style='color:green'>Email or Phone is already taken!!</b>";
			 }
			 else
			 {
				$insertQuery = "INSERT INTO signup_form(Name,Email,Phone,Password,Authenticate)VALUES('$name','$email','$phone','$PassAuthen','$UserAuthen')"; 
				$runInsertQuery = mysqli_query($con,$insertQuery);
				
				if($runInsertQuery==true)
				{
					echo "<b style='color:green'>Registration successfully!</b>";
					echo "<script>location.reload()</script>";
				}
			 }
		 }
		 
	 }
	 else
	 {
		 echo "<b style='color:red'>Password & Confirm-Password not match!!</b>";
	 }
 
 
 
 ?>