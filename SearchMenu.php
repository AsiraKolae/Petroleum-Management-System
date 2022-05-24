<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Petroleum Management System</title>
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

<div class="fixed-top">
<div class="p-1 bg-warning text-center text-black">
<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
      <li class="nav-item" id="main">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button" onclick="openNav()"><i class="fas fa-bars"></i></a>
      </li>
      
      <li class="nav-item d-none d-sm-inline-block">
        <a href="MainPage.php" class="nav-link">Petroleum Management System</a>
      </li>

      <ul style="position: relative; left: 800px;" class="form-inline">
          <li><a style="color:black;" href="price.php">1.ราคาน้ำมัน</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <li><a style="color:black;" href="PaymentPage.php">2.ตัวเลขสิ้นสุดวัน</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <li><a style="color:black;" href="Amount.php">3.เช็คปริมาณน้ำมัน</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     </ul>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <div class="navbar-search-block">
        </div>
      </li>      
  </nav>
  </div>
  <div class="p-1 bg-danger"></div>

  <div id="mySidenav" class="sidenav bg-dark">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">Close &times;</a>
 
  <br>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
            &nbsp; &nbsp;
              <input type="text" id="mySearch" onkeyup="myFunction()" placeholder="ค้นหา.." title="Type in a category" class="form-control form-control-navbar" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </form>
       </div>      
  <br>
  <ul id="myMenu">
    <li><a href="MainPage.php">หน้าหลัก</a></li>
    <li><a href="price.php">ราคาน้ำมัน</a></li>
    <li><a href="PaymentPage.php">รายการจ่าย</a></li>
    <li><a href="uploadfileimage.php">หลักฐานการรับ</a></li>
    <li><a href="Amount.php">จำนวนน้ำมันคงเหลือ</a></li>
    <li><a href="SearchCostAll1.php">รายการสรุปยอด</a></li>
    <li><a href="CusName.php">ค้างชำระ</a></li>
</ul>
</div>

<script>
function myFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("mySearch");
  filter = input.value.toUpperCase();
  ul = document.getElementById("myMenu");
  li = ul.getElementsByTagName("li");
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}
</script>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>


</body>
</html>
