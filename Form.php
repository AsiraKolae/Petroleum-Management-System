<?php
include('../phpmysql/dbconnect.php');

$sql = "SELECT *
           ,ROUND((NumEnd_list95-NumStart_list95)+(NumEnd_listT95-NumStart_listT95)+(NumEnd_listTR95-NumStart_listTR95),2) AS payment95
           ,ROUND((NumEnd_list91-NumStart_list91)+(NumEnd_listT91-NumStart_listT91)+(NumEnd_listTR91-NumStart_listTR91),2) AS payment91
           ,ROUND((NumEnd_listB7-NumStart_listB7)+(NumEnd_listTB7-NumStart_listTB7)+(NumEnd_listTRB7-NumStart_listTRB7),2) AS paymentB7

       FROM Bprice95 
       LEFT JOIN Sprice95 ON Sprice95.Date_Sprice95=Bprice95.Date_Bprice95 AND Sprice95.Petrol_typeID95 = Bprice95.Petrol_typeID95
       LEFT JOIN payment_list95 ON Bprice95.Date_Bprice95=payment_list95.Date_list95 AND Bprice95.Petrol_typeID95 = payment_list95.Petrol_typeID95
       LEFT JOIN Sprice91 ON Sprice91.Date_Sprice91=Bprice95.Date_Bprice95 
       LEFT JOIN Bprice91 ON Bprice91.Date_Bprice91=Sprice91.Date_Sprice91 AND Sprice91.Petrol_typeID91 = Sprice91.Petrol_typeID91 
       LEFT JOIN payment_list91 ON payment_list91.Date_list91=Bprice91.Date_Bprice91 AND payment_list91.Petrol_typeID91=Bprice91.Petrol_typeID91
       LEFT JOIN Spriceb7 ON Spriceb7.Date_SpriceB7=Bprice95.Date_Bprice95 
       LEFT JOIN Bpriceb7 ON Bpriceb7.Date_BpriceB7=Spriceb7.Date_SpriceB7 AND Spriceb7.Petrol_typeIDB7 = Spriceb7.Petrol_typeIDB7 
       LEFT JOIN payment_listb7 ON payment_listb7.Date_listB7=Bpriceb7.Date_BpriceB7 AND payment_listb7.Petrol_typeIDB7=Bpriceb7.Petrol_typeIDB7
       
       WHERE Date_Bprice95 LIKE '%".$strKeyword."%'
       GROUP BY Date_Bprice95
       ORDER BY Date_list95 DESC LIMIT 5";

$query = mysqli_query($conn,$sql);

// $sql ="SELECT * 
//       ,ROUND(S_price95,2) AS S_price95
//       ,ROUND(B_price95,2) AS B_price95
//        FROM Sprice95,Bprice95 
//        WHERE Date_Sprice95 = CURDATE() - INTERVAL 1 DAY";

//   $query = mysqli_query($conn,$sql);
//   $data = mysqli_fetch_array($query);

// $sql0 ="SELECT *
//         ,ROUND(S_price91,2) AS S_price91
//         ,ROUND(B_price91,2) AS B_price91
//         FROM Sprice91,Bprice91 
//         WHERE Date_Sprice91 = CURDATE() - INTERVAL 1 DAY";

//   $query0 = mysqli_query($conn,$sql0);
//   $data0 = mysqli_fetch_array($query0);

// $sql1 ="SELECT * 
//         ,ROUND(S_priceB7,2) AS S_priceB7
//         ,ROUND(B_priceB7,2) AS B_priceB7
//         FROM Spriceb7,Bpriceb7
//         WHERE Date_SpriceB7 = CURDATE() - INTERVAL 1 DAY";

// $query1 = mysqli_query($conn,$sql1);
// $data1 = mysqli_fetch_array($query1);
  
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

<div class="container py-5">

  <!-- For demo purpose -->
  <div class="row mb-4">
    <div class="col-lg-8 mx-auto text-center">
    <!-- class="display-6" -->
    <br>
      <h1>??????????????????????????????????????????????????????????????????????????????</h1>
    </div>
  </div>
  <!-- End -->

  <script language="JavaScript">
	    function chkNumber(ele)
	{
	    var vchar = String.fromCharCode(event.keyCode);
	        if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
	    ele.onKeyPress=vchar;
	}
  </script>


