
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
      <h1>ฟอร์มเพิ่มข้อมูลผู้ค้างจ่าย</h1>
    </div>
  </div>
  <!-- End -->
  
  <script language="JavaScript">
	    function chkNumber(ele)
	{
	    var vchar = String.fromCharCode(event.keyCode);
	        if ((vchar<'0' || vchar>'9')) return false;
	    ele.onKeyPress=vchar;
	}
  </script>

  <div class="row">
    <div class="col-lg-7 mx-auto">
      <div class="bg-white rounded-lg shadow-sm p-5">
        <div class="tab-content">

          <!-- credit card info-->
          <div id="nav-tab-card" class="tab-pane fade show active">
            <form role="form"  action="AddCus.php" method="post" enctype="multipart/form-data" >
              <div class="form-group">
              <input type="Date" value="<?php echo date('Y-m-d');?>" name="Date_cus" class="form-control" disabled>
                <input type="hidden" value="<?php echo date('Y-m-d');?>" name="Date_cus" class="form-control">           
              </div>

              <div class="form-group">
                <label for="Company_name">ชื่อบริษัท/สังกัด :</label>
                <select type="text" name="Company_name" class="form-control" required>
                         <option value="บริษัทยาง">บริษัทยาง</option>
                         <option value="บริษัทไม้">บริษัทไม้</option>
                         <option value="บุคคลทั่วไป">บุคคลทั่วไป</option>
                </select>
              </div>

              <div class="form-group">
                <label for="Cus_name">ชื่อผู้รับ:</label>
                <input type="text" name="Cus_name" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="Petrol_typeID">รหัสประเภทน้ำมัน :</label>
                <select type="text" name="Petrol_typeID" value="<?php echo $data['Petrol_typeID'] ?>" placeholder="Enter Petrol typeID" class="form-control">
                         <option value="แก๊สโซฮอล์ 95">G95</option>
                         <option value="แก๊สโซฮอล์ 91">G91</option>
                         <option value="ดีเซล B7">B7</option>
                </select>
              </div>

              <div class="form-group">
                <label for="Amount">จำนวน (บาท):</label>
                <input type="text" OnKeyPress="return chkNumber(this)" min="1" name="Amount" class="form-control" required>
              </div>


                </div>

              <button type="submit" name="add" class="subscribe btn btn-primary btn-block rounded-pill shadow-sm"> เพิ่มข้อมูล </button>
              <a type="button" class="subscribe btn btn-danger btn-block rounded-pill shadow-sm" href="CusName.php"> ยกเลิก  </a>
            </form>
          </div>
          <!-- End -->

      </div>
    </div>
  </div>
</div>

<footer>
    <div class="p-1 bg-danger"></div>
    <div class="p-3 bg-warning text-center text-black">(กรณีศึกษาปั๊มน้ำมัน KB Petroleum)</div>
</footer>
    <br><br>
</body>
</head>
</html>
<!-- 
<meta charset="utf-8" />
<php 
include('../phpmysql/dbconnect.php');

	$Cus_name = $_POST["Cus_name"];
  $Date_cus = $_POST["Date_cus"];
  $Petrol_typeID = $_POST["Petrol_typeID"];

	$check = " SELECT * 
	           FROM customer_name  
	           WHERE Cus_name = '$Cus_name'";

    $result1 = mysqli_query($conn, $check) or die(mysqli_error());
    $num=mysqli_num_rows($result1);

    if($num > 0)
    {
    echo "<script>";
    echo "alert(' ข้อมูลซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
    echo "window.history.back();";
    echo "</script>";
    }else{
	
	$sql = "INSERT INTO customer_name
	(Cus_name,Date_cus,Petrol_typeID)
	VALUES
	('$Cus_name','$Date_cus','$Petrol_typeID')";
	$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());

}
	mysqli_close($conn);
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('เพิ่มข้อมูลสำเร็จ');";
	echo "window.location = 'CusName.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'CusName.php'; ";
	echo "</script>";
}
?> -->