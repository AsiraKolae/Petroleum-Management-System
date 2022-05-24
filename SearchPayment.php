<title>Petroleum Management System</title>
  <br><br><br>
        <div><?php require_once("SearchMenu.php"); ?></div>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$strKeyword = null;

	if(isset($_POST["txtKeyword"]))
	{
		$strKeyword = $_POST["txtKeyword"];
	}
?>


<form name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>" style="position: relative; left: 140px;">
      <th>ค้นหาวันที่ :
      <input name="txtKeyword" type="Date" id="txtKeyword" value="<?php echo date('Y-m-d');?>" value="<?php echo $strKeyword;?>">
      <input type="submit" value="Search"></th>
</form>
            <div class="container">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <!-- <a href="EditPayment.php?Date_list=<php echo $data['Date_list'];?>">แก้ไข</a> -->
                <a href="FormPaymentAdd.php" class="btn btn-success" role="button">เพิ่มข้อมูล</a>
            </div>

<?php
   include('../phpmysql/dbconnect.php');
   $conn = new mysqli($servername, $username, $password, $database);
//    $sql = "SELECT * 
//            ,ROUND(NumEnd_list-NumStart_list,2) AS total
//            ,ROUND(NumEnd_listT-NumStart_listT,2) AS total1
//            ,ROUND(NumEnd_listTR-NumStart_listTR,2) AS total2
//            ,ROUND((NumEnd_list-NumStart_list)+(NumEnd_listT-NumStart_listT)+(NumEnd_listTR-NumStart_listTR),2) AS totalAll
//            ,ROUND(NumStart_list,2) AS NumStart_list 
//            ,ROUND(NumEnd_list,2) AS NumEnd_list 
//            ,ROUND(NumStart_listT,2) AS NumStart_listT 
//            ,ROUND(NumEnd_listT,2) AS NumEnd_listT 
//            ,ROUND(NumStart_listTR,2) AS NumStart_listTR 
//            ,ROUND(NumEnd_listTR,2) AS NumEnd_listTR 
//            FROM payment_list 
//            WHERE Date_list 
//            LIKE '%".$strKeyword."%' 
//            ORDER BY Date_list DESC LIMIT 9";


           $sql = "SELECT *
        --    ,ROUND(NumEnd_list95-NumStart_list95,2) AS total
        --    ,ROUND(NumEnd_listT95-NumStart_listT95,2) AS total1
        --    ,ROUND(NumEnd_listTR95-NumStart_listTR95,2) AS total2
           ,ROUND((NumEnd_list95-NumStart_list95)+(NumEnd_listT95-NumStart_listT95)+(NumEnd_listTR95-NumStart_listTR95),2) AS totalAll95
           ,ROUND(NumStart_list95,2) AS NumStart_list95 
           ,ROUND(NumEnd_list95,2) AS NumEnd_list95 
           ,ROUND(NumStart_listT95,2) AS NumStart_listT95 
           ,ROUND(NumEnd_listT95,2) AS NumEnd_listT95 
           ,ROUND(NumStart_listTR95,2) AS NumStart_listTR95 
           ,ROUND(NumEnd_listTR95,2) AS NumEnd_listTR95 

           ,ROUND((NumEnd_list91-NumStart_list91)+(NumEnd_listT91-NumStart_listT91)+(NumEnd_listTR91-NumStart_listTR91),2) AS totalAll91
           ,ROUND(NumStart_list91,2) AS NumStart_list91 
           ,ROUND(NumEnd_list91,2) AS NumEnd_list91 
           ,ROUND(NumStart_listT91,2) AS NumStart_listT91
           ,ROUND(NumEnd_listT91,2) AS NumEnd_listT91
           ,ROUND(NumStart_listTR91,2) AS NumStart_listTR91 
           ,ROUND(NumEnd_listTR91,2) AS NumEnd_listTR91 

           ,ROUND((NumEnd_listB7-NumStart_listB7)+(NumEnd_listTB7-NumStart_listTB7)+(NumEnd_listTRB7-NumStart_listTRB7),2) AS totalAllB7
           ,ROUND(NumStart_listB7,2) AS NumStart_listB7
           ,ROUND(NumEnd_listB7,2) AS NumEnd_listB7 
           ,ROUND(NumStart_listTB7,2) AS NumStart_listTB7
           ,ROUND(NumEnd_listTB7,2) AS NumEnd_listTB7
           ,ROUND(NumStart_listTRB7,2) AS NumStart_listTRB7 
           ,ROUND(NumEnd_listTRB7,2) AS NumEnd_listTRB7 

          FROM payment_list95 
          LEFT JOIN payment_list91 ON payment_list95.Date_list95=payment_list91.Date_list91 
          LEFT JOIN payment_listb7 ON payment_listb7.Date_listB7=payment_list91.Date_list91 
          WHERE Date_list95

           LIKE '%".$strKeyword."%'
           ORDER BY Date_list95 DESC LIMIT 3
          ";


   $query = mysqli_query($conn,$sql);
