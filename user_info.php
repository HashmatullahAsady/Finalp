<?php 
require_once("connection.php"); 
require_once("bootstrap.php");

	$users=mysqli_query($conn,"SELECT * FROM users");
	$row_users = mysqli_fetch_assoc($users);

?>
<link rel="stylesheet" type="text/css" href="css/user_info.css">
<div id="banner" class="col-lg-12 col-md-10 col-sm-8 col-xs-12">
	<h1>all users</h1>
</div>
<div id="content" class="col-lg-12 col-md-10 col-sm-8 col-xs-12">
	<a href="home.php" class="btn btn-primary" id="home" >home</a>
	
	<div id="info">
		<?php if (isset($_GET["delete"])) {?>
			<div class="alert alert-success">Delete done successfully!</div>
		<?php }?>


		<?php if (isset($_GET["edit"])) {?>
			<div class="alert alert-success">Edit done successfully!</div>
		<?php }?>

		<?php if (isset($_GET["add"])) {?>
			<div class="alert alert-success">User add successfully!</div>
		<?php }?>
			<div class="table-responsive">
				<table class="table table-striped">
					<tr>
						<th>Id</th>
						<th>User Name</th>
						<th>User Type</th>
						<th>Delete</th>
						<th>change password</th>
					</tr>

					<?php do{?>
						<tr>
							<td><?php echo $row_users["user_id"];?></td>
							<td><?php echo $row_users["username"];?></td>
							<td><?php if($row_users["user_type"]==0){echo "admin";}else{echo "User";};?></td>
							<td><a class="delete" href="user_delete.php?user_id=<?php echo $row_users["user_id"];?>"><span class="glyphicon glyphicon-trash"></span></a></td>
							<td><a href="password_change.php?user_id=<?php echo $row_users['user_id']; ?>">change password</a></td>						</tr>
					<?php } while ($row_users = mysqli_fetch_assoc($users));?>
				</table>
			</div>
	</div>



</div>