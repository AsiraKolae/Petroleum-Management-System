<?php
	$idS=$_GET['idS'];
	include('../phpmysql/dbconnect.php');
	mysqli_query($conn,"delete from `Sprice` where idS ='$idS'");
	header('location:SalePrice.php');
?>