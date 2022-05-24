<?php
include('../phpmysql/dbconnect.php');

$sql ="SELECT * 
      ,ROUND(NumStart_list95,2) AS NumStart_list95 
      ,ROUND(NumEnd_list95,2) AS NumEnd_list95 
      ,ROUND(NumStart_listT95,2) AS NumStart_listT95 
      ,ROUND(NumEnd_listT95,2) AS NumEnd_listT95 
      ,ROUND(NumStart_listTR95,2) AS NumStart_listTR95 
      ,ROUND(NumEnd_listTR95,2) AS NumEnd_listTR95 
       FROM payment_list95 
       WHERE Date_list95 = CURDATE() - INTERVAL 1 DAY";

// $sql = "SELECT * ,ROUND(Sale_price-Buy_price,2) AS Profit FROM price WHERE Date_price LIKE '%".$strKeyword."%' ";
$query = mysqli_query($conn,$sql);
$data = mysqli_fetch_array($query);

$sql1 ="SELECT * 
      ,ROUND(NumStart_list91,2) AS NumStart_list91
      ,ROUND(NumEnd_list91,2) AS NumEnd_list91 
      ,ROUND(NumStart_listT91,2) AS NumStart_listT91 
      ,ROUND(NumEnd_listT91,2) AS NumEnd_listT91 
      ,ROUND(NumStart_listTR91,2) AS NumStart_listTR91 
      ,ROUND(NumEnd_listTR91,2) AS NumEnd_listTR91 
       FROM payment_list91 
       WHERE Date_list91 = CURDATE() - INTERVAL 1 DAY";

// $sql = "SELECT * ,ROUND(Sale_price-Buy_price,2) AS Profit FROM price WHERE Date_price LIKE '%".$strKeyword."%' ";
$query1 = mysqli_query($conn,$sql1);
$data0 = mysqli_fetch_array($query1);


$sql2 ="SELECT * 
      ,ROUND(NumStart_listB7,2) AS NumStart_listB7
      ,ROUND(NumEnd_listB7,2) AS NumEnd_listB7
      ,ROUND(NumStart_listTB7,2) AS NumStart_listTB7 
      ,ROUND(NumEnd_listTB7,2) AS NumEnd_listTB7 
      ,ROUND(NumStart_listTRB7,2) AS NumStart_listTRB7 
      ,ROUND(NumEnd_listTRB7,2) AS NumEnd_listTRB7 
       FROM payment_listb7
       WHERE Date_listB7 = CURDATE() - INTERVAL 1 DAY";

$query2 = mysqli_query($conn,$sql2);
$data1 = mysqli_fetch_array($query2);

///////////////////////////////////////////////////////// today //////////////////////////////////////////////////

$sql3 ="SELECT * 
      ,ROUND(NumStart_list95,2) AS NumStart_list95 
      ,ROUND(NumEnd_list95,2) AS NumEnd_list95 
      ,ROUND(NumStart_listT95,2) AS NumStart_listT95 
      ,ROUND(NumEnd_listT95,2) AS NumEnd_listT95 
      ,ROUND(NumStart_listTR95,2) AS NumStart_listTR95 
      ,ROUND(NumEnd_listTR95,2) AS NumEnd_listTR95 
       FROM payment_list95 
       WHERE Date_list95 = CURDATE()";

$query3 = mysqli_query($conn,$sql3);
$data2 = mysqli_fetch_array($query3);

$sql4 ="SELECT * 
      ,ROUND(NumStart_list91,2) AS NumStart_list91
      ,ROUND(NumEnd_list91,2) AS NumEnd_list91 
      ,ROUND(NumStart_listT91,2) AS NumStart_listT91 
      ,ROUND(NumEnd_listT91,2) AS NumEnd_listT91 
      ,ROUND(NumStart_listTR91,2) AS NumStart_listTR91 
      ,ROUND(NumEnd_listTR91,2) AS NumEnd_listTR91 
       FROM payment_list91 
       WHERE Date_list91 = CURDATE()";

$query4 = mysqli_query($conn,$sql4);
$data3 = mysqli_fetch_array($query4);


