<?php
include ("includes/header.php");

$link = mysqli_connect("localhost", "root", "", "shop_db");

if (mysqli_connect_errno())
   exit("خطاي با شرح زير رخ داده است :" . mysqli_connect_error());

$pro_code = 0;
if (isset($_GET['id']))
   $pro_code = $_GET['id'];
if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true)) {
   ?>
   <br />
   <span style='color:red;'><b>برای خرید پستی محصول انتخاب شده باید وارد سایت شوید</b></span>
   <br /><br />

   درصورتی که عضو فروشگاه هستید برای ورود
   <a href='login.php' style='text-decoration: none;'><span style='color:blue;'><b>اینجا</b></span></a>
   کلیک کنید
   <br />

   و در صورتی که عضو نیستید برای ثبت نام در سایت
   <a href='register.php' style='text-decoration: none;'><span style='color:green;'><b>اینجا</b></span></a>
   کلیک کنید
   <br /><br />
   <?php
   exit();
}




$query = "SELECT * FROM products WHERE pro_code='$pro_code'";

$result = mysqli_query($link, $query);

?>

<style>
   input[type="text"] {
      width: 100%;
      border: 2px solid rgb(255, 87, 34);
      padding: 3px;
      border-radius: 8px;
      color: #1b1b1b;
      display: block;
      transition: 180ms ease-in border-color;
      margin-bottom: 4px;
   }
</style>

<form name="order" action="action_order.php" method="POST"
   style="width: 100%; display:flex; justify-content: space-between; flex-wrap:wrap; ">

   <div style="width: 60%; ">

      <?php

      if ($row = mysqli_fetch_array($result)) {

         ?>

         <br />

         <div style="width: 100%;margin-left: auto;margin-right: auto;">


            <div style=" display:inline-block; width:49%;">کد کالا <span style="color: red;">*</span></div>
            <div style=" display:inline-block; width:50%;"><input type="text" id="pro_code" name="pro_code"
                  value="<?php echo ($pro_code); ?>" style="background-color: lightgray;" readonly /></div>
            <div style=" display:inline-block; width:49%;">نام کالا <span style="color: red;">*</span></div>
            <div style=" display:inline-block; width:50%;"><input type="text"
                  style="text-align: right;background-color: lightgray;" id="pro_name" name="pro_name"
                  value="<?php echo ($row['pro_name']); ?>" readonly /></div>

            <div style=" display:inline-block; width:49%;">تعداد یا مقدار درخواستی <span style="color: red;">*</span></div>
            <div style=" display:inline-block; width:50%;"><input type="text" style="text-align: left;" id="pro_qty"
                  name="pro_qty" onchange="calc_price();" /></div>
            <div style=" display:inline-block; width:49%;">قیمت واحد کالا<span style="color: red;">*</span></div>
            <div style=" display:inline-block; width:50%;"><input type="text"
                  style="text-align: left;background-color: lightgray;" id="pro_price" name="pro_price"
                  value="<?php echo ($row['pro_price']); ?> " readonly /></div>
            <div style=" display:inline-block; width:49%;">مبلغ قابل پرداخت<span style="color: red;">*</span></div>
            <div style=" display:inline-block; width:50%;"><input type="text"
                  style="text-align: left;background-color: lightgray;" id="total_price" name="total_price" value="0"
                  readonly /></div>



            <script type="text/javascript">

               function calc_price() {
                  var pro_qty = <?php echo ($row['pro_qty']); ?>;  
                  var price = document.getElementById('pro_price').value;
                  var count = document.getElementById('pro_qty').value;
                  var total_price;

                  if (count > pro_qty) {
                     alert('تعداد موجودی انبار کمتر از درخواست شما است!!');
                     document.getElementById('pro_qty').value = 0;
                     count = 0;
                  }

                  if (count == 0 || count == '')
                     total_price = 0;
                  else
                     total_price = count * price;
                  document.getElementById('total_price').value = total_price;

               }


            </script>


            <?php
            //ذخیره مشخصات کاربر در آرایه
            $query = "SELECT * FROM users WHERE username='{$_SESSION['username']}'";
            $result = mysqli_query($link, $query);
            $user_row = mysqli_fetch_array($result);
            ?>

            <div style=" display:inline-block; width:49%;">نام خریدار <span style="color: red;">*</span></div>
            <div style=" display:inline-block; width:50%;">
               <input type="text" id="realname" name="realname" value="<?php echo ($user_row['realname']); ?>"
                  style="background-color: lightgray;" readonly />
            </div>
            <div style=" display:inline-block; width:49%;">پست الكترونيكي <span style="color: red;">*</span></div>
            <div style=" display:inline-block; width:50%;"><input type="text"
                  style="text-align: left;background-color: lightgray;" id="email" name="email"
                  value="<?php echo ($user_row['email']); ?>" readonly /></div>

            <div style=" display:inline-block; width:49%;">شماره تلفن همراه <span style="color: red;">*</span></div>
            <div style=" display:inline-block; width:50%;"><input type="text" style="text-align: left;" id="mobile"
                  name="mobile" value="09" /></div>
            <div style=" display:inline-block; width:49%;">آدرس دقیق پستی جهت دریافت محصول <span
                  style="color: red;">*</span></div>
            <div style=" display:inline-block; width:50%;"><textarea
                  style="text-align: right;font-family:inherit; border: 2px solid rgb(255, 87, 34); border-radius: 8px;"
                  id="address" name="address" cols="24" rows="3" wrap="virtual"></textarea> </div>

            <div style=" display:inline-block; width:100%;"><input type="button" value="خرید محصول"
                  onclick="check_input();"
                  style="width: 50%; background-color:rgb(255, 87, 34); font-family:inherit; border-radius:8px; padding: 10px; margin-top:10px; margin-right:216px;" />
            </div>


         </div>

      </div>


      <td>


         <script type="text/javascript">

            function check_input() {
               var r = confirm("از صحت اطلاعات وارد شده اطمینان دارید؟");
               if (r == true) {
                  var validation = true;
                  var count = document.getElementById('pro_qty').value;
                  var mobile = document.getElementById('mobile').value;
                  var address = document.getElementById('address').value;

                  if (count == 0 || count == '')
                     validation = false;

                  if (mobile.length < 11)
                     validation = false;

                  if (address.length < 15)
                     validation = false;

                  if (validation)
                     document.order.submit();
                  else
                     alert('برخی از ورودی های فرم سفارش محصول به درستی پر نشده‌اند');
               }
            }

         </script>

         <div style="text-align:center; width: 33%; margin-left:auto; margin-right:auto; margin-top:75px;">
               <td style="vertical-align: top;">
                  <h4 style="color: brown; font-size:30px;"><?php echo ($row['pro_name']) ?></h4>
                  <img src="images/products/<?php echo ($row['pro_image']) ?>" width="250px" height="120px"
                     style="border-radius: 10px; border:5px solid brown;" />
                  <br />
                  قیمت واحد : <?php echo ($row['pro_price']) ?>&nbsp; تومان
                  <br />
                  مقدار موجودي : <span style="color:brown;"><?php echo ($row['pro_qty']) ?></span>
                  <br />
                  توضيحات : <span style="color:brown;">
                     <?php
                     $count = strlen($row['pro_detail']);
                     echo (substr($row['pro_detail'], 0, (int) ($count / 4)));
                     ?>
                     ...</span>

                  <br /><br />
               </td>
         </div>

   </form>

   <?php
      } // if
      

      include ("includes/footer.php");
      ?>