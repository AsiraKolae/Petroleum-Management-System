<?php
include('../phpmysql/dbconnect.php');
$sql ="SELECT *, 
       ROUND((NumEnd_list95-NumStart_list95)+(NumEnd_listT95-NumStart_listT95)+(NumEnd_listTR95-NumStart_listTR95),2) AS Total95 
       FROM payment_list95 
       WHERE Date_list95 = CURDATE()";

  $query = mysqli_query($conn,$sql);
  $data = mysqli_fetch_array($query);

$sql0 ="SELECT *, 
        ROUND((NumEnd_list95-NumStart_list95)+(NumEnd_listT95-NumStart_listT95)+(NumEnd_listTR95-NumStart_listTR95),2) AS Totall95 
        FROM payment_list95 
        WHERE Date_list95 = CURDATE() - INTERVAL 1 DAY";

  $query0 = mysqli_query($conn,$sql0);
  $data0 = mysqli_fetch_array($query0);

  $sql1 ="SELECT *, 
  ROUND((NumEnd_list91-NumStart_list91)+(NumEnd_listT91-NumStart_listT91)+(NumEnd_listTR91-NumStart_listTR91),2) AS Total91
  FROM payment_list91 
  WHERE Date_list91 = CURDATE()";

$query1 = mysqli_query($conn,$sql1);
$data1 = mysqli_fetch_array($query1);

$sql2 ="SELECT *, 
   ROUND((NumEnd_list91-NumStart_list91)+(NumEnd_listT91-NumStart_listT91)+(NumEnd_listTR91-NumStart_listTR91),2) AS Totall91 
   FROM payment_list91 
   WHERE Date_list91 = CURDATE() - INTERVAL 1 DAY";

$query2 = mysqli_query($conn,$sql2);
$data2 = mysqli_fetch_array($query2);

$sql3 ="SELECT *, 
  ROUND((NumEnd_listB7-NumStart_listB7)+(NumEnd_listTB7-NumStart_listTB7)+(NumEnd_listTRB7-NumStart_listTRB7),2) AS TotalB7
  FROM payment_listb7 
  WHERE Date_listB7 = CURDATE()";

$query3 = mysqli_query($conn,$sql3);
$data3 = mysqli_fetch_array($query3);

$sql4 ="SELECT *, 
   ROUND((NumEnd_listB7-NumStart_listB7)+(NumEnd_listTB7-NumStart_listTB7)+(NumEnd_listTRB7-NumStart_listTRB7),2) AS TotallB7
   FROM payment_listb7 
   WHERE Date_listB7 = CURDATE() - INTERVAL 1 DAY";

$query4 = mysqli_query($conn,$sql4);
$data4 = mysqli_fetch_array($query4);
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
  table {
    margin-right: 0px;
    margin-left: 0px;
    
  }

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  /* width: 100%; */
}

#customers td, #customers th {

  text-align: center;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {

  text-align: center;
  background-color: black;
  color: white;
}

  </style>
</head>


<span>
<table id="customers">
  <tr>
    <th>ชื่อประเภทน้ำมัน</th>
    <th>ปริมาณน้ำมันที่ขายไปเมื่อวาน (ลิตร)</th>
    <th>ปริมาณน้ำมันที่ขายไปวันนี้ (ลิตร)</th>
  </tr>
 
    <tr>
    <td style="background-color:rgba(255,99,132,1)"><?php echo $data['Petrol_typeID95']?></td>
    <td><?php echo $data0['Totall95']; ?></td>
    <td><?php echo $data['Total95']; ?></td>
    </tr> 
    <!-- <td><php echo $data0['Date_list']; ?></td> -->
    <td style="background-color:rgba(75, 192, 192, 1)"><?php echo $data1['Petrol_typeID91']?></td>
    <td><?php echo $data2['Totall91']; ?></td>
    <td><?php echo $data1['Total91']; ?></td>
    </tr> 
    <tr>
    <!-- <td><php echo $data1['Date_list']; ?></td> -->
    <td style="background-color:rgba(255, 206, 86, 1)"><?php echo $data3['Petrol_typeIDB7']?></td>
    <td><?php echo $data4['TotallB7']; ?></td>
    <td><?php echo $data3['TotalB7']; ?>
    </tr> 

</table>


<!-- <br><br><br><br><br><br>
    <div class="p-1 bg-danger"></div>
    <div class="p-3 bg-warning text-center text-black">(กรณีศึกษาปั๊มน้ำมัน KB Petroleum)</div> -->
</body>
</html>


