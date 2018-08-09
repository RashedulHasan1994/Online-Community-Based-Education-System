<?php include_once("inc/header.php"); ?>
		<div class="row main-content">
			<?php include_once("inc/sidebar.php"); ?>
			<div class="col-lg-10 siteSlogan-panel-body">
				<div class="col-lg-12 page-title">
					<h4>Admin Profile</h4>
				</div>
					<div class="col-lg-12 adminProfile">
						<?php
							$query  = "select * from admin_info where id='$admin_id'";
							$result = $db-> selectQuery($query);
							$data   = mysqli_fetch_array($result);
								$user_name	 = $data ['User_Name'];
								$email	     = $data ['Email'];
								$address	 = $data ['Address'];
								$profile_pic = $data ['Image'];
						?>
						<div class="col-lg-offset-1 col-lg-5 profileInfo">
							<h2><?php echo $user_name; ?></h2>
							<p><i class="fa fa-envelope"></i> <?php echo $email; ?></p>
							<p><i class="fa fa-home"></i> <?php echo $address; ?></p><br>
							<a href="editProfile.php?adminId=<?php echo $admin_id; ?>"><i class="btn btn-primary">Edit Profile</i></a> &nbsp
							<a href="addAdmin.php?adminId=<?php echo $admin_id; ?>"><i class="btn btn-primary">Add Admin</i></a>
						</div>
						<div class="col-lg-5 profilePic">
							<img src="uploads/<?php echo $profile_pic; ?>"/>
						</div>
					</div>
			</div>
		</div>
<?php include_once("inc/footer.php"); ?>