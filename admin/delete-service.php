<?php 

require_once('functions/function.php');
needLogged();
$id=$_GET['ds'];
$del="DELETE FROM services WHERE service_id='$id'";

if(mysqli_query($con,$del)){
	header('location: all-service.php');
}else{
	echo "Opps! Failed your operation.";
}

 ?>