<?php
include('../phpmysql/dbconnect.php');

    if(isset($_POST['add'])) {
    $filename = $_FILES['uploadFile']['name'];
    $filetmpname = $_FILES['uploadFile']['tmp_name'];
    $Date_receive = $_POST['Date_receive'];
    $imgID = $_POST['imgID']; 
    $Petrol_typeID = $_POST['Petrol_typeID'];
    $Receipt_num = $_POST['Receipt_num'];
    // $Received_amount = $_POST['Received_amount'];
    $Name1 = $_POST['Name1'];
    $CompanyName = $_POST['CompanyName'];
    $folder = 'imagesuploadedf/';

    $filename0 = $_FILES['uploadFile']['name'];
    $filename1 = $_FILES['uploadFile']['name'];

    // $Received_amount = $_POST['Received_amount'];
    // $Received_amount0 = $_POST['Received_amount0'];
    // $Received_amount1 = $_POST['Received_amount1'];
    
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

    move_uploaded_file($filetmpname,$folder.$filename);

    
    $sql = "INSERT INTO `receive_list` (`imgID`,`Date_receive`,`Petrol_typeID`,`Receipt_num`,`Name1`,`CompanyName`,`imagename`) VALUES ('$imgID','$Date_receive','$Petrol_typeID','$Receipt_num','$Name1','$CompanyName','$filename'),
                                                                                                                                                         ('$imgID','$Date_receive','$Petrol_typeID0','$Receipt_num0','$Name10','$CompanyName0','$filename0'),
                                                                                                                                                         ('$imgID','$Date_receive','$Petrol_typeID1','$Receipt_num1','$Name11','$CompanyName1','$filename1')";
    $qry = mysqli_query($conn, $sql);

   
}
?>

<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$strKeyword = null;

	if(isset($_POST["txtKeyword"]))
	{
		$strKeyword = $_POST["txtKeyword"];
	}
?>
<br><br><br><bt><br><br><bt>
<form name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>" style="position: relative; left: 140px;">
      <th>วันที่ :
      <input name="txtKeyword" type="Date" id="txtKeyword" value="<?php echo date('Y-m-d');?>" value="<?php echo $strKeyword;?>">
      <input type="submit" value="Search"></th>
</form>

<!DOCTYPE html>
<html>
<head>
<title>Petroleum Management System</title>
<meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <style>
   

    body {
        background: #f5f5f5;
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

<br>
        <div><?php require_once("SearchMenu.php"); ?></div>
        
        <div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-7"><h2>หลักฐานการรับซื้อน้ำมัน</h2></div>
                </div>
            </div>
            
            <table class="table table-striped table-hover" style="margin-left:0%;">
  <tr>
    <td style="text-align:center;">ลำดับ</td>
    <td style="text-align:center;">วันที่</td>
    <td style="text-align:center;">ชื่อประเภทน้ำมัน</td>
    <td style="text-align:center;">เลขที่ใบเสร็จ</td>
    <td style="text-align:center;">ชื่อ-สกุล(ผู้ส่ง)</td>
    <td style="text-align:center;">บริษัท/สังกัด</td>
    <td style="text-align:center;">หลักฐานการรับ</td>
    <td colspan="2">
    <center>
      <div class="container">
            <a href="FormUploadimageAdd.php" class="btn btn-success" role="button">เพิ่มข้อมูล</a>
      </div>
    </center>
    </td>
  </tr>


<?php

    //include('../phpmysql/dbconnect.php'); // Using database connection file here

    $records = mysqli_query($conn," SELECT *
                                    FROM receive_list 
                                    WHERE imagename AND Name1 
                                    LIKE '%".$strKeyword."%'
                                    IS NOT NULL
                                   ");

    
    //SELECT Receive_listID,Date_receive,Petrol_typeID,Receipt_num,Received_amount, ROUND(Sale_price-Buy_price,2) AS Profit FROM price"
    $n = 0;
    while($data = mysqli_fetch_array($records,MYSQLI_ASSOC))
{

//    echo '<img src=".$data['imagename']">';
    //echo "<img src = "imagesuploadedf/'.$data['imagename'].'">"; 


?>
  <tr>
      
    <td style="text-align:center;"><?php echo ++$n;?></td> 
    <td style="text-align:center;"><?php echo $data['Date_receive'];?></td>
    <td style="text-align:center;"><?php echo $data['Petrol_typeID']; ?></td>
    <td style="text-align:center;"><?php echo $data['Receipt_num'];?></td>    
    <!-- <td><php echo $data['Received_amount'];?></td>  -->
    <td style="text-align:center;"><?php echo $data['Name1'];?></td> 
    <td style="text-align:center;"><?php echo $data['CompanyName'];?></td> 
    <td style="text-align:center;"><img width="100" height="150" class="w3-round-xlarge" src="<?php echo 'imagesuploadedf/'; echo $data['imagename'];?>"/></td>
    <td style="text-align:center;"><a class="btn btn-primary" href="Edituploadfileimage.php?imgID=<?php echo $data['imgID'];?>">แก้ไข</a></td>
    <td style="text-align:center;"><a class="btn btn-danger" href="Deleteuploadfileimage.php?imgID=<?php echo $data['imgID']; ?>">ลบ</a></td>
                    
                </div> 
            </div>   
          </div>
          </div>
          </tr>	
<?php
}
?>
</table>
</div>   
          </div>    
        </div>
<div style="position: relative; left: 235px;">
*หมายเหตุ : 
</div>
<br>
<footer>
    <div class="p-1 bg-danger"></div>
    <div class="p-3 bg-warning text-center text-black">(กรณีศึกษาปั๊มน้ำมัน KB Petroleum)</div>
</footer>
</body>
</html>
