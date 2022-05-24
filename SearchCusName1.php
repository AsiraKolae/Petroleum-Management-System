<!DOCTYPE html>
<html>
<head>
<title>Petroleum Management System</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<html>
<head>
<style>
body {
    background-color: #EEF2F7;
    font-family: 'Roboto', sans-serif;
}
.table-responsive {
    margin: 3px 0;
}
.table-wrapper {
    width: 1050px;
    background: #fff;
	  margin: 0 auto;
    padding: 20px 30px 5px;
    box-shadow: 0 0 1px 0 rgba(0,0,0,.25);
}
.table-title .btn-group {
    float: right;
}
.table-title .btn {
    min-width: 50px;
    border-radius: 2px;
    border: none;
    padding: 6px 12px;
    font-size: 100%;
    outline: none !important;
    height: 20px;
}
.table-title {
    min-width: 100%;
    border-bottom: 1px solid #e9e9e9;
    padding-bottom: 15px;
    margin-bottom: 5px;
    background: rgb(0, 50, 74);
    margin: -20px -31px 10px;
    padding: 15px 30px;
    color: #fff;
}
.table-title h2 {
    margin: 2px 0 0;
    font-size: 24px;
}
table.table {
    min-width: 100%;
}
</style>
</head>
<body>
<!-- <php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$strKeyword = null;

	if(isset($_POST["txtKeyword"]))
	{
		$strKeyword = $_POST["txtKeyword"];
	}
?>
<form style="position: relative; left: 235px; top:15;" name="frmSearch" method="post" action="<php echo $_SERVER['SCRIPT_NAME'];?>" style="position: relative; left: 140px;">
      <th>เลือกค้นหาตามชื่อ :
      <select name="txtKeyword" type="text" id="txtKeyword" value="<php echo $strKeyword;?>">
            <option>บริษัทยาง</option>
            <option>บริษัทไม้</option>
            <option>บุคคลทั่วไป</option>
      </select>&nbsp;
      <input type="submit" value="Search"></th>
</form> -->



<?php
   include('../phpmysql/dbconnect.php');
   $conn = new mysqli($servername, $username, $password, $database);
   $sql = "SELECT * FROM customer_name WHERE Company_name";
//$records = "SELECT id,Date_price,Petrol_typeID,Buy_price,Sale_price, ROUND(Sale_price-Buy_price,2) AS Profit FROM price";

   $query = mysqli_query($conn,$sql);
?>

<!-- <table style="width:80%">-->
<br> 
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-7"><h2>รายชื่อผู้ค้างชำระ</h2></div>
                </div>
            </div>
            <table class="table table-striped table-hover" style="margin-left:0%;">
<tr>
    <td>ลำดับ</td>
    <td>วันที่รับ</td>
    <td>ชื่อบริษัท/สังกัด</td>
    <td>ชื่อประเภทน้ำมัน</td>
    <td>ชื่อผู้รับ</td>
    <td>จำนวน(บาท)</td>
    <td colspan="2">
    <center>
      <div class="container">
            <a href="FormCusNameAdd.php" class="btn btn-success" role="button">เพิ่มข้อมูล</a>
      </div>
    </center>
    </td>
  </tr>
<?php

$sum = 0;
$n = 0;
while($data=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
    $sum = $sum + $data["Amount"];
?>
  <tr>
    <td>
        <div>
            <?php echo ++$n;?>
        </div>
    </td>
    <td><?php echo $data["Date_cus"];?></td>
    <td><?php echo $data["Company_name"];?></td>
    <td><?php echo $data["Petrol_typeID"];?></td>
    <td>
        <div>
            <?php echo $data["Cus_name"];?>
        </div>
    </td>
    <td><?php echo $data["Amount"];?></td>
    <!-- <td><a class="btn btn-primary" href="EditCus.php?CusNameID=<php echo $data['CusNameID'];?>">แก้ไข</a></td> -->
    <td><a class="btn btn-danger" href="DeleteCus.php?CusNameID=<?php echo $data['CusNameID']; ?>">ชำระ</a></td>
    
  </tr>
<?php
}
?>
<td></td>
<td>
        <?php 
             echo "<td colspan='2'></td>";
             echo "<td>รวมทั้งหมด</td>";
             echo "<td>".$sum."</td>";
             echo "<td colspan='2'></td>";
        ?>
</td>
</table>
        </div> 
            </div>   
          </div>
<?php
mysqli_close($conn);
?>

</body>
</html>


