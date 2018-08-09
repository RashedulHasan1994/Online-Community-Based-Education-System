<?php
	include_once("lib/Session.php");
	Session::sessionStart();
?>
<?php
    include_once("lib/Database.php");
	$db = new Database();
?>
<?php include_once("inc/header.php"); ?>
	<section class="container-fluid main-body">
		<div class="container main-section">
			<!-- main-section-top-row start here -->
			<div class="row main-section-row">
				<div class='col-lg-9 col-md-7 view-section'>
					<!-- view-section-header start here -->
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 view-section-header">
						<div class='col-lg-6 col-md-4 col-sm-3 col-xs-12 top-question'>
							<ul>
								<li><p >ট্যাগ করা প্রশ্নসমূহ</p></li>
							</ul>
						</div>
						<div class='col-lg-offset-4 col-lg-2 col-md-3 col-sm-3 col-xs-12 ask-question-link'>
							<a href="askQuestion.php?action=check" class="btn">প্রশ্ন জিজ্ঞাসা</a>
						</div>
					</div>
					<!-- view-section-header start here -->
					 <?php 
						$item_per_page=4;
						if(isset($_GET['page']) & isset($_GET['tag'])){
							$page = $_GET['page'];
						}else{
							$page = 1;
						}
						$start_from = ($page-1) * $item_per_page;
					?>
					<!-- main-section-recent-question start here -->
					<?php
						if(isset($_GET['tag'])){
							 $tag_name = $_GET['tag'];
						}
					?>
					<?php
						$query  = "select * from questions where Tags like '%$tag_name%' order by id desc limit $start_from,$item_per_page";
						$result = $db -> selectQuestions($query);
						if($result){
							while($data = mysqli_fetch_array($result)){
								$ques_id = $data['id'];
					?>
					<div class="col-lg-12 col-xs-12 main-section-recent-question">
						<div class="col-lg-9 question-part">
							<h6><a href="single.php?id=<?php echo $ques_id; ?>"><?php echo $data['Title']; ?></a></h6>
							<div class="col-lg-12 question-info">
								<div class="col-lg-7 col-xs-12 question-author">
									<p>প্রশ্নকারী &nbsp <a href=""><i class="fa fa-user"></i> <?php echo $data['User_Name']; ?></a> &nbsp <a href="" class="post-time-count"><i class="fa fa-clock-o"></i> <?php echo $data['Time']; ?></a></p> 
								</div>
								<div class="col-lg-5 question-tags">
									<ul>
										<?php 
										$tags=$data['Tags'];
										$tags=trim($tags);
										$tags=explode(" ",$tags);
										?>
										<?php foreach($tags as $tag){ ?>
											<li><a href=""><?php echo $tag; ?></a></li>
										<?php } ?> 
									</ul>
								</div>
							</div>
						</div>
						<div class="col-lg-3 view-answer">
							<?php
								$query  = "select * from answers where question_id='$ques_id'";
								$reply = $db -> selectQuery($query);
								$reply = mysqli_num_rows($reply);
								if($reply>0){
							?>
							<?php if($reply>2){?>
							<div class="col-lg-6 col-xs-6 answer" style="background:#5FBA7D;">
									<h6 style="color:#fff;"><?php echo getBanglaDigit($reply); ?></h6>
									<p style="color:#fff;">উত্তর</p>
							</div>
								<?php }else{ ?>
									<div class="col-lg-6 col-xs-6 answer" style="background:#F9F9F9;">
									<h6 ><?php echo getBanglaDigit($reply); ?></h6>
									<p>উত্তর</p>
								</div>
								<?php } ?>
							
							<?php }else{ ?>
							<div class="col-lg-6 col-xs-6 answer">
									<h6>০</h6>
									<p>উত্তর</p>
								</div>
								<?php
									} 
								?>
							
							<div class="col-lg-6 col-xs-6 visitor">
								<h6><?php echo getBanglaDigit($data['views']); ?></h6>
								<p>ভিজিট</p>
							</div>
						</div>	
						
					</div>
							<?php } ?> <!-- end while loop -->
						<?php  } ?> <!-- end if loop -->
					<!-- main-section-recent-question end here -->
					
					<!-- pagination start here -->
					<?php
						$query="select * from questions where Tags like '%$tag_name%'";
						$result = $db -> selectQuery($query);
						$total_rows = mysqli_num_rows($result);
						$total_pages = ceil($total_rows/$item_per_page);
					?>
					<div class="col-lg-12 pagination">
						<ul class='pagination'>
							<li <?php if($page==1){?>class="hidden"<?php } ?> ><a href="taggedQuestions.php?page=<?php echo $page-1; ?> & tag=<?php echo $tag_name; ?>">পূর্ববর্তী</a></li>	
							<?php for($i=1;$i<=$total_pages;$i++){ ?>
								<li <?php if($page==$i){?>class="active"<?php } ?>><a href="taggedQuestions.php?page=<?php echo $i; ?> & tag=<?php echo $tag_name; ?>"><?php echo $i; ?></a></li>
							<?php } ?>
							<li <?php if($page==$total_pages){?>class="hidden"<?php } ?>><a href="taggedQuestions.php?page=<?php echo $page+1; ?> & tag=<?php echo $tag_name; ?>">পরবর্তী</a></li>
						</ul>
					</div>
					<!-- pagination end here -->
				</div>
				<?php include_once("inc/sidebar.php"); ?>
			</div>
			<!-- main-section-top-row end here -->
			
		</div>
	</section>
		<div id="scrollToUp" class="text-center">
			<i class="fa fa-arrow-up"></i>
		</div>
	<?php include_once("inc/footer.php"); ?>