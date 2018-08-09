<?php
	include_once("lib/Session.php");
	Session::sessionStart();
?>
<?php
    include_once("lib/Database.php");
	$db = new Database();
?>
<?php include_once("inc/header.php"); ?>
<?php
	if(isset($_GET['userID'])){
					$userID = $_GET['userID'];
	}
 ?>
<div class="container">
	<div class="row">
		<div class="col-lg-12 editProfile-main-col">
			
			<form method="post" enctype="multipart/form-data">
			<?php
				$query  = "select * from user_info where id='$userID'";
				$result = $db -> selectQuery($query);
					if($result){
						$data = mysqli_fetch_array($result);
						$full_name = $data['Full_Name'];
						$profile_pic = $data['Picture'];
						$email = $data['Email'];
						$tag = $data['Tags'];
						$phone = $data['Phone'];
						$password = $data['Password'];
						$address = $data['Address'];
						
					}
			?>
			<div class="col-lg-7 editProfile-main-section">
				<div class="form-group col-lg-offset-3 col-lg-12">
					<h4>নাম</h4>
					<input type="text" name="full-name" class="form-control" value="<?php echo $full_name; ?>"/>
				</div>
				<div class="form-group col-lg-offset-3 col-lg-12">
					<h4>ইমেইল</h4>
					<input type="text" name="email" class="form-control" value="<?php echo $email; ?>"/>
				</div>
				<div class="form-group col-lg-offset-3 col-lg-12">
					<h4>ফোন নাম্বার <h4>
					<input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>"/>
				</div>
				<div class="form-group col-lg-offset-3 col-lg-12">
					<h4>ট্যাগ<h4>
					<input type="text" name="tag" class="form-control" value="<?php echo $tag; ?>"/>
				</div>
				<div class="form-group col-lg-offset-3 col-lg-12">
					<h4>পাসওয়ার্ড<h4>
					<input type="password" name="password" id="password" class="form-control" value="<?php echo $password; ?>"/>
				</div>
				<div class="form-group col-lg-offset-3 col-lg-12">
					<h4>কনফার্ম পাসওয়ার্ড<h4>
					<input type="password" name="confirm-password" id="confirm_password" class="form-control"/>
					<h6 id="confirm_password_msg" style="color:red;font-size: 14px;"></h6>
				</div>
				<div class="form-group col-lg-offset-3 col-lg-12">
					<h4>এড্রেস<h4>
					<textarea type="text" name="address" class="form-control"><?php echo $address; ?></textarea>
				</div>
				<div class="form-group col-lg-offset-3 col-lg-12">
					<h4>প্রোফাইল পিকচার<h4>
					<input type="file" name="picture" value="1"/><?php echo $profile_pic; ?>
				</div>
						<div class="form-group col-lg-offset-3 col-lg-6" style="margin-top:15px;margin-bottom:30px;">
							<input type="submit" name="updateInfo" class="btn btn-success" value="আপনার ডাটা আপডেট করুন" />
						</div>
				</div>
			</form>
			
			<!-- update user info query start here -->
			<?php
				if(isset($_POST['updateInfo'])){
					$full_name   = $_POST['full-name'];
					$email       = $_POST['email'];
					$phone       = $_POST['phone'];
					$tag         = $_POST['tag'];
					$password    = $_POST['password'];
					$address     = $_POST['address'];
					$tmp_file_name=$_FILES['picture']['tmp_name'];
					$original_file_name = $_FILES['picture']['name'];
					if($original_file_name != ""){
					$image_name = uniqid().$original_file_name;}
					else{
						$image_name = $profile_pic;
					}
						$destination = "uploads/".$image_name;
						$picture = move_uploaded_file($tmp_file_name,$destination);
					$query="update user_info set Full_Name='$full_name',Email='$email',Password='$password',Phone='$phone',Tags='$tag',Address='$address',Picture='$image_name' where id='$userID' ";
					$result = $db -> updateQuery($query);
					if($result){
						echo "<script>
							var conf = confirm('আপনি সফলভাবে আপডেট সম্পন্ন করেছেন ......');
							if(conf==true || conf==false){
								location.href='userProfile.php?userId=$userID'
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