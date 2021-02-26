<?php 
	session_start();

		if(isset($_COOKIE['CurrentUser']))
			{
				header("location:index.php");
			}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>
<body>
	
	<button type="button" class="btn btn-success m-4" data-toggle="modal" data-target="#loginModal">Login</button>
    <div class="modal fade" id="loginModal">
    	<div class="modal-dialog sm"style="border:1px solid blue">
        	<div class="modal-content">
            	<div class="modal-header">
                    	<h3 class="modal-title" style="color:red; margin-left:140px; font-weight:bold"><i class="fa fa-key bg-warning p-3" style="margin-left:50px" title="Login" ></i> <br>Admin Login</h3>
					<br>
                	<button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>              	
                 </div>
                <div class="modal-body">
				<center><div id="message"></div></center><br>
                	<label>Email or Phone :</label>
                    <input type="email" class="form-control" id="user" name="user" placeholder="Enter your email or phone..." value="<?php if(isset($_COOKIE['user'])){echo $_COOKIE['user'];}?>">
                    <br>
                    <label>Password :</label>
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Enter your password..." value="<?php if(isset($_COOKIE['pass'])){echo $_COOKIE['pass'];}?>">
					<br>
					<input type="checkbox" id="remind" name="remind" <?php if(isset($_COOKIE['user']) && isset($_COOKIE['pass'])){ ?> checked <?php }?>> Remember me<br><br>
					<a href="#" data-toggle="modal" data-target="#recModal">Forgotten password?</a>
                </div>
                <div class="modal-footer">
					<button type='button' class='form-control btn btn-success' id='loginBtn' title='Login'>Login</button>
                	
                    <br>
                	<button type="button"  class="btn btn-danger form-control" data-dismiss="modal" title="Close">Close</button>
                </div>
            </div>
        </div>
    </div>
	<div class="modal fade" id="recModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-info">
					   <h4 class="modal-title" style="color:red; margin-left: 125px; font-size:30px">RESET PASSWORD</h4><br>
						<button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
					</div>
					<div class="modal-body bg-dark">
						<center><div id="message1"></div></center><br>
						<strong><label>Email</label></strong><br>
						<input type="email" name="email" id="email" class="form-control" placeholder="Enter your email address..."><br>
						<strong><label>Password</label></strong><br>
						<input type="password" name="pass" id="pass1" class="form-control" placeholder="Enter your password..."><br>
						<strong><label>Confirm-Password</label></strong><br>
						<input type="password" name="cpass" id="cpass1" class="form-control" placeholder="Re-type your password..."><br>
					</div>
					<div class="modal-footer bg-secondary">
						<button type="button" id="recBtn" class="form-control btn btn-primary" title="Recover">RESET PASSWORD</button>
					</div>
				</div>
			</div>
		</div>
    <script>	
		$(document).ready(function(){
        	$("#loginBtn").click(function(){
				var user = $("#user").val();
				var pass = $("#pass").val();
				if($("#remind").prop("checked")==true)
					{
					var remind = $("#remind").val();
					}
				if($.trim(user).length > 0 && $.trim(pass).length > 0 )
				{
					$.ajax({
						
						method : "post",
						url : "login_core.php",
						data : {user:user, pass:pass, remind:remind},
						success : function(data)
						{
							if(data)
								
								{
									location.reload();
								}

						}
						
						
					});
					
					
				}
				else
				{
					$("#message").html("<b style='color:red'>Username & password are required!</b>");
				}
        	});
			$("#recBtn").click(function(){	
				var email = $("#email").val();
				var pass = $("#pass1").val();
				var cpass = $("#cpass1").val();
			
				if($.trim(email).length > 0 && $.trim(pass).length > 0 && $.trim(cpass).length > 0)
				{
					$.ajax({
						method: "POST",
						url : "recpass_core.php",
						data : {email: email, pass:pass, cpass:cpass},
						success : function(data)
						{
							if(data)
							{
								$("#message1").html(data);
								
							}
							
						}
					});		
				}
				else
				{
					$("#message1").html("<b style='color:red'>All fields are required!!</b>");
				}
			});
		});
    </script>
</body>
</html>
