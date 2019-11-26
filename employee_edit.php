<?php 
require("bootstrap.php");
require("connection.php");
if(isset($_POST["name"])){
	$name=$_POST["name"];
	$last_name=$_POST["last_name"];
	$father_name=$_POST["father_name"];
	$position=$_POST["position"];
	$salary=$_POST["salary"];
	$regestration_date=$_POST["regestration_date"];
	$gender=$_POST["gender"];
	$email=$_POST["email"];
	$phone_number=$_POST["phone_number"];
	$education=$_POST["education"];
	$address=$_POST["address"];
	$currency=$_POST["currency"];
	$employee_type=$_POST["employee_type"];
					if($_FILES["photo"]["name"] != "") {
						
						$filetype = $_FILES["photo"]["type"];
						if($filetype == "image/jpeg" || $filetype == "image/png" || $filetype == "image/gif") {
							if($_FILES["photo"]["size"] <= 4 * 1024 * 1024) {
								$path = "images/employee/" . time() . $_FILES["photo"]["name"];
								move_uploaded_file($_FILES["photo"]["tmp_name"], $path);
							}
							else {
								header("location:employee_add.php?filesize=incorrect");
								exit();
							}
						}
						else {
							header("location:employee_add.php?filetype=incorrect");
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
			$query=mysqli_query($conn,"UPDATE EMPLOYEE SET NAME='$name',LASTNAME='$last_name',FATHERNAME='$father_name',POSITION='$position',TOTAL_SALARY=$salary,PICTURE='$path',DATE_IN='$regestration_date',GENDER=$gender,EMAIL='$email',PHONE=$phone_number,EDUCATION='$education', ADDRESS='$address',CURRENCY='$currency',EMPLOYEE_TYPE=$employee_type ");
			if($query){
				header("location:information.php?edit=done");
			}
			else{
				header("location:employee_edit.php?edit=false");
			}
}


?>

<link rel="stylesheet" type="text/css" href="css/style_edit.css">
<div id="banner" class="col-lg-12 col-md-12 col-sm-12 col-ex-6 responsive">
	<h1> 7star<span style="color: green">technology</span></h1>
</div>
<div id="conntent" class="col-lg-12 col-md-12 col-sm-12 col-ex-6 responsive">
									<div id="form">
										<div><h1>employee edit</h1></div><br>
										<?php if(isset($_GET["edit"]) and $_GET["edit"]='false'){ ?>
											<div class="alert alert-danger">
												sorry edit is not done:
											</div>
										<?php }?>
										<form method="POST" enctype="multipart/form-data">
											<div class="input-group">
												<span class="input-group-addon">
													name:
												</span>
												<input type="text" name="name" class="form-control">
											</div>
											<div class="input-group">
												<span class="input-group-addon">
													last name:
												</span>
												<input type="text" name="last_name" class="form-control">
											</div>
											<div class="input-group">
												<span class="input-group-addon">
													father name:
												</span>
												<input type="text" name="father_name" class="form-control">
											</div>
											<div class="input-group">
												<span class="input-group-addon">
													position:
												</span>
												<input type="text" name="position" class="form-control">
											</div>
											<div class="input-group">
												<span class="input-group-addon">
													salary:
												</span>
												<input type="number" name="salary" class="form-control">
											</div>
											<div class="input-group">
												<span class="input-group-addon">
													regestration date:
												</span>
												<input type="date" name="regestration_date" value="<?php echo date('Y-m-d'); ?>" class="form-control">
											</div>
											<div class="input-group">
												<span class="input-group-addon">
													gender:
												</span> &nbsp;
												<label><input  type="radio" name="gender" value="0" class="form-control" style="margin-right: 50px;" checked>male</label>&nbsp;
												<label><input type="radio" name="gender" value="1" class="form-control">female</label>&nbsp;
											</div>
											<div class="input-group">
												<span class="input-group-addon">
													email:
												</span>
												<input type="email" name="email" class="form-control">
											</div>
											<div class="input-group">
												<span class="input-group-addon">
													phon number:
												</span>
												<input type="number" name="phone_number" value="+93-" class="form-control">
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
													address:
												</span>
												<input type="text" name="address" class="form-control">
											</div>
											<div class="input-group">
												<span class="input-group-addon">
													currency:
												</span>
												<select name="currency" class="form-control"><option>USSD</option><option>AF</option></select>
											</div>
											<div class="input-group">
												<span class="input-group-addon">
													employee type:
												</span>
												<select name="employee_type" class="form-control"><option value="0">admin</option><option value="1">worker</option></select>
											</div>
											<div class="input-group">
												<span class="input-group-addon">
													photo:
												</span>
												<input type="file" name="photo" class="form-control">
											</div>
											<input type="submit" value="sive changes" name="" class="btn-primary">
											

										</form>
									</div>
	
</div>