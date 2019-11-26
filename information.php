\<?php 

require("bootstrap.php");
require("connection.php");

?>
<link rel="stylesheet" type="text/css" href="css/style.css">
<div id="header" class="col-lg-12 col-md-12 col-sm-6 col-xs-5 responsive">
	<h1 > 7star <span style="color: green;"> technology</span> </h1>
	<img id="logo" src="img/pic1.png">
</div>
<div id="regestration" class="col-lg-12 col-md-8 col-sm-6 responsive">
					<div id="info">
						<h1>EMPLOYEE INFORMATION </h1>
					
						<div  class="alert alert-success"> one new employee is regesterd<br>
						<a href="employee_list.php?employee_id=<?php echo $employee_record['employee_id'];?>">info</a> 
						<a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					</div>
				
						<?php  $query=mysqli_query($conn,"SELECT * FROM EMPLOYEE");
								$record=mysqli_fetch_assoc($query);
						?>
						<table>
							<th >name</th>
							<th >last name</th>
							<th >father name</th>
							<th >position</th>
							<th >total salary</th>
							<th >currency</th>
							<th >regestration date</th>
							<th >gender</th>
							<th >Email</th>
							<th >phone number</th>
							<th >Education</th>
							<th >Address</th>
							<th >employee type</th>
							<th >picture</th>
							<th >edite</th>
							<th >delet</th>
							
							
								<?php do{ ?>
									<tr>
									<td><?php echo $record["name"];  ?></td>
									<td><?php echo $record["lastname"];  ?></td>
									<td><?php echo $record["fathername"];  ?></td>
									<td><?php echo $record["position"];  ?></td>
									<td><?php echo $record["total_salary"];  ?></td>
									<td><?php echo $record["currency"];  ?></td>
									<td><?php echo $record["date_in"];  ?></td>
									<td><?php echo gender($record["gender"]);  ?></td>
									<td><?php echo $record["email"];  ?></td>
									<td><?php echo $record["phone"];  ?></td>
									<td><?php echo $record["education"];  ?></td>
									<td><?php echo $record["address"];  ?></td>
									<td><?php echo em_type( $record["employee_type"]);  ?></td>
									<td><img height='70px' width='70px' class='img img-circle' src="<?php echo $record["picture"]; ?>"></td>
		
									<td><a href="employee_edit.php?id=<?php echo $record['employee_id']; ?> ">edit</a></td>
									<td><a href="employee_remove.php?id=<?php echo $record['employee_id']; ?> ">delet</a></td>
							<?php }while ($record=mysqli_fetch_assoc($query)) ?>
							
				
							</tr>
						</table>
			
				</div>
</div>