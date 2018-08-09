<?php
	include_once("lib/Session.php");
	Session::sessionStart();
?>
<?php
    include_once("lib/Database.php");
	$db = new Database();
?>
<?php
	if(isset($_GET['action']) && $_GET['action']=="check"){
		$user_login = Session::get("login");
		if($user_login==true){
			echo "<script>location.href='askQuestion.php'</script>";
		}
		else{
			echo "<script>location.href='login.php?action=check'</script>";
		}
	}
?>
<?php include_once("inc/header.php"); ?>
<?php
	if(isset($_POST['askQuestion'])){
		$insert = $db -> questionInsert($_POST);
	}
?>
<?php Session::checkSession(); ?>
	<div class="container-fluid ">
		<div class="container askQuestion-main-content">
			<div class="row askQuestion-row">
				<div class="col-lg-9">
					<div class="col-lg-12 ask-msg">
						<h5></h5>
					</div>
					<form method="post">
						<div class="form-group askQuestion-form">
							<div class="col-lg-1 askQuestion-title">
								<label class="control-label">টাইটল <span class="text-danger">*</span></label>
							</div>
							<div class="col-lg-11 askQuestion-tvalue">
								<input type="text" name="title" required placeholder="আপনার প্রশ্নের টাইটল লিখুন" class="form-control"/>
							</div>
						</div>
						<div class="form-group askQuestion-form">
							<div class="col-lg-1 askQuestion-title">
								<label class="control-label">ট্যাগস <span class="text-danger">*</span></label>
							</div>
							<div class="col-lg-11 askQuestion-tvalue">
								<input type="text" name="tags" required placeholder="যেমনঃ জাভা পিএইচপি (সর্বোচ্চ পাঁচটি ট্যাগ লিখুন)" class="form-control"/>
							</div>
						</div>
						<div class="form-group askQuestion-form">
							<div class="col-lg-1 askQuestion-title">
								<label class="control-label">কনটেন্ট </label>
							</div>
							<div class="col-lg-11 askQuestion-tvalue">
								<textarea class="tinymce" name="content"></textarea>
							</div>
						</div>
						<div class="form-group askQuestion-form">
							<div class="col-lg-offset-1 col-lg-11 askQuestion-tvalue">
								<input type="submit" name="askQuestion" value="আপনার প্রশ্ন পোস্ট করুন"  class="btn btn-primary"/>
							</div>
						</div>
					</form>
				</div>
				<?php include_once("inc/sidebar.php"); ?>
			</div>
		</div>
	</div>
	<?php include_once("inc/footer.php"); ?>