<?php
	include_once("lib/Session.php");
	Session::sessionStart();
?>
<?php
	include_once("lib/Database.php");
	$db = new Database();
?>
<?php
	
	if(!isset($_SESSION["userName"])){
			echo "<script>location.href='login.php'</script>";
	}
?>
<?php
 if(isset($_SESSION["Admin_Id"])){
			$admin_id = $_SESSION["Admin_Id"];
	}
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
	<div class="container-fluid admin-body">
		<!-- header start here -->
		<div class="row header">
			<div class="col-lg-12 branding">
				<div class="col-lg-3 site-name">
					<p>বাংলা একাডেমী</p>
				</div>
				<div class="col-lg-4"></div>
				<div class="col-lg-5 admin-item">
					<div class="admin-item-pos">
						<ul>
							<li>Hello, <?php echo $_SESSION['userName']; ?></li>
							<!-- <li><i class="fa fa-bell-o fa-lg" ></i></li> -->
							<li class="dropdown"><i class="fa fa-user fa-lg" class='dropdown-toggle' data-toggle="dropdown"></i>	
								<div class="dropdown-menu col-lg-12 dd-menu-style">
									<div class="col-lg-5 admin-pic">
										<a href="adminProfile.php?adminId=<?php echo $admin_id; ?>"><img src="uploads/<?php echo $_SESSION["Admin_Image"]; ?>"/></a>
									</div>
									<div class="col-lg-6=7 admin-item-list">
										<ul>
											<?php
												if(isset($_GET['action']) && $_GET['action']=="logout"){
													Session::sessionDestroy();
												}
											?>
											<a href="adminProfile.php?adminId=<?php echo $admin_id; ?>"><li><i class="fa fa-user"></i> Profile</li></a>
											<li><a href='?action=logout'><i class="fa fa-sign-out"></i> Logout</a></li>
										</ul>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-12 haeder-menu">
				<ul>
					<li><a href="index.php"><i class="fa fa-dashboard fa-lg"></i> Dashboard</a></li>
					<li><a href="adminProfile.php?adminId=<?php echo $admin_id; ?>"><i class="fa fa-user fa-lg"></i> Profile</a></li>
				</ul>
			</div>
		</div>
		<!-- header end here -->