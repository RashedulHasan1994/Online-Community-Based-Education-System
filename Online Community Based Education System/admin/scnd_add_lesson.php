<?php include_once("inc/header.php"); ?>
		<div class="row main-content">
			<?php include_once("inc/sidebar.php"); ?>
			<div class="col-lg-10 scndLesson-panel-body">
				<div class="col-lg-12 page-title">
					<h4>Add Secondary Lesson</h4>
				</div>
					<div class="col-lg-12 scnd-add-lesson-form">
						<?php
							if(isset($_POST['submit'])){
								$class = $_POST['class'];
								$subject = $_POST['subject'];
								$lesson_title = $_POST['lesson_title'];
								$content = $_POST['content'];
								$query = "insert into secondary_lesson values('','$class','$subject','$lesson_title','$content')";
								$result = $db -> insertQuery($query);
								if($result){
									echo "<div class='col-lg-offset-1 col-lg-7'>";
									echo "<h6 class='well'>Successfully Inserted....</h6>";
									echo "</div>";
								}
							}
						?>
						<form method="post">
							<div class='form-group col-lg-offset-1 col-lg-7'>
								<p style="font-weight:bold;">Class</p>
									<select name="class" id="class" class="col-lg-4">
									<option>Select Class</option>
									<?php
										$query   = "select distinct(class) from secondary_subjects order by class asc";
										$result  = $db-> selectQuery($query);
										while($data    = mysqli_fetch_array($result)){
										 $class = $data ['class'];
										/* if($class==6){$class="৬ষ্ঠ শ্রেণী";}
										else if($class==7){$class="৭ম শ্রেণী";}
										else{$class="৮ম শ্রেণী";} */
									?>
										<option value="<?php echo $class; ?>"><?php echo $class; ?></option>
									<?php } ?>
									
									</select>
							</div>
							<div class='form-group col-lg-offset-1 col-lg-7'>
								<p style="font-weight:bold;">Subject</p>
									<select name="subject" id="subject" class="col-lg-4">
									
									</select>
							
							</div>
							<div class='form-group col-lg-offset-1 col-lg-9'>
								<p style="font-weight:bold;">Lesson Title</p><input type='text' name='lesson_title' required  class="form-control" />
							</div>
							<div class='form-group col-lg-offset-1 col-lg-9'>
								<p style="font-weight:bold;">Content</p>
									<textarea class="tinymce" name="content"></textarea>
							</div>
							<div class='form-group col-lg-offset-1 col-lg-4'>
								<input type="submit" name="submit" value="Add" class="btn btn-primary col-lg-4"/>
							</div>
						</form>
					</div>
			</div>
		</div>
<?php include_once("inc/footer.php"); ?>