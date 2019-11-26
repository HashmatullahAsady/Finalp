<?php 
require("connection.php");
if(isset($_SESSION["SESSION"])){
	session_destroy();
	setcookie("co1",time()-1);
}
header("location:login.php");
 ?>