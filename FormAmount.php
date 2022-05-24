<?php
include('../phpmysql/dbconnect.php');

// $sql ="SELECT * FROM payment_list WHERE Date_list = CURDATE() - INTERVAL 1 DAY";

          // $sql = "SELECT *
          //   -- ,ROUND(NumEnd_list-NumStart_list,2) AS total
          //   -- ,ROUND(Amount1,2) AS Amount2 
          //   ,ROUND((Amount1)-(NumEnd_list-NumStart_list),2) AS Amount3

          //  FROM payment_list
          //  LEFT JOIN amount_table ON amount_table.Date_Amount = payment_list.Date_list AND amount_table.Petrol_typeID = payment_list.Petrol_typeID
          //  WHERE Date_list = CURDATE() - INTERVAL 1 DAY";

          //         $query = mysqli_query($conn,$sql);
          //         $data = mysqli_fetch_array($query);
          //         $data0 = mysqli_fetch_array($query);
          //         $data1 = mysqli_fetch_array($query);

          // $sql1 = "SELECT *
          //     ,ROUND(NumEnd_list-NumStart_list,2) AS total
          //     -- ,ROUND(Amount1,2) AS Amount2 
          //     -- ,ROUND((Amount1)-(NumEnd_list-NumStart_list),2) AS Amount4
          //         FROM payment_list
          //         LEFT JOIN amount_table ON amount_table.Date_Amount = payment_list.Date_list AND amount_table.Petrol_typeID = payment_list.Petrol_typeID
          //         WHERE Date_list = CURDATE()";

          //         $query1 = mysqli_query($conn,$sql1);
          //         $data2 = mysqli_fetch_array($query1);
          //         $data3 = mysqli_fetch_array($query1);
          //         $data4 = mysqli_fetch_array($query1);

          //         $sql2 = "SELECT *
          
          //         ,ROUND((Amount1)-(NumEnd_list-NumStart_list),2) AS Amount4
          //             FROM payment_list
          //             LEFT JOIN amount_table ON amount_table.Date_Amount = payment_list.Date_list AND amount_table.Petrol_typeID = payment_list.Petrol_typeID
          //             WHERE Date_list";
    
          //             $query2 = mysqli_query($conn,$sql2);
          //             $data5 = mysqli_fetch_array($query2);
          //             $data6 = mysqli_fetch_array($query2);
          //             $data7 = mysqli_fetch_array($query2);

          $sql = "SELECT *
          -- ,ROUND(NumEnd_list-NumStart_list,2) AS total
          ,ROUND(l95+Amount95,2) AS l95
          -- ,ROUND((l+Amount1)-((NumEnd_list95-NumStart_list95)+(NumEnd_listT95-NumStart_listT95)+(NumEnd_listTR95-NumStart_listTR95)),2) AS l

         FROM payment_list95
         LEFT JOIN amount_table95 ON amount_table95.Date_Amount95 = payment_list95.Date_list95 AND amount_table95.Petrol_typeID95 = payment_list95.Petrol_typeID95
         WHERE Date_list95 = CURDATE()";
   
         $query = mysqli_query($conn,$sql);
         $data = mysqli_fetch_array($query);
        //  $data0 = mysqli_fetch_array($query);
        //  $data1 = mysqli_fetch_array($query);

         $sql1 = "SELECT *
          -- ,ROUND(l1,2) AS l1
          ,ROUND((l95+Amount95)-((NumEnd_list95-NumStart_list95)+(NumEnd_listT95-NumStart_listT95)+(NumEnd_listTR95-NumStart_listTR95)),2) AS l195
          ,ROUND((l95+Amount95)-((NumEnd_list95-NumStart_list95)+(NumEnd_listT95-NumStart_listT95)+(NumEnd_listTR95-NumStart_listTR95)),2) AS Amount95
          ,ROUND((NumEnd_list95-NumStart_list95)+(NumEnd_listT95-NumStart_listT95)+(NumEnd_listTR95-NumStart_listTR95),2) AS totalAll
         FROM payment_list95
         LEFT JOIN amount_table95 ON amount_table95.Date_Amount95 = payment_list95.Date_list95 AND amount_table95.Petrol_typeID95 = payment_list95.Petrol_typeID95
         WHERE Date_list95 = CURDATE() - INTERVAL 1 DAY";
   
         $query1 = mysqli_query($conn,$sql1);
         $data2 = mysqli_fetch_array($query1);
         $Amount95 = $data2["Amount95"];
         $l95 = $data["l95"];


         ////////////////////////////////////91/////////////////////////////////////////
         $sql2 = "SELECT *
                ,ROUND(l91+Amount91,2) AS l91
                 FROM payment_list91
                 LEFT JOIN amount_table91 ON amount_table91.Date_Amount91 = payment_list91.Date_list91 AND amount_table91.Petrol_typeID91 = payment_list91.Petrol_typeID91
                 WHERE Date_list91 = CURDATE()";
   
         $query2 = mysqli_query($conn,$sql2);
         $data3 = mysqli_fetch_array($query2);
        //  $data0 = mysqli_fetch_array($query);
        //  $data1 = mysqli_fetch_array($query);

         $sql3 = "SELECT *
          -- ,ROUND(l1,2) AS l1
          ,ROUND((l91+Amount91)-((NumEnd_list91-NumStart_list91)+(NumEnd_listT91-NumStart_listT91)+(NumEnd_listTR91-NumStart_listTR91)),2) AS l191
          ,ROUND((l91+Amount91)-((NumEnd_list91-NumStart_list91)+(NumEnd_listT91-NumStart_listT91)+(NumEnd_listTR91-NumStart_listTR91)),2) AS Amount91
          ,ROUND((NumEnd_list91-NumStart_list91)+(NumEnd_listT91-NumStart_listT91)+(NumEnd_listTR91-NumStart_listTR91),2) AS totalAll91
         FROM payment_list91
         LEFT JOIN amount_table91 ON amount_table91.Date_Amount91 = payment_list91.Date_list91 AND amount_table91.Petrol_typeID91 = payment_list91.Petrol_typeID91
         WHERE Date_list91 = CURDATE() - INTERVAL 1 DAY";
   
         $query3 = mysqli_query($conn,$sql3);
         $data4 = mysqli_fetch_array($query3);
         $Amount91 = $data3["Amount91"];
         $l91 = $data1["l91"];


         //////////////////////////////////////////////////////////////B7//////////////////////////////////////////////////
        
         $sql4 = "SELECT *
                ,ROUND(lB7+AmountB7,2) AS lB7
                 FROM payment_listb7
                 LEFT JOIN amount_tableb7 ON amount_tableb7.Date_AmountB7 = payment_listb7.Date_listB7 AND amount_tableb7.Petrol_typeIDB7 = payment_listb7.Petrol_typeIDB7
                 WHERE Date_listB7 = CURDATE()";
   
         $query4 = mysqli_query($conn,$sql4);
         $data5 = mysqli_fetch_array($query4);
        //  $data0 = mysqli_fetch_array($query);
        //  $data1 = mysqli_fetch_array($query);

         $sql5 = "SELECT *
          -- ,ROUND(l1,2) AS l1
          ,ROUND((lB7+AmountB7)-((NumEnd_listB7-NumStart_listB7)+(NumEnd_listTB7-NumStart_listTB7)+(NumEnd_listTRB7-NumStart_listTRB7)),2) AS l1B7
          ,ROUND((lB7+AmountB7)-((NumEnd_listB7-NumStart_listB7)+(NumEnd_listTB7-NumStart_listTB7)+(NumEnd_listTRB7-NumStart_listTRB7)),2) AS AmountB7
          ,ROUND((NumEnd_listB7-NumStart_listB7)+(NumEnd_listTB7-NumStart_listTB7)+(NumEnd_listTRB7-NumStart_listTRB7),2) AS totalAllB7
         FROM payment_listb7
         LEFT JOIN amount_tableb7 ON amount_tableb7.Date_AmountB7 = payment_listb7.Date_listB7 AND amount_tableb7.Petrol_typeIDB7 = payment_listb7.Petrol_typeIDB7
         WHERE Date_listb7 = CURDATE() - INTERVAL 1 DAY";
   
         $query5 = mysqli_query($conn,$sql5);
         $data6 = mysqli_fetch_array($query5);
        //  $AmountB7 = $data3["AmountB7"];
         $lB7 = $data5["lB7"];
       
  
