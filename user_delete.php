<?php
 require_once("connection.php"); 


	$user_id=$_GET["user_id"]);
	$result = mysqli_query($conn,"DELETE FROM users WHERE user_id=".$user_id);
	if ($result) {
		header("location:user_list.php?delete=done");
	}
	else{
		header("location:user_list.php?error=failed");
	}
?>
