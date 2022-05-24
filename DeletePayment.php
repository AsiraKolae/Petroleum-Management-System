<?php
	$Payment_listID=$_GET['Payment_listID'];
	include('../phpmysql/dbconnect.php');
	mysqli_query($conn,"delete from `payment_list` where Payment_listID='$Payment_listID'");
	header('location:PaymentPage.php');
?>