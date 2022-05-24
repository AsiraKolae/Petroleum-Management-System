<?php
//เรียกใช้งานไฟล์เชื่อมต่อฐานข้อมูล
include('../phpmysql/dbconnect3.php');
//คิวรี่ข้อมูลหาผมรวมยอดขายโดยใช้ SQL SUM
$sql = $conn->prepare("SELECT *
                      ,ROUND((NumEnd_list-NumStart_list)+(NumEnd_listT-NumStart_listT)+(NumEnd_listTR-NumStart_listTR)) AS Totol
                       DATE_FORMAT(Date_list, '%d') AS Date_list
                       FROM payment_list 
                       ORDER BY DATE_FORMAT(Date_list, '%d%') ASC");

$sql->execute();
$query = $sql->fetchAll();

//นำข้อมูลที่ได้จากคิวรี่มากำหนดรูปแบบข้อมุลให้ถูกโครงสร้างของกราฟที่ใช้ 
$Date_list = array();
$Totol = array();

foreach ($query as $data) {
  $Date_list[] = "\"".$data['Date_list']."\""; 
  $Totol[] = "\"".$data['Totol']."\""; 
}
//ตัด commar อันสุดท้ายโดยใช้ implode เพื่อให้โครงสร้างข้อมูลถูกต้องก่อนจะนำไปแสดงบนกราฟ
$Date_list = implode(",", $Date_list); 
$Totol = implode(",", $Totol); 

?>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script> -->
  </head>
  <p style="position: relative; left: -1px; top:10px;">ปริมาณน้ำมันที่จ่ายไป (ลิตร)</p>

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
                      labels: [<?php echo $Date_list;?>],
                      datasets: [{
                          label: 'แก๊สโซฮอล์ 95, แก๊สโซฮอล์ 91, ดีเซล B7',
                          data: [<?php echo $Total;?>
                          ],
                          backgroundColor: [
                              
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
                          ],
                          borderColor: [
                            
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
                              'rgba(255,99,132,1)'
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
             <p class="text-align:center">วันที่</p>
        </class=>
        <!-- <p1 style="position: relative; left: 644px; top:-42px">วันที่</p1> -->
  </body>
        </html>