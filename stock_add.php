
<?php  
require_once("connection.php");
require_once("bootstrap.php");  

	if (isset($_POST["item_name"])) {
		$item_name =$_POST["item_name"];
		$description=$_POST["description"];
		$quality=$_POST["quality"];
		$quantity = $_POST["quantity"];
		$price = $_POST["price"];

		$result = mysqli_query($conn,"INSERT INTO stock VALUES(NULL,'$item_name','$description','$quality',$quantity,$price)");
		if ($result) {
			header("location:stock_list.php?add=done");
		}else{
			header("location:stock.php?error=failed");
		}
	}

?>
<link rel="stylesheet" type="text/css" href="css/stock1.css">
<div id="banner"> <h1>sevenstar<span style="color: green">technology</span></h1></div>
<div id="content">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-0">
		
			<div class="panel-heading">
				<h4>Add to stock </h4>
			</div>
			<div class="panel-body">
			<?php if (isset($_GET["add"])) {?>
				<div class="alert alert-success">
				added successfuly!!!
				</div>
			<?php }?>
				<form method="post" enctype="multipart/form-data">
					<div class="input-group">
						<span class="input-group-addon">Item Name: </span>
						<input type="text" name="item_name" class="form-control" required>
					</div>
					<div class="input-group">
						<span class="input-group-addon">description: </span>
						<textarea type="text" name="description" class="form-control" required></textarea>
					</div>
					<div class="input-group">
						<span class="input-group-addon">Quality: </span>
						<input type="text" name="quality" class="form-control" required>
					</div>
					<div class="input-group">
						<span class="input-group-addon">Quantity: </span>
						<input type="number" name="quantity" class="form-control" required>
					</div>
					<div class="input-group">
						<span class="input-group-addon">Price: </span>
						<input type="number" name="price" class="form-control" required>
					
					<span class="input-group-btn">
						<input type="text" class="btn btn-default" value="Af">
					</span>
					</div>
				<input type="submit" value="Add to stock" class="btn btn-primary">
			</form>
		</div>
	</div>
</div>

<div id="footer"> 

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