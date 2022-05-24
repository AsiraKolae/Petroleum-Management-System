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

$id = $_GET['id']; // get id through query string

$qry = mysqli_query($conn,"select * from price where id='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $Date_price = $_POST['Date_price'];
    $Petrol_typeID = $_POST['Petrol_typeID'];
    $Buy_price = $_POST['Buy_price'];
    $Sale_price = $_POST['Sale_price']; 

    $edit = mysqli_query($conn,"UPDATE price 
                                SET Date_price='$Date_price', 
                                    Petrol_typeID='$Petrol_typeID', 
                                    Buy_price='$Buy_price', 
                                    Sale_price ='$Sale_price' 
                                WHERE id='$id'
                               ");
    if($edit)
    {
        // mysqli_close($conn); // Close connection
        echo "
        <script>
        window.location.href = 'price.php';
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
            <label for="Date_price">วันที่ :</label>
                <input type="Date" name="Date_price" value="<?php echo $data['Date_price']?>" placeholder="Enter Date" class="form-control" disabled>
                <input type="hidden" name="Date_price" value="<?php echo $data['Date_price']?>" placeholder="Enter Date" class="form-control">
               </div>
  
          <div class="form-group">
            <label for="Petrol_typeID">รหัสประเภทน้ำมัน :</label>
                    <select type="text" name="Petrol_typeID" value="<?php echo $data['Petrol_typeID'] ?>" placeholder="Enter Petrol typeID" class="form-control" Required>
                              <option value="แก๊สโซฮอล์ 95" style="background-color:rgba(255,99,132,1)">G95</option>
                              <option value="แก๊สโซฮอล์ 91" style="background-color:rgba(75, 192, 192, 1)">G91</option>
                              <option value="ดีเซล B7" style="background-color:rgba(255, 206, 86, 1)">B7</option>
                    </select>
        </div>
        
        <div class="form-group">
            <label for="Date_price">ราคาซื้อ :</label>
                    <input type="text" OnKeyPress="return chkNumber(this)" name="Buy_price" value="<?php echo $data['Buy_price'] ?>" placeholder="Enter Buy price" class="form-control" Required>
        </div>

        <div class="form-group">
            <label for="Date_price">ราคาขาย :</label>
                    <input type="text" OnKeyPress="return chkNumber(this)" name="Sale_price" value="<?php echo $data['Sale_price'] ?>" placeholder="Enter Sale price" class="form-control" Required>
        </div>

</div>
      <button type="submit" name="update" class="subscribe btn btn-primary btn-block rounded-pill shadow-sm"> บันทึก </button>
      <a type="button" class="subscribe btn btn-danger btn-block rounded-pill shadow-sm" href="price.php"> ยกเลิก </a>
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