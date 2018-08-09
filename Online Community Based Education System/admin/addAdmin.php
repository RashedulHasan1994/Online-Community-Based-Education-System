<?php include_once("inc/header.php"); ?>
		<div class="row main-content">
			<?php include_once("inc/sidebar.php"); ?>
			<div class="col-lg-10 siteSlogan-panel-body">
				<div class="col-lg-12 page-title">
					<h4>Add Admin</h4>
				</div>
					<div class="col-lg-12 editProfile">
						<?php
							if(isset($_GET['adminId'])){
								$adminId = $_GET['adminId'];
							}
						?>
							<!-- insert admin info  start here -->
								<?php
									if(isset($_POST['addAdmin'])){
										$admin_name   = $_POST['admin_name'];
										$email       = $_POST['email'];
										$address       = $_POST['address'];
										$password    = $_POST['password'];
										$confirm_password    = $_POST['confirm-password'];
										$file_name=$_FILES['profilePic']['tmp_name'];
										$image_name = uniqid().$_FILES['profilePic']['name'];
										$destination = "uploads/".$image_name;
										if($password != $confirm_password ){
											echo "<h5 class='col-lg-offset-3' style='color:red;margin-top: 0px;margin-bottom: 20px;'>Password din not match</h5>";
										}
										else{
											$picture = move_uploaded_file($file_name,$destination);
											$query = "insert into admin_info values('','$admin_name','$email','$password','$address','$image_name')";
											$result = $db -> insertQuery($query);
												if($result){
													echo "<script>
														var conf = confirm('Successfully Inserted.....');
														if(conf==true || conf==false){
															location.href='adminProfile.php?adminId=$admin_id'
														}
													</script>";
												}
										}
									}
								?>
							<!-- insert admin info  end here -->
						<form method="post" enctype="multipart/form-data">
							<div class='form-group col-lg-8'>
								<div class="col-lg-4 field-title">
									<p style="font-weight:bold;">User Name <sup style="color:red;">*</sup></p>
								</div>
									<div class="col-lg-8">
										<input type='text' name='admin_name' required class="form-control" />
									</div>
							</div>
								<div class='form-group  col-lg-8'>
									<div class="col-lg-4 field-title">
										<p style="font-weight:bold;">Email <sup style="color:red;">*</sup></p>
									</div>
										<div class="col-lg-8">
											<input type='text' name='email' required class="form-control" />
										</div>
								</div>
							<div class='form-group col-lg-8'>
								<div class="col-lg-4 field-title">
									<p style="font-weight:bold;">Address</p>
								</div>
									<div class="col-lg-8">
										<input type='text' name='address' class="form-control" />
									</div>
							</div>
								<div class='form-group col-lg-8'>
									<div class="col-lg-4 field-title">
										<p style="font-weight:bold;"> Password <sup style="color:red;">*</sup></p>
									</div>
										<div class="col-lg-8">
											<input type='password' name='password' required class="form-control" />
										</div>
								</div>
							<div class='form-group col-lg-8'>
								<div class="col-lg-4 field-title">
									<p style="font-weight:bold;">Confirm Password <sup style="color:red;">*</sup></p>
								</div>
									<div class="col-lg-8">
										<input type='password' name='confirm-password' required class="form-control" />
									</div>
							</div>
								<div class='form-group  col-lg-8'>
									<div class="col-lg-4 field-title">
										<p style="font-weight:bold;">Profile Pic <sup style="color:red;">*</sup></p>
									</div>
										<div class="col-lg-8">
											<input type='file' name='profilePic' required />
										</div>
								</div>
							<div class='form-group col-lg-offset-3 col-lg-4'>
								<input type="submit" name="addAdmin" value="Add Admin" class="btn btn-primary col-lg-4"/>
							</div>
						</form>
					</div>
			</div>
		</div>
<?php include_once("inc/footer.php"); ?>