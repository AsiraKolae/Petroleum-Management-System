
    <!-- $Date_receive = $_POST['Date_receive'];
    $Petrol_typeID = $_POST['Petrol_typeID'];
    $Received_amount = $_POST['Received_amount']; -->

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
        margin: 0px 0;
    }

    .table-wrapper {
        width: 1100px;
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

<br><br><br><br>
        <div><?php require_once("SearchMenu.php"); ?></div>

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
<br>

&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="FormAmount.php" type="button" class="btn btn-success"><i class="fa fa-plus" style="font-size:16px"></i>&nbsp;&nbsp;เพิ่มข้อมูล</a>
<br><br>
        
        <div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-7"><h2>จำนวนน้ำมันคงเหลือในถังน้ำมัน</h2></div>
                </div>
            </div>
            
            <table class="table table-striped table-hover" style="margin-left:0%;">
  <tr>
    <td style="text-align:center;">ลำดับ</td>
    <td style="text-align:center;">วันที่</td>
    <td style="text-align:center;">ชื่อประเภทน้ำมัน</td>
    <td style="text-align:center;">ปริมาณน้ำมันคงเหลือ (ทำการบวกเพิ่มแล้ว) <p style="color:red;">+ ปริมาณน้ำมันที่เพิ่มเข้ามา </p></td>
    <td style="text-align:center;">ปริมาณน้ำมันที่จ่ายไป (ลิตร)</td>
    <td style="text-align:center;">ปริมาณน้ำมันคงเหลือล่าสุด </td>
  </tr>


  <?php
   include('../phpmysql/dbconnect.php');
   

     $sql = "SELECT *
            ,ROUND((l95)+(Amount95),2) AS l95
            ,ROUND(((l95)+(Amount95))-((NumEnd_list95-NumStart_list95)+(NumEnd_listT95-NumStart_listT95)+(NumEnd_listTR95-NumStart_listTR95)),2) AS l195
            ,ROUND((NumEnd_list95-NumStart_list95)+(NumEnd_listT95-NumStart_listT95)+(NumEnd_listTR95-NumStart_listTR95),2) AS total

            ,ROUND((l91)+(Amount91),2) AS l91
            ,ROUND(((l91)+(Amount91))-((NumEnd_list91-NumStart_list91)+(NumEnd_listT91-NumStart_listT91)+(NumEnd_listTR91-NumStart_listTR91)),2) AS l191
            ,ROUND((NumEnd_list91-NumStart_list91)+(NumEnd_listT91-NumStart_listT91)+(NumEnd_listTR91-NumStart_listTR91),2) AS total91

            ,ROUND((lB7)+(AmountB7),2) AS lB7
            ,ROUND(((lB7)+(AmountB7))-((NumEnd_listB7-NumStart_listB7)+(NumEnd_listTB7-NumStart_listTB7)+(NumEnd_listTRB7-NumStart_listTRB7)),2) AS l1B7
            ,ROUND((NumEnd_listB7-NumStart_listB7)+(NumEnd_listTB7-NumStart_listTB7)+(NumEnd_listTRB7-NumStart_listTRB7),2) AS totalB7


           FROM payment_list95
           LEFT JOIN amount_table95 ON amount_table95.Date_Amount95 = payment_list95.Date_list95 AND amount_table95.Petrol_typeID95 = payment_list95.Petrol_typeID95 
           LEFT JOIN amount_table91 ON amount_table91.Date_Amount91= amount_table95.Date_Amount95 
           LEFT JOIN payment_list91 ON payment_list91.Date_list91 = amount_table91.Date_Amount91 AND amount_table91.Petrol_typeID91 = payment_list91.Petrol_typeID91 
           LEFT JOIN amount_tableb7 ON amount_tableb7.Date_AmountB7= amount_table95.Date_Amount95 
           LEFT JOIN payment_listb7 ON payment_listb7.Date_listB7 = amount_tableb7.Date_AmountB7 AND amount_tableb7.Petrol_typeIDB7 = payment_listb7.Petrol_typeIDB7 
    
    
           WHERE Date_list95 
           LIKE '%".$strKeyword."%'
           ORDER BY Date_list95 DESC LIMIT 9
           ";

   $query = mysqli_query($conn,$sql);


//    $sql = "SELECT *
//    -- ,ROUND(l1,2) AS l1
//    ,ROUND((l+Amount1)-((NumEnd_list95-NumStart_list95)+(NumEnd_listT95-NumStart_listT95)+(NumEnd_listTR95-NumStart_listTR95)),2) AS l1
//    ,ROUND((l+Amount1)-((NumEnd_list95-NumStart_list95)+(NumEnd_listT95-NumStart_listT95)+(NumEnd_listTR95-NumStart_listTR95)),2) AS Amount1
//    ,ROUND((NumEnd_list95-NumStart_list95)+(NumEnd_listT95-NumStart_listT95)+(NumEnd_listTR95-NumStart_listTR95),2) AS totalAll
//   FROM payment_list95
//   LEFT JOIN amount_table ON amount_table.Date_Amount = payment_list95.Date_list95 AND amount_table.Petrol_typeID = payment_list95.Petrol_typeID95
//   WHERE Date_list95 = CURDATE() - INTERVAL 1 DAY";

//   $query = mysqli_query($conn,$sql);
//   $data = mysqli_fetch_array($query);
//  //  $data3 = mysqli_fetch_array($query1);
//  //  $data4 = mysqli_fetch_array($query1);

//   $Amount = $data2["Amount1"];
//  //  $Amount0 = $data3["Amount1"];
//  //  $Amount1 = $data4["Amount1"];

//   $l = $data["l"];

   
    $n = 0;
    while($data = mysqli_fetch_array($query,MYSQLI_ASSOC))
{
    $l195 = $data['l195'];
    $total = $data['total'];
    $l95 = $data['l95'];
    $Amount95 = $data['Amount95'];

    $l191 = $data['l191'];
    $total91 = $data['total91'];
    $l91 = $data['l91'];
    $Amount91 = $data['Amount91'];

    $l1B7 = $data['l1B7'];
    $totalB7 = $data['totalB7'];
    $lB7 = $data['lB7'];
    $AmountB7 = $data['AmountB7'];
?>

  <tr>
    <td style="text-align:center;"><?php echo ++$n;?></td> 
    <td style="text-align:center;"><?php echo $data['Date_Amount95'];?></td>
    <td style="text-align:center;" class="background-color:rgba(255,99,132,1) text-dark"><?php echo $data['Petrol_typeID95']; ?></td> 
    <td style="text-align:right;"><?php echo number_format($l95,2)."<br />";?><p style="color:red;"><i class='far fa-arrow-alt-circle-up' style='font-size:18px;color:red'></i> <?php echo number_format($Amount95,2)."<br />";?></p></td> 
    <td style="text-align:right;"><?php echo number_format($total,2)."<br />";?></td>
    <td style="text-align:right;"><?php echo number_format($l195,2)."<br />";?></td>  

    <!-- <td><a class="btn btn-primary" href="Edituploadfileimage.php?Receipt_num=<php echo $data['Receipt_num'];?>">แก้ไข</a></td>
    <td><a class="btn btn-danger" href="Deleteuploadfileimage.php?Receipt_num=<php echo $data['Receipt_num']; ?>">ลบ</a></td>
                     -->
                <!-- </div> 
            </div>   
          </div>
          </div> -->
          </tr>	

          <tr>
    <td style="text-align:center;"><?php echo ++$n;?></td> 
    <td style="text-align:center;"><?php echo $data['Date_Amount95'];?></td>
    <td style="text-align:center;" class="background-color:rgba(75, 192, 192, 1) text-dark"><?php echo $data['Petrol_typeID91']; ?></td> 
    <td style="text-align:right;"><?php echo number_format($l91,2)."<br />";?><p style="color:red;"><i class='far fa-arrow-alt-circle-up' style='font-size:18px;color:red'></i> <?php echo number_format($Amount91,2)."<br />";?></p></td> 
    <td style="text-align:right;"><?php echo number_format($total91,2)."<br />";?></td>
    <td style="text-align:right;"><?php echo number_format($l191,2)."<br />";?></td>  

    <!-- <td><a class="btn btn-primary" href="Edituploadfileimage.php?Receipt_num=<php echo $data['Receipt_num'];?>">แก้ไข</a></td>
    <td><a class="btn btn-danger" href="Deleteuploadfileimage.php?Receipt_num=<php echo $data['Receipt_num']; ?>">ลบ</a></td>
                     -->
                <!-- </div> 
            </div>   
          </div>
          </div> -->
          </tr>	

          <tr>
    <td style="text-align:center;"><?php echo ++$n;?></td> 
    <td style="text-align:center;"><?php echo $data['Date_Amount95'];?></td>
    <td style="text-align:center;" class="background-color:rgba(255, 206, 86, 1) text-dark"><?php echo $data['Petrol_typeIDB7']; ?></td> 
    <td style="text-align:right;"><?php echo number_format($lB7,2)."<br />";?><p style="color:red;"><i class='far fa-arrow-alt-circle-up' style='font-size:18px;color:red'></i> <?php echo number_format($AmountB7,2)."<br />";?></p></td> 
    <td style="text-align:right;"><?php echo number_format($totalB7,2)."<br />";?></td>
    <td style="text-align:right;"><?php echo number_format($l1B7,2)."<br />";?></td>  

    <!-- <td><a class="btn btn-primary" href="Edituploadfileimage.php?Receipt_num=<php echo $data['Receipt_num'];?>">แก้ไข</a></td>
    <td><a class="btn btn-danger" href="Deleteuploadfileimage.php?Receipt_num=<php echo $data['Receipt_num']; ?>">ลบ</a></td>
                     -->
                <!-- </div> 
            </div>   
          </div>
          </div> -->
          </tr>	
<?php
}
?>

</table>
</div>   
          </div>    
        </div>
<div style="position: relative; left: 235px;">
* หมายเหตุ : ก่อนทำการเพิ่มข้อมูลจำนวนน้ำมันคงเหลือในถังน้ำมันให้ทำการ<a style="color:red;" href="PaymentPage.php">เพิ่มรายการจ่ายก่อน</a>
</div>
<br>
<footer>
    <div class="p-1 bg-danger"></div>
    <div class="p-3 bg-warning text-center text-black">(กรณีศึกษาปั๊มน้ำมัน KB Petroleum)</div>
</footer>
</body>
</html>