$sql5 ="SELECT * 
      ,ROUND(NumStart_listB7,2) AS NumStart_listB7
      ,ROUND(NumEnd_listB7,2) AS NumEnd_listB7
      ,ROUND(NumStart_listTB7,2) AS NumStart_listTB7 
      ,ROUND(NumEnd_listTB7,2) AS NumEnd_listTB7 
      ,ROUND(NumStart_listTRB7,2) AS NumStart_listTRB7 
      ,ROUND(NumEnd_listTRB7,2) AS NumEnd_listTRB7 
       FROM payment_listb7
       WHERE Date_listB7 = CURDATE()";

$query5 = mysqli_query($conn,$sql5);
$data4 = mysqli_fetch_array($query5);
  
?>


<!DOCTYPE html>
<html?>
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
}

.rounded-lg {
  border-radius: 1rem;
}

.nav-pills .nav-link {
  color: #555;
}

.nav-pills .nav-link.active {
  color: #fff;
}
  </style>

<body>
<br><br>
        <div><?php require_once("SearchMenu.php"); ?></div>


  <script language="JavaScript">
	    function chkNumber(ele)
	{
	    var vchar = String.fromCharCode(event.keyCode);
	        if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
	    ele.onKeyPress=vchar;
	}
  </script>


<br>

</body>
</head>
</html>

<script language="javascript">
          function fncSubmit()
          {

            if(document.form1.NumStart_list95.value > document.form1.NumEnd_list95.value)
            {
              alert('ท่านใส่ตัวเลขสิ้นสุดวันน้อยกว่าตัวเลขเริ่มต้นวัน ตู้หนึ่ง (แก๊สโซฮอล์ 95)');
              document.form1.NumEnd_list95.focus();    
              return false;
            } 

            if(document.form1.NumStart_list91.value > document.form1.NumEnd_list91.value)
            {
              alert('ท่านใส่ตัวเลขสิ้นสุดวันน้อยกว่าตัวเลขเริ่มต้นวัน ตู้หนึ่ง (แก๊สโซฮอล์ 91)');
              document.form1.NumEnd_list91.focus();    
              return false;
            } 

            if(document.form1.NumStart_listB7.value > document.form1.NumEnd_listB7.value)
            {
              alert('ท่านใส่ตัวเลขสิ้นสุดวันน้อยกว่าตัวเลขเริ่มต้นวัน ตู้หนึ่ง (ดีเซล B7)');
              document.form1.NumEnd_listB7.focus();    
              return false;
            } 
            if(document.form1.NumStart_listT95.value > document.form1.NumEnd_listT95.value)
            {
              alert('ท่านใส่ตัวเลขสิ้นสุดวันน้อยกว่าตัวเลขเริ่มต้นวัน ตู้สอง (แก๊สโซฮอล์ 95)');
              document.form1.NumEnd_listT95.focus();    
              return false;
            } 

            if(document.form1.NumStart_listT91.value > document.form1.NumEnd_listT91.value)
            {
              alert('ท่านใส่ตัวเลขสิ้นสุดวันน้อยกว่าตัวเลขเริ่มต้นวัน ตู้สอง (แก๊สโซฮอล์ 91)');
              document.form1.NumEnd_listT91.focus();    
              return false;
            } 

            if(document.form1.NumStart_listTB7.value > document.form1.NumEnd_listTB7.value)
            {
              alert('ท่านใส่ตัวเลขสิ้นสุดวันน้อยกว่าตัวเลขเริ่มต้นวัน ตู้สอง (ดีเซล B7)');
              document.form1.NumEnd_listTB7.focus();    
              return false;
            } 
            if(document.form1.NumStart_listTR95.value > document.form1.NumEnd_listTR95.value)
            {
              alert('ท่านใส่ตัวเลขสิ้นสุดวันน้อยกว่าตัวเลขเริ่มต้นวัน ตู้สาม (แก๊สโซฮอล์ 95)');
              document.form1.NumEnd_listTR95.focus();    
              return false;
            } 

            if(document.form1.NumStart_listTR91.value > document.form1.NumEnd_listTR91.value)
            {
              alert('ท่านใส่ตัวเลขสิ้นสุดวันน้อยกว่าตัวเลขเริ่มต้นวัน ตู้สาม (แก๊สโซฮอล์ 91)');
              document.form1.NumEnd_listTR91.focus();    
              return false;
            } 

            if(document.form1.NumStart_listTRB7.value > document.form1.NumEnd_listTRB7.value)
            {
              alert('ท่านใส่ตัวเลขสิ้นสุดวันน้อยกว่าตัวเลขเริ่มต้นวัน ตู้สาม (ดีเซล B7)');
              document.form1.NumEnd_listTRB7.focus();    
              return false;
            } 
            document.form1.submit();
          }
      </script>


  </script>

