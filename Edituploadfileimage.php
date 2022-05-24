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

$imgID = $_GET['imgID']; // get id through query string

$qry = mysqli_query($conn,"select * from receive_list where imgID='$imgID'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
   // $filename = $_FILES['uploadFile']['name'];
   // $filetmpname = $_FILES['uploadFile']['tmp_name'];
    // $imgID = $_POST['imgID'];
    $filename = $_POST['imagename'];
    $Date_receive = $_POST['Date_receive'];
    $Petrol_typeID = $_POST['Petrol_typeID'];
    $Receipt_num = $_POST['Receipt_num'];
    $Received_amount = $_POST['Received_amount'];
    $Name1 = $_POST['Name1'];
    $CompanyName = $_POST['CompanyName'];
    $folder = 'imagesuploadedf/';

    $edit = mysqli_query($conn,"UPDATE receive_list 
                                SET Date_receive='$Date_receive', 
                                    Petrol_typeID='$Petrol_typeID',
                                    Receipt_num='$Receipt_num',
                                    Received_amount='$Received_amount',
                                    Name1 ='$Name1',
                                    CompanyName ='$CompanyName',
                                    imagename='$filename' 
                                WHERE imgID='$imgID'
                               ");
   // $sql = "INSERT INTO `receive_list` (`Date_receive`,`Petrol_typeID`,`Receipt_num`,`Received_amount`,`imagename`) VALUES ('$Date_receive','$Petrol_typeID','$Receipt_num','$Received_amount','$filename')";

    if($edit)
    {
         // mysqli_close($conn); // Close connection
         echo "
         <script>
         window.location.href = 'uploadfileimage.php';
         </script>; 
         ";
         // header("location:CusName.php"); // redirects to all records page
         // exit;
    }
    else
    {
        // echo mysqli_error();
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

<div class="container py-5">

<!-- For demo purpose -->
<div class="row mb-4">
  <div class="col-lg-8 mx-auto text-center">
  <h2>แก้ไขรายการรับ</h2>
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
            <label for="Date_receive">วันที่รับ :</label>
                <input type="Date" name="Date_receive" value="<?php echo $data['Date_receive']?>" placeholder="Enter Date" class="form-control" readonly="readonly">
                <!-- <input type="hidden" name="Date_receive" value="<php echo $data['Date_receive']?>" placeholder="Enter Date" class="form-control"> -->
          </div>


          <div class="form-group">
            <label for="Petrol_typeID">รหัสประเภทน้ำมัน :</label>
                    <select type="text" name="Petrol_typeID" value="<?php echo $data['Petrol_typeID'] ?>" placeholder="Enter Petrol typeID" class="form-control">
                            <option value="แก๊สโซฮอล์ 95" style="background-color:rgba(255,99,132,1)">G95</option>
                            <option value="แก๊สโซฮอล์ 91" style="background-color:rgba(75, 192, 192, 1)">G91</option>
                            <option value="ดีเซล B7" style="background-color:rgba(255, 206, 86, 1)">B7</option>
                    </select>
          </div>   

          <div class="form-group">
            <label for="Receipt_num">หลักฐานการรับ :</label>
                    <input type="text" name="Receipt_num" value="<?php echo $data['Receipt_num'] ?>" placeholder="Enter Receipt number" class="form-control">
          </div>

          <div class="form-group">
            <label for="Received_amount">จำนวนที่รับ :</label>
                    <input type="text" OnKeyPress="return chkNumber(this)" name="Received_amount" value="<?php echo $data['Received_amount'] ?>" placeholder="Enter Received amount" class="form-control">
          </div>

          <div class="form-group">
            <label for="Name1">ชื่อ-สกุล (ผู้ส่ง) :</label>
                    <input type="text" name="Name1" value="<?php echo $data['Name1'] ?>" placeholder="Enter Name" class="form-control">
          </div>

          <div class="form-group">
            <label for="CompanyName">ชื่อบริษัท/สังกัด :</label>
                    <input type="text" name="CompanyName" value="<?php echo $data['CompanyName'] ?>" placeholder="Enter Company Name" class="form-control">
          </div>

          <div class="form-group">
            <label for="imagename">หลักฐานการรับ :</label>
                    <input type="file" name="imagename" value="<?php echo $data['imagename']?>" placeholder="Enter image name" class="form-control">
          </div>

          </div>
      <button type="submit" name="update" class="subscribe btn btn-primary btn-block rounded-pill shadow-sm"> บันทึก </button>
      <a type="button" class="subscribe btn btn-danger btn-block rounded-pill shadow-sm" href="uploadfileimage.php">ยกเลิก</a>
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
</body>
</html>