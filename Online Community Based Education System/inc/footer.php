	<!-- footer start here -->
	<footer class="container-fluid footer">
		<div class="container footer-content">
			<div class="row">
				<div class="col-lg-9">
				<?php
					include_once("lib/Database.php");
					$db = new Database();
					$result = $db-> copyrightSelect();
					$data   = mysqli_fetch_array($result);
					$note	= $data ['note'];
				?>
					<h5>&copy <?php echo $note; ?></h5>
				</div>	
					<!-- social area start here -->
					<div class="col-lg-3 social-link">
						<?php
							$query  = "select * from socialLink";
							$result = $db-> selectQuery($query);
							$data   = mysqli_fetch_array($result);
							$facebook	= $data ['facebook'];
							$youtube	= $data ['youtube'];
						?>
						<a href="<?php echo $facebook; ?>"><i class="fa fa-facebook"></i></a>
						<a href="<?php echo $youtube; ?>"><i class="fa fa-youtube"></i></a>
					</div>
					<!-- social area end here -->
			</div>	
		
		</div>
	</footer>
	<!-- footer end here -->
</body>
</html>