?>

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

        <div><?php require_once("SearchMenu.php"); ?></div>

<div class="container py-5">

  <!-- For demo purpose -->
  <div class="row mb-4">
    <div class="col-lg-8 mx-auto text-center">
    <!-- class="display-6" -->
    <br>
      <h1>ฟอร์มคำนวณน้ำมันคงเหลือ (ลิตร)</h1>
    </div>
  </div>
  <!-- End -->
  <script language="JavaScript">
	    function chkNumber(ele)
	{
	    var vchar = String.fromCharCode(event.keyCode);
	        if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
	    ele.onKeyPress=vchar;
	}
  </script>

<script type='text/javascript'>
    function checkNumber95(elm){
      if(elm.value.match(/[^\d]/)){
      alert('กรอกตัวเลขเท่านั้น');
         elm.value='';
      }else if(elm.value>2000){
      alert('กรอกตัวเลขได้ไม่เกิน 2000 เท่านั้น');
elm.value='';
  }
}
</script>

<script type='text/javascript'>
    function checkNumber91(elm){
      if(elm.value.match(/[^\d]/)){
      alert('กรอกตัวเลขเท่านั้น');
         elm.value='';
      }else if(elm.value>2500){
      alert('กรอกตัวเลขได้ไม่เกิน 2500 เท่านั้น');
elm.value='';
  }
}
</script>

