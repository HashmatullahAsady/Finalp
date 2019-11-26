<?php 

$conn=mysqli_connect("localhost","root","hakimi");
 $select= mysqli_select_db($conn,"sevenstar");


 function gender($value){
 	switch ($value) {
 		case 0:
 			return "male";
 			break;
 		case 1:
 			return "female";
 			break;
 	}
 }

  	function em_type($value){
  		switch ($value) {
  			case 0:
  				return "admin";
  				break;
  			
  			case 1:
  				return "worker";
  				break;
  		}
  	}

 ?>


