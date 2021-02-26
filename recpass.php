 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Password Recover</title>
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
		<button type="button" class="btn btn-success m-4" data-toggle="modal" data-target="#recModal">Signup</button>
	<div class="container">  
		<div class="modal fade" id="recModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-info">
					   <h4 class="modal-title" style="color:red; margin-left: 125px; font-size:30px">RESET PASSWORD</h4><br>
						<button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
					</div>
					<div class="modal-body bg-dark">
						<center><div id="message"></div></center><br>
						<strong><label>Email</label></strong><br>
						<input type="email" name="email" id="email" class="form-control" placeholder="Enter your email address..."><br>
						<strong><label>Password</label></strong><br>
						<input type="password" name="pass" id="pass" class="form-control" placeholder="Enter your password..."><br>
						<strong><label>Confirm-Password</label></strong><br>
						<input type="password" name="cpass" id="cpass" class="form-control" placeholder="Re-type your password..."><br>
					</div>
					<div class="modal-footer bg-secondary">
						<button type="button" id="recBtn" class="form-control btn btn-primary" title="Recover">RESET PASSWORD</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function(){
			$("#recBtn").click(function(){	
				var email = $("#email").val();
				var pass = $("#pass").val();
				var cpass = $("#cpass").val();
			
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
