	<!-- sidebar start here -->
	<div class='col-lg-3 col-md-5 col-xs-12 sidebar'>	
		<!-- secondary-course start here -->
		<div class="col-lg-12 secondary-course-list">
			<h5 class="text-center">মাধ্যমিক কোর্সসমূহ</h5>
			<div class="col-lg-12 sj-course-list">
				<ul>
					<li>৬ষ্ট শ্রেণী <i  id="class-six-toggle" class="fa fa-chevron-down sj-open-icon"></i></li>
						<div class="col-lg-12 class-six-course-list">
							<ul>
								<?php
									$query  = "select * from secondary_subjects where class='6'  ";
									$result = $db -> selectQuery($query);
									if($result){
										while($data = mysqli_fetch_array($result)){
								?>
								<li><a href="subject.php?class=<?php echo $data['class']; ?> & subject=<?php echo $data['subject']; ?>"><?php echo $data['subject']; ?></a></li> 
									<?php } ?> <!-- end while loop -->
								<?php  } ?> <!-- end if loop -->
							</ul>
						</div>
					<li>৭ম শ্রেণী <i  id="class-seven-toggle" class="fa fa-chevron-down sj-open-icon"></i></li>
						<div class="col-lg-12 class-seven-course-list">
							<ul>
								<?php
									$query  = "select * from secondary_subjects where class='7'   ";
									$result = $db -> selectQuery($query);
									if($result){
										while($data = mysqli_fetch_array($result)){
								?>
								<li><a href="subject.php"><?php echo $data['subject']; ?></a></li> 
									<?php } ?> <!-- end while loop -->
								<?php  } ?> <!-- end if loop -->
							</ul>
						</div>
					<li>৮ম শ্রেণী <i  id="class-eight-toggle" class="fa fa-chevron-down sj-open-icon"></i></li>
						<div class="col-lg-12 class-eight-course-list">
							<ul>
								<?php
									$query  = "select * from secondary_subjects where class='8'   ";
									$result = $db -> selectQuery($query);
									if($result){
										while($data = mysqli_fetch_array($result)){
								?>
								<li><a href="subject.php"><?php echo $data['subject']; ?></a></li> 
									<?php } ?> <!-- end while loop -->
								<?php  } ?> <!-- end if loop -->
							</ul>
						</div>
				</ul>
			</div>
			<div class="col-lg-12 nine-ten-ctitle">
				<ul>
					<li>৯ম এবং ১০ম শ্রেণী</li>
				</ul>
				<i  id="nt-cl-toggle" class="fa fa-chevron-down open-icon"></i>
			</div>
			<div id="ss-cl-hideShow" class="col-lg-12 ss-course-list">
				<ul>
					<li>বিজ্ঞান বিভাগ <i id="ss-cl-stoggle" class="fa fa-chevron-down ss-cl-open-icon"></i> </li>
						<div class="col-lg-12 science-course-list">
							<ul>
								<li><a href="">গণিত</a></li> 
								<li><a href="">রসায়ন</a></li> 
								<li><a href="">পদার্থ</a></li> 
							</ul>
						</div>
					<li>ব্যবসায় শিক্ষা বিভাগ <i id="ss-cl-btoggle" class="fa fa-chevron-down ss-cl-open-icon"></i> </li>
						<div class="col-lg-12 business-course-list">
							<ul>
								<li><a href="">একাউন্টিং</a></li> 
								<li><a href="">রসায়ন</a></li> 
								<li><a href="">পদার্থ</a></li> 
							</ul>
						</div>
					<li>কলা বিভাগ <i id="ss-cl-atoggle" class="fa fa-chevron-down ss-cl-open-icon"></i> </li>
						<div class="col-lg-12 arts-course-list">
							<ul>
								<li><a href="">একাউন্টিং</a></li> 
								<li><a href="">রসায়ন</a></li> 
								<li><a href="">পদার্থ</a></li> 
							</ul>
						</div>
				</ul>
			</div>
		</div>
		<!-- secondary-course end here -->
		
		<!-- higher secondary-course start here -->
		<div class="col-lg-12 higher-secondary-course-list">
			<h5 class="text-center">উচ্চ মাধ্যমিক কোর্সসমূহ</h5>
			<div class="col-lg-12 hs-division-list">
				<ul>
					<li>বিজ্ঞান বিভাগ <i id="hs-scl-toggle" class="fa fa-chevron-down hs-division-toggle"></i></li>
						<div class="col-lg-12 hs-science-course-list">
							<ul>
								<?php
									$query  = "select * from higher_secondary_subjects where division='science'   ";
									$result = $db -> selectQuery($query);
									if($result){
										while($data = mysqli_fetch_array($result)){
								?>
								<li><a href="subject.php"><?php echo $data['subject']; ?></a></li> 
								 <?php } ?> <!-- end while loop -->
								<?php  } ?> <!-- end if loop -->
							</ul>
						</div>
					<li>ব্যবসায় শিক্ষা বিভাগ <i id="hs-bcl-toggle" class="fa fa-chevron-down hs-division-toggle"></i></li>
						<div class="col-lg-12 hs-business-course-list">
							<ul>
								<li><a href="">একাউন্টিং</a></li> 
								<li><a href="">রসায়ন</a></li> 
								<li><a href="">পদার্থ</a></li> 
							</ul>
						</div>
					<li>কলা বিভাগ <i id="hs-acl-toggle" class="fa fa-chevron-down hs-division-toggle"></i></li>
						<div class="col-lg-12 hs-arts-course-list">
							<ul>
								<li><a href="">ভূগোল</a></li> 
								<li><a href="">রসায়ন</a></li> 
								<li><a href="">পদার্থ</a></li> 
							</ul>
						</div>
				</ul>
			</div>
		</div>
		<!-- higher secondary-course end here -->
		
		<div class="col-lg-12 university-course-list">
			<h5 class="text-center">বিশ্ববিদ্যালয় কোর্সসমূহ</h5>
			<div class="col-lg-12 university-faculty-list">
				<ul>
					<li>প্রকৌশল অনুষদ<i id="eng-faculty-toggle" class="fa fa-chevron-down university-dlist-toggle"></i></li>
						<div class="col-lg-12 eng-faculty-clist">
							<ul>
								<li>সিএসই <i id="univ-csecl-toggle" class="fa fa-chevron-down ss-cl-open-icon"></i></li>  
									<div class="col-lg-12 eng-faculty-cse-clist">
										<ul>
											<?php
												$query  = "select * from university_course_list where faculty='প্রোকৌশল' and department='সিএসই'  ";
												$result = $db -> selectQuery($query);
												if($result){
													while($data = mysqli_fetch_array($result)){
											?>
											<li><a href="univarsity_couse.php?department=<?php echo $data['department']; ?> & course_name=<?php echo $data['course_name']; ?>"><?php echo $data['course_name']; ?></a></li> 
												<?php } ?> <!-- end while loop -->
											<?php  } ?> <!-- end if loop -->
										</ul>
									</div>
							</ul>
						</div>
							<li>ব্যবসায় অনুষদ<i id="business-faculty-toggle" class="fa fa-chevron-down university-dlist-toggle"></i></li>
							<div class="col-lg-12 business-faculty-dept-list">
								<ul>
									<li>মার্কেটিং <i id="univ-mktcl-toggle" class="fa fa-chevron-down ss-cl-open-icon"></i></li>  
										<div class="col-lg-12 business-faculty-mkt-clist"> 
											<ul>
												<li><a href="">সি</a></li> 
												<li><a href="">সি++</a></li> 
												<li><a href="">জাভা</a></li> 
											</ul>
										</div>
								</ul>
							</div>
								<li>কলা অনুষদ<i id="arts-faculty-toggle" class="fa fa-chevron-down university-dlist-toggle"></i></li> 
									<div class="col-lg-12 arts-faculty-dept-list">
										<ul>
											<li>বাংলা <i id="univ-bngcl-toggle" class="fa fa-chevron-down ss-cl-open-icon"></i></li>  
												<div class="col-lg-12 arts-faculty-bng-clist">  
													<ul>
														<li><a href="">বাংলা ইতিহাস</a></li> 
														<li><a href="">সি++</a></li> 
													</ul>
												</div>
										</ul>
									</div>
				</ul>
			</div>
		</div>
		
		<div class="col-lg-12 hot-question">
			<h5 class="text-center">হট প্রশ্নসমূহ</h5>
				<?php
					$query  = "select * from questions order by id desc limit 6";
					$result = $db -> selectQuery($query);
					if($result){
						while($data = mysqli_fetch_array($result)){
							$ques_id = $data['id'];
				?>
					<div class='hot-question-list'>
						<h6><a href="single.php?id=<?php echo $ques_id; ?>"><i class="fa fa-angle-double-right fa-lg ang-right"></i> <?php echo $data['Title']; ?></a></h6>
						<p><i class="fa fa-eye"></i> <?php echo getBanglaDigit($data['views']); ?> 
						<?php
								$query  = "select * from answers where question_id='$ques_id'";
								$reply = $db -> selectQuery($query);
								$reply = mysqli_num_rows($reply);
								if($reply>0){
							?>
						<i class="fa fa-reply"></i> <?php echo getBanglaDigit($reply); ?>
								<?php }else{ ?>
						<i class="fa fa-reply"></i> <?php echo "০"; ?>
								<?php } ?>
						</p>
					</div>
					<?php } ?> <!-- end while loop -->
				<?php  } ?> <!-- end if loop -->
		</div>
		
	</div>
	<!-- sidebar end here -->