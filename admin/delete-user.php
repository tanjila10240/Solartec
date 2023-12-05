<?php 

require_once('functions/function.php');
needLogged();
$id=$_GET['d'];
$del="DELETE FROM uylab_users WHERE user_id='$id'";

if(mysqli_query($con,$del)){
	header('location: all-user.php');
}else{
	echo "Opps! Failed your operation.";
}

 ?>