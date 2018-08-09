<?php include_once("inc/header.php"); ?>
		<div class="row main-content">
			<?php include_once("inc/sidebar.php"); ?>
			<div class="col-lg-10 siteSlogan-panel-body">
				<div class="col-lg-12 page-title">
					<h4>Update Social Link</h4>
				</div>
					<div class="col-lg-12 copyright-form">
						<?php
							if(isset($_POST['submit'])){
								$facebook = $_POST['facebook'];
								$youtube = $_POST['youtube'];
								$query  = "update socialLink set facebook='$facebook',youtube='$youtube' where id='1'";
								$update = $db -> updateQuery($query);
								if($update){
									echo "<div class='col-lg-offset-1 col-lg-7'>";
									echo "<h6 class='well'>Successfully Updated....</h6>";
									echo "</div>";
								}
							}
						?>
						<?php
							$query  = "select * from socialLink";
							$result = $db-> selectQuery($query);
							$data   = mysqli_fetch_array($result);
							$facebook	= $data ['facebook'];
							$youtube	= $data ['youtube'];
						?>
						<form method="post">
							<div class='form-group col-lg-offset-1 col-lg-7'>
								<p style="font-weight:bold;">Facebook</p><input type='text' name='facebook'  value="<?php echo $facebook; ?>" class="form-control" />
							</div>
							<div class='form-group col-lg-offset-1 col-lg-7'>
								<p style="font-weight:bold;">Youtube</p><input type='text' name='youtube'  value="<?php echo $youtube; ?>" class="form-control" />
							</div>
							<div class='form-group col-lg-offset-1 col-lg-4'>
								<input type="submit" name="submit" value="Update" class="btn btn-primary col-lg-4"/>
							</div>
						</form>
					</div>
			</div>
		</div>
<?php include_once("inc/footer.php"); ?>