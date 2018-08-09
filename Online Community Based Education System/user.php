<?php
	include_once("lib/Session.php");
	Session::sessionStart();
?>
<?php
    include_once("lib/Database.php");
	$db = new Database();
?>
<?php include_once("inc/header.php"); ?>
<div class="container-fluid">
	<!-- user page content section start here -->
	<div class="container user-page-main-content">
		<div class="row user-page-main-content-row">
			<div class="col-lg-12 user-page-content-top">
				<div class="col-lg-8 user-page-title">
					<h4>ইউজার</h4>
				</div>
				<div class="col-lg-offset-1 col-lg-3 search-user">
					<form method="post">
						<input type='text' required placeholder="সার্চ ইউজার ......." class="form-control" id="live_search"/>
					</form>
				</div>
			</div>
					<!-- live search result show here -->
						<div class="result"></div>
			
			<!-- user details start here -->
			<?php
				$query  = "SELECT *,COUNT(User_Id) from questions GROUP BY User_Id ORDER BY COUNT(User_Id) DESC";
				$result = $db -> selectQuery($query);
				$i=1;
				if($result){
					while($data = mysqli_fetch_array($result)){
						$user_id = $data['User_Id'];
			?>
			<div class="col-lg-3 user-details">
				<?php
					$query  = "SELECT * from user_info where id='$user_id' ";
					$value = $db -> selectQuery($query);
					if($value){
						$data = mysqli_fetch_array($value);
						$user_name = $data['Full_Name'];
						$profile_pic = $data['Picture'];
						$tags = $data['Tags'];
					}
				?>
				<div class="col-lg-3 user-profile-pic">
					<a href="userProfile.php?userId=<?php echo $user_id; ?>"><img src="uploads/<?php echo $profile_pic; ?>"/></a>
				</div>
				<div class="col-lg-9 user-info">
					<h5><?php echo  $user_name; ?></h5>
						<h6>পজিশনঃ <?php echo  getBanglaDigit($i); ?></h6>
							<p>
								<?php
									$query  = "SELECT * from questions where User_Id='$user_id' ";
									$ques_query = $db -> selectQuery($query);
									if($ques_query){
										$total_ques = mysqli_num_rows($ques_query);
									}
								?>
								<i class="fa fa-circle"></i> প্রশ্ন(<?php echo  getBanglaDigit($total_ques); ?>) 
								<?php
									$query  = "SELECT * from answers where user_id='$user_id' ";
									$ans_query = $db -> selectQuery($query);
									if($ans_query){
										$total_reply = mysqli_num_rows($ans_query);
									}
								?>
								&nbsp <i class="fa fa-reply"></i> রিপ্লাই(<?php echo  getBanglaDigit($total_reply); ?>)
							</p>
					<ul>
						<?php 
						$tags=$data['Tags'];
						$tags=trim($tags,",");
						$tags=explode(" ",$tags);
						?>
						<?php foreach($tags as $tag){ ?>
							<li><a href="taggedQuestions.php?tag=<?php echo $tag; ?>"><?php echo $tag; ?></a></li>
						<?php } ?> 
					</ul>
				</div>
			</div>
				<?php $i=$i+1; } ?> <!-- end while loop -->
			<?php  } ?> <!-- end if loop -->
			<!-- user details end here -->
		</div>
	</div>
	<!-- user page content section start here -->
</div>