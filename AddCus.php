<?php
	include('../phpmysql/dbconnect.php');

    $Date_cus = $_POST['Date_cus'];
	$Cus_name = $_POST['Cus_name'];
    $Petrol_typeID = $_POST['Petrol_typeID'];
    $Amount = $_POST['Amount'];
	
	$Company_name = $_POST['Company_name'];

	mysqli_query($conn,"insert into `customer_name` (Date_cus,Cus_name,Petrol_typeID,Amount,Company_name) values ('$Date_cus','$Cus_name','$Petrol_typeID','$Amount','$Company_name')");
	header('location:CusName.php');
?>