<!-- <php 
$Date_Bprice =$_POST['Date_Bprice'];
if (count(array_unique( array_diff_assoc($Date_Bprice, array_unique($Date_Bprice)))) > 3)
{
   //statement
}
?> -->

  <div class="row">
    <div class="col-lg-10 mx-auto">
      <div class="bg-white rounded-lg shadow-sm p-4">
        <div class="tab-content">

          <!-- credit card info-->
          <div id="nav-tab-card" class="tab-pane fade show active">
            <form role="form"  action="AddPrice.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <input type="Date" value="<?php echo date('Y-m-d');?>" name="Date_Bprice95" class="form-control text-dark" readonly="readonly">
                <!-- <input type="hidden" value="<php echo date('Y-m-d');?>" name="Date_Bprice" class="form-control"> -->
              </div>

              <div class="form-inline">
                <label for="Petrol_typeID">???????????????????????????????????????????????? :</label>&nbsp; &nbsp;
                <input type="text" class="form-control" style="background-color:rgba(255,99,132,1)" name="Petrol_typeID95" value="?????????????????????????????? 95" readonly="readonly">

               &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
               <!-- <label for="Petrol_typeID0">???????????????????????????????????????????????? :</label> -->
               <input type="text" class="form-control" style="background-color:rgba(75, 192, 192, 1)" name="Petrol_typeID91" value="?????????????????????????????? 91" readonly="readonly">
              
               &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
               <!-- <label for="Petrol_typeID1">???????????????????????????????????????????????? :</label> -->
               <input type="text" class="form-control" style="background-color:rgba(255, 206, 86, 1)" name="Petrol_typeIDB7" value="??????????????? B7" readonly="readonly">
         
              </div><br>

    
              <div class="form-inline">
                <label for="B_price">???????????????????????? :</label>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                <input type="text" OnKeyPress="return chkNumber(this)" min="1" name="B_price95" value="<?php echo $data["B_price95"] ?>" class="form-control">

                &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                <!-- <label for="B_price0">????????????????????????:</label> -->
                <input type="text" OnKeyPress="return chkNumber(this)" min="1" name="B_price91" value="<?php echo $data0["B_price91"] ?>" class="form-control">

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
                <!-- <label for="B_price1">????????????????????????:</label> -->
                <input type="text" OnKeyPress="return chkNumber(this)" min="1" name="B_priceB7" value="<?php echo $data1["B_priceB7"] ?>" class="form-control">
  
              </div><br>

              <div class="form-inline">
                <label for="S_price">????????????????????? :</label>&nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" OnKeyPress="return chkNumber(this)" min="1" name="S_price95" value="<?php echo $data["S_price95"] ?>" class="form-control">
              
                &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
                <!-- <label for="S_price0">?????????????????????:</label> -->
                <input type="text" OnKeyPress="return chkNumber(this)" min="1" name="S_price91" value="<?php echo $data0["S_price91"] ?>" class="form-control">

                &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                <!-- <label for="S_price1">?????????????????????:</label> -->
                <input type="text" OnKeyPress="return chkNumber(this)" min="1" name="S_priceB7" value="<?php echo $data1["S_priceB7"] ?>" class="form-control">
           

                </div><br>


              <!-- <div class="form-group">
                <label for="Petrol_typeID0">???????????????????????????????????????????????? :</label>
                <input type="text" class="form-control" name="Petrol_typeID0" value="?????????????????????????????? 91" disabled>
               <input type="hidden" class="form-control" name="Petrol_typeID0" value="?????????????????????????????? 91">
              </div> -->

              <!-- <div class="form-group">
                <label for="B_price0">????????????????????????:</label>
                <input type="text" name="B_price0" value="<php echo $data0["B_price"] ?>" class="form-control">
              </div> -->

              <!-- <div class="form-group">
                <label for="S_price0">?????????????????????:</label>
                <input type="text" name="S_price0" value="<php echo $data0["S_price"] ?>" class="form-control">
              </div> -->
              
                </div>

              <!-- <div class="form-group">
                <label for="Petrol_typeID1">???????????????????????????????????????????????? :</label>
                <input type="text" class="form-control" name="Petrol_typeID1" value="??????????????? B7" disabled>
               <input type="hidden" class="form-control" name="Petrol_typeID1" value="??????????????? B7">
              </div> -->

              <!-- <div class="form-group">
                <label for="B_price1">????????????????????????:</label>
                <input type="text" name="B_price1" value="<php echo $data1["B_price"] ?>" class="form-control">
              </div> -->

              <!-- <div class="form-group">
                <label for="S_price1">?????????????????????:</label>
                <input type="text" name="S_price1" value="<php echo $data1["S_price"] ?>" class="form-control">
              </div> -->
              
              
              <button type="submit" name="add" value="upload" class="subscribe btn btn-primary btn-block rounded-pill shadow-sm"> ????????????????????????????????? </button>
              <a type="button" class="subscribe btn btn-danger btn-block rounded-pill shadow-sm" href="price.php"> ?????????????????? </a>
            </form>
          </div>
          <!-- End -->

      </div>
    </div>
  </div>
</div>

<br><br><br>
<footer>
    <div class="p-1 bg-danger"></div>
    <div class="p-3 bg-warning text-center text-black">(????????????????????????????????????????????????????????? KB Petroleum)</div>
</footer>
    <br><br>
</body>
</head>
</html>
