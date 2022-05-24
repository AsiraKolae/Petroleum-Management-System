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
<br><br><br><br>
<!-- <form name="frmSearch" method="post" action="<php echo $_SERVER['SCRIPT_NAME'];?>" style="position: relative; left: 140px;">
      <th>ค้นหาวันที่ :
      <input style="text-align:center;" name="txtKeyword" type="Date" id="txtKeyword" value="<php echo date('Y-m-d');?>" value="<php echo $strKeyword;?>">
      <input type="submit" value="Search"></th>
</form> -->

<?php
   include('../phpmysql/dbconnect.php');
   $conn = new mysqli($servername, $username, $password, $database);

   $sql = "SELECT *
           ,ROUND((Amount91)*(B_price91)) AS COST91
            ,ROUND(SUM(((Amount91)*(B_price91))/(Amount91)),2) AS COST910
       

           FROM Bprice95 
           LEFT JOIN Sprice95 ON Sprice95.Date_Sprice95=Bprice95.Date_Bprice95 AND Sprice95.Petrol_typeID95 = Bprice95.Petrol_typeID95
           LEFT JOIN payment_list95 ON Bprice95.Date_Bprice95=payment_list95.Date_list95 AND Bprice95.Petrol_typeID95 = payment_list95.Petrol_typeID95
           LEFT JOIN Sprice91 ON Sprice91.Date_Sprice91=Bprice95.Date_Bprice95 
           LEFT JOIN Bprice91 ON Bprice91.Date_Bprice91=Sprice91.Date_Sprice91 AND Sprice91.Petrol_typeID91 = Sprice91.Petrol_typeID91 
           LEFT JOIN payment_list91 ON payment_list91.Date_list91=Bprice91.Date_Bprice91 AND payment_list91.Petrol_typeID91=Bprice91.Petrol_typeID91
           LEFT JOIN Spriceb7 ON Spriceb7.Date_SpriceB7=Bprice95.Date_Bprice95 
           LEFT JOIN Bpriceb7 ON Bpriceb7.Date_BpriceB7=Spriceb7.Date_SpriceB7 AND Spriceb7.Petrol_typeIDB7 = Spriceb7.Petrol_typeIDB7 
           LEFT JOIN payment_listb7 ON payment_listb7.Date_listB7=Bpriceb7.Date_BpriceB7 AND payment_listb7.Petrol_typeIDB7=Bpriceb7.Petrol_typeIDB7
           LEFT JOIN amount_table91 ON amount_table91.Date_Amount91=Bprice91.Date_Bprice91 AND amount_table91.Petrol_typeID91=Bprice91.Petrol_typeID91
          
           
           WHERE Amount91 !='0' 
           GROUP BY Date_Bprice91
           ";
    
   $query = mysqli_query($conn,$sql);

?>

<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                
                    <div class="col-sm-7"><h2>
                      การคำนวณราคาต่อหน่วย (แก๊สโซฮอล์ 91)
                    </h2>
                    
                </div>

                      

                    <br><br>
<div class="container">
  <ul class="nav nav-tabs nav-justified">
  <li class="nav-item">
      <a class="nav-link active" href="SearchCostAll1.php">สรุปยอดขายน้ำมัน</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="SearchCost95.php">ต้นทุนแก๊สโซฮอล์ 95</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="SearchCost91.php">ต้นทุนแก๊สโซฮอล์ 91</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="SearchCostB7.php">ต้นทุนดีเซล B7</a>
    </li>
  </ul>
</div>
                </div>
            </div>
            <table class="table table-striped table-hover" style="margin-left:0%;">
                  <tr>
                  <td style="text-align:center;">ซื้อครั้งที่</td>
                  <td style="text-align:center;">วันที่</td>
                  <td style="text-align:center;">ปริมาณ (ลิตร)</td>
                  <td style="text-align:center;">ราคา/ลิตร</td>
                  <td style="text-align:center;">ต้นทุนรวม</td>

                  </tr>
            <?php
          
          $n=0;
          $sum = 0;
          $sum0 = 0;
          $sum1 = 0;
              while($data=mysqli_fetch_array($query,MYSQLI_ASSOC))
            
          {
             $Amount91 = $data["Amount91"];
             $B_price91 = $data["B_price91"];
             $COST91 = $data["COST91"];
             $sum = $sum + $data["Amount91"];
             $sum0 = $sum0 + $data["COST91"];
             $sum1 =$sum1+ $data["COST910"];
          ?>
                <tr>
                  <td>
                    <div style="text-align:center;">
                        <?php echo ++$n;?>
                    </div>
                  </td>
                <td style="text-align:center;"><?php echo $data["Date_Bprice91"];?></td>
                <td style="text-align:right;"><?php echo number_format($Amount91)."<br />";?></td>
                <td style="text-align:right;"><?php echo $data["B_price91"];?></td>
                <td style="text-align:right;"><?php echo number_format($COST91)."<br />";?></td>
                </tr>
                </tr>           
                <?php
}
?>

<td>
        <?php 
            
             echo "<td>รวมทั้งหมด</td>";
             echo "<td>".number_format($sum)."</td>";
             echo "<td></td>";
             echo "<td>".number_format($sum0)."</td>";
        ?>
</td>
<tr>
<?php
echo "<td colspan='2'></td>";
echo "<td>ราคาต่อหน่วย</td>";
echo "<td>".number_format($sum0/$sum,2)."</td>";
echo "<td></td>";
?>
</tr>
</table>

</div>   
          </div>    
        </div>
        
<?php

mysqli_close($conn);
?> 
<div style="position: relative; left: 235px;">
*หมายเหตุ : คำนวณราคาต่อหน่วยเพื่อนำไปหาต้นทุนเฉลี่ย
</div>
<br><br><br><br><br><br><br><br><br><br><br><br>
<footer>
    <div class="p-1 bg-danger"></div>
    <div class="p-3 bg-warning text-center text-black">(กรณีศึกษาปั๊มน้ำมัน KB Petroleum)</div>
</footer>

</body>