<div class="row mb-4">
    <div class="col-lg-8 mx-auto text-center">
    <br>
      <h1>ฟอร์มกรอกตัวเลขสิ้นสุดวัน</h1>
    </div>
  </div>

<div class="row">
    <div class="col-lg-8 mx-auto">
      <div class="bg-white rounded-lg shadow-sm p-4">
        <div class="tab-content">

          <!-- credit card info-->
          <div id="nav-tab-card" class="tab-pane fade show active">

               <form class="form-horizontal" name="form1" method="post" enctype="multipart/form-data" action="AddPayment.php" OnSubmit="return fncSubmit();">

               <input type="Date" value="<?php echo date('Y-m-d');?>" name="Date_list95" class="form-control text-dark" id="Date_list95" readonly="readonly">
               <!-- <input type="hidden" value="<php echo date('Y-m-d');?>" name="Date_list" class="form-control" id="Date_list"> -->
               <br>
<div class="form-group">

                <!-- <label for="inputEmail3" class="col-sm-4 control-label">รหัสประเภทน้ำมัน :</label> -->
                  <div for="inputEmail3" class="form-inline"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label>รหัสประเภทน้ำมัน :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" class="form-control" style="background-color:rgba(255,99,132,1)" name="Petrol_typeID95" id="Petrol_typeID95" value="แก๊สโซฮอล์ 95" readonly="readonly">
   

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" class="form-control"  style="background-color:rgba(75, 192, 192, 1)" name="Petrol_typeID91" id="Petrol_typeID91" value="แก๊สโซฮอล์ 91" readonly="readonly">
                    <!-- <input type="hidden" class="form-control" name="Petrol_typeID0" id="Petrol_typeID0" value="แก๊สโซฮอล์ 91"> -->
        
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" class="form-control" style="background-color:rgba(255, 206, 86, 1)" name="Petrol_typeIDB7" id="Petrol_typeIDB7" value="ดีเซล B7" readonly="readonly">
                    <!-- <input type="hidden" class="form-control" name="Petrol_typeID1" id="Petrol_typeID1" value="ดีเซล B7"> -->
                
                  </div>

                  <br>
                  <div class="form-group">
                      <!-- <label for="inputEmail3" class="col-sm-4 control-label">ตัวเลขเริ่มต้นวัน :</label> -->
                      <div for="inputEmail3" class="form-inline"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label>ตัวเลขเริ่มต้นวัน (ตู้หนึ่ง) :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" class="form-control text-dark" name="NumStart_list95" id="NumStart_list95" value="<?php echo $data["NumEnd_list95"];?>" OnKeyPress="return chkNumber(this)" readonly="readonly">

                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" class="form-control text-dark" name="NumStart_list91" id="NumStart_list91" value="<?php echo $data0["NumEnd_list91"];?>" OnKeyPress="return chkNumber(this)" readonly="readonly">
            
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" class="form-control text-dark" name="NumStart_listB7" id="NumStart_listB7" value="<?php echo $data1["NumEnd_listB7"];?>" OnKeyPress="return chkNumber(this)" readonly="readonly">
            
                      </div>
                       
                  <br>
                     <div class="form-group">
                      <!-- <label for="inputEmail3" class="col-sm-4 control-label">ตัวเลขสิ้นสุดวัน :</label> -->
                      <div for="inputEmail3" class="form-inline"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label><h style="color:red;">*</h>ตัวเลขสิ้นสุดวัน (ตู้หนึ่ง) :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" class="form-control text-dark" name="NumEnd_list95" id="NumEnd_list95" value="<?php echo $data2["NumEnd_list95"];?>" OnKeyPress="return chkNumber(this)" placeholder="ตัวเลขสิ้นสุดวันตู้หนึ่ง" required>
                        
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" class="form-control text-dark" name="NumEnd_list91" id="NumEnd_list91" value="<?php echo $data3["NumEnd_list91"];?>" OnKeyPress="return chkNumber(this)" placeholder="ตัวเลขสิ้นสุดวันตู้หนึ่ง" required>
                  
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" class="form-control text-dark" name="NumEnd_listB7" id="NumEnd_listB7" value="<?php echo $data4["NumEnd_listB7"];?>" OnKeyPress="return chkNumber(this)" placeholder="ตัวเลขสิ้นสุดวันตู้หนึ่ง" required>
                   
                      </div>

                      <br>
                  <div class="form-group">
                      <!-- <label for="inputEmail3" class="col-sm-4 control-label">ตัวเลขเริ่มต้นวัน :</label> -->
                      <div for="inputEmail3" class="form-inline"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label>ตัวเลขเริ่มต้นวัน (ตู้สอง) :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" class="form-control text-dark" name="NumStart_listT95" id="NumStart_listT95" value="<?php echo $data["NumEnd_listT95"];?>" OnKeyPress="return chkNumber(this)" readonly="readonly">

                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" class="form-control text-dark" name="NumStart_listT91" id="NumStart_listT91" value="<?php echo $data0["NumEnd_listT91"];?>" OnKeyPress="return chkNumber(this)" readonly="readonly">
            
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" class="form-control text-dark" name="NumStart_listTB7" id="NumStart_listTB7" value="<?php echo $data1["NumEnd_listTB7"];?>" OnKeyPress="return chkNumber(this)" readonly="readonly">
            
                      </div>
                       
                  <br>
                     <div class="form-group">
                      <!-- <label for="inputEmail3" class="col-sm-4 control-label">ตัวเลขสิ้นสุดวัน :</label> -->
                      <div for="inputEmail3" class="form-inline"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label><h style="color:red;">*</h>ตัวเลขสิ้นสุดวัน (ตู้สอง) :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" class="form-control text-dark" name="NumEnd_listT95" id="NumEnd_listT95" value="<?php echo $data2["NumEnd_listT95"];?>" OnKeyPress="return chkNumber(this)" placeholder="ตัวเลขสิ้นสุดวันตู้สอง" required>
                        
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" class="form-control text-dark" name="NumEnd_listT91" id="NumEnd_listT91" value="<?php echo $data3["NumEnd_listT91"];?>" OnKeyPress="return chkNumber(this)" placeholder="ตัวเลขสิ้นสุดวันตู้สอง" required>
                  
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" class="form-control text-dark" name="NumEnd_listTB7" id="NumEnd_listTB7" value="<?php echo $data4["NumEnd_listTB7"];?>" OnKeyPress="return chkNumber(this)" placeholder="ตัวเลขสิ้นสุดวันตู้สอง" required>
                   
                      </div>

                      <br>
                  <div class="form-group">
                      <!-- <label for="inputEmail3" class="col-sm-4 control-label">ตัวเลขเริ่มต้นวัน :</label> -->
                      <div for="inputEmail3" class="form-inline"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label>ตัวเลขเริ่มต้นวัน (ตู้สาม) :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" class="form-control text-dark" name="NumStart_listTR95" id="NumStart_listTR95" value="<?php echo $data["NumEnd_listTR95"];?>" OnKeyPress="return chkNumber(this)" readonly="readonly" required>

                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" class="form-control text-dark" name="NumStart_listTR91" id="NumStart_listTR91" value="<?php echo $data0["NumEnd_listTR91"];?>" OnKeyPress="return chkNumber(this)" readonly="readonly" required>
            
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" class="form-control text-dark" name="NumStart_listTRB7" id="NumStart_listTRB7" value="<?php echo $data1["NumEnd_listTRB7"];?>" OnKeyPress="return chkNumber(this)" readonly="readonly" required>
            
                      </div>
                       
                  <br>
                     <div class="form-group">
                      <!-- <label for="inputEmail3" class="col-sm-4 control-label">ตัวเลขสิ้นสุดวัน :</label> -->
                      <div for="inputEmail3" class="form-inline"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label><h style="color:red;">*</h>ตัวเลขสิ้นสุดวัน (ตู้สาม) :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" class="form-control text-dark" name="NumEnd_listTR95" id="NumEnd_listTR95" value="<?php echo $data2["NumEnd_listTR95"];?>" OnKeyPress="return chkNumber(this)" placeholder="ตัวเลขสิ้นสุดวันตู้สาม" required>
                        
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" class="form-control text-dark" name="NumEnd_listTR91" id="NumEnd_listTR91" value="<?php echo $data3["NumEnd_listTR91"];?>" OnKeyPress="return chkNumber(this)" placeholder="ตัวเลขสิ้นสุดวันตู้สาม" required>
                  
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" class="form-control text-dark" name="NumEnd_listTRB7" id="NumEnd_listTRB7" value="<?php echo $data4["NumEnd_listTRB7"];?>" OnKeyPress="return chkNumber(this)" placeholder="ตัวเลขสิ้นสุดวันตู้สาม" required>
                   
                      </div>

                        <div class="col-sm-4">
                       </div>
                       <br>
                      <button type="submit" name="update" class="subscribe btn btn-primary btn-block rounded-pill shadow-sm" onClick="return confirm('ตรวจสอบข้อมูลก่อนนำเข้าหรือไม่ ?');"><i class="fa fa-save"></i> ตกลง</button>
                      <a type="button" class="subscribe btn btn-danger btn-block rounded-pill shadow-sm" href="PaymentPage.php"> ยกเลิก </a>
                     <!-- <button type="reset" class="subscribe btn btn-danger btn-block rounded-pill shadow-sm"><i class="fa fa-refresh"></i> ยกเลิก</button> -->
                  </div>
                  
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
       

