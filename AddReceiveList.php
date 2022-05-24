<?php
	include('../phpmysql/dbconnect.php');

    $Date_receive = $_POST['Date_receive'];
    $imgID = $_POST['imgID'];
	
    $Received_amount = $_POST['Received_amount'];
    $Received_amount0 = $_POST['Received_amount0'];
    $Received_amount1 = $_POST['Received_amount1'];
    
    $Petrol_typeID = $_POST['Petrol_typeID'];
    $Petrol_typeID0 = $_POST['Petrol_typeID0'];
    $Petrol_typeID1 = $_POST['Petrol_typeID1'];

    $Receipt_num = $_POST['Receipt_num'];
    $Receipt_num0 = $_POST['Receipt_num0'];
    $Receipt_num1 = $_POST['Receipt_num1'];

    $Name1 = $_POST['Name1'];
    $Name10 = $_POST['Name10'];
    $Name11 = $_POST['Name11'];

    $CompanyName = $_POST['CompanyName'];
    $CompanyName0 = $_POST['CompanyName0'];
    $CompanyName1 = $_POST['CompanyName1'];


	mysqli_query($conn,"insert into `receive_list` (imgID,Date_receive,Petrol_typeID,Receipt_num,Received_amount,Name1,CompanyName,imagename) values ('$imgID','$Date_receive','$Petrol_typeID','$Receipt_num','$Received_amount','$Name1','$CompanyName','$filename'),
                                                                                                                                                     ('$imgID','$Date_receive','$Petrol_typeID0','$Receipt_num0','$Received_amount0','$Name10','$CompanyName0','$filename0'),
                                                                                                                                                     ('$imgID','$Date_receive','$Petrol_typeID1','$Receipt_num1','$Received_amount1','$Name11','$CompanyName1','$filename1')");
	header('location:FormUploadimage.php');
?>