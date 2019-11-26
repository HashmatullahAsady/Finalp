<?php 
require("connection.php");
require("bootstrap.php");

?>

<style type="text/css">
	#header{background: #003011;text-align: center; border-radius: 10px;color: white;}
	#content{text-align: center;height: 450px;}
	table,th{border:1px solid black; margin:0 auto;}
	#back{background: #003011;float: left; margin-left: 10px;}
	#co{background: #003011;float: right;margin-right: 10px; }
	#footer{text-align: center;}
</style>
<div class="panel panel-heading" id="header">
	<h1>sevestar<span style="color: green">technology</span></h1>
</div>
<div class="panel panel-primary" id="content">
	<a href="home.php" id="back">home</a>
	<a href="contract_add" id="co">add new contract</a>
	<?php

	                       $query=mysqli_query($conn,"SELECT contract.co_id,contract.employee_id,contract.name as contract_name, contract.date_c,contract.file_c ,employee.name FROM CONTRACT INNER JOIN EMPLOYEE ON EMPLOYEE.employee_id=CONTRACT.employee_id");
                                                $record=mysqli_fetch_assoc($query);
                                                ?>

                                                  <div>
                                                  <table>
                                                    <th >id</th>
                                                    <th >done by</th>
                                                    <th >name</th>
                                                    <th >contract date</th>
                                                    <th>contract file</th>
                                                    <?php do{ ?>
                                                    <tr>
                                                      <td><?php echo $record["co_id"]; ?></td>
                                                      <td><?php echo $record["name"]; ?></td>
                                                      <td><?php echo $record["contract_name"]; ?></td>
                                                      <td><?php echo $record["date_c"]; ?></td>
                                                      <td><img src=" <?php echo $record["file_c"]; ?>"> </td>
                                                    </tr>
                                                    <?php } while ($record=mysqli_fetch_assoc($query)) ?>
                                                  </table>
                                                  </div>
</div>
<div  class="panel  panel-footer" id="footer">
	 <footer id="footer" class="footer">
            <div class="container">
                <div class="main_footer ">
                    <div class="row">

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
                </div>
            </div>
</div>