</form>

</div>
        </div>
        </div>
        </div>
        </div>

<div style="position: relative; left:260px; top: 5px;">
*หมายเหตุ : ตัวเลขสิ้นสุดวันได้มาจากตู้จ่ายน้ำมัน
</div>
<br>

<div class="box-footer">
    <div class="p-1 bg-danger"></div>
    <div class="p-3 bg-warning text-center text-black">(กรณีศึกษาปั๊มน้ำมัน KB Petroleum)</div>
</div>

<!-- 
<php

include('../phpmysql/dbconnect.php'); // Using database connection file here

$Payment_listID = $_GET['Payment_listID']; // get id through query string

$qry = mysqli_query($conn,"select * 
                          ,ROUND(NumStart_list,2) AS NumStart_list
                          ,ROUND(NumStart_listT,2) AS NumStart_listT
                          ,ROUND(NumStart_listTR,2) AS NumStart_listTR
                          ,ROUND(NumEnd_list,2) AS NumEnd_list
                          ,ROUND(NumEnd_listT,2) AS NumEnd_listT
                          ,ROUND(NumEnd_listTR,2) AS NumEnd_listTR
                           from payment_list where Payment_listID ='$Payment_listID'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $Date_list = $_POST['Date_list'];
	  $Petrol_typeID = $_POST['Petrol_typeID'];
    $NumStart_list = $_POST['NumStart_list'];
    $NumEnd_list = $_POST['NumEnd_list']; 
    $NumStart_listT = $_POST['NumStart_listT'];
    $NumEnd_listT = $_POST['NumEnd_listT']; 
    $NumStart_listTR = $_POST['NumStart_listTR'];
    $NumEnd_listTR = $_POST['NumEnd_listTR']; 

    $edit = mysqli_query($conn,"UPDATE payment_list 
                                SET Date_list='$Date_list', 
                                    Petrol_typeID='$Petrol_typeID',
                                    NumStart_list='$NumStart_list',
                                    NumEnd_list='$NumEnd_list',
                                    NumStart_listT='$NumStart_listT',
                                    NumEnd_listT='$NumEnd_listT',
                                    NumStart_listTR='$NumStart_listTR',
                                    NumEnd_listTR='$NumEnd_listTR'   
                                WHERE Date_list='$Date_list'
                               ");
	
    if($edit)
    {
         // mysqli_close($conn); // Close connection
         echo "
         <script>
         window.location.href = 'PaymentPage.php';
         </script>; 
         ";
         // header("location:CusName.php"); // redirects to all records page
         // exit;
    }
    else
    {
        echo mysqli_error();
    }    	
}
?> -->