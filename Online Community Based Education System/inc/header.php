<?php 
	date_default_timezone_set('Asia/Dhaka');
	include_once("helpers/formats.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8' />
	<title>বাংলা একাডেমী</title>
	<!-- Start Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico.png">
	<!-- End Favicon -->
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
	<!-- header section start here -->
		<div class='container-fluid main-header'>
		
			<!-- top-main-header start here -->
			<div class='container top-main-header'>
				<div class='row top-main-header-row'>
					<nav>
						<button type="button" class="navbar-toggle pull-left mobile-menu-icon" data-toggle="collapse" data-target="#main-menu"><i class="fa fa-bars"></i></button>
					</nav>
					
					<!-- subject-search section start here -->
						<div class='col-lg-5 col-md-4 col-sm-4 subject-search-section'>
							<div class="col-lg-4 col-md-5 col-sm-6 col-xs-3 sbject-item">
								<ul class='subject'>
									<li class='dropdown subject-style'><a href="#" class='dropdown-toggle' data-toggle="dropdown">বিষয় <i class='caret'></i></a>
										<ul class='dropdown-menu container dropdown-style'>
											<li class='col-lg-3 s-module'><a href="" class='secondary'>মাধ্যমিক</a>
												<div class="horizontal-line"></div>
												<ul class="s-underline-style">
													<li><a href="">৬ষ্ট শ্রেণী</a></li>
													<li><a href="">৭ম শ্রেণী</a></li> 
													<li><a href="">৮ম শ্রেণী</a></li>
												</ul>
											</li> 
											<li class='col-lg-3 hs-module'><a href="">উচ্চ মাধ্যমিক</a>
											<div class="horizontal-line"></div>
												<ul class="h-underline-style">
													<li><a href="">বিজ্ঞান বিভাগ</a></li>
													<li><a href="">ব্যবসায় শিক্ষা বিভাগ</a></li> 
													<li><a href="">কলা বিভাগ</a></li>
												</ul>
											</li>
											<li class='col-lg-6 u-module'><a href="">বিশ্ববিদ্যালয়</a>
											<div class="horizontal-line"></div>
												<div class="col-lg-4">
													<ul class="u-underline-style">
														<li><a href="varsityDeptCourseList.php?department=সিএসই">সিএসই</a></li>
														<li><a href="varsityDeptCourseList.php?department=আইসিটি">আইসিটি</a></li> 
														<li><a href="">গনিত</a></li>
													</ul>
												</div>
												<div class="col-lg-4">
													<ul class="u-underline-style">
														<li><a href="">বাংলা</a></li>
														<li><a href="">ইংলিশ</a></li> 
														<li><a href="">গনিত</a></li>
													</ul>
												</div>
												<div class="col-lg-4">
													<ul class="u-underline-style">
														<li><a href="">বাংলা</a></li>
														<li><a href="">ইংলিশ</a></li> 
														<li><a href="">গনিত</a></li>
													</ul>
												</div>
												
											</li>
										</ul>
									</li>
								</ul>
							</div>
							<div class="col-lg-8 col-md-7 col-sm-6 col-xs-12 navbar-search">
								<form method='post' class='navbar-form'>
									<div class="input-group col-lg-8" id="large-search-box">
										<input type='text' name="search" class="form-control" placeholder="সার্চ ......"/>
									</div>
								</form>
							</div>
							
							<div class="mobile-search" id="mobile-search-box">
								<i class="fa fa-search fa-lg"></i>
							</div>
						</div>
							<!-- search box after click start here -->
							<div class='col-lg-5 col-md-4 col-sm-4 col-xs-12 search-box'>
								<form method='get' class='navbar-form' action="search.php?search=<?php echo $_GET['search']; ?>">
										<div class="input-group col-lg-12 search-box-field">
											<input type='text' name="search" class="form-control" placeholder="সার্চ ......"/>
											<div class="input-group-btn">
												<button class='btn btn-default'><i class="fa fa-search"></i></button>
											</div>
										</div>
									</form>
							</div>
							<!-- search box after click end here -->
					<!-- subject-search section end here -->
					
						<div class='col-lg-2 col-md-3 col-sm-2 col-xs-8 brand-section'>
							<?php 
								$query = " select * from site_logo";
								$result = $db -> selectQuery($query);
								while($data = mysqli_fetch_array($result)){
									$logo = $data['logo'];
								?>
									<h5><a href="index.php" class='navbarbrand'><img src='admin/logo/<?php echo $logo; ?>' /></a></h5>
							<?php
								}
							?>
						</div>
					
							<!-- main-menu start here -->
							<div class='col-lg-5 col-md-5 col-sm-4 col-xs-12 right-menu collapse navbar-collapse main-menu-section' id="main-menu">
								<ul>
									<li><a href="user.php">ইউজার</a></li>
									<?php
										if(isset($_GET['action']) && $_GET['action']=="logout"){
											Session::sessionDestroy();
										}
									?>
										<?php
											$user_login = Session::get("login");
											if($user_login==true && isset($_SESSION["email"]) && isset($_SESSION["password"])){
												$user_id  = $_SESSION["Id"];
												$email    = $_SESSION["email"];
												$password = $_SESSION["password"];
												$query    = "select * from user_info where Email='$email' && Password='$password'";
												$result   = $db -> selectQuery($query);
												$row      = mysqli_num_rows($result);
												if($row>0){
										?>	
										
										<!-- notification start here -->
											<?php include_once("notification.php"); ?>
											<li class="dropdown" id="notification"><i class="fa fa-bell-o fa-lg" class='dropdown-toggle' data-toggle="dropdown"></i>
												<sup style="color:tomato;font-size:18px;font-weight:bold;">
													<?php 
													if($count!=0){
														echo $count; 
													}
													?>
												</sup>
											</li>
										<!-- notification end here -->
											<li class="dropdown login-user"><i class="fa fa-user fa-lg" class='dropdown-toggle' data-toggle="dropdown"></i>	
												<div class="dropdown-menu col-lg-12 user-menu-style">
													<div class="col-lg-5 user-pic">
														<a href="userProfile.php?userId=<?php echo $user_id; ?>"><img src="uploads/<?php echo $_SESSION["Picture"]; ?>" alt="user picture"/></a>
													</div>
													<div class="col-lg-6=7 user-item-list">
														<ul>
															<li><a href="userProfile.php?userId=<?php echo $user_id; ?>"><i class="fa fa-user"></i> Profile</a></li>
															<li><a href='?action=logout'><i class="fa fa-sign-out"></i> Logout</a></li>
														</ul>
													</div>
												</div>
											</li>
										<?php } }else{
												echo "<li><a href='login.php'><i class='fa fa-sign-in'></i>  লগ ইন</a></li>";
												echo "<li><a href='signup.php'><i class='fa fa-user'></i>  সাইন আপ</a></li>";
											}
										?>
								</ul>
							</div>
							<!-- main-menu end here -->
					
				</div>
			</div>
			<!-- top-main-header end start here -->
		
		</div>
		
			<div class="divider"></div>
			
	<!-- header section end here -->