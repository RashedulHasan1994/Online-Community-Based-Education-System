<?php include_once("inc/header.php"); ?>
		<div class="row main-content">
			<?php include_once("inc/sidebar.php"); ?>
			<div class="col-lg-10 scndLesson-panel-body">
				<div class="col-lg-12 page-title">
					<h4>Update Site Logo</h4>
				</div>
					<div class="col-lg-12 update-logo-form">
						<?php
							if(isset($_POST['update'])){
								$file_name=$_FILES['logo']['tmp_name'];
								$logo_name = uniqid().$_FILES['logo']['name'];
								$destination = "logo/".$logo_name;
								$picture = move_uploaded_file($file_name,$destination);
								$query = "update site_logo set logo='$logo_name' where id='1'";
								$result = $db -> updateQuery($query);
								if($result){
									echo "<div class='col-lg-offset-1 col-lg-7'>";
									echo "<h6 class='well'>Successfully Updated....</h6>";
									echo "</div>";
								}
							}
						?>
						<form method="post" enctype="multipart/form-data">
							<div class='col-lg-offset-1 col-lg-4'>
								<div class='form-group col-lg-12' style="height:85px;">
									<p style="font-weight:bold;font-size:16px;">Add Logo</p>
									<input type="file" name="logo" />
								</div>
									<div class='form-group col-lg-10'>
										<input type="submit" name="update" value="Update" class="btn btn-primary col-lg-4"/>
									</div>
							</div>
								<div class='form-group col-lg-offset-1 col-lg-4'>
									<p style="font-weight:bold;">BanglaAcademy Logo</p>
									<?php 
										$query = " select * from site_logo";
										$result = $db -> selectQuery($query);
										while($data = mysqli_fetch_array($result)){
											$logo = $data['logo'];
										?>
											<img src="logo/<?php echo $logo; ?>" style="background:#006699;padding:10px 20px;" width="250px"/>
									<?php
										}
									?>
								</div>
						</form>
					</div>
			</div>
		</div>
<?php include_once("inc/footer.php"); ?>