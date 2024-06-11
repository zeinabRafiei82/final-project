<?php
include ("includes/header.php");


$link = mysqli_connect("localhost", "root", "", "shop_db");

if (mysqli_connect_errno())
    exit("خطاي با شرح زير رخ داده است :" . mysqli_connect_error());

$pro_code=0;
if (isset($_GET['id']))
	 $pro_code=$_GET['id'];

$query = "SELECT * FROM products WHERE pro_code='$pro_code'";          

$result = mysqli_query($link, $query);     

?>

 <table style="width: 100%; text-align:center;"  >
  <tr>
  
  <?php

    if ($row = mysqli_fetch_array($result)) {
  
   ?> 

  
	<td style="vertical-align: top;" >

       <h4 style="color: brown; font-size:30px;"><?php echo ($row['pro_name']) ?></h4>
 
       <img src="images/products/<?php echo ($row['pro_image']) ?>" width="300px" height="250px" style="border-radius: 10px; border:5px solid brown;"/>
     
       <br/>

    قيمت  : <?php echo ($row['pro_price']) ?> &nbsp; تومان
    <br/>

    تعداد موجودي  : <span style="color:brown;"><?php echo ($row['pro_qty']) ?></span>
    <br/><br/>

     توضيحات  : <span style="color:brown; background-color:rgba(183, 28, 28,0.3); border-radius:10px; padding:5px; border: 2px solid rgb(183, 28, 28);"> <?php echo ($row['pro_detail']) ?> </span>

     <br/><br/>
    <b><a href="order.php?id=<?php echo ($row['pro_code']) ?>" style="text-decoration: none; background-color:rgb(183, 28, 28); border-radius:10px; padding:8px 40px 8px;">سفارش و خرید پستی</a></b>
    <br/><br/>
           
    </td>  
    
<?php
   
	  
} 

?>  
</tr>
</table>

<?php
include ("includes/footer.php");
?>
   
