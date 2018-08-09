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
						if(isset($_GET['class']) & isset($_GET['subject'])){
							$class = $_GET['class'];
							$subject = $_GET['subject'];
					?>
						<a href="subject.php?class=<?php echo $class; ?> & subject=<?php echo $subject; ?>"><img src="img/brand-logo1.png"/></a>
						<?php } ?>
					</div>
					
				<?php
					if(isset($_GET['class']) & isset($_GET['subject'])){
						$class = $_GET['class'];
						$subject = $_GET['subject'];
							if($class==6){$class="৬ষ্ঠ শ্রেণী";}
							else if($class==7){$class="৭ম শ্রেণী";}
							else{$class="৮ম শ্রেণী";}
				?>
				<h4><?php echo $class; ?> ( <?php echo $subject; ?> )</h4>
					<?php  } ?> <!-- end if loop -->
					
						<ul>	
						<?php
						if(isset($_GET['class']) & isset($_GET['subject'])){
							$class = $_GET['class'];
							$subject = $_GET['subject'];
							$query  = "select * from secondary_lesson  where class='$class' and subject='$subject'";
							$result = $db -> selectJuniorLessons($query);
							if($result){
								while($data = mysqli_fetch_array($result)){
						?>
						<li><a href="subject.php?id=<?php echo $data['id']; ?> & class=<?php echo $data['class']; ?> & subject=<?php echo $data['subject']; ?>"><?php echo $data['title']; ?></a></li>
						<?php } } } ?>
						</ul>
					</div>
			</div>
				
				<!-- course discussion start here -->
				<div class="col-lg-8 discussion">
					<?php
						if(isset($_GET['id']) & isset($_GET['class']) & isset($_GET['subject'])){
							$id = $_GET['id'];
							$class = $_GET['class'];
							$subject = $_GET['subject'];
							$query  = "select * from secondary_lesson where id='$id' and class='$class' and subject='$subject'";
							$result = $db -> selectJuniorLessons($query);
							if($result){
								while($data = mysqli_fetch_array($result)){
					?>
							<h4><?php echo $data['title']; ?></h4>
							<?php echo $data['content']; ?>
						<?php } } ?>
						
					<?php } else{
						$query  = "select * from secondary_lesson where class='$class' and subject='$subject' limit 1";
						$result = $db -> selectJuniorLessons($query);
						if($result){
						   while($data = mysqli_fetch_array($result)){
					?>
						<h4><?php echo $data['title']; ?></h4>
						<?php echo $data['content']; ?>
					<?php } } } ?>
					
						<div class="next-prev">
							<?php
							if(isset($_GET['id']) & isset($_GET['class']) & isset($_GET['subject'])){
								$id = $_GET['id'];
								$class = $_GET['class'];
								$subject = $_GET['subject'];
								$query  = "select * from secondary_lesson  where id='$id' and class='$class' and subject='$subject'  order by id desc limit 1";
								$result = $db -> selectJuniorLessons($query);
								$total_rows = mysqli_num_rows($result);
								if($result){
									while($data = mysqli_fetch_array($result)){
									$Id= $data['id'];	
							?>
								<span  <?php if($id==1){?>class='hidden'<?php } ?> ><a href="subject.php?id=<?php echo $data['id']-1; ?> & class=<?php echo $data['class']; ?> & subject=<?php echo $data['subject']; ?>" class="btn btn-default btn-lg previous">Previous</a></span>
								<span <?php	if($Id == 2){?>class='hidden'<?php } ?> ><a href="subject.php?id=<?php echo $data['id']+1; ?> & class=<?php echo $data['class']; ?> & subject=<?php echo $data['subject']; ?>" class="btn btn-default btn-lg pull-right next">Next</a></span>
							<?php }  } ?>
								<?php } else if(isset($_GET['class']) & isset($_GET['subject'])){
									$class = $_GET['class'];
									$subject = $_GET['subject'];
									$query  = "select * from secondary_lesson  where class='$class' and subject='$subject'  order by id asc limit 1";
									$result = $db -> selectJuniorLessons($query);
									if($result){
										while($data = mysqli_fetch_array($result)){
										$Id= $data['id'];	
								?>
								<span><a href="subject.php?id=<?php echo $data['id']+1; ?> & class=<?php echo $data['class']; ?> & subject=<?php echo $data['subject']; ?>" class="btn btn-default btn-lg pull-right next">Next</a></span>
								<?php }  } ?>
								<?php } ?>
						</div>
			    </div>
				<!-- course discussion end here -->
				
				<div class="col-lg-2 subject-page-right-sidebar">
					<i id="right-sidebar-img-close-icon" class="fa fa-close fa-lg"></i>
					<img src="img/sidebar.png"/>
				</div>
			</div>
		</div>
	</div>