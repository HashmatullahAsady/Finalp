

<?php 
require("connection.php");
require("bootstrap.php");
$employee_query=mysqli_query($conn,"SELECT * FROM EMPLOYEE");
$record=mysqli_fetch_assoc($employee_query);

if(isset($_POST["r_name"])){
	$r_name=$_POST["r_name"];
	$contract=$_POST["co_name"];
	$re_date=$_POST["re_date"];
	$address="file/".time(). $_FILES["file"]["name"];
					move_uploaded_file($_FILES["file"]["tmp_name"], $path);
	$query=mysqli_query($conn,"INSERT INTO CONTRACT VALUES(NULL,$r_name,NULL,'$contract','$re_date','$address')");
	if($query){
		header("location:contract.php?add=don");
	}else{
		header("location:contract_add.php?error=ficed");
	}

}

?>
<style type="text/css">
	#banner{height: 150px;background:#003011; text-align: center; color: white;}
	#back{float: left; margin-right: 10px;}
</style>
<div id="banner" class="panel panel-heading">
	<h1>add new contract for <span style="color: green">seven star technology</span></h1>
	<a href="contract.php" id="back" class="btn btn-primary">back to list</a>
	<a href="home.php" class="btn btn-primary" id="back">home</a>
	

</div>
<div id="content" class="panel panel-body"> 
	<?php if(isset($_GET["error"])){ ?> 
		<div class="alert alert-danger"><span class="alert alert-danger"> somthing went wrong please ty agin</span></div>
	<?php }?>

<div class="col-lg-6 col-md-6 col-sm-10 col-xs-12 col-lg-offset-3">
	<form method="post" enctype="multipart/form-data">
	<div class="input-group">
		<span class="input-group-addon">regesterar</span>
		<select name="r_name" class="form-control">
			<?php do{ ?>
			<option value="<?php $record['employee_id']; ?>"><?php echo  $record['name']; ?></option>
		<?php } while ($record=mysqli_fetch_assoc($employee_query)) ?>
		</select>
	</div>
	<div class="input-group">
		<span class="input-group-addon">contractor name</span>
		<input type="text" name="co_name" class="form-control">
	</div>
	<div class="input-group">
		<span class="input-group-addon">regester date</span>
		<input type="date" name="re_date" class="form-control" value="<?php echo date('Y-m-d'); ?>" >
	</div>
	<div class="input-group">
		<span class="input-group-addon">file</span>
		<input type="file" name="file" class="form-control">
	</div>
	<input type="submit" name="" class="btn btn-primary form-control" value="sive">
</form>
</div>


</div>