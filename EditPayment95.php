<!DOCTYPE html>
<html lang="en">
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
</head>
<body>
<br><br><br>
        <div><?php require_once("SearchMenu.php"); ?></div>

<?php

include('../phpmysql/dbconnect.php'); // Using database connection file here

// get id through query string
// $Petrol_typeID95 = $_GET['Petrol_typeID95']; 
$Date_list95 = $_GET['Date_list95'];  

$qry = mysqli_query($conn,"select * 
                          ,ROUND(NumStart_list95,2) AS NumStart_list95
                          ,ROUND(NumStart_listT95,2) AS NumStart_listT95
                          ,ROUND(NumStart_listTR95,2) AS NumStart_listTR95
                          ,ROUND(NumEnd_list95,2) AS NumEnd_list95
                          ,ROUND(NumEnd_listT95,2) AS NumEnd_listT95
                          ,ROUND(NumEnd_listTR95,2) AS NumEnd_listTR95
                           from payment_list95 where Date_list95='$Date_list95'"); // select query

// $data = mysqli_query($conn,$qry); // fetch data
// $query = mysqli_query($conn,$qry);

  $data = mysqli_fetch_array($qry);

if(isset($_POST['update'])) // when click on Update button
{
    $Date_list95 = $_POST['Date_list95'];
	  $Petrol_typeID95 = $_POST['Petrol_typeID95'];
    $NumStart_list95 = $_POST['NumStart_list95'];
    $NumEnd_list95 = $_POST['NumEnd_list95']; 
    $NumStart_listT95 = $_POST['NumStart_listT95'];
    $NumEnd_listT95 = $_POST['NumEnd_listT95']; 
    $NumStart_listTR95 = $_POST['NumStart_listTR95'];
    $NumEnd_listTR95 = $_POST['NumEnd_listTR95']; 

    $edit = mysqli_query($conn,"UPDATE payment_list95 
                                SET Date_list95='$Date_list95', 
                                    Petrol_typeID95='$Petrol_typeID95',
                                    NumStart_list95='$NumStart_list95',
                                    NumEnd_list95='$NumEnd_list95',
                                    NumStart_listT95='$NumStart_listT95',
                                    NumEnd_listT95='$NumEnd_listT95',
                                    NumStart_listTR95='$NumStart_listTR95',
                                    NumEnd_listTR95='$NumEnd_listTR95'   
                                WHERE Date_list95='$Date_list95'
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
?>

<script language="JavaScript">
	    function chkNumber(ele)
	{
	    var vchar = String.fromCharCode(event.keyCode);
	        if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
	    ele.onKeyPress=vchar;
	}
  </script>


<script language="javascript">
          function fncSubmit()
          {

            if(document.form1.NumStart_list95.value > document.form1.NumEnd_list95.value)
            {
              alert('ท่านใส่ตัวเลขสิ้นสุดวันน้อยกว่าตัวเลขเริ่มต้นวัน (ตู้หนึ่ง)');
              document.form1.NumEnd_list95.focus();    
              return false;
            } 

            if(document.form1.NumStart_listT95.value > document.form1.NumEnd_listT95.value)
            {
              alert('ท่านใส่ตัวเลขสิ้นสุดวันน้อยกว่าตัวเลขเริ่มต้นวัน (ตู้สอง)');
              document.form1.NumEnd_listT95.focus();    
              return false;
            } 

            if(document.form1.NumStart_listTR95.value > document.form1.NumEnd_listTR95.value)
            {
              alert('ท่านใส่ตัวเลขสิ้นสุดวันน้อยกว่าตัวเลขเริ่มต้นวัน (ตู้สาม)');
              document.form1.NumEnd_listTR95.focus();    
              return false;
            } 

            document.form1.submit();
          }
      </script>
      
<div class="container py-5">

<!-- For demo purpose -->
<div class="row mb-4">
  <div class="col-lg-8 mx-auto text-center">
<h2>แก้ไขรายการจ่าย</h2>
</div>
</div>


<div class="row">
    <div class="col-lg-11 mx-auto">
      <div class="bg-white rounded-lg shadow-sm p-5">
        <div class="tab-content">

          <!-- credit card info-->
          <div id="nav-tab-card" class="tab-pane fade show active">
        <form class="form-horizontal" name="form1" method="POST" OnSubmit="return fncSubmit();">
          
        <div for="inputEmail3" class="form-group">
            <label for="Date_list95">วันที่รับ :</label>
              <input type="Date" name="Date_list95" value="<?php echo $data['Date_list95']?>" placeholder="Enter Date" class="form-control" readonly="readonly">
              
        </div>

        <div for="inputEmail3" class="form-group">
            <label for="Petrol_typeID95">รหัสประเภทน้ำมัน :</label>
            <input type="text" class="form-control" style="background-color:rgba(255,99,132,1)" name="Petrol_typeID95" id="Petrol_typeID95" value="แก๊สโซฮอล์ 95" readonly="readonly">
            
        </div>
        <label>ตัวเลขเริ่มต้นวัน</label>
         <br>
        <div for="inputEmail3" class="form-inline">&nbsp;&nbsp;&nbsp;
                    <label for="NumStart_list95">(ตู้หนึ่ง) :</label>&nbsp;&nbsp;
                    <input type="text" name="NumStart_list95" value="<?php echo $data['NumStart_list95'] ?>" placeholder="Enter number Start" class="form-control" readonly="readonly">
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <label for="NumStart_listT95">(ตู้สอง) :</label>&nbsp;&nbsp;
                    <input type="text" name="NumStart_listT95" value="<?php echo $data['NumStart_listT95'] ?>" placeholder="Enter number Start" class="form-control" readonly="readonly">
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <label for="NumStart_listTR95">(ตู้สาม) :</label>&nbsp;&nbsp;
                    <input type="text" name="NumStart_listTR95" value="<?php echo $data['NumStart_listTR95'] ?>" placeholder="Enter number Start" class="form-control" readonly="readonly">
                
                  </div>

<br>
        <label>ตัวเลขสิ้นสุดวัน</label>
        <br>
        <div for="inputEmail3" class="form-inline">&nbsp;&nbsp;&nbsp;
            <label for="inputEmail3">(ตู้หนึ่ง) :</label>&nbsp;&nbsp;&nbsp;
                    <input type="text" OnKeyPress="return chkNumber(this)" name="NumEnd_list95" value="<?php echo $data['NumEnd_list95'] ?>" placeholder="Enter number end 1" class="form-control" Required>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <label for="inputEmail3">(ตู้สอง) :</label>&nbsp;&nbsp;
                    <input type="text" OnKeyPress="return chkNumber(this)" name="NumEnd_listT95" value="<?php echo $data['NumEnd_listT95'] ?>" placeholder="Enter number end 2" class="form-control" Required>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <label for="inputEmail3">(ตู้สาม) :</label>&nbsp;&nbsp;
                    <input type="text" OnKeyPress="return chkNumber(this)" name="NumEnd_listTR95" value="<?php echo $data['NumEnd_listTR95'] ?>" placeholder="Enter number end 3" class="form-control" Required>
                
                  </div>

        </div>
      
<br>
      <button type="submit" name="update" class="subscribe btn btn-primary btn-block rounded-pill shadow-sm"> บันทึก </button>
      <a type="button" class="subscribe btn btn-danger btn-block rounded-pill shadow-sm" href="PaymentPage.php"> ยกเลิก  </a>
      </form>
          </div>
          <!--  End  -->

      </div>
    </div>
  </div>
</div>

<footer>
    <div class="p-1 bg-danger"></div>
    <div class="p-3 bg-warning text-center text-black">(กรณีศึกษาปั๊มน้ำมัน KB Petroleum)</div>
</footer>