
<?php 
session_start();

require_once("connection.php");
require("bootstrap.php"); 
	
	$user_id=$_SESSION["SESSION"];

	if (isset($_POST["old_password"])) {
		$old_password=$_POST["old_password"];
		$new_password=$_POST["new_password"];
		$confirm_password=$_POST["confirm_password"];

		$user=mysqli_query($conn,"SELECT * FROM users WHERE user_id=".$user_id." AND password=PASSWORD('$old_password')");
		if(mysqli_num_rows($user)==1){
		if ($new_password==$confirm_password) {
			$result=mysqli_query($conn,"UPDATE users SET password=PASSWORD('$new_password') WHERE user_id=$user_id");
			if ($result) {
				header("location:index.php?change=done&user_id=$user_id");
			}
			else{
				header("location:change_my_pass.php?change=failed&user_id=$user_id");
			}		
		}
		
		}
		else{
			header("location:change_my_pass.php?old=wrong");
		}
	}


?>
<style type="text/css">
#banner{height:150px; background:#003011;text-align: center; color: white;}
#btn{float: left;}
#btn1{float: right;}

</style>
<div id="banner" class="  col-lg-12 col-md-9 col-sm-8 col-xs-12 " >
	<h1>sevenstar</h1>
</div>
<a href="user_info.php" id="btn" class=" btn btn-primary">back to users</a>
<a href="home.php" id="btn1" class="btn btn-primary">home</a>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 col-md-offset-3 col-lg-offset-3 col-sm-offset-3 col-xs-offset-0">
	<div>
		<div class="panel-heading">
			<h3>Change my password</h3>
		</div>
		<div class="panel-body">
			<form method="POST">
				<div class="input-group">
					<span class="input-group-addon">Old Password</span>
					<input type="password" class="form-control" name="old_password">
				</div>
				<div class="input-group">
					<span class="input-group-addon">New Password</span>
					<input type="password" class="form-control" name="new_password">
				</div>
				<div class="input-group">
					<span class="input-group-addon">Confirm Password</span>
					<input type="password" class="form-control" name="confirm_password">
				</div>
				<span class="input-group-btn">
					<input type="submit" value="Change" class="btn btn-primary">
				</span>
			</form>
		</div>
	</div>
</div>
<div id="footer" style="text-align: center;">
			 <div class=" col-sm-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="copyright_text">
                                <p class=" wow fadeInRight" data-wow-duration="1s">Made with <i class="fa fa-heart"></i> by <a href="#">7star technology</a>2019. All Rights Reserved</p>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xs-12">
                            <div class="footer_socail">
                                <a href=""><i class="fa fa-facebook"></i></a>
                                <a href=""><i class="fa fa-twitter"></i></a>
                                <a href=""><i class="fa fa-google-plus"></i></a>
                                <a href=""><i class="fa fa-rss"></i></a>
                            </div>
                        </div>
</div>