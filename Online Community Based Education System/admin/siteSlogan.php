<?php include_once("inc/header.php"); ?>
		<div class="row main-content">
			<?php include_once("inc/sidebar.php"); ?>
			<div class="col-lg-10 siteSlogan-panel-body">
				<div class="col-lg-12 page-title">
					<h4>Update Site Slogan</h4>
				</div>
					<div class="col-lg-12 copyright-form">
						<?php
							if(isset($_POST['submit'])){
								$update = $db -> sloganUpdate($_POST);
								if($update){
									echo "<div class='col-lg-offset-1 col-lg-7'>";
									echo "<h6 class='well'>Successfully Updated....</h6>";
									echo "</div>";
								}
							}
						?>
						<?php
							$query  = "select * from site_slogan";
							$result = $db-> selectQuery($query);
							$data   = mysqli_fetch_array($result);
							$slogan_one	= $data ['slogan_one'];
							$slogan_two	= $data ['slogan_two'];
						?>
						<form method="post">
							<div class='form-group col-lg-offset-1 col-lg-7'>
								<p style="font-weight:bold;">First Slogan</p><input type='text' name='slogan_one' required value="<?php echo $slogan_one; ?>" class="form-control" />
							</div>
							<div class='form-group col-lg-offset-1 col-lg-7'>
								<p style="font-weight:bold;">Second Slogan</p><input type='text' name='slogan_two' required value="<?php echo $slogan_two; ?>" class="form-control" />
							</div>
							<div class='form-group col-lg-offset-1 col-lg-4'>
								<input type="submit" name="submit" value="Update" class="btn btn-primary col-lg-4"/>
							</div>
						</form>
					</div>
			</div>
		</div>
<?php include_once("inc/footer.php"); ?>