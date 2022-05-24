<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Petroleum Management System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

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
      <!-- <h1>ราคาน้ำมัน</h1> -->
</form> 


<?php
   include('../phpmysql/dbconnect.php');
   $conn = new mysqli($servername, $username, $password, $database);
   $sql = "SELECT *
           ,ROUND(S_price95-B_price95,2) AS Profit95
           ,ROUND(S_price91-B_price91,2) AS Profit91
           ,ROUND(S_priceB7-B_priceB7,2) AS ProfitB7
           ,ROUND(S_price95,2) AS S_price95
           ,ROUND(B_price95,2) AS B_price95
           ,ROUND(S_price91,2) AS S_price91
           ,ROUND(B_price91,2) AS B_price91
           ,ROUND(S_priceB7,2) AS S_priceB7
           ,ROUND(B_priceB7,2) AS B_priceB7

           FROM sprice95
           LEFT JOIN bprice95 ON bprice95.Date_Bprice95 = sprice95.Date_Sprice95 AND bprice95.Petrol_typeID95 = sprice95.Petrol_typeID95 
           LEFT JOIN bprice91 ON bprice91.Date_Bprice91= bprice95.Date_Bprice95 
           LEFT JOIN sprice91 ON sprice91.Date_Sprice91 = bprice91.Date_Bprice91 AND bprice91.Petrol_typeID91 = sprice91.Petrol_typeID91 
           LEFT JOIN bpriceb7 ON bpriceb7.Date_BpriceB7= bprice95.Date_Bprice95 
           LEFT JOIN spriceb7 ON spriceb7.Date_SpriceB7 = bpriceb7.Date_BpriceB7 AND bpriceb7.Petrol_typeIDB7 = spriceb7.Petrol_typeIDB7 
           WHERE Date_Bprice95 
           LIKE '%".$strKeyword."%'
           ORDER BY Date_Bprice95 DESC LIMIT 3
           ";

   $query = mysqli_query($conn,$sql);
?>

</head>

&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
  <a href="FormPriceAdd.php" type="button" class="btn btn-success"><i class="fa fa-plus" style="font-size:16px"></i>&nbsp;&nbsp;เพิ่มข้อมูล</a>

<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                
                    <div class="col-sm-7"><h2>ราคาน้ำมัน</h2>
                    
                </div>

                      

                    <br><br>
<div class="container">
  <ul class="nav nav-tabs nav-justified">
    <li class="nav-item">
      <a class="nav-link active" href="price.php">ราคาทั้งหมด</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="BuyPrice.php">ราคาซื้อ</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="SalePrice.php">ราคาขาย</a>
    </li>
  </ul>
</div>
                </div>
            </div>
            
            <table class="table table-striped table-hover" style="margin-left:0%;">
                <!-- <thead> -->
                  <tr>
                    <td style="text-align:center;">ลำดับ</td>
                    <td style="text-align:center;">วันที่</td>
                    <td style="text-align:center;">ชื่อประเภทน้ำมัน</td>
                    <td style="text-align:center;">ราคาซื้อ</td>
                    <td style="text-align:center;">ราคาขาย</td>
                    <td style="text-align:center;">กำไร</td>
                    <!-- <td colspan="2">
                   </td> -->
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

                        <td style="text-align:center;">
                            <?php echo $data["Date_Bprice95"];?>
                            <!-- <php echo $data["Date_Sprice"];?> -->
                        </td>
                     
                        <td style="text-align:center; background-color:rgba(255,99,132,1)"><?php echo $data["Petrol_typeID95"];?></td>
                        <td>
                           <div style="text-align:right;">
                              <?php echo $data["B_price95"];?>
                           </div>
                        </td>
                        <td style="text-align:right;">
                          <?php echo $data["S_price95"];?>
                        </td>
                        <td style="text-align:right;"><?php echo $data["Profit95"];?></td>

                        <!-- <td><a class="btn btn-primary" href="EditPrice.php?id=<php echo $data['id'];?>">แก้ไข</a></td>
                        <td><a class="btn btn-danger" href="DeletePrice.php?id=<php echo $data['id']; ?>">ลบ</a></td> -->

                    </tr>

                    <tr>
                        <td>
                          <div style="text-align:center;">
                       
                            <?php echo ++$n;?>
                          </div>
                        </td>

                        <!-- bg-danger text-dark
                bg-success text-dark
                bg-warning text-dark -->

                        <td style="text-align:center;">
                            <?php echo $data["Date_Bprice91"];?>
                            <!-- <php echo $data["Date_Sprice"];?> -->
                        </td>
                        <td style="text-align:center; background-color:rgba(75, 192, 192, 1)"><?php echo $data["Petrol_typeID91"];?></td>
                        <td>
                           <div style="text-align:right;">
                              <?php echo $data["B_price91"];?>
                           </div>
                        </td>
                        <td style="text-align:right;">
                          <?php echo $data["S_price91"];?>
                        </td>
                        <td style="text-align:right;"><?php echo $data["Profit91"];?></td>

                        <!-- <td><a class="btn btn-primary" href="EditPrice.php?id=<php echo $data['id'];?>">แก้ไข</a></td>
                        <td><a class="btn btn-danger" href="DeletePrice.php?id=<php echo $data['id']; ?>">ลบ</a></td> -->

                    </tr>

                    <tr>
                        <td>
                          <div style="text-align:center;">
                       
                            <?php echo ++$n;?>
                          </div>
                        </td>

                        <td style="text-align:center;">
                            <?php echo $data["Date_BpriceB7"];?>
                            <!-- <php echo $data["Date_Sprice"];?> -->
                        </td>  
                        <td style="text-align:center; background-color:rgba(255, 206, 86, 1)"><?php echo $data["Petrol_typeIDB7"];?></td>
                        <td>
                           <div style="text-align:right;">
                              <?php echo $data["B_priceB7"];?>
                           </div>
                        </td>
                        <td style="text-align:right;">
                          <?php echo $data["S_priceB7"];?>
                        </td>
                        <td style="text-align:right;"><?php echo $data["ProfitB7"];?></td>

                        <!-- <td><a class="btn btn-primary" href="EditPrice.php?id=<php echo $data['id'];?>">แก้ไข</a></td>
                        <td><a class="btn btn-danger" href="DeletePrice.php?id=<php echo $data['id']; ?>">ลบ</a></td> -->

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
*หมายเหตุ : ตารางนี้แสดงราคาเฉพาะวันที่ปัจจุบัน-ย้อนหลัง 2 วันเท่านั้น สามารถทำการค้นหาวันที่ที่ต้องการได้
</div>
</body>
</html> 


<!-- <div class="p-1 bg-danger"></div>
<div class="p-3 bg-warning text-center text-black">(กรณีศึกษาปั๊มน้ำมัน KB Petroleum)</div> -->
