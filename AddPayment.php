<!-- <php
	include('../phpmysql/dbconnect.php');

	$Date_list95 = $_POST['Date_list95'];
	$Date_list91 = $_POST['Date_list91'];
	$Date_listB7 = $_POST['Date_listB7'];

	$Petrol_typeID95 = $_POST['Petrol_typeID95'];
    $NumStart_list95 = $_POST['NumStart_list95'];
	$NumEnd_list95 = $_POST['NumEnd_list95'];

	$NumStart_listT95 = $_POST['NumStart_listT95'];
	$NumEnd_listT95 = $_POST['NumEnd_listT95'];

	$NumStart_listTR95 = $_POST['NumStart_listTR95'];
	$NumEnd_listTR95 = $_POST['NumEnd_listTR95'];
	
// 
	$Petrol_typeID91 = $_POST['Petrol_typeID91'];
	$NumStart_list91 = $_POST['NumStart_list91'];
	$NumEnd_list91 = $_POST['NumEnd_list91'];

	$NumStart_listT91 = $_POST['NumStart_listT91'];
	$NumEnd_listT91 = $_POST['NumEnd_listT91'];

	$NumStart_listTR91 = $_POST['NumStart_listTR91'];
	$NumEnd_listTR91 = $_POST['NumEnd_listTR91'];

