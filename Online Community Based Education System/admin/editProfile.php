<?php include_once("inc/header.php"); ?>
		<div class="row main-content">
			<?php include_once("inc/sidebar.php"); ?>
			<div class="col-lg-10 siteSlogan-panel-body">
				<div class="col-lg-12 page-title">
					<h4>Update Profile</h4>
				</div>
					<div class="col-lg-12 editProfile">
						<?php
							if(isset($_GET['adminId'])){
							$adminId = $_GET['adminId'];
							$query  = "select * from admin_info where id='$adminId'";
							$result = $db-> selectQuery($query);
							$data   = mysqli_fetch_array($result);
								$user_name	= $data ['User_Name'];
								$email	= $data ['Email'];
								$address	= $data ['Address'];
								$password	= $data ['Password'];
								$profile_pic	= $data ['Image'];
							}
						?>
						<form method="post" enctype="multipart/form-data">
							<div class='form-group col-lg-8'>
								<div class="col-lg-4 field-title">
									<p style="font-weight:bold;">User Name</p>
								</div>
									<div class="col-lg-8">
										<input type='text' name='admin_name'  value="<?php echo $user_name; ?>" class="form-control" />
									</div>
							</div>
								<div class='form-group  col-lg-8'>
									<div class="col-lg-4 field-title">
										<p style="font-weight:bold;">Email</p>
									</div>
										<div class="col-lg-8">
											<input type='text' name='email'  value="<?php echo $email; ?>" class="form-control" />
										</div>
								</div>
							<div class='form-group col-lg-8'>
								<div class="col-lg-4 field-title">
									<p style="font-weight:bold;">Address</p>
								</div>
									<div class="col-lg-8">
										<input type='text' name='address'  value="<?php echo $address; ?>" class="form-control" />
									</div>
							</div>
								<div class='form-group col-lg-8'>
									<div class="col-lg-4 field-title">
										<p style="font-weight:bold;">Password</p>
									</div>
										<div class="col-lg-8">
											<input type='password' name='password'  value="<?php echo $password; ?>" class="form-control" />
										</div>
								</div>
							<div class='form-group col-lg-8'>
								<div class="col-lg-4 field-title">
									<p style="font-weight:bold;">Confirm Password</p>
								</div>
									<div class="col-lg-8">
										<input type='password' name='confirm-password' class="form-control" />
									</div>
							</div>
								<div class='form-group  col-lg-8'>
									<div class="col-lg-4 field-title">
										<p style="font-weight:bold;">Profile Pic</p>
									</div>
										<div class="col-lg-8">
											<input type='file' name='profilePic'  />
										</div>
								</div>
							<div class='form-group col-lg-offset-3 col-lg-4'>
								<input type="submit" name="update" value="Update" class="btn btn-primary col-lg-4"/>
							</div>
						</form>
						<!-- update user info query start here -->
							<?php
								if(isset($_POST['update'])){
									$admin_name   = $_POST['admin_name'];
									$email       = $_POST['email'];
									$address       = $_POST['address'];
									$password    = $_POST['password'];
									$confirm_password    = $_POST['confirm-password'];
									$tmp_file_name=$_FILES['profilePic']['tmp_name'];
									$original_file_name = $_FILES['profilePic']['name'];
									if($original_file_name != ""){
									$image_name = uniqid().$original_file_name;}
									else{
										$image_name = $profile_pic;
									}
										$destination = "uploads/".$image_name;
										$picture = move_uploaded_file($tmp_file_name,$destination);
									$query="update admin_info set User_Name='$admin_name',Email='$email',Password='$password',Address='$address',Image='$image_name' where id='$adminId' ";
									$result = $db -> updateQuery($query);
									if($result){
										echo "<script>
											var conf = confirm('আপনি সফলভাবে আপডেট সম্পন্ন করেছেন ......');
											if(conf==true || conf==false){
												location.href='adminProfile.php?adminId=$admin_id'
											}
										</script>";
									}
								}
							?>
						<!-- update user info query end here -->
					</div>
			</div>
		</div>
<?php include_once("inc/footer.php"); ?>