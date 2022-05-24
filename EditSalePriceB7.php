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
<br><br><br><br><br>
        <div><?php require_once("SearchMenu.php"); ?></div>


<?php
include('../phpmysql/dbconnect.php'); // Using database connection file here

$Date_SpriceB7 = $_GET['Date_SpriceB7']; // get id through query string

$qry = mysqli_query($conn,"select * ,round(S_priceB7,2) as S_priceB7 from Spriceb7 where Date_SpriceB7 ='$Date_SpriceB7'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $Date_SpriceB7 = $_POST['Date_SpriceB7'];
    $Petrol_typeIDB7 = $_POST['Petrol_typeIDB7'];
    // $Buy_price = $_POST['Buy_price'];
    $S_priceB7 = $_POST['S_priceB7']; 

    $edit = mysqli_query($conn,"UPDATE Spriceb7 
                                SET Date_SpriceB7='$Date_SpriceB7', 
                                    Petrol_typeIDB7 ='$Petrol_typeIDB7', 
                                    S_priceB7 ='$S_priceB7' 
                                WHERE Date_SpriceB7 ='$Date_SpriceB7'
                               ");
    if($edit)
    {
        // mysqli_close($conn); // Close connection
        echo "
        <script>
        window.location.href = 'SalePrice.php';
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
 // redirects to all records page
?>

<script language="JavaScript">
	    function chkNumber(ele)
	{
	    var vchar = String.fromCharCode(event.keyCode);
	        if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
	    ele.onKeyPress=vchar;
	}
  </script>

<div class="container py-5">

<!-- For demo purpose -->
<div class="row mb-4">
  <div class="col-lg-8 mx-auto text-center">

<h2>แก้ไขราคาน้ำมัน</h2>
</div>
</div>

<div class="row">
    <div class="col-lg-7 mx-auto">
      <div class="bg-white rounded-lg shadow-sm p-5">
        <div class="tab-content">

          <!-- credit card info-->
          <div id="nav-tab-card" class="tab-pane fade show active">

          <form role="form" method="POST">
          <div class="form-group">
            <label for="Date_SpriceB7">วันที่ :</label>
                <input type="Date" name="Date_SpriceB7" value="<?php echo $data['Date_SpriceB7']?>" placeholder="Enter Date" class="form-control text-dark" readonly="readonly">
                <!-- <input type="hidden" name="Date_Sprice" value="<php echo $data['Date_Sprice']?>" placeholder="Enter Date" class="form-control"> -->
          </div>

          <div class="form-group">
            <label for="Petrol_typeID">รหัสประเภทน้ำมัน :</label>
            <input type="text" name="Petrol_typeIDB7" style="background-color:rgba(255, 206, 86, 1)" value="<?php echo $data['Petrol_typeIDB7']?>" placeholder="Enter Petrol typeID" class="form-control bg-warning text-dark" readonly="readonly">

            
        </div>

        <!-- <div class="form-group">
            <label for="Date_price">ราคาซื้อ :</label>
                    <input type="text" name="Buy_price" value="<php echo $data['Buy_price'] ?>" placeholder="Enter Buy price" class="form-control" Required>
        </div> -->

        <div class="form-group">
            <label for="S_price">ราคาขาย :</label>
                    <input type="text" OnKeyPress="return chkNumber(this)" name="S_priceB7" value="<?php echo $data['S_priceB7'] ?>" placeholder="Enter Sale price" class="form-control" Required>
        </div>

</div>
      <button type="submit" name="update" class="subscribe btn btn-primary btn-block rounded-pill shadow-sm"> บันทึก </button>
      <a type="button" class="subscribe btn btn-danger btn-block rounded-pill shadow-sm" href="SalePrice.php"> ยกเลิก </a>
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