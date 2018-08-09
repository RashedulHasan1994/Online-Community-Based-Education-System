<?php										
	if(isset($_SESSION["Id"])){
		$user_id  = $_SESSION["Id"];
	}
?>	
										
<div class="col-lg-12 notification">
	<?php
		$query  = "select * from notification where value='0' ";
		$result = $db -> selectQuery($query);
		$count =  0;
		while($data = mysqli_fetch_array($result)){
			$nftn_id =$data['id'];
			$title =$data['ques_title'];
			$userID =$data['user_id'];
			$query  = "select * from questions where Title='$title'";
			$result1 = $db -> selectQuery($query);
				$data2 = mysqli_fetch_array($result1);
				$quesId=$data2['id'];
				$tags=$data2['Tags'];
				$tags=trim($tags);
				$tags=explode(" ",$tags);
				foreach($tags as $t){
					$query  = "select * from user_info where id='$user_id'";
					$result3 = $db -> selectQuery($query);
					$data3 = mysqli_fetch_array($result3);
						$tag=$data3['Tags'];
						$tag=trim($tag);
						$tag=explode(" ",$tag);
						foreach($tag as $tt){
							if($t==$tt){
								if($user_id != $userID){
									$count = $count + 1;
								?>
								<a href="single.php?id=<?php echo $quesId; ?> & nftn=<?php echo $nftn_id; ?>"><p><i class="fa fa-angle-double-right fa-lg ang-right"></i> <?php echo $title ;?></p></a>
							<?php
								}
							}
						}	
				}
		}
	?>
</div>