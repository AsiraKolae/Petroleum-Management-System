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

$Date_Sprice95 = $_GET['Date_Sprice95']; // get id through query string

$qry = mysqli_query($conn,"select * ,round(S_price95,2) as S_price95 from Sprice95 where Date_Sprice95 ='$Date_Sprice95'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $Date_Sprice95 = $_POST['Date_Sprice95'];
    $Petrol_typeID95 = $_POST['Petrol_typeID95'];
    // $Buy_price = $_POST['Buy_price'];
    $S_price95 = $_POST['S_price95']; 

    $edit = mysqli_query($conn,"UPDATE Sprice95 
                                SET Date_Sprice95='$Date_Sprice95', 
                                    Petrol_typeID95 ='$Petrol_typeID95', 
                                    S_price95 ='$S_price95' 
                                WHERE Date_Sprice95 ='$Date_Sprice95'
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
            <label for="Date_Sprice95">?????????????????? :</label>
                <input type="Date" name="Date_Sprice95" value="<?php echo $data['Date_Sprice95']?>" placeholder="Enter Date" class="form-control text-dark" readonly="readonly">
                <!-- <input type="hidden" name="Date_Sprice" value="<php echo $data['Date_Sprice']?>" placeholder="Enter Date" class="form-control"> -->
          </div>
  
          <div class="form-group">
            <label for="Petrol_typeID">???????????????????????????????????????????????? :</label>
            <input type="text" name="Petrol_typeID95" style="background-color:rgba(255,99,132,1)" value="<?php echo $data['Petrol_typeID95']?>" placeholder="Enter Petrol typeID" class="form-control bg-danger text-dark" readonly="readonly">

           
        </div>

        <!-- <div class="form-group">
            <label for="Date_price">???????????????????????? :</label>
                    <input type="text" name="Buy_price" value="<php echo $data['Buy_price'] ?>" placeholder="Enter Buy price" class="form-control" Required>
        </div> -->

        <div class="form-group">
            <label for="S_price">????????????????????? :</label>
                    <input type="text" OnKeyPress="return chkNumber(this)" name="S_price95" value="<?php echo $data['S_price95'] ?>" placeholder="Enter Sale price" class="form-control text-dark" Required>
        </div>

</div>
      <button type="submit" name="update" class="subscribe btn btn-primary btn-block rounded-pill shadow-sm"> ?????????????????? </button>
      <a type="button" class="subscribe btn btn-danger btn-block rounded-pill shadow-sm" href="SalePrice.php"> ?????????????????? </a>
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