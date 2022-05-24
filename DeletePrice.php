<?php
	$id=$_GET['id'];
	include('../phpmysql/dbconnect.php');
	mysqli_query($conn,"delete from `price` where id='$id'");
	header('location:price.php');
?>