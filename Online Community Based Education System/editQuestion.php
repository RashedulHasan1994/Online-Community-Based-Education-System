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
	if(isset($_GET['id']) & isset($_GET['userID'])){
					$ques_id = $_GET['id'];
					$userID = $_GET['userID'];
	}
 ?>
<div class="container">
	<div class="row">
			<!-- update question query start here -->
			<?php
				if(isset($_POST['quesUpdate'])){
					$title = $_POST['title'];
					$content = $_POST['content'];
					$update_time =getBanglaDate(Date('d-m-Y g:i a'));
					$query="update questions set Title='$title',Content='$content' where id='$ques_id' ";
					$result = $db -> updateQuery($query);
					if($result){
						echo "<script>
							var conf = confirm('আপনার ইনপুট ডাটা সফলভাবে আপডেট করা হয়েছে ......');
							if(conf==true || conf==false){
								location.href='userProfile.php?userId=$userID'
							}
						</script>";
						
					}
				}
			?>
			<!-- update question query end here -->
		<div class="col-lg-12 editQuestion-main-col">
			<form method="post">
			<?php
				$query  = "select * from questions where id='$ques_id'";
				$result = $db -> selectQuestions($query);
				if($result){
					$data = mysqli_fetch_array($result);
					$title= $data['Title'];
					$quesContent= $data['Content'];
				}
			?>
				<div class="form-group col-lg-7">
					<h3>টাইটল</h3>
					<input type="text" name="title" class="form-control" value="<?php echo $title; ?>"/>
				</div>
					<div class="form-group col-lg-12">
						<h3>কনটেন্ট</h3>
						<textarea class="tinymce" name="content"><?php echo $quesContent; ?></textarea>
					</div>
						<div class="form-group col-lg-6" style="margin-top:15px;margin-bottom:30px;">
							<input type="submit" name="quesUpdate" class="btn btn-success" value="আপনার প্রশ্ন আপডেট করুন" />
						</div>
			</form>
		</div>
	</div>
</div>
<?php include_once("inc/footer.php"); ?>