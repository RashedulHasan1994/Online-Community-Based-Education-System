<?php include_once("inc/header.php"); ?>
		<div class="row main-content">
			<?php include_once("inc/sidebar.php"); ?>
			<div class="col-lg-10 scndLesson-panel-body">
				<div class="col-lg-12 page-title">
					<h4>Add Course Info (University)</h4>
				</div>
					<div class="col-lg-12 copyright-form">
						<?php
							if(isset($_POST['submit'])){
								$insert = $db -> varsityAddCourseInfo($_POST);
								if($insert){
									echo "<div class='col-lg-offset-1 col-lg-7'>";
									echo "<h6 class='well'>Successfully Updated....</h6>";
									echo "</div>";
								}
							}
						?>
						<form method="post">
							<div class='form-group col-lg-offset-1 col-lg-7'>
								<p style="font-weight:bold;">Department</p>
									<select name="department" class="col-lg-4" style="height:32px;">
										<option>Select Department</option>
										<?php
											$query   = "select * from university_department";
											$result  = $db-> selectQuery($query);
											while($data    = mysqli_fetch_array($result)){
											$department = $data ['department'];
										?>
										<option><?php echo $department; ?></option>
										<?php } ?>
									</select>
							</div>
							<div class='form-group col-lg-offset-1 col-lg-6'>
								<p style="font-weight:bold;">Course Name</p><input type='text' name='course_name' required placeholder="যেমনঃ জাভা" class="form-control" />
							</div>
							<div class='form-group col-lg-offset-1 col-lg-9'>
								<p style="font-weight:bold;">Course Info</p>
									<textarea class="tinymce" name="course_info"></textarea>
							</div>
							<div class='form-group col-lg-offset-1 col-lg-4'>
								<input type="submit" name="submit" value="Add" class="btn btn-primary col-lg-4"/>
							</div>
						</form>
					</div>
			</div>
		</div>
<?php include_once("inc/footer.php"); ?>