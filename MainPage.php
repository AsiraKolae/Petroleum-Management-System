<?php
include('../phpmysql/dbconnect.php');

$sql ="SELECT * FROM Sprice95 WHERE Date_Sprice95 = CURDATE()";
  $query = mysqli_query($conn,$sql);
  $data = mysqli_fetch_array($query);

$sql0 ="SELECT * FROM Sprice91 WHERE Date_Sprice91 = CURDATE()";
  $query0 = mysqli_query($conn,$sql0);
  $data0 = mysqli_fetch_array($query0);

$sql1 ="SELECT * FROM Spriceb7 WHERE Date_SpriceB7 = CURDATE()";
  $query1 = mysqli_query($conn,$sql1);
  $data1 = mysqli_fetch_array($query1);
?>

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

/* ///////////////////////////////////// table //////////////// */
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: center;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 1px;
  padding-bottom: 1px;
  text-align: center;
  background-color: black;
  color: white;
}


/* table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td{
  padding: 5px;
  text-align: center;
}

tr:nth-child(even) {
  background-color: #dddddd;
} */
  </style>
</head>
<body>

<br><br><br><br><br>
        <div><?php require_once("SearchMenu.php"); ?></div>

<div class="date">
<?php 
 echo "วันนี้ " . date("d-m-Y") . "<br>";
?>
<br>

</div>
</div>
<!-- /////////////table/////////////// -->

<div class="row">
<div class="card" style="position: relative; left: 50px; right: 500px; top: 0px;">
              <div class="card-header ui-sortable-handle">
                <h3 class="card-title">
                <i class='fas fa-donate' style='font-size:36px'></i>
                  ราคาน้ำมันวันนี้ (บาท)
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a href="price.php">ดูราคาน้ำมันย้อนหลัง</a>
                    </li>
                    <!-- <li class="nav-item">
                      <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                    </li> -->
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                <table id="customers">
                    <tr>
                     <th>ชื่อประเภทน้ำมัน</th>
                     <th>ราคาน้ำมัน (บาท/ลิตร)</th>
                     <!-- <th>กำไร</th> -->
                    </tr>
                 <!-- <php foreach($query as $data){ ?> -->
                    <tr>
                      
                     <td style="background-color:rgba(255,99,132,1)"><?php echo $data['Petrol_typeID95']?></td>
                     <td><?php echo $data['S_price95']?></td>
                    </tr>
                    <tr>
                     <td style="background-color:rgba(75, 192, 192, 1)"><?php echo $data0['Petrol_typeID91']?></td>
                     <td><?php echo $data0['S_price91']?></td>
                    </tr>
                    <tr>
                     <td style="background-color:rgba(255, 206, 86, 1)"><?php echo $data1['Petrol_typeIDB7']?></td>
                     <td><?php echo $data1['S_priceB7']?></td>
                    </tr>
                 <!-- <php } ?> -->
                </table>

                  <!-- Morris chart - Sales -->
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
              </div><!-- /.card-body -->
            </div>


            <!-- อันที่ 2 -->
            <div class="card" style="position: relative; left: 100px; top: 0px;">
              <div class="card-header ui-sortable-handle">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  กราฟราคาน้ำมัน (ราคาขาย)
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a href="graphAllPrice0.php">ราคาซื้อ</a>
                    </li>
                    &nbsp;&nbsp;&nbsp; 
                  <!-- <li class="nav-item">
                      <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                    </li>  -->
                  </ul>
                  </div> 
                  <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                  <li class="nav-item">
                      <a href="graphAllPrice.php">ราคาขาย</a>
                  </li>
                  </ul>
                </div>
              </div>
              <div class="card-body">
                <div class="tab-content p-0">
                <!-- <div><php require_once("testedit.php"); ?></div> -->
                <div><?php require_once("graphAllPrice.php"); ?></div>
               
                  <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 5px;">
                  <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand"><div class=""></div>
                  </div>
                  <div class="chartjs-size-monitor-shrink">
                    <div class=""></div>
                  </div>
                </div>
                      <canvas id="revenue-chart-canvas" height="375" style="height: 300px; display: block; width: 656px;" width="820" class="chartjs-render-monitor"></canvas>
                   </div>
                   
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                  <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                      <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink"
                    ><div class=""></div>
                  </div>
                </div>
                    <canvas id="sales-chart-canvas" height="375" style="height: 300px; display: block; width: 676px;" width="845" class="chartjs-render-monitor"></canvas>
                  </div>
                </div>
              </div><!-- /.card-body -->
            </div>
</div>                   

<br><br>

