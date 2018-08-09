<?php
	include_once("lib/Database.php");
?>
<?php
	$db = new Database();
?>
<?php
	echo "<option>Select Subject</option>";
	$query  = "select * from secondary_subjects where class='".$_POST['className']."'";
	$res = $db -> selectQuery($query);
	while($row=mysqli_fetch_array($res))
	{
		echo "<option>".$row['subject']. "</option>";
	}
?>