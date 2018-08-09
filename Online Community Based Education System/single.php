<?php
	include_once("lib/Session.php");
	Session::sessionStart();
?>
<?php
    include_once("lib/Database.php");
	$db = new Database();
?>
	<?php
		if(isset($_GET['id'])){
			$id = $_GET['id'];
		}else{
			echo "<script>location.href='404.php'</script>";
		}
	?>
		<!-- notification update start here -->
		<?php
			if(isset($_GET['id']) & isset($_GET['nftn'])){
				$ques_id = $_GET['id'];
				$nftn_id = $_GET['nftn'];
				$query="update notification set value='1' where id='$nftn_id' ";
				$result = $db -> updateQuery($query);
			}
		?>
	<?php include_once("inc/header.php"); ?>
	<section class="container-fluid main-body">
		<div class="container main-section">
			<!-- main-section-top-row start here -->
			<?php
					if(isset($_GET['id'])){
						$id = $_GET['id'];
						$query  = "select * from questions where id='$id'";
					$result = $db -> selectQuestions($query);
					if($result){
						$data = mysqli_fetch_array($result);
						$views= $data['views'];
						$views = $views+1;
						$query  = "update questions set views='$views' where id='$id'";
						$result = $db -> updateQuery($query);
					}}
			?>
			
			<!-- like insert info start here -->
			<?php
			
					if(isset($_GET['id']) && isset($_GET['user_id'])){
						$question_id = $_GET['id'];
						$user_id = $_GET['user_id'];
							$query  = "select * from question_choose where user_id='$user_id' && ques_id='$question_id'";
							$result = $db -> selectQuery($query);
							$choose_count = mysqli_num_rows($result);
						if($choose_count<1){
							$data  = "insert into question_choose values('','$user_id','$question_id','1')";
							$result = $db -> likeInfoInsert($data);
						}
					}
			?>
			<div class="row spage-main-content-row">
				<?php
					$query  = "select * from questions where id='$id'";
					$result = $db -> selectQuestions($query);
					if($result){
						$data = mysqli_fetch_array($result);
						$user_id= $data['User_Id'];
				?>
				<div class="col-lg-9 spage-main-content-column">
						<?php
							if(isset($_POST['reply'])){
								$msg = $db -> insert_reply($_POST,$id);
								echo $msg;
							}
						?>
					<div class="col-lg-12 spage-top">
						<div class="question-title">
							<h4><?php echo $data['Title']; ?></h4>
						</div>
					</div>
					<div class="col-lg-12 spage-content">
						<?php echo $data['Content']; ?>
						<div class="col-lg-12 post-tags">
							<div class="col-lg-9 post-tag-title">
								<ul>
									<?php 
										$tags=$data['Tags'];
										$tags=trim($tags);
										$tags=explode(" ",$tags);
										?>
										<?php foreach($tags as $tag){ ?>
											<li><a href="taggedQuestions.php?tag=<?php echo $tag; ?>" class="btn btn-default"><?php echo $tag; ?></a></li>
									<?php } ?> 
								</ul>
							</div>
							<div class="col-lg-3 post-like-share">
								<ul>
								<?php if(isset($_SESSION['Id'])){ ?>
									<li><a href="single.php?id=<?php echo $id; ?> && user_id=<?php echo $_SESSION['Id']; ?>" class="btn btn-primary"><i class="fa fa-thumbs-up"></i> লাইক
									(
									<?php 
										$query  = "select * from question_choose where ques_id='$id'";
										$result = $db -> selectQuery($query);
										$choose_count = mysqli_num_rows($result);
										echo $choose_count;
									?>
									)
									</a></li>
								<?php }else{ ?>
									<li onclick="alert('লাইক দিতে লগইন করে নিন');"><a href="#" class="btn btn-primary"><i class="fa fa-thumbs-up"></i> লাইক 
									(
									<?php 
										$query  = "select * from question_choose where ques_id='$id'";
										$result = $db -> selectQuery($query);
										$choose_count = mysqli_num_rows($result);
										echo $choose_count;
									?>
									)
									</a></li>
								<?php } ?>
								<li><a href=""class="btn btn-primary"><i class="fa fa-facebook"></i> শেয়ার</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-12 post-user">
							<div class="col-lg-4 post-user-img">
								<?php
									$query  = "select * from user_info where id='$user_id'";
									$result = $db -> selectQuestions($query);
									$value = mysqli_fetch_array($result);
								?>
								<a href="userProfile.php?userId=<?php echo $user_id; ?>"><img src="uploads/<?php echo $value['Picture']; ?>"/></a>
							</div>
							<div class="col-lg-4 post-user-info">
								<h6><a href="userProfile.php?userId=<?php echo $user_id; ?>"><?php echo $data['User_Name']; ?></a></h6>
								<p>
								<?php
									$query  = "select * from questions where User_Id='$user_id'";
									$result = $db -> selectQuestions($query);
									$total_rows = mysqli_num_rows($result);
								?>
								<i class="fa fa-circle"></i> প্রশ্ন(<?php echo $total_rows; ?>) 
								<?php
									$query  = "select * from answers where user_id='$user_id'";
									$result = $db -> selectQuery($query);
									$reply_count = mysqli_num_rows($result);
								?>
								<i class="fa fa-circle"></i> রিপ্লাই(<?php echo $reply_count; ?>) </p>
							</div>
							<div class="col-lg-4 question-time">
									<p>প্রশ্ন করেছেন <?php echo $data['Time']; ?></p>
								</div>
						</div>
					</div>
						<?php  } ?> <!-- end if loop -->
					<!-- question to answer start here -->
					<div class="col-lg-12 question-to-answer">
						<?php
							$query  = "select * from answers where question_id='$id' order by id desc";
							$result = $db -> selectQuery($query);
							$data = mysqli_num_rows($result);
							if($result){
						?>
						<h6>উত্তরসমূহ(<?php echo $data; ?>)</h6>
						<div class="ans-separator"></div>
						<?php  } ?> <!-- end if loop -->
						
							<?php
								$query  = "SELECT ans.*,ui.* from answers as ans,user_info as ui where ans.user_id=ui.id and ans.question_id='$id'";
								$result = $db -> selectQuery($query);
								if($result){
									while($data = mysqli_fetch_array($result)){
										$user_id = $data['user_id'];
							?>
						<div class="col-lg-12 answer-content">
							<?php echo $data['reply']; ?>
							<div class="col-lg-12 answered-user">
								<div class="col-lg-3 ans-edit">
								<?php if(isset($_SESSION["Id"]) && $_SESSION["Id"] == $user_id){ ?>
									<p><a href="updateReply.php?ques_id=<?php echo $data['question_id']; ?> & user_id=<?php echo $user_id; ?>">আপডেট</a></p>
								<?php } ?>
								</div>
								<div class="col-lg-5 ans-time">
									<p>উত্তর দিয়েছেন <?php echo $data['time']; ?></p>
								</div>
								
								
								<div class="col-lg-3 ans-user-name">
									<span><a href="userProfile.php?userId=<?php echo $user_id; ?>"><?php echo $data['Full_Name']; ?></a></span>
									<p>
									<?php
										$query  = "select * from questions where User_Id='$user_id'";
										$ques = $db -> selectQuery($query);
										$ques_count = mysqli_num_rows($ques);
									?>
									<i class="fa fa-circle"></i> প্রশ্ন(<?php echo $ques_count; ?>) 
									<?php
										$query  = "select * from answers where user_id='$user_id'";
										$ans = $db -> selectQuery($query);
										$ans_count = mysqli_num_rows($ans);
									?>
									<i class="fa fa-circle"></i> রিপ্লাই(<?php echo $ans_count; ?>) </p>
								</div>
								<div class="col-lg-1 ans-user-img">
									<a href="userProfile.php?userId=<?php echo $user_id; ?>"><img src="uploads/<?php echo $data['Picture']; ?>"/></a>
								</div>
									
								
							</div>
						</div>
							<?php } ?> <!-- end while loop -->
						<?php  } ?> <!-- end if loop -->
					</div>
					<!-- question to answer end here -->
					<div class="col-lg-12 reply" id="hh">
						<h6 >আপনার উত্তর</h6>
						<form method="post">
						<textarea class="tinymce" name="content"></textarea>
							<?php
								$user_login = Session::get("login");
								if($user_login==true){
									
									echo "<input type='submit' name='reply' value='আপনার উত্তর পোস্ট করুন' class='btn btn-primary col-lg-3'/>";
								}
								else{
							?>
									<p class='btn btn-info'><a href='login.php?quesID=<?php echo $id; ?>'>উত্তর দেয়ার পূর্বে লগ ইন করে নিন</a></p>;
							<?php	
								}
							?>
						
						</form>
					</div>
				</div>
				<?php include_once("inc/sidebar.php"); ?>
			</div>
			<!-- main-section-top-row end here -->
		</div>
	</section>
	<?php include_once("inc/footer.php"); ?>