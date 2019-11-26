
<?php require("bootstrap.php");
require("connection.php");
session_start();
if(!isset($_SESSION["SESSION"])){
	header("location:login.php?erorr=done");
}

	
	if(isset($_POST["firstname"])) {
		$firstname =$_POST["firstname"];
		$lastname =$_POST["lastname"];
		$fathername = $_POST["fathername"];
		$position = $_POST["position"];
		$gross_salary = $_POST["gross_salary"];
		$currency = $_POST["currency"];
		$hire_date = $_POST["hire_date"];
		$gender = $_POST["gender"];
		$email = $_POST["email"];
		$phone = $_POST["phone"];
		$education = $_POST["education"];
		$address = $_POST["address"];
		
		$employee_type =$_POST["employee_type"];
	
		
		
		
		if($_FILES["photo"]["name"] != "") {
			
			$filetype = $_FILES["photo"]["type"];
			if($filetype == "image/jpeg" || $filetype == "image/png" || $filetype == "image/gif") {
				if($_FILES["photo"]["size"] <= 4 * 1024 * 1024) {
					$path = "images/employee/" . time() . $_FILES["photo"]["name"];
					move_uploaded_file($_FILES["photo"]["tmp_name"], $path);
				}
				else {
					header("location:employee_add2.php?filesize=incorrect");
					exit();
				}
			}
			else {
				header("location:employee_add2.php?filetype=incorrect");
				exit();
			}
		}
		else {
			if($gender == 0) {
				$path = "images/employee/user_m.png";
			}
			else {
				$path = "images/employee/user_f.png";
			}
		}

		
		$result = mysqli_query($conn, "INSERT INTO EMPLOYEE VALUES (NULL, '$firstname','$lastname','$fathername','$position',$gross_salary,'$path','$hire_date',$gender,'$email',$phone,'$education','$address','$currency',$employee_type )");
		
		if($result) {
			header("location:employee_list.php?add=done");
		}
		else {
			header("location:employee_add2.php?error=notadd");
		}
		
	}
?>
<style type="text/css">#banner{background:#003011;}</style>
	<link rel="stylesheet" type="text/css" href="css/style_reg.css">
<div id="banner" class="col-lg-12 col-md-12 col-sm-6 col-ex-5 responsive panel-header">
	<h1 class="responsive"> employee <span style="color: green;"> regestration</span> </h1>
</div>
<div id="employee_reg" class="col-lg-12 col-md-12 col-sm-8 col-ex-6 responsive panel-body">
														<div id="form">
													<form class="form" method="post" enctype="multipart/form-data">
															
															<?php if(isset($_GET["filetype"])) { ?>
																<div class="alert alert-danger">
																	Incorrect File Type! <br> (allowed type is: jpeg, png, gif)
																</div>
															<?php } ?>
															
															<?php if(isset($_GET["filesize"])) { ?>
																<div class="alert alert-danger">
																	Incorrect File Size! <br> (allowed size is less than 4 MB)
																</div>
															<?php } ?>
															
															<?php if(isset($_GET["error"])) { ?>
																<div class="alert alert-danger">
																	Sorry! Could not add new employee! Please try again!
																</div>
															<?php } ?>
															
															<div class="input-group">
																<span class="input-group-addon">
																	Firstname:
																</span>
																<input type="text" name="firstname" class="form-control">
															</div>
															
															<div class="input-group">
																<span class="input-group-addon">
																	Lastname:
																</span>
																<input type="text" name="lastname" class="form-control">
															</div>
															
															<div class="input-group">
																<span class="input-group-addon">
																	Fathername:
																</span>
																<input type="text" name="fathername" class="form-control" >
															</div>
															<div class="input-group">
																<span class="input-group-addon">
																	Position:
																</span> 
																<input type="text" name="position" class="form-control">
															</div>
															<div class="input-group">
																<span class="input-group-addon">
																	Gross Salary:
																</span> 
																<input type="number" name="gross_salary" class="form-control">
															</div>
															<div class="input-group">
																<span class="input-group-addon">
																	Salary Currency:
																</span> 
																<select name="currency" class="form-control">
																	<option>AFS</option>
																	<option>USD</option>
																</select>
															</div>
															<div class="input-group">
																<span class="input-group-addon">
																	Gender:
																</span> &nbsp;     
																<label><input style="margin-top:12px;" type="radio" name="gender" value="0" checked> Male</label> &nbsp;
																<label><input type="radio" name="gender" value="1"> Female</label>
															</div>
															
															<div class="input-group">
																<span class="input-group-addon">
																	Phone:
																</span>
																<input type="tel" name="phone" class="form-control">
															</div>
															
															<div class="input-group">
																<span class="input-group-addon">
																	Email:
																</span> 
																<input type="email" name="email" class="form-control">
															</div>
															
															<div class="input-group">
																<span class="input-group-addon">
																	Address:
																</span> 
																<input type="text" name="address" class="form-control">
															</div>
															
															<div class="input-group">
																<span class="input-group-addon">
																	Education:
																</span> 
																<select name="education" class="form-control">
																	<option>Illiterate</option>
																	<option>Bachloria</option>
																	<option>College</option>
																	<option>Bachlore</option>
																	<option>Master</option>
																	<option>PHD</option>
																</select>
															</div>
															
															
															
															<div class="input-group">
																<span class="input-group-addon">
																	Employee Type:
																</span> 
																<select type="text" name="employee_type" class="form-control">
																	<option value="0">admin</option>
																	<option value="1">worker</option>
																</select>
															</div>
															
															
															
															
															
															<div class="input-group">
																<span class="input-group-addon">
																	Hire Date:
																</span> 
																<input  type="Date" value="<?php echo  date('Y-m-d'); ?>" name="hire_date" class="form-control">
															</div>

																<div class="input-group">
																<span class="input-group-addon">
																	Photo:
																</span>
																<input type="file" name="photo" class="form-control">
																</div>
																<?php if (isset($_POST["employee_type"]) and $_POST["employee_type"]="0") { ?>
																	<div class="input-group">
																		<span class="input-group-addon">
																			username:
																		</span>
																		<input type="text" name="username" class="form-control">
																	</div>
																	<div class="input-group">
																		<span class="input-group-addon">
																			password:
																		</span>
																		<input type="password" name="password" class="form-control">
																	</div>
																	
																<?php } ?>
															<br>
															<input type="submit" value="Add Employee" class="btn btn-primary">
														</form>
														</div>
													</div>
												
</div>
