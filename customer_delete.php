<?php
session_start();
	require_once("connection.php");
	if(!isset($_SESSION["SESSION"])){
  header("location:login.php?erorr=done");
}

	$result=mysqli_query($conn,"DELETE FROM customer WHERE customer_id=".$_GET['customer_id']);
	if($result){
		header("location:customer_list.php?delete=done");
	}
	else
	{
		header("location:customer_list.php?error=failed");
	}
?>