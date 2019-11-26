<?php 

session_start();
if(!isset($_SESSION["SESSION"])){
  header("location:login.php?erorr=done");
}



	require_once("connection.php");
	require("link.php"); 

	if (isset($_POST["username"])) {
		$username=$_POST["username"];
		$password=$_POST["password"];
		$user_type=$_POST["user_type"];


		$result=mysqli_query($conn,"INSERT INTO users VALUES (NULL, NULL,'$username',PASSWORD('$password'),'$user_type')");
		if ($result) {
			header("location:user_list.php?add=done");
		}
		else{
			header("location:user_add.php?error=failed");
		}
	}


?>
<link rel="stylesheet" type="text/css" href="css/style.css">
<div id="header" class="col-lg-12 col-md-12 col-sm-6 col-xs-5 responsive">
	<h1 > 7star <span style="color: green;"> technology</span> </h1>
	<img id="logo" src="img/pic1.png">
</div>
<div id="regestration" class="col-lg-12 col-md-8 col-sm-6 responsive">
					<div id="info">
						<h1>creat new acount </h1>
					</div>
	</div>


<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 col-md-offset-3 col-lg-offset-3 col-sm-offset-3 col-xs-offset-0">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3>Add new user</h3>
		</div>
		<div class="panel-body">
			<form method="POST">
				<div class="input-group">
					<span class="input-group-addon">User Name</span>
					<input type="text" class="form-control" name="username">
				</div>
				<div class="input-group">
					<span class="input-group-addon">Password</span>
					<input type="password" class="form-control" name="password">
				</div>
				<div class="input-group">
					<span class="input-group-addon">User Type</span>
					<select class="form-control" name="user_type">
						<option value="0">Admin</option>
						<option value="1">User</option>
					</select>
				</div>
				<span class="input-group-btn">
					<input type="submit" value="Add" class="btn btn-primary">
				</span>
			</form>
		</div>
				<div id="poyem">
				<h1>SEVEN STAR IS YOUR BEST CHOISE</h1>
				</div>
	</div>
</div>

<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " id="footer">


</div>