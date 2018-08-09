<?php
	include_once("lib/Session.php");
	Session::sessionStart();
?>
<?php 
	date_default_timezone_set('Asia/Dhaka');
	include_once("helpers/formats.php");
?>
<?php
    include_once("lib/Database.php");
	$db = new Database();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8' />
	<link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'/>
	<link rel='stylesheet' type='text/css' href='font-awesome/css/font-awesome.min.css'/>
	<link rel='stylesheet' type='text/css' href='css/style.css'/>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/tinymce/tinymce.min.js"></script>
	<script src="js/tinymce/tinymce-init.js"></script>
	<script src="js/main.js"></script>
</head>
<body>
	<div class="container-fluid login-form">
		<div class="container">
			<div class="row">
				<div class="col-lg-offset-5 col-lg-12 login-page-siteBrand">
					<a href="login.php"><img src="img/brand-logo.png" class="responsive" /></a>
				</div>
				<div class="col-lg-offset-4 col-lg-4 form-body" id="panel">
					<div class="col-lg-12 login-image text-center">
						<img src="img/login_icon.png" class="responsive "/>
					</div>
						<div class="col-lg-12">
							<?php 
								include_once("lib/Database.php"); 
								$db = new Database();
							?>
							<?php
								if(isset($_POST['admin_login'])){
									$admin_email    = $_POST['admin_email'];
									$admin_password = $_POST['admin_password'];
									$query    = "select * from admin_info where Email='$admin_email' and Password='$admin_password'";
									$result   = $db -> adminLoginQuery($query);
									if(mysqli_num_rows($result)>0){
										$data	  = mysqli_fetch_array($result);
										Session:: set("admin_login",true);
										Session:: set("User_Name",$data['User_Name']);
										$_SESSION["Admin_Id"] = $data['id'];
										$_SESSION["userName"] = $data['User_Name'];
										$_SESSION["Admin_Image"] = $data['Image'];
										echo "<script>location.href='index.php'</script>";
									}
									else{
										echo "<h6 style='font-size:16px;' class='well text-danger'>Username or Password not matched..</h6>";
									}
									
								}
							?>
							<form method="post">
								<div class="group">
									<input type="text" name="admin_email" required>
									<span class="highlight"></span>
									<span class="bar"></span>
									<label>ইমেইল</label>
								</div>

								<div class="group">
									<input type="password" name="admin_password" required>
									<span class="highlight"></span>
									<span class="bar"></span>
									<label>পাসওয়ার্ড</label>
								</div>

								<div class="group">
									 <input type="submit" name="admin_login" value="লগ ইন" class="btn btn-primary">
								</div>
							</form>
						</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>