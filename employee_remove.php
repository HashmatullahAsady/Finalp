<?php
require("connection.php");
$id=$_GET["id"];
 $query=mysqli_query($conn,"DELETE FROM EMPLOYEE WHERE EMPLOYEE_ID=$id");
 if($query){
 	header("location:information.php?delete=don");
 }
 else{
 	header("location:information.php?delete=false");
 }
?>