<?php 
require_once("bootstrap.php");
require_once("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#banner{
			text-align: center;
			background: #003011;
		}
		#menu{
			background: #003011;
		}
		nav{
			background: #003011;
			text-align: center;
			float: right;
			
		}
		#h1{color: white}
		.clear{
			clear: both;
		}

	</style>
</head>
<body class="panel panel-body">
	<div class="panel panel-primary" id="banner">
		<h1 id="h1">sevenstar<span style="color: green">technology</span></h1>
	</div>
	<div class="panel panel-info" id="menu">

<nav>
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
							<li><a href="employee_add2.php">Add New Employee</a></li>
							<li><a href="employee_list.php">Employee List</a></li>
						</ul>
					</li>
					<li class="dropdown"><a href="#" data-toggle="dropdown">Customer<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="customer_add.php">Add New Customer</a></li>
							<li><a href="customer_list.php">Customer List</a></li>
						</ul>
					</li>

					<li class="dropdown"><a href="#" data-toggle="dropdown">Stock<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="stock.php">Stock List</a></li>
						</ul>
					</li>
					<li class="dropdown"><a href="#" data-toggle="dropdown">Vendor<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="Vender_add.php">Add New Vendor</a></li>
							<li><a href="Vender_list.php">Vendor List</a></li>
						</ul>
					</li>
					<li class="dropdown"><a href="#" data-toggle="dropdown">Purchase <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="purchase.php">Add New Purchase</a></li>
							<li><a href="purchase_info.php">Purchase List</a></li>
						</ul>
					</li>
					<li class="dropdown"><a href="#" data-toggle="dropdown">Sales <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="sales11.php">Add New Sales</a></li>
							<li><a href="sales_detail.php">Sales info</a></li>
						</ul>
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
        <div class="clear"></div>
   </div>

   <div class="panel panel-content">
   	<li><a href="contruct_list.php">Contruct List</a></li>
   	purchase list

   	<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="img/pic2.png" alt="Chania">
      <div class="carousel-caption">
        <h3>Chania</h3>
        <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
      </div>
    </div>

    <div class="item">
      <img src="img/pic1.png" alt="Chania">
      <div class="carousel-caption">
        <h3>Chania</h3>
        <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
      </div>
    </div>

    <div class="item">
      <img src="img/pic3.png" alt="Flower">
      <div class="carousel-caption">
        <h3>Flowers</h3>
        <p>Beatiful flowers in Kolymbari, Crete.</p>
      </div>
    </div>

    <div class="item">
      <img src="img_flower2.jpg" alt="Flower">
      <div class="carousel-caption">
        <h3>Flowers</h3>
        <p>Beatiful flowers in Kolymbari, Crete.</p>
      </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
   </div>
</body>
</html>
