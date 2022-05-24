<?php
	include('../phpmysql/dbconnect.php');

	// $Date_Sprice = $_POST['Date_Sprice'];
    $Date_Bprice95 = $_POST['Date_Bprice95'];

	$Petrol_typeID95 = $_POST['Petrol_typeID95'];
    $B_price95 = $_POST['B_price95'];
	$S_price95 = $_POST['S_price95'];


	$Petrol_typeID91 = $_POST['Petrol_typeID91'];
    $B_price91 = $_POST['B_price91'];
	$S_price91 = $_POST['S_price91'];


	$Petrol_typeIDB7 = $_POST['Petrol_typeIDB7'];
    $B_priceB7 = $_POST['B_priceB7'];
	$S_priceB7 = $_POST['S_priceB7'];
	
	// $Petrol_typeID0 = $_POST['Petrol_typeID0'];
    // $B_price0 = $_POST['B_price0'];
	// $S_price0 = $_POST['S_price0'];

	// $Petrol_typeID1 = $_POST['Petrol_typeID1'];
    // $B_price1 = $_POST['B_price1'];
	// $S_price1 = $_POST['S_price1'];

	mysqli_query($conn,"insert into `price` (Date_price,Petrol_typeID,B_price,S_price) 
	values ('$Date_Bprice95','$Petrol_typeID95','$B_price95','$S_price95'),
		   ('$Date_Bprice95','$Petrol_typeID91','$B_price91','$S_price91'),
		   ('$Date_Bprice95','$Petrol_typeIDB7','$B_priceB7','$S_priceB7')");	

// $check = "SELECT *
// FROM Bprice95
// LEFT JOIN Bprice91 ON Bprice91.Date_Bprice91 = Bprice95.Date_Bprice95 AND Bprice91.Petrol_typeID91 = Bprice95.Petrol_typeID95 
// LEFT JOIN Bpriceb7 ON Bpriceb7.Date_Bprice91 = Bpriceb7.Date_BpriceB7 AND Bprice91.Petrol_typeID91 = Bpriceb7.Petrol_typeIDB7
// WHERE Date_Bprice95 = '$Date_Bprice95'";

$check = "SELECT *
FROM sprice95
LEFT JOIN bprice95 ON bprice95.Date_Bprice95 = sprice95.Date_Sprice95 AND bprice95.Petrol_typeID95 = sprice95.Petrol_typeID95 
LEFT JOIN bprice91 ON bprice91.Date_Bprice91= bprice95.Date_Bprice95 
LEFT JOIN sprice91 ON sprice91.Date_Sprice91 = bprice91.Date_Bprice91 AND bprice91.Petrol_typeID91 = sprice91.Petrol_typeID91 
LEFT JOIN bpriceb7 ON bpriceb7.Date_BpriceB7= bprice95.Date_Bprice95 
LEFT JOIN spriceb7 ON spriceb7.Date_SpriceB7 = bpriceb7.Date_BpriceB7 AND bpriceb7.Petrol_typeIDB7 = spriceb7.Petrol_typeIDB7 
WHERE Date_Bprice95 = '$Date_Bprice95'
";

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

$sql3 = " INSERT INTO Bprice95
(`Petrol_typeID95`,`B_price95`,`Date_Bprice95`)
VALUES
('$Petrol_typeID95','$B_price95','$Date_Bprice95')";
$result = mysqli_query($conn, $sql3) or die ("Error in query: $sql3" . mysqli_error());

$sql6 = " INSERT INTO Sprice95
(`Petrol_typeID95`,`S_price95`,`Date_Sprice95`)
VALUES
('$Petrol_typeID95','$S_price95','$Date_Bprice95')";
$result4 = mysqli_query($conn, $sql6) or die ("Error in query: $sql6" . mysqli_error());

$sql4 = " INSERT INTO Bprice91
(`Petrol_typeID91`,`B_price91`,`Date_Bprice91`)
VALUES
('$Petrol_typeID91','$B_price91','$Date_Bprice95')";
$result2 = mysqli_query($conn, $sql4) or die ("Error in query: $sql4" . mysqli_error());

$sql7 = " INSERT INTO Sprice91
(`Petrol_typeID91`,`S_price91`,`Date_Sprice91`)
VALUES
('$Petrol_typeID91','$S_price91','$Date_Bprice95')";
$result5 = mysqli_query($conn, $sql7) or die ("Error in query: $sql7" . mysqli_error());


$sql5 = " INSERT INTO Bpriceb7
(`Petrol_typeIDB7`,`B_priceB7`,`Date_BpriceB7`)
VALUES
('$Petrol_typeIDB7','$B_priceB7','$Date_Bprice95')";
$result3 = mysqli_query($conn, $sql5) or die ("Error in query: $sql5" . mysqli_error());

$sql8 = " INSERT INTO Spriceb7
(`Petrol_typeIDB7`,`S_priceB7`,`Date_SpriceB7`)
VALUES
('$Petrol_typeIDB7','$S_priceB7','$Date_Bprice95')";
$result6 = mysqli_query($conn, $sql8) or die ("Error in query: $sql8" . mysqli_error());


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

if($result6){
echo "<script type='text/javascript'>";
echo "alert('เพิ่มข้อมูลสำเร็จ');";
echo "window.location = 'BuyPrice.php'; ";
echo "</script>";
}else{
echo "<script type='text/javascript'>";
echo "window.location = 'FormBuyPrice.php'; ";
echo "</script>";
}

																				
	// header('location:BuyPrice.php');

?>         