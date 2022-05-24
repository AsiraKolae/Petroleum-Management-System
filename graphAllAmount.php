<?php
//เรียกใช้งานไฟล์เชื่อมต่อฐานข้อมูล
include('../phpmysql/dbconnect3.php');
//คิวรี่ข้อมูลหาผมรวมยอดขายโดยใช้ SQL SUM
$sql = $conn1->prepare("SELECT *
                      --  ,ROUND((NumEnd_list-NumStart_list)+(NumEnd_listT-NumStart_listT)+(NumEnd_listTR-NumStart_listTR)) AS Totol
                      --  ,ROUND((NumEnd_list91-NumStart_list91)+(NumEnd_listT91-NumStart_listT91)+(NumEnd_listTR91-NumStart_listTR91)) AS Totol91
                      --  ,ROUND((NumEnd_listB7-NumStart_listB7)+(NumEnd_listTB7-NumStart_listTB7)+(NumEnd_listTRB7-NumStart_listTRB7)) AS TotolB7
                       ,DATE_FORMAT(Date_Amount, '%d') AS Date_Amount
                       FROM amount_table
                       WHERE Date_Amount = CURDATE() - INTERVAL 1 DAY
                      --  LEFT JOIN payment_list9 ON payment_list95.Date_list95 = payment_list91.Date_list91 
                      --  LEFT JOIN payment_listb7 ON payment_listb7.Date_listB7 = payment_list91.Date_list91 
                       ORDER BY DATE_FORMAT(Date_Amount, '%d%') ASC");

$sql->execute();
$query = $sql->fetchAll();

//นำข้อมูลที่ได้จากคิวรี่มากำหนดรูปแบบข้อมุลให้ถูกโครงสร้างของกราฟที่ใช้ 
$Date_Amount = array();
$Petrol_typeID = array();
// $Date_listB7 = array();
// $NumStart_list = array();
$Amount = array();
// $NumStart_list91 = array();
// $NumStart_listB7 = array();
foreach ($query as $data) {
  $Date_Amount[] = "\"".$data['Date_Amount']."\""; 
  $Petrol_typeID[] = "\"".$data['Petrol_typeID']."\""; 
  // $Date_listB7[] = "\"".$data['Date_listB7']."\""; 
  $Amount[] = "\"".$data['Amount']."\""; 
  // $Totol91[] = "\"".$data['Totol91']."\""; 
  // $TotolB7[] = "\"".$data['TotolB7']."\""; 
}
//ตัด commar อันสุดท้ายโดยใช้ implode เพื่อให้โครงสร้างข้อมูลถูกต้องก่อนจะนำไปแสดงบนกราฟ
$Date_Amount = implode(",", $Date_Amount); 
$Amount = implode(",", $Amount); 
$Petrol_typeID = implode(",", $Petrol_typeID); 
// $TotolB7 = implode(",", $TotolB7); 

?>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script> -->
  </head>

  <p style="position: relative; left: -1px; top:10px;">ปริมาณน้ำมันคงเหลือวันนี้ (ลิตร)</p>
  <body>
 
      <!-- <div class="row"> -->
        <!-- <div class="col-md-6" class="container" style="width:600px;"> <br> -->
              <canvas id="m" width="5px" height="2px"></canvas>
              <script>
              var ctx = document.getElementById("m").getContext('2d');
              var myChart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                      labels: [<?php echo $Petrol_typeID;?>],
                      datasets: [{
                          label: 'ปริมาณน้ำมันคงเหลือ',
                          
                          data: [<?php echo $Amount;?>
                          ],
                          backgroundColor: [
                                 
                              'rgba(255, 206, 86, 1)',
                              'rgba(255,99,132,1)',   
                              'rgba(75, 192, 192, 1)'
                          ],
                          borderColor: [
                               
                              'rgba(255, 206, 86, 1)',
                              'rgba(255,99,132,1)',   
                              'rgba(75, 192, 192, 1)'
                              
                          ],
                          borderWidth: 1
                      }]
                  },
            
                  options: {
                      scales: {
                          yAxes: [{ 
                              ticks: {
                                  beginAtZero:true
                              }
                          }]
                      }
                  }
              });
              </script> 
                <p class='text-center text-black'>ชื่อประเภทน้ำมัน</p> 
        </class=>
  </body>
</html>