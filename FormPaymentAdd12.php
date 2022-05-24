<meta charset="utf-8" />
<?php 
include('../phpmysql/dbconnect.php');

	$Cus_name = $_POST["Cus_name"];

	$check = " SELECT Cus_name 
	           FROM customer_name  
	           WHERE Cus_name = '$Cus_name'";

    $result1 = mysqli_query($conn, $check) or die(mysqli_error());
    $num=mysqli_num_rows($result1);

    if($num > 0)
    {
    echo "<script>";
    echo "alert(' ข้อมูลซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
    echo "window.history.back();";
    echo "</script>";
    }else{
	
	$sql = "INSERT INTO customer_name
	(Cus_name)
	VALUES
	('$Cus_name')";
	$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());

}
	mysqli_close($conn);
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('เพิ่มข้อมูลสำเร็จ');";
	echo "window.location = 'FormCusNameAdd.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'FormCusNameAdd.php'; ";
	echo "</script>";
}
?>