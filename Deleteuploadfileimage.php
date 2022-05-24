<?php
	$imgID=$_GET['imgID'];
	include('../phpmysql/dbconnect.php');
	mysqli_query($conn,"delete from `receive_list` where imgID='$imgID'");
	header('location:uploadfileimage.php');
?>