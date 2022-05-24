<?php
//เรียกใช้งานไฟล์เชื่อมต่อฐานข้อมูล
include('../phpmysql/dbconnect2.php');
//คิวรี่ข้อมูลหาผมรวมยอดขายโดยใช้ SQL SUM
$sql = $conn->prepare("SELECT *, 
                       DATE_FORMAT(Date_price, '%d') AS Date_price
                       FROM price 
                       ORDER BY DATE_FORMAT(Date_price, '%d%') ASC");
                       

$sql->execute();
$query = $sql->fetchAll();

//นำข้อมูลที่ได้จากคิวรี่มากำหนดรูปแบบข้อมุลให้ถูกโครงสร้างของกราฟที่ใช้ 
$Date_price = array();
$B_price = array();
$S_price = array();
$Petrol_typeID = array();
foreach ($query as $data) {
  $Date_price[] = "\"".$data['Date_price']."\""; 
  $B_price[] = "\"".$data['B_price']."\""; 
  $S_price[] = "\"".$data['S_price']."\""; 
  $Petrol_typeID[] = "\"".$data['Petrol_typeID']."\""; 
}
//ตัด commar อันสุดท้ายโดยใช้ implode เพื่อให้โครงสร้างข้อมูลถูกต้องก่อนจะนำไปแสดงบนกราฟ
$Date_price = implode(",", $Date_price); 
$B_price = implode(",", $B_price); 
$S_price = implode(",", $S_price); 
$Petrol_typeID = implode(",", $Petrol_typeID);

?>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script> -->
  </head>
  <p style="position: relative; left: -1px; top:10px;">ราคาน้ำมัน (ราคาขาย)</p>

  <body>
  <!-- <p style="position: relative; left: 10px; top:50px">ราคาน้ำมัน</p> -->
       <!-- <div class="row"> -->
        <!-- <div class="col-md-6" class="container" style="width:600px;"> <br> -->
              <canvas id="myChart" width="5px" height="2px"></canvas>
              <script>
              var ctx = document.getElementById("myChart").getContext('2d');
              var myChart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                      labels: [<?php echo $Date_price;?>],
                      datasets: [{
                          label: 'แก๊สโซฮอล์ 95, แก๊สโซฮอล์ 91, ดีเซล B7',
                          data: [<?php echo $S_price;?>
                          ],
                          backgroundColor: [
                              'rgba(255,99,132,1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(255,99,132,1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(255,99,132,1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(255,99,132,1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(255,99,132,1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(255,99,132,1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(255,99,132,1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(255,99,132,1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(255,99,132,1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(255,99,132,1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(255,99,132,1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(255,99,132,1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(255,99,132,1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(255,99,132,1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(255,99,132,1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(255,99,132,1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(255, 206, 86, 1)'
                          ],
                          borderColor: [
                              'rgba(255,99,132,1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(255,99,132,1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(255,99,132,1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(255,99,132,1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(255,99,132,1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(255,99,132,1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(255,99,132,1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(255,99,132,1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(255,99,132,1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(255,99,132,1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(255,99,132,1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(255,99,132,1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(255,99,132,1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(255,99,132,1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(255,99,132,1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(255,99,132,1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(255,99,132,1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(255,99,132,1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(255, 206, 86, 1)'
                          ],
                          borderWidth: 1
                      }]
                  },
            
                  options: {
                      scales: {
                          yAxes:[{ 
                              ticks: { 
                                
                                  beginAtZero:true
                              }
                          }]
                      }
                  }
              });
              </script>  
             <p class='text-center text-black'>วันที่</p>
        </class=>
        <!-- <p1 style="position: relative; left: 644px; top:-42px">วันที่</p1> -->
  </body>
        </html>