?>

<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>ปริมาณน้ำมันที่ขายไป</h2></div>
                </div>
            </div>
            <table class="table table-striped table-hover" style="margin-left:0%;">
                <!-- <thead> -->
                  <tr>
                  <td style="text-align:center;">ลำดับ</td>
                  <td style="text-align:center;">วันที่</td>
                  <td style="text-align:center;">ชื่อประเภทน้ำมัน</td>
                  <td style="text-align:center;">ตัวเลขเริ่มต้น (ตู้หนึ่ง)</td>
                  <td style="text-align:center;">ตัวเลขสิ้นสุด (ตู้หนึ่ง)</td>
                  <td style="text-align:center;">ตัวเลขเริ่มต้น (ตู้สอง)</td>
                  <td style="text-align:center;">ตัวเลขสิ้นสุด (ตู้สอง)</td>
                  <td style="text-align:center;">ตัวเลขเริ่มต้น (ตู้สาม)</td>
                  <td style="text-align:center;">ตัวเลขสิ้นสุด (ตู้สาม)</td>
                  <td style="text-align:center;">จำนวนจ่าย(ปริมาณ/ลิตร)</td>
                  <td colspan="2">
                  </td>
                  </tr>
                  <?php

                  $n=0;
while($data=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>
                <tr>
                  <td>
                    <div style="text-align:center;">
                        <?php echo ++$n;?>
                    </div>
                  </td>
              
                      <td style="text-align:center;"><?php echo $data["Date_list95"];?></td>
                      <td style="text-align:center; background-color:rgba(255,99,132,1)" value="แก๊สโซฮอล์ 95"><?php echo $data["Petrol_typeID95"];?></td>
                  <td style="text-align:right; background-color:#bebebe">
                    <div style="text-align:right;">
                        <?php echo $data["NumStart_list95"];?>
                    </div>
                  </td>
              
                  <td style="text-align:right; background-color:#d3d3d3"><?php echo $data["NumEnd_list95"];?></td>
                  
                  <td style="text-align:right; background-color:#bebebe">
                    <div style="text-align:right;">
                        <?php echo $data["NumStart_listT95"];?>
                    </div>
                  </td>

                  <td style="text-align:right; background-color:#d3d3d3"><?php echo $data["NumEnd_listT95"];?></td>
                  <td style="text-align:right; background-color:#bebebe">
                    <div style="text-align:right;">
                        <?php echo $data["NumStart_listTR95"];?>
                    </div>
                  </td>

                  <td style="text-align:right; background-color:#d3d3d3"><?php echo $data["NumEnd_listTR95"];?></td>
                  
                  <td style="text-align:right;"><?php echo $data["totalAll95"];?></td>
                  <td style="text-align:center;"><a class="btn btn-primary" href="EditPayment95.php?Date_list95=<?php echo $data['Date_list95'];?>">แก้ไข</a></td>
                  <!-- <td style="text-align:center;"><a class="btn btn-danger" href="TestDeletePayment95.php?Date_list95=<php echo $data['Date_list95']; ?>">ลบ</a></td> -->
                </tr>  

                <tr>
                  <td>
                    <div style="text-align:center;">
                        <?php echo ++$n;?>
                    </div>
                  </td>
                      <td style="text-align:center;"><?php echo $data["Date_list91"];?></td>
                      <td style="text-align:center; background-color:rgba(75, 192, 192, 1)"><?php echo $data["Petrol_typeID91"];?></td>
                  <td style="text-align:right; background-color:#bebebe">
                    <div style="text-align:right;">
                        <?php echo $data["NumStart_list91"];?>
                    </div>
                  </td>

                  <td style="text-align:right; background-color:#d3d3d3"><?php echo $data["NumEnd_list91"];?></td>
                  
                  <td style="text-align:right; background-color:#bebebe">
                    <div style="text-align:right;">
                        <?php echo $data["NumStart_listT91"];?>
                    </div>
                  </td>

                  <td style="text-align:right; background-color:#d3d3d3"><?php echo $data["NumEnd_listT91"];?></td>
                  <td style="text-align:right; background-color:#bebebe">
                    <div style="text-align:right;">
                        <?php echo $data["NumStart_listTR91"];?>
                    </div>
                  </td>

                  <td style="text-align:right; background-color:#d3d3d3"><?php echo $data["NumEnd_listTR91"];?></td>
                  
                  <td style="text-align:right;"><?php echo $data["totalAll91"];?></td>
                  <td style="text-align:center;"><a class="btn btn-primary" href="EditPayment91.php?Date_list91=<?php echo $data['Date_list91'];?>">แก้ไข</a></td>
                  <!-- <td style="text-align:center;"><a class="btn btn-danger" href="TestDeletePayment95.php?Date_list95=<php echo $data['Date_list95'];?>">ลบ</a></td> -->
                  <!-- <td style="text-align:center;"><a class="btn btn-danger" href="TestDeletePayment91.php?Date_list91=<php echo $data['Date_list91']; ?>">ลบ</a></td> -->
                </tr>  

                <tr>
                  <td>
                    <div style="text-align:center;">
                        <?php echo ++$n;?>
                    </div>
                  </td>
                      <td style="text-align:center;"><?php echo $data["Date_listB7"];?></td>
                      <td style="text-align:center; background-color:rgba(255, 206, 86, 1)"><?php echo $data["Petrol_typeIDB7"];?></td>
                  <td style="text-align:right; background-color:#bebebe">
                    <div style="text-align:right;">
                        <?php echo $data["NumStart_listB7"];?>
                    </div>
                  </td>

                  <td style="text-align:right; background-color:#d3d3d3"><?php echo $data["NumEnd_listB7"];?></td>
                  
                  <td style="text-align:right; background-color:#bebebe">
                    <div style="text-align:right;">
                        <?php echo $data["NumStart_listTB7"];?>
                    </div>
                  </td>

                  <td style="text-align:right; background-color:#d3d3d3"><?php echo $data["NumEnd_listTB7"];?></td>
                  <td style="text-align:right; background-color:#bebebe">
                    <div style="text-align:right;">
                        <?php echo $data["NumStart_listTRB7"];?>
                    </div>
                  </td>

                  <td style="text-align:right; background-color:#d3d3d3"><?php echo $data["NumEnd_listTRB7"];?></td>
                  
                  <td style="text-align:right;"><?php echo $data["totalAllB7"];?></td>
                  <td style="text-align:center;"><a class="btn btn-primary" href="EditPaymentB7.php?Date_listB7=<?php echo $data['Date_listB7'];?>">แก้ไข</a></td>
                  <!-- <td style="text-align:center;"><a class="btn btn-danger" href="TestDeletePaymentB7.php?Date_listB7=<php echo $data['Date_listB7']; ?>">ลบ</a></td> -->
                </tr>  
<?php
}
?>
</table>
</div>   
          </div>    
        </div>
