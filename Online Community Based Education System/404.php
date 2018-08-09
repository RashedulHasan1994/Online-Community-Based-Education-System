<?php
	include_once("lib/Session.php");
	Session::sessionStart();
?>
<?php
    include_once("lib/Database.php");
	$db = new Database();
?>
<?php include_once("inc/header.php"); ?>
	<section class="container-fluid">
		<div class="container main-section">
			<!-- main-section-top-row start here -->
			<div class="row spage-main-content-row">
				
				<div class="col-lg-9 spage-main-content-column">
					<h2 class='well text-warning'>৪০৪, সঠিক নিয়মে পেজে ঢুকুন</h2>
				</div>
				<?php include_once("inc/sidebar.php"); ?>
			</div>
			<!-- main-section-top-row end here -->
		</div>
	</section>
<?php include_once("inc/footer.php"); ?>