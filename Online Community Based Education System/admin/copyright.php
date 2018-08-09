<?php include_once("inc/header.php"); ?>
		<div class="row main-content">
			<?php include_once("inc/sidebar.php"); ?>
			<div class="col-lg-10 copyright-panel-body">
				<div class="col-lg-12 page-title">
					<h4>Update Copyright Note</h4>
				</div>
					<div class="col-lg-12 copyright-form">
						<?php
							if(isset($_POST['submit'])){
								$update = $db -> copyrightUpdate($_POST);
								if($update){
									echo "<div class='col-lg-offset-1 col-lg-7'>";
									echo "<h6 class='well'>Successfully Updated....</h6>";
									echo "</div>";
								}
							}
						?>
						<?php
							$result = $db-> copyrightSelect();
							$data   = mysqli_fetch_array($result);
							$note	= $data ['note'];
						?>
						<form method="post">
							<div class='form-group col-lg-offset-1 col-lg-7'>
								<input type='text' name='copyright' required value="<?php echo $note; ?>" class="form-control" />
							</div>
							<div class='form-group col-lg-offset-1 col-lg-4'>
								<input type="submit" name="submit" value="Update" class="btn btn-primary col-lg-4"/>
							</div>
						</form>
					</div>
			</div>
		</div>
<?php include_once("inc/footer.php"); ?>