<?php

mysqli_close($conn);
?> 

<div style="position: relative; left: 235px;">
*หมายเหตุ : 1. แสดงเฉพาะวันที่ปัจจุบัน-ย้อนหลัง 2 วันเท่านั้น สามารถทำการค้นหาวันที่ที่ต้องการได้
</div>
<div style="position: relative; left: 315px;">
2. ตัวเลขเริ่มต้น กับ ตัวเลขสิ้นสุด มาจากตู้จ่ายน้ำมัน ซึ่งจะทำการตัดเลขก่อนเปิดปั๊มกับหลังปิดปั๊ม ในทุก ๆ วัน
</div>
<div style="position: relative; left: 315px;">
3. เมื่อทำการปิดปั๊ม ผู้บริหารจะทำการเพิ่มข้อมูลเพื่อบันทึกตัวเลขสิ้นสุดวัน เพื่อคำนวณให้ได้จำนวนที่จ่ายไป ณ วันที่นั้น ๆ
</div>

    <!-- <div class="p-1 bg-danger"></div>
    <div class="p-3 bg-warning text-center text-black">(กรณีศึกษาปั๊มน้ำมัน KB Petroleum)</div> -->
</body>
</html> 

<!-- <meta charset="utf-8">
<php
include('../phpmysql/dbconnect.php');
	$Date_list = $_POST["Date_list"];

	$check = "SELECT  Date_list 
	          FROM payment_list  
	          WHERE Date_list = '$Date_list'";
    $result1 = mysqli_query($conn, $check) or die(mysqli_error());
    $num=mysqli_num_rows($result1);

    if($num > 3)
    {
    echo "<script>";
    echo "alert(' ข้อมูลซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
    echo "window.history.back();";
    echo "</script>";
    }else{
	
	$sql1 = "INSERT INTO payment_list
	(Date_list)
	VALUES
	('$Date_list')";
	$result = mysqli_query($conn, $sql1) or die ("Error in query: $sql1 " . mysqli_error());

}
	mysqli_close($conn);
	if($result){
	// echo "<script type='text/javascript'>";
	// echo "alert('เพิ่มข้อมูลสำเร็จ');";
	// echo "window.location = 'PaymentPage.php'; ";
	// echo "</script>";
	}else{
	// echo "<script type='text/javascript'>";
	// echo "window.location = 'FormPaymentAdd.php'; ";
	// echo "</script>";
}
?> -->
