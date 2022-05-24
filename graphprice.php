<?php 
//index.php
$connect = mysqli_connect("localhost", "root", "", "petroleum management system");

$query = "SELECT *
        , DATE_FORMAT(Date_price, '%d') AS Date_price
          FROM price 
          ORDER BY DATE_FORMAT(Date_price, '%d%') ASC";

$result = mysqli_query($connect, $query);
$price = '';
while($row = mysqli_fetch_array($result))
{
  $price .= "{ B_price:".$row["B_price"].",S_price:".$row["S_price"].",Date_price:".$row["Date_price"]."}, ";
}
$price = substr($price, 0, -2);
?>

  <title> </title>
  <!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css"> -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  

 <body>
  <div class="container" style="width:600px;">
   <!-- <h3 align="center">Last 10 Years Profit, Purchase and Sale Data</h3>    -->
   <div id="chart"></div>
  </div>
 </body>
</html>

<center>
<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $price;?>],
 xkey:['Date_price'],
 ykeys:['B_price','S_price'],
 labels:['ราคาซื้อ','ราคาขาย'],
 hideHover:'auto',
 stacked:true
});
</script>
</center>
