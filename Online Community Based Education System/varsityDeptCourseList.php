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
	<!-- varsity department course list content section start here -->
	<div class="container varsityDeptCourseList-main-content">
		<div class="row varsityDeptCourseList-main-row">
			<div class="col-lg-7 varsityDeptCourseList-top-leftColumn">
			<?php 
				if(isset($_GET['department'])){
					$department = $_GET["department"];
					$_SESSION['department'] = $department;
					$query  = "select * from university_course_info where department='$department'";
					$result = $db-> selectQuery($query);
				} 
			?>
				<h3><?php echo $department; ?></h3>
			</div>
			<div class="col-lg-5 varsityDeptCourseList-top-rightColumn">
				<iframe id="tickermain" src="varsityExfile.php" width=465 height=47 marginwidth=0 marginheight=0 hspace=0 vspace=0 frameborder=0 scrolling=no></iframe>
			</div>
			<?php
				while($data = mysqli_fetch_array($result)){
					$course_name = $data['course_name'];
					$course_info = $data['course_info'];
			?>
			<div class="col-lg-4 varsity_courseInfo">
				<h4><a href="univarsity_couse.php?department=<?php echo $data['department']; ?> & course_name=<?php echo $course_name; ?>"><?php echo $course_name; ?></a></h4>
				<hr>
				<p><?php echo $course_info; ?></p>
			</div>
			<?php } ?>
			
		</div>
	</div>
	<!-- varsity department course list content content section start here -->
</div>