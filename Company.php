<!DOCTYPE html>
<html>
<head>
<title>Petroleum Management System</title>
<meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" href="Petroleum Management System/WebApp/imagesuploadedf/oil.png">
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
    margin-right: 80px;
    margin-left: 140px;
  }
  
  h1{
    text-align:center;
  }
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
/* ///////////////////////////////////// table //////////////// */

      table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
  </style>
</head>

<body>
<br><br><br><br><br>
        <div><?php require_once("SearchMenu.php"); ?></div>

<br>
<h1>รายชื่อ</h1>
<table style="width:80%">
  <tr>
    <td>ลำดับ</td>
    <td>ชื่อสังกัด/บริษัท</td>
    <td colspan="2"></td>
  </tr>

<?php

include('../phpmysql/dbconnect.php'); // Using database connection file here

$records = mysqli_query($conn,"select * from company"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>

  <tr>
    <td><?php echo $data['ComID']; ?></td>
    <td><?php echo $data['Company_name']; ?></td>
    <td>
      <a  type="button" class="btn btn-primary" href="CusName.php">View</a>
      <!-- <a type="button" href="DeleteCompany.php?ComID=<php echo $data['ComID']; ?>" class="subscribe btn btn-danger btn-block rounded-pill shadow-sm" >ลบ</a> -->
    </td>
 
  </tr>	
<?php
}
?>
</table>

<br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div class="p-1 bg-danger"></div>
    <div class="p-3 bg-warning text-center text-black">(กรณีศึกษาปั๊มน้ำมัน KB Petroleum)</div>
</body>
</html>