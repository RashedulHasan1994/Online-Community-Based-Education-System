<?php
	include_once("helpers/formats.php");
    include_once("lib/Database.php");
	$db = new Database();
?>
<div class="col-lg-12 live-search-main">
<?php
	$search = $_POST['search'];
	$query  = "SELECT * from user_info where Full_Name like '%$search%' ";
	$result = $db -> selectQuery($query);
	$total_rows = mysqli_num_rows($result);
	if($total_rows>0){
		while($data=mysqli_fetch_array($result)){
		$user_id = $data['id'];
		$user_name = $data['Full_Name'];
		$profile_pic = $data['Picture'];
	?>
			
					<div class="col-lg-3 live-search">
						<div class="col-lg-3 user-profile-pic">
							<a href=""><img src="uploads/<?php echo $profile_pic; ?>"/></a>
						</div>
						<div class="col-lg-9 user-info">
							<?php echo  $user_name; ?>
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
										$total_ans = mysqli_num_rows($ans_query);
									}
								?>
								<i class="fa fa-reply"></i> রিপ্লাই(<?php echo  getBanglaDigit($total_ans); ?>)
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
		<?php } ?>
			</div>
<?php
	} 
	else{
		echo "<div class='col-lg-12' style='margin-bottom:20px;'>";
			echo "<div class='col-lg-3 live-search-not-found'>";
				echo "আপনার সার্চ ডাটা পাওয়া যাচ্ছে না";
			echo "</div>";
		echo "</div>";
	}
?>
