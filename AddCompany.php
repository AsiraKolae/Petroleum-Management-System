<?php
	include('../phpmysql/dbconnect.php');

	// $Company_name = $_POST['Company_name'];

	// mysqli_query($conn,"insert into `company` (Company_name) values ('$Company_name')");

	$check = "SELECT * FROM `company` WHERE `Company_name`='".$_POST['Company_name']."'";
	$query_check = mysqli_query($conn,$check);
	$num_check = mysqli_num_rows($query_check);
	if($num_check>0){
		echo "ไม่สามารถเพิ่มได้เนื่องจากซ้ำ กรุณากรอกใหม่";
	}else{
		$inert="INSERT INTO `company` (`ComID`,`Company_name`)";
		$inert.="VALUES (NULL,'".$_POST['Company_name']."')";
		$query_insert=mysqli_query($conn,$inert);
		if($query_insert){
			echo "นำเข้าข้อมูลเรียบร้อย";
		}else{
			echo "กรุณาลองใหม่อีกครั้ง";
		}

	}
	// header('location:Company.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>Petroleum Management System</title>
<meta charset="utf-8">
	<form>
		<input type="text" class="form-control" name="Company_name" id="Company_name" placeholder="ตัวเลขสิ้นสุดวันตู้สาม" required>
					<br>
				   <button type="submit" class="subscribe btn btn-primary btn-block rounded-pill shadow-sm"><i class="fa fa-save"></i> ตกลง</button>
	</form>				   		

</head>
<html>


