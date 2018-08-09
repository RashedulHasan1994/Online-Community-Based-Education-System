<?php include_once("inc/header.php"); ?>
		<div class="row main-content">
			<?php include_once("inc/sidebar.php"); ?>
			<div class="col-lg-10 scnd-addSubject-panel-body">
				<div class="col-lg-12 page-title">
					<h4>Add Department (University)</h4>
				</div>
					<div class="col-lg-6 varsity-addDepartment-form">
						<?php
							if(isset($_POST['submit'])){
								$insert = $db -> varsityAddDepartment($_POST);
								if($insert){
									echo "<div class='col-lg-offset-1 col-lg-7'>";
									echo "<h6 class='well'>Successfully Inserted....</h6>";
									echo "</div>";
								}
							}
						?>
						<form method="post">
							<div class=' col-lg-offset-1 col-lg-7'>
								<p style="font-size: 17px;font-weight: bold;margin-bottom: 5px;">অনুষদঃ</p>
							</div>
								<div class='form-group col-lg-offset-1 col-lg-9'>
									<select name="faculty_name" id="uvs-faculty-list" class="text-center col-lg-6">
										<option>অনুষদ নির্বাচন করুন</option>
										<option value="প্রোকৌশল">প্রোকৌশল</option>
										<option value="বিজ্ঞান">বিজ্ঞান</option>
										<option value="ব্যবসা">ব্যবসা</option>
										<option value="সমাজ">সমাজ বিজ্ঞান</option>
									</select>
								</div>
							<div class=' col-lg-offset-1 col-lg-7'>
								<p style="font-size: 17px;font-weight: bold;margin-bottom: 5px;margin-top: 5px;">ডিপার্টমেন্টঃ</p>
							</div>
								<div class='form-group col-lg-offset-1 col-lg-8'>
									<input type='text' name='department' required placeholder="যেমনঃ সিএসই" class="form-control" />
								</div>
							<div class='form-group col-lg-offset-1 col-lg-4' style="margin-top:5px;">
								<input type="submit" name="submit" value="Add" class="btn btn-primary col-lg-7"/>
							</div>
						</form>
					</div>
						<div class="col-lg-5 varsity-addDepartment-form-right">
							<table style="width:100%;margin:10px;">
								<tr style="padding:10px 0px;">
									<th>Faculty</th>
									<th>Department</th>
									<th>Action</th>
								</tr>
							<?php
								$query  = "select * from university_department";
								$result = $db -> selectQuery($query);
								if($result){
									while($data = mysqli_fetch_array($result)){
										$id = $data['id'];
										$faculty = $data['faculty'];
										$department = $data['department'];
							?>
								<tr style="padding:10px 0px;">
									<td><?php echo $faculty; ?></td>
									<td><?php echo $department; ?></td>
									<td><a href="varsity_add_department.php?id=<?php echo $id; ?>">Delete</a></td>
								</tr>
							<?php } } ?>
							</table>
						</div>
						<?php
							if(isset($_GET['id'])){
							$id = $_GET['id'];
							$query  = "delete from university_department where id='$id'";
							$result = $db -> deleteQuery($query);
							}
						?>
			</div>
		</div>
<?php include_once("inc/footer.php"); ?>