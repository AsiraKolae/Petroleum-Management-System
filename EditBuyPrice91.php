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

$Date_Bprice91 = $_GET['Date_Bprice91']; // get id through query string

$qry = mysqli_query($conn,"select * from Bprice91 where Date_Bprice91 ='$Date_Bprice91'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $Date_Bprice91 = $_POST['Date_Bprice91'];
    $Petrol_typeID91 = $_POST['Petrol_typeID91'];
    $B_price91 = $_POST['B_price91'];
    // $Sale_price = $_POST['Sale_price']; 

    $edit = mysqli_query($conn,"UPDATE Bprice91 
                                SET Date_Bprice91 ='$Date_Bprice91', 
                                    Petrol_typeID91 ='$Petrol_typeID91', 
                                    B_price91 ='$B_price91' 
                                WHERE Date_Bprice91 ='$Date_Bprice91'
                               ");
    if($edit)
    {
        // mysqli_close($conn); // Close connection
        echo "
        <script>
        window.location.href = 'BuyPrice.php';
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
	        if ((vchar<'0' || vchar>'9') && (vchar != '.') && (vchar != ',')) return false;
	    ele.onKeyPress=vchar;
	}
  </script>

<div class="container py-5">

<!-- For demo purpose -->
<div class="row mb-4">
  <div class="col-lg-8 mx-auto text-center">

<h2>?????????????????????????????????????????????</h2>
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
            <label for="Date_Bprice91">?????????????????? :</label>
                <input type="Date" name="Date_Bprice91" value="<?php echo $data['Date_Bprice91']?>" placeholder="Enter Date" class="form-control" readonly="readonly">
                <!-- <input type="hidden" name="Date_Bprice" value="<php echo $data['Date_Bprice']?>" placeholder="Enter Date" class="form-control"> -->
          </div>
  
          <div class="form-group">
            <label for="Petrol_typeID">???????????????????????????????????????????????? :</label>
            <input  type="text" name="Petrol_typeID91" style="background-color:rgba(75, 192, 192, 1)" value="<?php echo $data['Petrol_typeID91'] ?>" placeholder="Enter Petrol typeID" class="form-control bg-success text-dark" readonly="readonly">

            
        </div>

        <div class="form-group">
            <label for="B_price91">???????????????????????? :</label>
                    <input type="text" OnKeyPress="return chkNumber(this)" name="B_price91" value="<?php echo $data['B_price91'] ?>" placeholder="Enter Buy price" class="form-control" Required>
        </div>

        <!-- <div class="form-group">
            <label for="Date_price">????????????????????? :</label>
                    <input type="text" name="Sale_price" value="<php echo $data['Sale_price'] ?>" placeholder="Enter Sale price" class="form-control" Required>
        </div> -->

</div>
      <button type="submit" name="update" class="subscribe btn btn-primary btn-block rounded-pill shadow-sm"> ?????????????????? </button>
      <a type="button" class="subscribe btn btn-danger btn-block rounded-pill shadow-sm" href="BuyPrice.php"> ?????????????????? </a>
      </form>
          </div>
          <!--  End  -->

      </div>
    </div>
  </div>
</div>

<footer>
    <div class="p-1 bg-danger"></div>
    <div class="p-3 bg-warning text-center text-black">(????????????????????????????????????????????????????????? KB Petroleum)</div>
</footer>