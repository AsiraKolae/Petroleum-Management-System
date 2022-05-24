<?php
include('../phpmysql/dbconnect.php');

// $records = mysqli_query($conn,"SELECT Payment_listID,Date_list,Petrol_typeID,NumStart_list,NumEnd_list, ROUND(NumEnd_list-NumStart_list,2) AS Total FROM payment_list;"); // fetch data from database

// $sql ="SELECT *, ROUND(NumEnd_list-NumStart_list,2) AS Total FROM payment_list WHERE Date_list=CURDATE()";


//   $query = mysqli_query($conn,$sql);

//   $data = mysqli_fetch_array($query);
//   $data0 = mysqli_fetch_array($query);
//   $data1 = mysqli_fetch_array($query);


// $sql1 ="SELECT *, ROUND(NumEnd_list-NumStart_list,2) AS Totall FROM payment_list WHERE Date_list=CURDATE() - INTERVAL 1 DAY";

// AND Date_list=CURDATE()



  $sql = "SELECT *
  -- ,ROUND(NumEnd_list-NumStart_list,2) AS total
  -- ,ROUND(Amount1,2) AS Amount2 
--   ,ROUND((l+Amount1)-((NumEnd_list-NumStart_list)+(NumEnd_listT-NumStart_listT)+(NumEnd_listTR-NumStart_listTR)),2) AS l
--  FROM payment_list
--  LEFT JOIN amount_table ON amount_table.Date_Amount = payment_list.Date_list AND amount_table.Petrol_typeID = payment_list.Petrol_typeID 
-- --    LEFT JOIN receive_list ON amount_table.Date_Amount=receive_list.Date_receive AND amount_table.Petrol_typeID = receive_list.Petrol_typeID 
--    WHERE Date_Amount = CURDATE() - INTERVAL 1 DAY

            -- ,ROUND((l95)+(Amount95),2) AS l95
            -- ,ROUND(((l95)+(Amount95))-((NumEnd_list95-NumStart_list95)+(NumEnd_listT95-NumStart_listT95)+(NumEnd_listTR95-NumStart_listTR95)),2) AS l195
            -- ,ROUND((NumEnd_list95-NumStart_list95)+(NumEnd_listT95-NumStart_listT95)+(NumEnd_listTR95-NumStart_listTR95),2) AS total

            -- ,ROUND((l91)+(Amount91),2) AS l91
            -- ,ROUND(((l91)+(Amount91))-((NumEnd_list91-NumStart_list91)+(NumEnd_listT91-NumStart_listT91)+(NumEnd_listTR91-NumStart_listTR91)),2) AS l191
            -- ,ROUND((NumEnd_list91-NumStart_list91)+(NumEnd_listT91-NumStart_listT91)+(NumEnd_listTR91-NumStart_listTR91),2) AS total91

            -- ,ROUND((lB7)+(AmountB7),2) AS lB7
            -- ,ROUND(((lB7)+(AmountB7))-((NumEnd_listB7-NumStart_listB7)+(NumEnd_listTB7-NumStart_listTB7)+(NumEnd_listTRB7-NumStart_listTRB7)),2) AS l1B7
            -- ,ROUND((NumEnd_listB7-NumStart_listB7)+(NumEnd_listTB7-NumStart_listTB7)+(NumEnd_listTRB7-NumStart_listTRB7),2) AS totalB7


           FROM payment_list95
           LEFT JOIN amount_table95 ON amount_table95.Date_Amount95 = payment_list95.Date_list95 AND amount_table95.Petrol_typeID95 = payment_list95.Petrol_typeID95 
           LEFT JOIN amount_table91 ON amount_table91.Date_Amount91= amount_table95.Date_Amount95 
           LEFT JOIN payment_list91 ON payment_list91.Date_list91 = amount_table91.Date_Amount91 AND amount_table91.Petrol_typeID91 = payment_list91.Petrol_typeID91 
           LEFT JOIN amount_tableb7 ON amount_tableb7.Date_AmountB7= amount_table95.Date_Amount95 
           LEFT JOIN payment_listb7 ON payment_listb7.Date_listB7 = amount_tableb7.Date_AmountB7 AND amount_tableb7.Petrol_typeIDB7 = payment_listb7.Petrol_typeIDB7 
    
    
           WHERE Date_list95 = CURDATE() - INTERVAL 1 DAY
          --  - INTERVAL 1 DAY
 ";

$query = mysqli_query($conn,$sql);

$data = mysqli_fetch_array($query);

$l95 = $data['l95'];
$l91 = $data['l91'];
$lB7 = $data['lB7'];

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
  background-color: #f2f2f2;
  color: black;
}

  </style>
</head>


<span>
<table id="customers">
  <tr>
    <th>ชื่อประเภทน้ำมัน</th>
    <th>จำนวนน้ำมันคงเหลือ (ลิตร)</th>
  </tr>
    <tr>
     
    <td style="background-color:rgba(255,99,132,1)"><?php echo $data['Petrol_typeID95']?></td>
    <td><?php echo number_format($l95,2);?></td>
    </tr> 
    <tr>
    <!-- <td><php echo $data0['Date_list']; ?></td> -->
    <td style="background-color:rgba(75, 192, 192, 1)"><?php echo $data['Petrol_typeID91']?></td>
    <td><?php echo number_format($l91,2);?></td>
    </tr> 
    <tr>
    <!-- <td><php echo $data1['Date_list']; ?></td> -->
    <td style="background-color:rgba(255, 206, 86, 1)"><?php echo $data['Petrol_typeIDB7']?></td>
    <td><?php echo number_format($lB7,2);?></td>
    </tr> 

</table>

<?php
if($data['l95'] <= '1000')
{
    echo '<script>alert("แก๊สโซฮอล์ 95 ใกล้จะหมดแล้ว!! เนื่องจากมีปริมาณน้อยกว่า 1000 ลิตร")</script>';
}

if($data['l91'] <= '500')
{
    echo '<script>alert("แก๊สโซฮอล์ 91 ใกล้จะหมดแล้ว!! เนื่องจากมีปริมาณน้อยกว่า 500 ลิตร")</script>';
}

if($data['lB7'] <= '1500')
{
    echo '<script>alert("ดีเซล B7 ใกล้จะหมดแล้ว!! เนื่องจากมีปริมาณน้อยกว่า 1500 ลิตร")</script>';
}

?>

</body>
</html>


