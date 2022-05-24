
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


        <!--  -->
        <div class="container py-5">

  <!-- For demo purpose -->
  <div class="row mb-4">
    <div class="col-lg-8 mx-auto text-center">
    <!-- class="display-6" -->
    <br>
     <h1>ฟอร์มเพิ่มหลักฐานการรับซื้อน้ำมัน(ลิตร)</h1>
    </div>
  </div>
  <!-- End -->


  <div class="row">
    <div class="col-lg-12 mx-auto">
      <div class="bg-white rounded-lg shadow-sm p-4">
        <div class="tab-content">

          <!-- credit card info-->
          <div id="nav-tab-card" class="tab-pane fade show active">
            <form role="form" action="uploadfileimage.php" method="post" enctype="multipart/form-data" >
              <div class="form-group">
              <label for="Date_receive">วันที่:</label>
              <input type="Date" value="<?php echo date('Y-m-d');?>" name="Date_receive" class="form-control" readonly="readonly">
              
              </div>
              <div class="form-inline"> &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label for="Petrol_typeID">รหัสประเภทน้ำมัน :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" class="form-control"  style="background-color:rgba(255,99,132,1)" name="Petrol_typeID" value="แก๊สโซฮอล์ 95" readonly="readonly">

               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               <input type="text" class="form-control"  style="background-color:rgba(75, 192, 192, 1)" name="Petrol_typeID0" value="แก๊สโซฮอล์ 91" readonly="readonly">

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" class="form-control"   style="background-color:rgba(255, 206, 86, 1)" name="Petrol_typeID1" value="ดีเซล B7" readonly="readonly">
              
              </div>
              <br>
 
              <div class="form-inline">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label for="Receipt_num">เลขที่ใบเสร็จ :</label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;
                <input type="text" name="Receipt_num" class="form-control">

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="Receipt_num0" class="form-control">

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="Receipt_num1" class="form-control">

              </div>
              <br>
<!-- 
              <div class="form-inline"> &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label for="Received_amount">ปริมาณน้ำมันที่เพิ่มเข้ามา (ลิตร) :</label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="Received_amount" class="form-control">

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="Received_amount0" class="form-control">

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="Received_amount1" class="form-control">
              </div>
<br> -->
              <div class="form-inline">&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label for="Name1">ชื่อ-สกุล (ผู้ส่ง) :</label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="Name1" class="form-control">

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="Name10" class="form-control">

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="Name11" class="form-control">
              </div>

              <br>
              <div class="form-inline">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label for="CompanyName">ชื่อบริษัท/สังกัด :</label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="CompanyName" class="form-control">

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="CompanyName0" class="form-control">

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="CompanyName1" class="form-control">
              </div>

              <br>
              <div class="form-inline">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label for="CompanyName">หลักฐานการรับ :</label>
                
                <input type="file" name="uploadFile"/>

                <input type="file" name="uploadFile"/>

                <input type="file" name="uploadFile"/>
              </div>

                </div>
                <br>
                
                <button type="submit" name="add" value="upload" class="subscribe btn btn-primary btn-block rounded-pill shadow-sm"> เพิ่มข้อมูล </button>
              <a type="button" class="subscribe btn btn-danger btn-block rounded-pill shadow-sm" href="uploadfileimage.php"> กลับ  </a>
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