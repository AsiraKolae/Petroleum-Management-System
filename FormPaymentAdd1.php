<?php
include('../phpmysql/dbconnect.php');

$sql ="SELECT * FROM payment_list WHERE Date_list=CURDATE() - INTERVAL 1 DAY";

$query = mysqli_query($conn,$sql);

// while($data = mysqli_fetch_array($sql)){
  
?>
    
<!-- <php
  }
?> -->

<!DOCTYPE html>
<html>
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

    #myDIV {
  /* width: 100%;
  padding: 50px 0;
  text-align: center;
  background-color:  #FAC240;
  margin-top: 20px;
  display: none; */
}

body {
  background-color: #EEF2F7;
  font-family: arial, sans-serif;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 6px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 0px;
  font-size: 16px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 14px;}
}
  table {
    margin-right: 0px;
    margin-left: 0px;
    height: 300px;
    /* width:500px; */
  }

  h4 {
    margin-right: 150px;
    margin-left: 320px;
  }

  .date{
    margin-left: 1350px;
  }

  .fakeimg {
    height: 200px;
    background: #aaa;
}



  </style>
</head>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}

function myFunction() {
  var x = document.getElementById("myDIV");
  if (window.getComputedStyle(x).display === "none") {
    x.style.display = "block";
  }
  else {
    x.style.display = "none";
  }
}
</script>

<br><br><br><br><br>
        <div><?php require_once("SearchMenu.php"); ?></div>

<center>
<div class="card" style="position: relative;top: 100px;">
              <div class="card-header ui-sortable-handle">
                <h3 class="card-title">
                  ฟอร์มเพิ่มข้อมูล
                </h3>
              </div>
              <div class="card-body">
                <div class="tab-content p-0">
                <form method="POST" action="AddPayment.php" class="card-body">
    <div class="form-horizontal">
    <input type="Date" value="<?php echo date('Y-m-d');?>" name="Date_list">
    </div>
    <br>
    <center>
    <div class="form-inline">
        รหัสประเภทน้ำมัน : &nbsp; &nbsp;
        <select type="text" name="Petrol_typeID" laceholder="Enter Petrol typeID" class="form-control" Required>
          <option value="แก๊สโซฮอล์ 95">G95</option>
        </select>
        &nbsp; &nbsp;ตัวเลขเริ่มต้น:&nbsp;
        <input type="text" name="NumStart_list" class="form-control" Required>
        &nbsp; &nbsp;ตัวเลขสิ้นสุด:&nbsp;
        <input type="text" name="NumEnd_list" class="form-control"Required>
    </div>
    <br>
    <div class="form-inline">
        รหัสประเภทน้ำมัน :&nbsp; &nbsp;
        <select type="text" name="Petrol_typeID0" placeholder="Enter Petrol typeID" class="form-control" Required>
          <option value="แก๊สโซฮอล์ 91">G91</option>
        </select>
        &nbsp; &nbsp; ตัวเลขเริ่มต้น:&nbsp;
        <input type="text" name="NumStart_list0" class="form-control" Required>
        &nbsp; &nbsp; ตัวเลขสิ้นสุด:&nbsp;
        <input type="text" name="NumEnd_list0" class="form-control" Required>
      <br><br>
</div>
<br>
<div class="form-inline">
        รหัสประเภทน้ำมัน :&nbsp; &nbsp;
        <select type="text" name="Petrol_typeID1" placeholder="Enter Petrol typeID" class="form-control" Required>
          <option value="ดีเซล B7">B7</option>
        </select>
        &nbsp; &nbsp; &nbsp; &nbsp;ตัวเลขเริ่มต้น:&nbsp;
        <input type="text" name="NumStart_list1" class="form-control" Required>
        &nbsp; &nbsp;&nbsp; &nbsp;ตัวเลขสิ้นสุด:&nbsp;
        <input type="text" name="NumEnd_list1" class="form-control" Required>
      <br><br>
</div>
<br>
      <div class="form-horizontal">
      <input type="submit" class="btn btn-success" role="button" name="add" value="เพิ่มข้อมูล">
      <a href="PaymentPage.php" class="btn btn-warning" role="button" value="ยกเลิก">ยกเลิก</a>
</div>
		</form>
</center>

                  <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 5px;">
                  <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                      <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                      <div class=""></div>
                    </div>
                  </div>
                      <canvas id="revenue-chart-canvas" height="375" style="height: 300px; display: block; width: 656px;" width="820" class="chartjs-render-monitor"></canvas>
                   </div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 20px;">
                  <div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand">
                    <div class=""></div>
                  </div>
                  <div class="chartjs-size-monitor-shrink">
                    <div class=""></div>
                  </div>
                </div>
                    <canvas id="sales-chart-canvas" height="375" style="height: 300px; display: block; width: 676px;" width="845" class="chartjs-render-monitor"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <center>
<footer>
    <div class="p-1 bg-danger"></div>
    <div class="p-3 bg-warning text-center text-black">(กรณีศึกษาปั๊มน้ำมัน KB Petroleum)</div>
</footer>
    <br><br>
</body>
</html>