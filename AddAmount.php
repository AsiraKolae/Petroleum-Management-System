<?php
	include('../phpmysql/dbconnect.php');


	// $Date_list95 = $_POST['Date_list95'];
	$Date_Amount95 = $_POST['Date_Amount95'];
	$Amount95 = $_POST['Amount95'];
	$Petrol_typeID95 = $_POST['Petrol_typeID95'];
    $l95 = $_POST['l95'];
	

	// $Date_Amount91 = $_POST['Date_Amount91'];
	$Amount91 = $_POST['Amount91'];
	$Petrol_typeID91 = $_POST['Petrol_typeID91'];
    $l91 = $_POST['l91'];


	// $Date_AmountB7 = $_POST['Date_AmountB7'];
	$AmountB7 = $_POST['AmountB7'];
	$Petrol_typeIDB7 = $_POST['Petrol_typeIDB7'];
    $lB7 = $_POST['lB7'];
		// echo $B_price;

		mysqli_query($conn,"insert into `amount_table` (Amount,Date_Amount,Petrol_typeID) 
												values ('$l95','$Date_Amount95','$Petrol_typeID95'),
													   ('$l91','$Date_Amount95','$Petrol_typeID91'),
												       ('$lB7','$Date_Amount95','$Petrol_typeIDB7')
													   ");

	
$check = "SELECT *
FROM amount_table95
LEFT JOIN amount_table91 ON amount_table91.Date_Amount91 = amount_table95.Date_Amount95 AND amount_table91.Petrol_typeID91 = amount_table95.Petrol_typeID95 
LEFT JOIN amount_tableb7 ON amount_table91.Date_Amount91 = amount_tableb7.Date_AmountB7 AND amount_table91.Petrol_typeID91 = amount_tableb7.Petrol_typeIDB7
WHERE Date_Amount95 = '$Date_Amount95'";

$result1 = mysqli_query($conn, $check) or die(mysqli_error());
$num=mysqli_num_rows($result1);

if($num > 0)
{
echo "<script>";
echo "alert(' ข้อมูลซ้ำ กรุณาตรวจสอบใหม่อีกครั้ง !');";
echo "window.history.back();";
echo "</script>";
}else{



// $sql3 = "INSERT INTO payment_list95
// 		 SELECT *
// 		 FROM payment_list91
// 		 INNER JOIN payment_listb7 ON payment_listb7.Date_listB7 = payment_list91.Date_list91";
//เพิ่มข้อมูล

// $sql3 = "INSERT INTO `payment_list95` (`Petrol_typeID95`,`NumStart_list95`,`NumEnd_list95`,`NumStart_listT95`,`NumEnd_listT95`,`NumStart_listTR95`,`NumEnd_listTR95`,`Date_list95`)
// 												  values ('$Petrol_typeID95','$NumStart_list95','$NumEnd_list95','$NumStart_listT95','$NumEnd_listT95','$NumStart_listTR95','$NumEnd_listTR95','$Date_list95'),	
// 		 			 `payment_list91` (`Petrol_typeID91`,`NumStart_list91`,`NumEnd_list91`,`NumStart_listT91`,`NumEnd_listT91`,`NumStart_listTR91`,`NumEnd_listTR91`,`Date_list91`)
// 											      values ('$Petrol_typeID91','$NumStart_list91','$NumEnd_list91','$NumStart_listT91','$NumEnd_listT91','$NumStart_listTR91','$NumEnd_listTR91','$Date_list95'),	
// 		 			 `payment_listb7`(`Petrol_typeIDB7`, `NumStart_listB7`, `NumEnd_listB7`, `NumStart_listTB7`, `NumEnd_listTB7`, `NumStart_listTRB7`, `NumEnd_listTRB7`,`Date_listB7`) 
// 											     VALUES ('$Petrol_typeIDB7','$NumStart_listB7','$NumEnd_listB7','$NumStart_listTB7','$NumEnd_listTB7','$NumStart_listTRB7','$NumEnd_listTRB7','$Date_list95')";		

$sql3 = " INSERT INTO amount_table95
(`Petrol_typeID95`,`Amount95`,`Date_Amount95`,`l95`)
VALUES
('$Petrol_typeID95','$Amount95','$Date_Amount95','$l95')";
$result = mysqli_query($conn, $sql3) or die ("Error in query: $sql3" . mysqli_error());

$sql4 = " INSERT INTO amount_table91
(`Petrol_typeID91`,`Amount91`,`Date_Amount91`,`l91`)
VALUES
('$Petrol_typeID91','$Amount91','$Date_Amount95','$l91')";
$result2 = mysqli_query($conn, $sql4) or die ("Error in query: $sql4" . mysqli_error());

$sql5 = " INSERT INTO amount_tableb7
(`Petrol_typeIDB7`,`AmountB7`,`Date_AmountB7`,`lB7`)
VALUES
('$Petrol_typeIDB7','$AmountB7','$Date_Amount95','$lB7')";
$result3 = mysqli_query($conn, $sql5) or die ("Error in query: $sql5" . mysqli_error());


// $sql4 = " INSERT INTO payment_list91
// (`Petrol_typeID91`,`NumStart_list91`,`NumEnd_list91`,`NumStart_listT91`,`NumEnd_listT91`,`NumStart_listTR91`,`NumEnd_listTR91`,`Date_list91`)
// VALUES
// ('$Petrol_typeID91','$NumStart_list91','$NumEnd_list91','$NumStart_listT91','$NumEnd_listT91','$NumStart_listTR91','$NumEnd_listTR91','$Date_list95')";
// $result2 = mysqli_query($conn, $sql4) or die ("Error in query: $sql4 " . mysqli_error());


// $sql5 = " INSERT INTO payment_listb7
// (`Petrol_typeIDB7`,`NumStart_listB7`,`NumEnd_listB7`,`NumStart_listTB7`,`NumEnd_listTB7`,`NumStart_listTRB7`,`NumEnd_listTRB7`,`Date_listB7`)
// VALUES
// ('$Petrol_typeIDB7','$NumStart_listB7','$NumEnd_listB7','$NumStart_listTB7','$NumEnd_listTB7','$NumStart_listTRB7','$NumEnd_listTRB7','$Date_list95')";
// $result3 = mysqli_query($conn, $sql5) or die ("Error in query: $sql5" . mysqli_error());

}
mysqli_close($conn);

if($result3){
echo "<script type='text/javascript'>";
echo "alert('เพิ่มข้อมูลสำเร็จ');";
echo "window.location = 'Amount.php'; ";
echo "</script>";
}else{
echo "<script type='text/javascript'>";
echo "window.location = 'FormAmount.php'; ";
echo "</script>";
}


// // header('location:TestPaymentPage.php');
												
	
	// header('location:Amount.php');
 ?>