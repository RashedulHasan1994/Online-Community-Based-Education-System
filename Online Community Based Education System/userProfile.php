<?php
	include_once("lib/Session.php");
	Session::sessionStart();
?>
<?php
    include_once("lib/Database.php");
	$db = new Database();
?>
<?php include_once("inc/header.php"); ?>

<!-- userProfile main section start here -->
<div class="container">
	<?php
		if(isset($_GET['userId'])){
			$userId = $_GET['userId'];
			$query  = "select * from user_info where id='$userId'";
			$result = $db -> selectQuery($query);
				if($result){
					while($data = mysqli_fetch_array($result)){
						$full_name = $data['Full_Name'];
						$profile_pic = $data['Picture'];
						$email = $data['Email'];
						$phone = $data['Phone'];
						$address = $data['Address'];
					}
				}
		}
	?>
	<div class="row">
		<div class="col-lg-3 userProfile-left-col">
			<div class="col-lg-12 profile-pic">
				<img src="uploads/<?php echo $profile_pic; ?>"/>
				<center><h3 style="margin-bottom:20px;"><?php echo $full_name; ?><h3></center>
			</div>
				<!-- user basic info start here -->
				<div class="col-lg-12 user-basic-info">
					<p><i class="fa fa-envelope"></i> &nbsp <?php echo $email; ?></p>
					<p><i class="fa fa-address-card-o"></i> &nbsp <?php echo $address; ?></p>
					<p><i class="fa fa-phone"></i> &nbsp <?php echo $phone; ?></p>
					<p>
						<?php
							$query  = "SELECT * from questions where User_Id='$userId' ";
							$ques_query = $db -> selectQuery($query);
							if($ques_query){
								$total_ques = mysqli_num_rows($ques_query);
							}
						?>
						<i class="fa fa-circle"></i> প্রশ্ন(<?php echo  getBanglaDigit($total_ques); ?>) &nbsp &nbsp
							<?php
								$query  = "SELECT * from answers where user_id='$userId' ";
								$ans_query = $db -> selectQuery($query);
								if($ans_query){
									$total_reply = mysqli_num_rows($ans_query);
								}
							?>
						<i class="fa fa-reply"></i> রিপ্লাই(<?php echo  getBanglaDigit($total_reply); ?>) 
					</p>
					<!-- tag section start here -->
					<?php
						$query  = "select * from user_info where id='$userId'";
						$result = $db -> selectQuery($query);
						if($result){
							while($data = mysqli_fetch_array($result)){
								$tags=$data['Tags'];
								$tags=trim($tags);
								$tags=explode(" ",$tags);
					 foreach($tags as $tag){
					 ?>
						<i class="btn btn-primary"><?php echo $tag; ?></i> 
					<?php } } } ?> 
					<!-- tag section end here -->
					
					<?php if(isset($_SESSION["Id"]) && $_SESSION["Id"] == $userId){ ?>
					<span style="float:right;margin-top:60px;"><u><a href="editProfile.php?userID=<?php echo $userId; ?>">Edit Profile</a></u></span>
					<?php } ?>
				</div>
				<!-- user basic info end here -->
		</div>
		<div class="col-lg-9 userProfile-right-col">
			<div class="col-lg-12 user-questionList">
				<ul>
					<?php	
						$query  = "select * from questions where User_Id='$userId' order by id desc";
						$result = $db -> selectQuery($query);
							if($result){
								while($data = mysqli_fetch_array($result)){
									$id = $data['id'];
									$title = $data['Title'];
					?>
								 <li><a href="single.php?id=<?php echo $id; ?>"><?php echo $title; ?></a> 
								 <?php if(isset($_SESSION["Id"]) && $_SESSION["Id"] == $userId){ ?>
								 <span style="font-size:14px;float:right;margin-right:15px;">
								 <a href="editQuestion.php?id=<?php echo $id; ?> && userID=<?php echo $userId; ?>"><u>Edit</u></a> &nbsp &nbsp 
								 <a href="deleteQuestion.php?QuesId=<?php echo $id; ?> && userID=<?php echo $userId; ?> "><u>Delete</u></a>
								 </span>
								 <?php } ?>
								 </li>
					<?php
								}
							}
					?>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- userProfile main section end here -->