<div class="row">
<div class="card" style="position: relative; left: 50px; right: 500px; top: 0px;">
              <div class="card-header ui-sortable-handle">
                <h3 class="card-title">
                <i class='fas fa-donate' style='font-size:36px'></i>
                  ปริมาณน้ำมันที่ขายไปเมื่อวานและวันนี้ (ลิตร)
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a href="PaymentPage.php">ดูปริมาณน้ำมันที่ขายไปย้อนหลัง</a>
                    </li>
                    <!-- <li class="nav-item">
                      <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                    </li> -->
                  </ul>
                </div>
              </div>
              <div class="card-body">
                <div class="tab-content p-0">
                <!-- <table class="table table-striped"> -->
                <div><?php require_once("PaymentDnY.php"); ?></div>
                <!-- </table> -->
                  <!-- Morris chart - Sales -->
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
              </div><!-- /.card-body -->
            </div>



             <!-- อันที่ 2 -->
             <div class="card" style="position: relative; left: 100px; top: 0px;">
              <div class="card-header ui-sortable-handle">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  กราฟรายการจ่าย
                </h3>
                <h6>(จำนวนน้ำมันที่ขายไป (ลิตร))</h6>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a href="graphPayment.php">View</a>
                    </li>
                    <!-- <li class="nav-item">
                      <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                    </li> -->
                  </ul>
                </div>
              </div>
              <div class="card-body">
                <div class="tab-content p-0">
                <div><?php require_once("graphPayment.php"); ?></div>
                  <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 5px;">
                  <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand"><div class=""></div>
                  </div>
                  <div class="chartjs-size-monitor-shrink">
                    <div class=""></div>
                  </div>
                </div>
                      <canvas id="revenue-chart-canvas" height="375" style="height: 300px; display: block; width: 656px;" width="820" class="chartjs-render-monitor"></canvas>
                   </div>
                   
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                  <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                      <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink"
                    ><div class=""></div>
                  </div>
                </div>
                    <canvas id="sales-chart-canvas" height="375" style="height: 300px; display: block; width: 676px;" width="845" class="chartjs-render-monitor"></canvas>
                  </div>
                </div>
              </div>
            </div>    
             
</div>

<br><br>
<div class="row">
<div class="card" style="position: relative; left: 50px; right: 0px; top: 0px;">
              <div class="card-header ui-sortable-handle">
                <h3 class="card-title">
                <i class='fas fa-donate' style='font-size:36px'></i>
                  ปริมาณน้ำมันคงเหลือวันนี้ (ลิตร)
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a href="Amount.php">ดูปริมาณน้ำมันคงเหลือย้อนหลัง</a>
                    </li>
                    <!-- <li class="nav-item">
                      <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                    </li> -->
                  </ul>
                </div>
              </div>
              <div class="card-body">
                <div class="tab-content p-0">
                <!-- <table class="table table-striped"> -->
                <div><?php require_once("AmountMainPage.php"); ?></div>
                <!-- </table> -->
                  <!-- Morris chart - Sales -->
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
              </div><!-- /.card-body -->
            </div>


<!-- อันที่ 2 -->
<div class="card" style="position: relative; left: 100px; top: 0px;">
              <div class="card-header ui-sortable-handle">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  กราฟปริมาณน้ำมันคงเหลือวันนี้ (ลิตร)
                </h3>
                <!-- <h6>(ลิตร)</h6> -->
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a href="graphAllAmount.php">View</a>
                    </li>
                    <!-- <li class="nav-item">
                      <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                    </li> -->
                  </ul>
                </div>
              </div>
              <div class="card-body">
                <div class="tab-content p-0">
                <div><?php require_once("graphAllAmount.php"); ?></div>
                  <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 5px;">
                  <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand"><div class=""></div>
                  </div>
                  <div class="chartjs-size-monitor-shrink">
                    <div class=""></div>
                  </div>
                </div>
                      <canvas id="revenue-chart-canvas" height="375" style="height: 300px; display: block; width: 656px;" width="820" class="chartjs-render-monitor"></canvas>
                   </div>
                   
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                  <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                      <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink"
                    ><div class=""></div>
                  </div>
                </div>
                    <canvas id="sales-chart-canvas" height="375" style="height: 300px; display: block; width: 676px;" width="845" class="chartjs-render-monitor"></canvas>
                  </div>
                </div>
              </div>
            </div>    
             
</div>
</div>






<?php
include('../phpmysql/dbconnect.php');
$sql ="SELECT * FROM payment_list WHERE Date_list=CURDATE()";
$query = mysqli_query($conn,$sql);
?>

<br><br><br><br><br><br><br><br><br>
<footer>
    <div class="p-1 bg-danger"></div>
    <div class="p-3 bg-warning text-center text-black">(กรณีศึกษาปั๊มน้ำมัน KB Petroleum)</div>
</footer>
</body>
</html>


