
<?php
    include_once("lib/Database.php");
	$db = new Database();
?>
<?php
	if(isset($_GET['QuesId']) && isset($_GET['userID'])){
		$quesID = $_GET['QuesId'];
		$userID = $_GET['userID'];
		$query  = "select * from questions where id='$quesID'";
		$result = $db -> selectQuery($query);
		if($result){
			while($data = mysqli_fetch_array($result)){
				$title = $data['Title'];
				$query  = "delete from questions where id='$quesID'";
				$query2  = "delete from notification where ques_title='$title'";
				$result = $db -> deleteQuery($query);
				$result2 = $db -> deleteQuery($query2);
				if($result){
					echo "<script>location.href='userProfile.php?userId=$userID'</script>";
				}
			}
		}
	}
?>