<?php include_once("inc/header.php"); ?>
		<div class="row main-content">
			<?php include_once("inc/sidebar.php"); ?>
			<div class="col-lg-10 scnd-addSubject-panel-body">
				<div class="col-lg-12 page-title">
					<h4>Secondary Subject Add</h4>
				</div>
					<div class="col-lg-8 scnd-addSubject-form">
						<?php
							if(isset($_POST['submit'])){
								$insert = $db -> scndAddSubject($_POST);
								if($insert){
									echo "<div class='col-lg-offset-1 col-lg-7'>";
									echo "<h6 class='well'>Successfully Inserted....</h6>";
									echo "</div>";
								}
							}
						?>
						<form method="post">
							<div class='form-group col-lg-offset-1 col-lg-7'>
								<select name="class_name" class="text-center col-lg-5">
									<option value="৬ষ্ঠ শ্রেনী">৬ষ্ঠ শ্রেনী</option>
									<option value="7">৭ম শ্রেনী</option>
									<option value="8">৮ম শ্রেনী</option>
								</select>
							</div>
							<div class='form-group col-lg-offset-1 col-lg-8'>
								<input type='text' name='subject' required placeholder="যেমনঃ বাংলা" class="form-control" />
							</div>
							<div class='form-group col-lg-offset-1 col-lg-4'>
								<input type="submit" name="submit" value="Add" class="btn btn-primary col-lg-7"/>
							</div>
						</form>
					</div>
			</div>
		</div>
<?php include_once("inc/footer.php"); ?>