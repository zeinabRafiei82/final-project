<?php
include ("includes/header.php");
if (
   !(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true && $_SESSION["user_type"] ==
      "admin")
) {
   ?>
   <script type="text/javascript">

      location.replace("index.php");

   </script>
   <?php
}

$link = mysqli_connect("localhost", "root", "", "shop_db");

if (mysqli_connect_errno())
   exit("خطاي با شرح زير رخ داده است :" . mysqli_connect_error());

$url = $pro_code = $pro_name = $pro_qty = $pro_price = $pro_image = $pro_detail = "";

$btn_caption = "افزودن كالا";
if (isset($_GET['action']) && $_GET['action'] == 'EDIT') {
   $id = $_GET['id'];
   $query = "SELECT * FROM products WHERE pro_code='$id'";
   $result = mysqli_query($link, $query);
   if ($row = mysqli_fetch_array($result)) {
      $pro_code = $row['pro_code'];
      $pro_name = $row['pro_name'];
      $pro_qty = $row['pro_qty'];
      $pro_price = $row['pro_price'];
      $pro_image = $row['pro_image'];
      $pro_detail = $row['pro_detail'];
      $url = "?id=$pro_code&action=EDIT";
      $btn_caption = "ويرايش كالا";

   }

}
?>

<style>
   input[type="text"] {
      width: 61%;
      border: 2px solid rgb(255, 87, 34);
      padding: 10px;
      border-radius: 8px;
      color: #1b1b1b;
      display: block;
      transition: 180ms ease-in border-color;
      margin-bottom: 5px;
   }

   th {
      background-color: rgb(230, 81, 0);
      color: #FFCC80;
      border-radius: 10px;
   }

   td {
      background-color: rgba(230, 81, 0, 0.5);
      border-radius: 10px;
   }

   a:link {
      color: #B71C1C;
   }

   a:hover {
      color: #7B1FA2;
   }
</style>

<br />

<form name="add_product" action="action_admin_products.php<?php if (!empty($url))
   echo ($url); ?>" method="POST" enctype="multipart/form-data"
   style="width: 100%;margin-left: auto;margin-right: auto; margin-top:15px; margin-bottom:35px; display:flex;  justify-content: space-between; flex-wrap:wrap;">


   <div style=" display:inline-block; width:30%;">کد کالا <span style="color: red;">*</span></div>
   <div style=" display:inline-block; width:70%;"><input type="text" id="pro_code" name="pro_code"
         value="<?php echo ($pro_code) ?>" /></div>
   <div style=" display:inline-block; width:30%;">نام کالا <span style="color: red;">*</span></div>
   <div style=" display:inline-block; width:70%;"><input type="text" style="text-align: right;" id="pro_name"
         name="pro_name" value="<?php echo ($pro_name) ?>" /></div>
   <div style=" display:inline-block; width:30%;">موجودی کالا <span style="color: red;">*</span></div>
   <div style=" display:inline-block; width:70%;"><input type="text" style="text-align: left;" id="pro_qty"
         name="pro_qty" value="<?php echo ($pro_qty) ?>" /></div>
   <div style=" display:inline-block; width:30%;">قیمت کالا <span style="color: red;">*</span></div>
   <div style=" display:inline-block; width:70%;"><input type="text" style="text-align: left;" id="pro_price"
         placeholder="تومان" name="pro_price" value="<?php echo ($pro_price) ?>" /></div>
   <div style=" display:inline-block; width:30%;">آپلود تصویر کالا <span style="color: red;">*</span></div>
   <div style=" display:inline-block; width:70%;"><input type="file" style="text-align: left;" id="pro_image"
         name="pro_image" size="30" /><?php if (!empty($pro_image))
            echo ("<img src='images/products/$pro_image' width='80' height='40' />"); ?>
   </div>
   <div style=" display:inline-block; width:30%;">توضیحات تکمیلی کالا <span style="color: red;">*</span></div>
   <div style=" display:inline-block; width:70%;"><textarea id="pro_detail" name="pro_detail" cols="36" rows="10"
         wrap="virtual"
         style="border: 2px solid rgb(255, 87, 34); border-radius: 8px;"> <?php echo ($pro_detail) ?></textarea></div>
   <div style=" display:inline-block; width:100%;"><input type="submit" value="<?php echo ($btn_caption) ?>"
         style="width: 35.5%; background-color:rgb(255, 87, 34); font-family:inherit; border-radius:8px; padding: 10px; margin-top:10px;" />&nbsp;&nbsp;&nbsp;<input
         type="reset" value="جديد"
         style="width: 35.5%; background-color:rgb(255, 87, 34); font-family:inherit; border-radius:8px; padding: 10px; margin-top:10px;" />
   </div>
</form>

<?php

$query = "SELECT * FROM products";
$result = mysqli_query($link, $query);

?>

<table style="width: 100%; text-align: center;">
   <tr>
      <th>كد كالا</th>
      <th>نام كالا</th>
      <th>موجودي كالا</th>
      <th>قيمت كالا</th>
      <th>تصوير كالا</th>
      <th>ابزار مديريتي</th>
   </tr>

   <?php
   while ($row = mysqli_fetch_array($result)) {
      ?>
      <tr>
         <td><?php echo ($row['pro_code']) ?></td>
         <td><?php echo ($row['pro_name']) ?></td>
         <td><?php echo ($row['pro_qty']) ?></td>
         <td><?php echo ($row['pro_price']) ?>&nbsp; تومان</td>
         <td><img src="images/products/<?php echo ($row['pro_image']) ?>" width="120px" height="40px"
               style="border-radius:10px ;" /></td>
         <td>
            <b><a href="action_admin_products.php?id=<?php echo ($row['pro_code']) ?>&action=DELETE"
                  style="text-decoration: none">حذف</a></b>
            &nbsp;|&nbsp;
            <b><a href="admin_products.php?id=<?php echo ($row['pro_code']) ?>&action=EDIT"
                  style="text-decoration: none;">ويرايش</a></b>
         </td>
      </tr>
      <?php
   }
   ?>

</table>



<?php
include ("includes/footer.php");
?>