// 
	$Petrol_typeIDB7 = $_POST['Petrol_typeIDB7'];
	$NumStart_listB7 = $_POST['NumStart_listB7'];
	$NumEnd_listB7 = $_POST['NumEnd_listB7'];

	$NumStart_listTB7 = $_POST['NumStart_listTB7'];
	$NumEnd_listTB7 = $_POST['NumEnd_listTB7'];

	$NumStart_listTRB7 = $_POST['NumStart_listTRB7'];
	$NumEnd_listTRB7 = $_POST['NumEnd_listTRB7'];


	if ($NumEnd_list95!=''){

		// echo $Date_list95;
		mysqli_query($conn,"INSERT INTO `payment_list95` (`Petrol_typeID95`,`NumStart_list95`,`NumEnd_list95`,`NumStart_listT95`,`NumEnd_listT95`,`NumStart_listTR95`,`NumEnd_listTR95`,`Date_list95`)
												  values ('$Petrol_typeID95','$NumStart_list95','$NumEnd_list95','$NumStart_listT95','$NumEnd_listT95','$NumStart_listTR95','$NumEnd_listTR95','$Date_list95')");	
		mysqli_query($conn,"INSERT INTO `payment_list91` (`Petrol_typeID91`,`NumStart_list91`,`NumEnd_list91`,`NumStart_listT91`,`NumEnd_listT91`,`NumStart_listTR91`,`NumEnd_listTR91`,`Date_list91`)
											      values ('$Petrol_typeID91','$NumStart_list91','$NumEnd_list91','$NumStart_listT91','$NumEnd_listT91','$NumStart_listTR91','$NumEnd_listTR91','$Date_list95')");	
		mysqli_query($conn,"INSERT INTO `payment_listb7`(`Petrol_typeIDB7`, `NumStart_listB7`, `NumEnd_listB7`, `NumStart_listTB7`, `NumEnd_listTB7`, `NumStart_listTRB7`, `NumEnd_listTRB7`,`Date_listB7`) 
											     VALUES ('$Petrol_typeIDB7','$NumStart_listB7','$NumEnd_listB7','$NumStart_listTB7','$NumEnd_listTB7','$NumStart_listTRB7','$NumEnd_listTRB7','$Date_list95')");		
					
	}

	
	if ($NumEnd_list91!=''){
		mysqli_query($conn,"INSERT INTO `payment_list95` (`Petrol_typeID95`,`NumStart_list95`,`NumEnd_list95`,`NumStart_listT95`,`NumEnd_listT95`,`NumStart_listTR95`,`NumEnd_listTR95`,`Date_list95`)
												  values ('$Petrol_typeID95','$NumStart_list95','$NumEnd_list95','$NumStart_listT95','$NumEnd_listT95','$NumStart_listTR95','$NumEnd_listTR95','$Date_list95')");	
		mysqli_query($conn,"INSERT INTO `payment_list91` (`Petrol_typeID91`,`NumStart_list91`,`NumEnd_list91`,`NumStart_listT91`,`NumEnd_listT91`,`NumStart_listTR91`,`NumEnd_listTR91`,`Date_list91`)
												  values ('$Petrol_typeID91','$NumStart_list91','$NumEnd_list91','$NumStart_listT91','$NumEnd_listT91','$NumStart_listTR91','$NumEnd_listTR91','$Date_list95')");	
		mysqli_query($conn,"INSERT INTO `payment_listb7`(`Petrol_typeIDB7`, `NumStart_listB7`, `NumEnd_listB7`, `NumStart_listTB7`, `NumEnd_listTB7`, `NumStart_listTRB7`, `NumEnd_listTRB7`,`Date_listB7`) 
												 VALUES ('$Petrol_typeIDB7','$NumStart_listB7','$NumEnd_listB7','$NumStart_listTB7','$NumEnd_listTB7','$NumStart_listTRB7','$NumEnd_listTRB7','$Date_list95')");		
}
	
	
	if ($NumEnd_listB7!=''){
		mysqli_query($conn,"INSERT INTO `payment_list95` (`Petrol_typeID95`,`NumStart_list95`,`NumEnd_list95`,`NumStart_listT95`,`NumEnd_listT95`,`NumStart_listTR95`,`NumEnd_listTR95`,`Date_list95`)
											      values ('$Petrol_typeID95','$NumStart_list95','$NumEnd_list95','$NumStart_listT95','$NumEnd_listT95','$NumStart_listTR95','$NumEnd_listTR95','$Date_list95')");	
		mysqli_query($conn,"INSERT INTO `payment_list91` (`Petrol_typeID91`,`NumStart_list91`,`NumEnd_list91`,`NumStart_listT91`,`NumEnd_listT91`,`NumStart_listTR91`,`NumEnd_listTR91`,`Date_list91`)
												  values ('$Petrol_typeID91','$NumStart_list91','$NumEnd_list91','$NumStart_listT91','$NumEnd_listT91','$NumStart_listTR91','$NumEnd_listTR91','$Date_list95')");	
		mysqli_query($conn,"INSERT INTO `payment_listb7`(`Petrol_typeIDB7`, `NumStart_listB7`, `NumEnd_listB7`, `NumStart_listTB7`, `NumEnd_listTB7`, `NumStart_listTRB7`, `NumEnd_listTRB7`,`Date_listB7`) 
												 VALUES ('$Petrol_typeIDB7','$NumStart_listB7','$NumEnd_listB7','$NumStart_listTB7','$NumEnd_listTB7','$NumStart_listTRB7','$NumEnd_listTRB7','$Date_list95')");		
} -->
<title>Petroleum Management System</title>
  
<br><br><br><br><br>
        <div><?php require_once("SearchMenu.php"); ?></div>
		
<?php
	include('../phpmysql/dbconnect.php');

//รับตัวแปร
$Date_list95 = $_POST['Date_list95'];
$Petrol_typeID95 = $_POST['Petrol_typeID95'];
$NumStart_list95 = $_POST['NumStart_list95'];
$NumEnd_list95 = $_POST['NumEnd_list95'];

$NumStart_listT95 = $_POST['NumStart_listT95'];
$NumEnd_listT95 = $_POST['NumEnd_listT95'];

$NumStart_listTR95 = $_POST['NumStart_listTR95'];
$NumEnd_listTR95 = $_POST['NumEnd_listTR95'];

// $Date_list91 = $_POST['Date_list91'];
// $Date_listB7 = $_POST['Date_listB7'];

$Petrol_typeID91 = $_POST['Petrol_typeID91'];
	$NumStart_list91 = $_POST['NumStart_list91'];
	$NumEnd_list91 = $_POST['NumEnd_list91'];

	$NumStart_listT91 = $_POST['NumStart_listT91'];
	$NumEnd_listT91 = $_POST['NumEnd_listT91'];

	$NumStart_listTR91 = $_POST['NumStart_listTR91'];
	$NumEnd_listTR91 = $_POST['NumEnd_listTR91'];

// 
	$Petrol_typeIDB7 = $_POST['Petrol_typeIDB7'];
	$NumStart_listB7 = $_POST['NumStart_listB7'];
	$NumEnd_listB7 = $_POST['NumEnd_listB7'];

	$NumStart_listTB7 = $_POST['NumStart_listTB7'];
	$NumEnd_listTB7 = $_POST['NumEnd_listTB7'];

	$NumStart_listTRB7 = $_POST['NumStart_listTRB7'];
	$NumEnd_listTRB7 = $_POST['NumEnd_listTRB7'];

	mysqli_query($conn,"insert into `payment_list` (`Petrol_typeID`,`NumStart_list`,`NumEnd_list`,`NumStart_listT`,`NumEnd_listT`,`NumStart_listTR`,`NumEnd_listTR`,`Date_list`)
										    values ('$Petrol_typeID95','$NumStart_list95','$NumEnd_list95','$NumStart_listT95','$NumEnd_listT95','$NumStart_listTR95','$NumEnd_listTR95','$Date_list95'),
												   ('$Petrol_typeID91','$NumStart_list91','$NumEnd_list91','$NumStart_listT91','$NumEnd_listT91','$NumStart_listTR91','$NumEnd_listTR91','$Date_list95'),
											       ('$Petrol_typeIDB7','$NumStart_listB7','$NumEnd_listB7','$NumStart_listTB7','$NumEnd_listTB7','$NumStart_listTRB7','$NumEnd_listTRB7','$Date_list95')");
	
	// values ('$Date_Bprice95','$Petrol_typeID95','$B_price95','$S_price95'),
	// 	   ('$Date_Bprice95','$Petrol_typeID91','$B_price91','$S_price91'),
	// 	   ('$Date_Bprice95','$Petrol_typeIDB7','$B_priceB7','$S_priceB7')");	
	

$check = "SELECT *
		  FROM payment_list95
          LEFT JOIN payment_list91 ON payment_list91.Date_list91 = payment_list95.Date_list95 AND payment_list91.Petrol_typeID91 = payment_list95.Petrol_typeID95 
          LEFT JOIN payment_listb7 ON payment_list91.Date_list91 = payment_listb7.Date_listB7 AND payment_list91.Petrol_typeID91 = payment_listb7.Petrol_typeIDB7
          WHERE Date_list95 = '$Date_list95'";

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
	
$sql3 = " INSERT INTO payment_list95
(`Petrol_typeID95`,`NumStart_list95`,`NumEnd_list95`,`NumStart_listT95`,`NumEnd_listT95`,`NumStart_listTR95`,`NumEnd_listTR95`,`Date_list95`)
VALUES
('$Petrol_typeID95','$NumStart_list95','$NumEnd_list95','$NumStart_listT95','$NumEnd_listT95','$NumStart_listTR95','$NumEnd_listTR95','$Date_list95')";
$result = mysqli_query($conn, $sql3) or die ("Error in query: $sql3 " . mysqli_error());

$sql4 = " INSERT INTO payment_list91
(`Petrol_typeID91`,`NumStart_list91`,`NumEnd_list91`,`NumStart_listT91`,`NumEnd_listT91`,`NumStart_listTR91`,`NumEnd_listTR91`,`Date_list91`)
VALUES
('$Petrol_typeID91','$NumStart_list91','$NumEnd_list91','$NumStart_listT91','$NumEnd_listT91','$NumStart_listTR91','$NumEnd_listTR91','$Date_list95')";
$result2 = mysqli_query($conn, $sql4) or die ("Error in query: $sql4 " . mysqli_error());


$sql5 = " INSERT INTO payment_listb7
(`Petrol_typeIDB7`,`NumStart_listB7`,`NumEnd_listB7`,`NumStart_listTB7`,`NumEnd_listTB7`,`NumStart_listTRB7`,`NumEnd_listTRB7`,`Date_listB7`)
VALUES
('$Petrol_typeIDB7','$NumStart_listB7','$NumEnd_listB7','$NumStart_listTB7','$NumEnd_listTB7','$NumStart_listTRB7','$NumEnd_listTRB7','$Date_list95')";
$result3 = mysqli_query($conn, $sql5) or die ("Error in query: $sql5" . mysqli_error());

}
mysqli_close($conn);

if($result3){
echo "<script type='text/javascript'>";
echo "alert('เพิ่มข้อมูลสำเร็จ');";
echo "window.location = 'SearchPayment.php'; ";
echo "</script>";
}else{
echo "<script type='text/javascript'>";
echo "window.location = 'FormPaymentAdd.php'; ";
echo "</script>";
}

	
	// header('location:TestPaymentPage.php');
?>

<br><br><br><br><br>
<div class='p-1 bg-danger'></div>
<div class='p-3 bg-warning text-center text-black'>(กรณีศึกษาปั๊มน้ำมัน KB Petroleum)</div>