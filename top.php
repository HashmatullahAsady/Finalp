<?php require_once("connection.php");
require_once("bootstrap.php");

	
?>

<!DOCTYPE HTML>
<html>
	
	<head>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">

		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		
		<title>Stock Management System</title>
		

	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	
	</head>
	<body>
		<div class="container">
			<div id="banner">
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
					<img class="pull-left" src="images/logo.jpg" height="80px" width="80px" style="margin-top:10px">
					<h1>Stock Management System</h1>
				</div>
			</div>
			<div id="nav">
			
			<nav class="navbar navbar-default" role="navigation" style="margin-bottom:0;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="collapse">
            	<ul class="nav navbar-nav" id="nav-top">
                	<li class="dropdown"><a href="#" data-toggle="dropdown">Employee <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="employee_add.php">Add New Employee</a></li>
							<li><a href="employee_list.php">Employee List</a></li>
						</ul>
					</li>
					<li class="dropdown"><a href="#" data-toggle="dropdown">Customer<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="customer_add.php">Add New Customer</a></li>
							<li><a href="customer_list.php">Customer List</a></li>
							<li><a href="contruct_list.php">Contruct List</a></li>
						</ul>
					</li>

					<li class="dropdown"><a href="#" data-toggle="dropdown">Stock<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="stock.php">Add New Stock</a></li>
							<li><a href="stock_list.php">Stock List</a></li>
						</ul>
					</li>
					<li class="dropdown"><a href="#" data-toggle="dropdown">Vendor<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="Vendor_add.php">Add New Vendor</a></li>
							<li><a href="Vendor_list.php">Vendor List</a></li>
						</ul>
					</li>
					<li class="dropdown"><a href="#" data-toggle="dropdown">Purchase <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="purchase_add.php">Add New Purchase</a></li>
							<li><a href="purchase_list.php">Purchase List</a></li>
						</ul>
					</li>
					<li class="dropdown"><a href="#" data-toggle="dropdown">Sales <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="sales_add.php">Add New Sales</a></li>
							<li><a href="sales_list.php">Sales List</a></li>
						</ul>
					</li>
					<li class="dropdown"><a href="#" data-toggle="dropdown">Finance <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="expense_add.php">Add new expense</a></li>
							<li><a href="expense_list.php">Expense list</a></li>
						</ul>
					</li>
					<li class="dropdown"><a href="#" data-toggle="dropdown">User Account <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="user_add.php">Add New User</a></li>
							<li><a href="user_list.php">User List</a></li>
							<li><a href="change_my_pass.php">Change My Password</a></li>
						</ul>
					</li>
					<li><a href="logout.php">Log out</a></li>
                </ul>
			</span>
            </div>  
        </nav>
	</div>
<div class="" id="main">