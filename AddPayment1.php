<?php
	include('../phpmysql/dbconnect.php');

    $Date_list = $_POST['Date_list'];
	$Petrol_typeID = $_POST['Petrol_typeID'];
	$Petrol_typeID0 = $_POST['Petrol_typeID0'];
	$Petrol_typeID1 = $_POST['Petrol_typeID1'];

    $NumStart_list = $_POST['NumStart_list'];
	$NumStart_list0 = $_POST['NumStart_list0'];
	$NumStart_list1 = $_POST['NumStart_list1'];
	
    $NumEnd_list = $_POST['NumEnd_list'];
	$NumEnd_list0 = $_POST['NumEnd_list0'];
	$NumEnd_list1 = $_POST['NumEnd_list1'];

	// $sql ="SELECT NumEnd_list FROM payment_list WHERE Date_price=CURDATE() - INTERVAL 1";

	mysqli_query($conn,"insert into `payment_list` (Date_list,Petrol_typeID,NumStart_list,NumEnd_list) values ('$Date_list','$Petrol_typeID','$NumStart_list','$NumEnd_list'),
	('$Date_list','$Petrol_typeID0','$NumStart_list0','$NumEnd_list0'),
	('$Date_list','$Petrol_typeID1','$NumStart_list1','$NumEnd_list1')");	
	header('location:PaymentPage.php');
?>