<script type='text/javascript'>
    function checkNumberB7(elm){
      if(elm.value.match(/[^\d]/)){
      alert('กรอกตัวเลขเท่านั้น');
         elm.value='';
      }else if(elm.value>1500){
      alert('กรอกตัวเลขได้ไม่เกิน 1500 เท่านั้น');
elm.value='';
  }
}
</script>

  <div class="row">
    <div class="col-lg-12 mx-auto">
      <div class="bg-white rounded-lg shadow-sm p-4">
        <div class="tab-content">

          <!-- credit card info-->
          <div id="nav-tab-card" class="tab-pane fade show active">
            <form role="form" action="AddAmount.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <input type="Date" value="<?php echo date('Y-m-d');?>" name="Date_Amount95" class="form-control" readonly="readonly">
                <!-- <input type="hidden" value="<php echo date('Y-m-d');?>" name="Date_list" class="form-control">             -->
              </div>

              <div class="form-inline"> &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label for="Petrol_typeID95">รหัสประเภทน้ำมัน :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" class="form-control" style="background-color:rgba(255,99,132,1)" name="Petrol_typeID95" value="แก๊สโซฮอล์ 95" readonly="readonly">
               <!-- <input type="hidden" class="form-control" name="Petrol_typeID95" value="แก๊สโซฮอล์ 95"> -->

               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               <input type="text" class="form-control" style="background-color:rgba(75, 192, 192, 1)" name="Petrol_typeID91" value="แก๊สโซฮอล์ 91" readonly="readonly">

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" class="form-control" style="background-color:rgba(255, 206, 86, 1)" name="Petrol_typeIDB7" value="ดีเซล B7" readonly="readonly">
              </div>
              <br>

           
              <div class="form-inline">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label for="l95">ปริมาณน้ำมันคงเหลือ (เริ่มต้นวัน) :</label>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="l95" value="<?php echo $data2["l195"];?>" class="form-control text-dark" readonly="readonly">
                <!-- <input type="hidden" name="l" value="<php echo number_format($l,2);?>" class="form-control"> -->

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="l91" value="<?php echo $data4["l191"];?>" class="form-control text-dark" readonly="readonly">

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="lB7" value="<?php echo $data6["l1B7"];?>" class="form-control text-dark" readonly="readonly">

              </div>
              <br>

              <div class="form-inline"> &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label for="totalAll">ปริมาณน้ำมันที่ขายไป (ลิตร) :</label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
                <input type="text" name="totalAll" value="<?php echo $data2["totalAll"];?>" class="form-control text-dark" readonly="readonly">
                <!-- <input type="hidden" name="totalAll" value="<php echo $data2["totalAll"];?>" class="form-control"> -->

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="totalAll91" value="<?php echo $data4["totalAll91"];?>" class="form-control text-dark" readonly="readonly">
                <!-- <input type="hidden" name="totalAll" value="<php echo $data2["totalAll"];?>" class="form-control"> -->

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="totalAllB7" value="<?php echo $data6["totalAllB7"];?>" class="form-control txet-dark" readonly="readonly">
                 </div>
              
<br>
              <div class="form-inline">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label for="Amount95">ปริมาณน้ำมันที่เพิ่มเข้ามา (ลิตร) :</label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" OnKeyPress="return chkNumber(this)" name="Amount95" onkeyup="return checkNumber95(this)" placeholder="ปริมาณน้ำมันที่นำเข้า (แก๊สโซฮอล์ 95)" class="form-control">

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" OnKeyPress="return chkNumber(this)" name="Amount91" onkeyup="return checkNumber91(this)" placeholder="ปริมาณน้ำมันที่นำเข้า (แก๊สโซฮอล์ 91)" class="form-control">

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" OnKeyPress="return chkNumber(this)" name="AmountB7" onkeyup="return checkNumberB7(this)" placeholder="ปริมาณน้ำมันที่นำเข้า (ดีเซล B7)" class="form-control">
              </div>

              <!-- <br>
              <div class="form-inline">
                <label for="l1">จำนวนน้ำมันคงเหลือ (สิ้นสุดวัน) :</label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                <input type="hidden" name="l12" value="<php echo $data2["l1"];?>" class="form-control">

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="hidden" name="l13" value="<php echo $data3["l1"];?>" class="form-control">

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="hidden" name="l14" value="<php echo $data4["l1"];?>" class="form-control">
              </div> -->

                </div>
                <br>
                
              <button type="submit" name="add" class="subscribe btn btn-primary btn-block rounded-pill shadow-sm"> เพิ่มข้อมูล </button>
              <a type="button" class="subscribe btn btn-danger btn-block rounded-pill shadow-sm" href="Amount.php"> ยกเลิก  </a>
            </form>
          </div>
          <!-- End -->

      </div>
    </div>
  </div>
</div>

<br>
<div style="position: relative; left: 228px; top:-53px">
*หมายเหตุ : ทำการกดเพิ่มข้อมูล (เพื่อคำนวณหาจำนวนน้ำมันคงเหลืออัตโนมัติ)
</div>
<footer>
    <div class="p-1 bg-danger"></div>
    <div class="p-3 bg-warning text-center text-black">(กรณีศึกษาปั๊มน้ำมัน KB Petroleum)</div>
</footer>
    
</body>
</head>
</html>