<?php 
session_start();
require("link.php");
require("connection.php");
$query2=mysqli_query($conn,"SELECT * FROM USERS");
$re=mysqli_fetch_assoc($query2);
$type=$re["user_type"];
if(isset($_POST["username"])){
	$username=$_POST["username"];
	$password=$_POST["password"];	
	$query=mysqli_query($conn,"SELECT * FROM users WHERE USERNAME='$username' AND PASSWORD=PASSWORD('$password') AND USER_TYPE=$type");
	$record=mysqli_fetch_assoc($query);
	if(mysqli_num_rows($query)>0){ 		
		$_SESSION["SESSION"] = $record["user_id"];
		setcookie("co1",$password,time()+2400);
 		header("location:home.php");

 	}
}

?>

<style type="text/css">
	#body{
		background-image: url("img/pic2.png");
		background-repeat: no-repeat;
		height: 650px;
		
	}
#form{
	background:lightgray;
	margin:0 auto;
	text-align: center;
	width: 30%;
	margin-top: 10%;
	height: 300px;
	border: 2px solid black;
	border-radius: 10px;
}
form h1{
	color:black;
	background:gray;
	margin-top: -0px;
	height: 30%;
}
#banner{
	height: 140px;
	background: rgb(100,122,100);
	text-align: center;
}
form{
	height: auto;
}
#submit{
	margin-top: 10%;
	width: 20%;
}
</style>
<link rel="stylesheet" type="text/css" href="css/style_vender.css">
<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " id="banner" >
		<h1>
			7STAR<span style="color: green">technology</span>
		</h1>
	</div>
<div id="body" class="col-lg-12 col-md-10 col-sm-8 col-ex-6 responsive">
	<a href="index.php" class="btn btn-primary">back to website</a>
	<div class="panel panel-primary" id="form" id="btn">
		<form method="post" enctype="multipart/form-data">
			<h1 >7STAR</h1>
			<label>user name</label><input type="text" name="username" class="form-control">
			<label>password</label><input type="password" name="password" class="form-control">
			<input  id="submit" type="submit" name="" value="login" class="btn-primary">
		</form>
	</div>
</div>