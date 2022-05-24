<?php
	$ComID=$_GET['ComID'];
	include('../phpmysql/dbconnect.php');
	mysqli_query($conn,"delete from `company` where ComID='$ComID'");
	header('location:Company.php');
?>