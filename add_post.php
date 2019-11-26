
<?php 
require("link.php");
require("bootstrap.php");
require("connection.php");




if(isset($_POST["name"])){
	$name=$_POST["name"];
	$description=$_POST["description"];
	

	if($_FILES["file"]["name"] != "") {
			
			$filetype = $_FILES["file"]["type"];
			if($filetype == "image/jpeg" || $filetype == "image/png" || $filetype == "image/gif") {
				if($_FILES["file"]["size"] <= 4 * 1024 * 1024) {
					$path = "images/employee/" . time() . $_FILES["file"]["name"];
					move_uploaded_file($_FILES["file"]["tmp_name"], $path);
				}
				else {
					header("location:employee_add.php?filesize=incorrect");
					exit();
				}



			}
		}


	$query=mysqli_query($conn,"INSERT INTO POST VALUES(null,null,null,'$name','$description')");
	$query2=mysqli_query($conn,"INSERT INTO PHOTO VALUES(NULL,NULL,'$path')");
	if($query){
		header("location:index.php?post=troue");
	}
	else{
		header("location:add_post.php?incorect=error");
	}


}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="css/add_post1.css">
</head>
<body>
	<div id="pobanner" class="col-lg-12 col-md-12 col-sm-12 col-ex-6 responsive"><h1> <span style="color: green">7</span>star</h1></div>
			<div id="pomenue" class="col-lg-12 col-md-12 col-sm-12 col-ex-6 responsive"></div>
								<div id="pocontent" class="col-lg-12 col-md-12 col-sm-12 col-ex-6  responsive">
										


										<div id="post">
												<div  id="h1"><h1> add post here</h1></div>
												<form enctype="multipart/form-data" method="post">
												name:<input type="text" name="name" class="form-control">
												description:<input type="text-area" name="description" class="form-control">
												photo:<input type="file" name="file" class="form-control">
												<input type="submit" name="" value="POST" class="form-control btn-primary">
												</form>
										</div>
									

										<h1>SEVEN STAR IS YOUR BEST CHOICE </h1>
								</div>
								<?php require("footer.php") ?>
</body>
</html>