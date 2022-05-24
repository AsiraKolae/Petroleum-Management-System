<?php
	$idB=$_GET['idB'];
	include('../phpmysql/dbconnect.php');
	mysqli_query($conn,"delete from `Bprice` where idB='$idB'");
	header('location:BuyPrice.php');
?>