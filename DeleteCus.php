<?php
	$CusNameID=$_GET['CusNameID'];
	include('../phpmysql/dbconnect.php');
	mysqli_query($conn,"delete from `customer_name` where CusNameID='$CusNameID'");
	header('location:CusName.php');
?>