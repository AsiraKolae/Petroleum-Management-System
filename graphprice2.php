<?php 
//index.php
$connect = mysqli_connect("localhost", "root", "", "petroleum management system");

$query = "SELECT *, DATE_FORMAT(Date_Sprice95, '%d') AS Date_Sprice95
FROM Sprice95 ORDER BY DATE_FORMAT(Date_Sprice95, '%d%') ASC";

$result = mysqli_query($connect, $query);
$price = '';
while($row = mysqli_fetch_array($result))
{
  $price .= "{ S_price95:".$row["S_price95"].",Date_Sprice95:".$row["Date_Sprice95"]."}, ";
}
$price = substr($price, 0, -2);
?>

  <title> </title>
  <!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css"> -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

 <body>
  <div class="container" style="width:1500px; height:1000px; top:1000;">
   <!-- <h3 align="center">Last 10 Years Profit, Purchase and Sale Data</h3>    -->
   <div id="chart"></div>
  </div>
 </body>
</html>

<center>
<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $price; ?>],
 xkey:'Date_Sprice95',
 ykeys:['S_price95'],
 labels:['ราคาขาย'],
 hideHover:'auto',
 stacked:true
});
</script>
</center>

