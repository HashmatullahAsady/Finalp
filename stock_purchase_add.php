
<?php ob_start();?>
<?php  
require_once("connection.php");
require_once("bootstrap.php");  
	
	// echo "SELECT * FROM purchase INNER JOIN stock ON stock.item_id = purchase.item_id  ORDER BY purchase_id DESC";
	// exit();
	$all_stockin = 	$stockin = mysqli_query($conn,"SELECT * FROM purchase INNER JOIN stock ON stock.st_id = purchase.pu_id ");

	$row_stockin = mysqli_fetch_assoc($stockin);
	$total_stockin = mysqli_num_rows($stockin);
?>
	<link rel="stylesheet" type="text/css" href="css/stock1.css">
	<div id="banner"><h1>sevenstar<span  style="color: green">technology</span></h1></div>
	<div class="panel panel-info">

		<div class="panel-heading noprint">
			<a href="stock_in.php" class="btn btn-info pull-right">Add new purchase</a>
			<h4>Purchase List</h4>
		</div>
		<div class="panel-body">

				<?php if (isset($_GET["delete"])) {?>
		<div class="alert alert-success">Delete Done</div>
	<?php }?>
	<?php if (isset($_GET["error"])) {?>
		<div class="alert alert-danger">Delete Not Done !!!</div>
	<?php }?>
	<?php if (isset($_GET["edit"])) {?>
		<div class="alert alert-success">Edit Done Successfully!</div>
	<?php }?>


	<div class="table-responsive">
	<?php if ($total_stockin > 0) {?>


		<table class="table table-striped">
			<tr>
				<th>No</th>
				<th>Item Name</th>
				<th>Source</th>
				<th>Purchase Price</th>
				<th>In date</th>
				<th>Quantity</th>
				<th>Remark</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>

			<?php 
			$x=1;
			
			do{?>

			<tr>
				<td><?php echo $x++;?></td>
				<td><?php echo $row_stockin["item_name"];?></td>
				<td><?php echo $row_stockin["source"];?></td>
				<td><?php echo $row_stockin["purchase_price"];?></td>
				<td><?php echo $row_stockin["purchase_date"];?></td>
				<td><?php echo $row_stockin["quantity"];?></td>
				<td><?php echo $row_stockin["remark"];?></td>
				<td><a href="purchase_edit.php?edit=done&purchase_id=<?php echo $row_stockin["purchase_id"]?>"><span class="glyphicon glyphicon-edit"></span></a></td>
				<td><a class="delete" href="purchse_delete.php?delete=done&purchase_id=<?php echo $row_stockin["purchase_id"]?>"><span class="glyphicon glyphicon-trash"></span></a></td>
				</tr>

			<?php } while($row_stockin = mysqli_fetch_assoc($stockin));?>
		</table>
		<?php }
?>
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
<?php ob_flush();?>