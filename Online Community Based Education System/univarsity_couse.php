<?php
	include_once("lib/Session.php");
	Session::sessionStart();
?>
<?php
    include_once("lib/Database.php");
	$db = new Database();
?>
<?php include_once("inc/header.php"); ?>
	<div class="container-fluid subject-content">
		<div class="row subject-row">
			<div class="col-lg-2 subject-sidebar">
				<div class="course-item">
					<div class="col-lg-12 subject-page-hidden-branding">
					<?php
						if(isset($_GET['department']) & isset($_GET['course_name'])){
							$department = $_GET['department'];
							$course_name = $_GET['course_name'];
					?>
						<a href="univarsity_couse.php?department=<?php echo $department; ?> & course_name=<?php echo $course_name; ?>"><img src="img/brand-logo1.png"/></a>
						<?php } ?>
					</div>
					
				<?php
					if(isset($_GET['department']) & isset($_GET['course_name'])){
						$department = $_GET['department'];
						$course_name = $_GET['course_name'];
				?>
				<h4><?php echo $course_name; ?> ( <?php echo $department; ?> )</h4>
					<?php } ?> <!-- end if loop -->
					<ul>
							
					<?php
					if(isset($_GET['department']) & isset($_GET['course_name'])){
						$department = $_GET['department'];
						$course_name = $_GET['course_name'];
						$query  = "select * from university_lessons  where department='$department' and course_name='$course_name'";
						$result = $db -> selectQuery($query);
						if($result){
							while($data = mysqli_fetch_array($result)){
					?>
					<li><a href="univarsity_couse.php?id=<?php echo $data['id']; ?> & department=<?php echo $data['department']; ?> & course_name=<?php echo $data['course_name']; ?>"><?php echo $data['title']; ?></a></li>
					<?php } } } ?>
						
					</ul>
					</div>
			</div>
				<div class="col-lg-8 discussion">
					<?php
						if(isset($_GET['id']) & isset($_GET['department']) & isset($_GET['course_name'])){
							$id = $_GET['id'];
							$department = $_GET['department'];
							$course_name = $_GET['course_name'];
							$query  = "select * from university_lessons where id='$id' and department='$department' and course_name='$course_name'";
							$result = $db -> selectQuery($query);
							if($result){
								while($data = mysqli_fetch_array($result)){
					?>
						<h4><?php echo $data['title']; ?></h4>
						<?php echo $data['content']; ?>
						<?php } } ?>
						
						

					<?php } else{
						$query  = "select * from university_lessons where department='$department' and course_name='$course_name' limit 1";
						$result = $db -> selectQuery($query);
						if($result){
						   while($data = mysqli_fetch_array($result)){
					?>
						<h4><?php echo $data['title']; ?></h4>
						<?php echo $data['content']; ?>
					<?php } } } ?>
					
						<div class="next-prev">
						<?php
						if(isset($_GET['id']) & isset($_GET['department']) & isset($_GET['course_name'])){
							$id = $_GET['id'];
							$department = $_GET['department'];
							$course_name = $_GET['course_name'];
							$query  = "select * from university_lessons  where id='$id' and department='$department' and course_name='$course_name'  order by id desc limit 1";
							$result = $db -> selectQuery($query);
							$total_rows = mysqli_num_rows($result);
							if($result){
								while($data = mysqli_fetch_array($result)){
								$Id= $data['id'];	
					?>
							<span  <?php if($id==1){?>class='hidden'<?php } ?> ><a href="univarsity_couse.php?id=<?php echo $data['id']-1; ?> & department=<?php echo $data['department']; ?> & course_name=<?php echo $data['course_name']; ?>" class="btn btn-default btn-lg previous">Previous</a></span>
							<span <?php	if($Id == 2){?>class='hidden'<?php } ?> ><a href="univarsity_couse.php?id=<?php echo $data['id']+1; ?> & department=<?php echo $data['department']; ?> & course_name=<?php echo $data['course_name']; ?>" class="btn btn-default btn-lg pull-right next">Next</a></span>
						<?php }  } ?>
						<?php } else if(isset($_GET['department']) & isset($_GET['course_name'])){
							$department = $_GET['department'];
							$course_name = $_GET['course_name'];
							$query  = "select * from university_lessons  where department='$department' and course_name='$course_name'  order by id asc limit 1";
							$result = $db -> selectQuery($query);
							if($result){
								while($data = mysqli_fetch_array($result)){
								$Id= $data['id'];	
						?>
						<span><a href="univarsity_couse.php?id=<?php echo $data['id']+1; ?> & department=<?php echo $data['department']; ?> & course_name=<?php echo $data['course_name']; ?>" class="btn btn-default btn-lg pull-right next">Next</a></span>
						<?php }  } ?>
						<?php } ?>
						</div>
			    </div>
				<div class="col-lg-2 subject-page-right-sidebar">
					<i id="right-sidebar-img-close-icon" class="fa fa-close fa-lg"></i>
					<img src="img/sidebar.png"/>
				</div>
			</div>
		</div>
	</div>