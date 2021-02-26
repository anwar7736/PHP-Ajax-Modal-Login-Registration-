<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
	label{
		color:red;
	}
  </style>
<body>
		<br>
		<br>
		<button type="button" id="regBtn" class="btn btn-success m-4" data-toggle="modal" data-target="#regModal">Signup</button>
	<div class="container">  
		<div class="modal fade" id="regModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-info">
					   <h4 class="modal-title" style="color:red; margin-left: 160px; font-size:30px">SIGNUP FORM</h4><br>
						<button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
					</div>
					<div class="modal-body bg-dark">
						<center><div id="message"></div></center><br>
						<strong><label>Name</label></strong><br>
						<input type="text" name="name" id="name" class="form-control" placeholder="Enter your name..."><br>
						<strong><label>Email</label></strong><br>
						<input type="email" name="email" id="email" class="form-control" placeholder="Enter your email address..."><br>
						<strong><label>Phone</label></strong><br>
						<input type="text" name="phone" id="phone" class="form-control" placeholder="Enter your contact number..."><br>
						<strong><label>Password</label></strong><br>
						<input type="password" name="pass" id="pass" class="form-control" placeholder="Enter your password..."><br>
						<strong><label>Confirm-Password</label></strong><br>
						<input type="password" name="cpass" id="cpass" class="form-control" placeholder="Re-confirm your password..."><br>
					</div>
					<div class="modal-footer bg-secondary">
						<button type="button" id="signBtn" class="form-control btn btn-success" title="Signup">SIGNUP</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function(){
			$("#signBtn").click(function(){
				
				var name = $("#name").val();
				var email = $("#email").val();
				var phone = $("#phone").val();
				var pass = $("#pass").val();
				var cpass = $("#cpass").val();
			
				if($.trim(name).length > 0 && $.trim(email).length > 0 && $.trim(phone).length > 0 && $.trim(pass).length > 0 && $.trim(cpass).length > 0)
				{
					$.ajax({
						method: "POST",
						url : "reg_core.php",
						data : {name:name, email: email, phone:phone, pass:pass, cpass:cpass},
						success : function(data)
						{
							if(data)
							{
								$("#message").html(data);
							}
							
						}
					});		
				}
				else
				{
					$("#message").html("<b style='color:red'>All fields are required!!</b>");
				}
			});
		});
	</script>
</body>
</html>
