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
					<a href="index.php"><img src="img/brand-logo.png" class="responsive" /></a>
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
								if(isset($_GET['action'])){
									 $check = $_GET['action'];
									}
							?>
							<?php
								if(isset($_POST['login'])){
									$email    = $_POST['email'];
									$password = $_POST['password'];
									$query    = "select * from user_info where Email='$email' and Password='$password'";
									$result   = $db -> loginQuery($query);
									if(mysqli_num_rows($result)>0){
										$data	  = mysqli_fetch_array($result);
										Session:: set("login",true);
										Session:: set("User_Name",$data['Full_Name']);
										$_SESSION["Id"] = $data['id'];
										$_SESSION["email"] = $data['Email'];
										$_SESSION["password"] = $data['Password'];
										$_SESSION["Picture"] = $data['Picture'];
										if(isset($_GET['action'])=="check"){
											echo "<script>location.href='askQuestion.php'</script>";
										}
										else if(isset($_GET['quesID'])){
											$quesID = $_GET['quesID'];
											echo "<script>location.href='single.php?id=$quesID'</script>";
										}
										else{
											echo "<script>location.href='index.php'</script>";
										}
									}
									else{
										echo "<h6 style='font-size:16px;' class='well text-danger'>Username or Password not matched..</h6>";
									}
									
								}
							?>
							<form method="post">
								<div class="group">
									<input type="text" name="email" required>
									<span class="highlight"></span>
									<span class="bar"></span>
									<label>ইমেইল</label>
								</div>
								
								<div class="group">
									<input type="password" name="password" required>
									<span class="highlight"></span>
									<span class="bar"></span>
									<label>পাসওয়ার্ড</label>
								</div>

								<div class="group">
									 <input type="submit" name="login" value="লগ ইন" class="btn btn-primary">
								</div>
							</form>
						</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>