<?php
	include_once("lib/Session.php");
	Session::sessionStart();
?>
<?php
    include_once("lib/Database.php");
	$db = new Database();
?>
<?php
	if(isset($_GET['ques_id']) & isset($_GET['user_id'])){
		$ques_id = $_GET['ques_id'];
		$user_id = $_GET['user_id'];
	}
	if($user_id!=isset($_SESSION["Id"])){
			echo "<script>location.href='login.php'</script>";
	}
?>
	<?php include_once("inc/header.php"); ?>
	
	<section class="container-fluid">
		<div class="container main-section">
			<!-- main-section-top-row start here -->
			<div class="row spage-main-content-row">
				<div class='col-lg-9 update-reply'>
					<?php
						if(isset($_POST['reply'])){
							$reply = $_POST['content'];
							$update_time =getBanglaDate(Date('d-m-Y g:i a'));
							$query="update answers set reply='$reply',update_label='1',update_time='$update_time' where question_id='$ques_id' and user_id='$user_id' ";
							$result = $db -> selectQuestions($query);
						}
					?>
					<form method="post">
						<h6 class="well">কনটেন্ট</h6>
						<?php
							$query  = "select * from answers where question_id='$ques_id' and user_id='$user_id' ";
							$result = $db -> selectQuestions($query);
							if($result){
								while($data = mysqli_fetch_array($result)){
						?>
							<textarea class="tinymce" name="content"><?php echo $data['reply']; ?></textarea>
							<?php } ?> <!-- end while loop -->
						<?php  } ?> <!-- end if loop -->
						<input type='submit' name='reply' value='আপনার উত্তর আপডেট করুন' class='btn btn-primary col-lg-3'/>
					</form>
				</div>
				<?php include_once("inc/sidebar.php"); ?>
			</div>
			<!-- main-section-top-row end here -->
		</div>
	</section>
	<?php include_once("inc/footer.php"); ?>