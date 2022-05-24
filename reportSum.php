<!DOCTYPE html>
<html lang="en">
<head>
    <script>
        $(document).ready(function() {
        $('#example').DataTable( {
        "aaSorting" :[[0,'ASC']],
        });
        } );
    </script>
  <title>ประวัติการให้บริการ</title>
  <?php
    include "head.php"; 
  ?>
</head>
  
  <body>
    <?php 
        include "dbconnect.php"; 
        include "menu.php";
        ?>
    <div class="card">
        <div class="content-header card-primary">
        <label style="margin-left: 45%;">ประวัติการให้บริการ</label>
        <br>
            <div class="card-tools">
                <form id="form1" name="form1" class="form-inline" method="post" action="reportSum.php">
                    <div class="row" style="margin-left:34%;">
                        <div class="form-group">
                            <label for="exampleInputName2">วันที่ :&nbsp;</label>
                            <input type="date" name="d_s" id="datepicker" width="270" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail2">&nbsp;ถึงวันที่ :&nbsp;</label>
                            <input type="date" name="d_e" id="datepicker2" width="270" />
                        </div>
                        &nbsp;&nbsp;<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> ค้นหา</button></center>
                    </div>
                </form>
            </div>
            <script>
                $('#datepicker').datepicker({
                    uiLibrary: 'bootstrap',
                    format: "yyyy-mm-dd",
                    type : "date"
                });   
            </script>
            <script>
                $('#datepicker2').datepicker({
                    uiLibrary: 'bootstrap',
                    format: "yyyy-mm-dd",
                    type : "date"
                });
            </script>
            <div class="card-body table-responsive p-0" style="height: 500px;">
                <table class="table table-head-fixed">
                    <thead class="thead-dark">
                        <tr>
                        <th>ลำดับที่</th>
                            <th>รหัสรายการคำขอ </th>
                            <th>รหัสลูกค้า</th>
                            <th>ชื่อลูกค้า</th>
                            <th>ชื่อผู้ติดต่อ</th>
                            <th>วันที่ทำรายการ</th>
                            <th>ค่าบริการ</th>
                            <!-- <th>จำนวนตัวอย่าง</th> -->
                            <th>หมายเหตุ</th>
                                   
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 0;
                        $sum = 0;
                        $num = 1;
                        isset( $_POST['d_s'] ) ? $d_s = $_POST['d_s'] : $d_s = "";
                        isset( $_POST['d_e'] ) ? $d_e = $_POST['d_e'] : $d_e = "";
                        $d_s =$d_s;
                        $d_e= $d_e;
                        echo 'วันที่ : '.$d_s;
                        echo '&nbsp;&nbsp;ถึงวันที่ : '.$d_e;
                        echo "<br>";
                        echo "<br>";
                        
                        $query = "SELECT * FROM requestlab 
                                LEFT JOIN customer
                                ON customer.cust_id=requestlab.cust_id
                                WHERE requestlab.lab_dte BETWEEN '$d_s' AND '$d_e' ORDER BY requestlab.rqlab_id ASC";
                        
                        //ประกาศตัวแปร sqli
                        $result = mysqli_query($conn,$query);//ดูชื่อ ตัวแปรในไฟล์ connect ให้ดีว่า conหรือ condb หรืออย่างอื่น
                     
                        //สร้างตัวแปร $row มารับค่าจากการ fetch array
                        while($row=mysqli_fetch_array($result))
                        {
                            echo"<tr>";
                            echo "<td>".(++$no)."</td>";
                            echo "<td>".$row["rqlab_id"]."</td>";
                            echo "<td>".$row["cust_id"]."</td>";
                            echo "<td>".$row["cust_name"]."</td>";
                            echo "<td>".$row["rqlab_name"]."</td>";
                            echo "<td>".$row["lab_dte"]."</td>";
                            echo "<td>".$row["lab_service"]."</td>";
                            $sum += $row['lab_service'];
                        ?>
                        <td><a href="request_complete.php?rqlab_id=<?php echo $row['rqlab_id'];?>">ดูใบคำขอ</a></td>
                        <?php
                            echo"</tr>";
                        ?>
                        
                        <?php
                        }
                        echo"<tr>" ;
                        echo "<td> รวม </td>";
                        echo "<td colspan=4>".$no."รายการ</td>";
                        echo "<td> รวมค่าบริการทั้งหมด </td>";
                        echo "<td>  ".number_format($sum)."  </td>";
                        echo "<td> บาท </td>";
                        echo"</tr>";
                        ?>
                    </tbody>
                    <?php
                        mysqli_close($conn);
                    ?>
                </table>
                
            </div>

        </div>
    </div>
  </body>
  
</html>
    