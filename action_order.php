<?php
include ("includes/header.php");
if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true)) {
    ?>
    <script type="text/javascript">

        location.replace("index.php");

    </script>
    <?php
}
$pro_code = $_POST['pro_code'];
$pro_name = $_POST['pro_name'];
$pro_qty = $_POST['pro_qty'];
$pro_price = $_POST['pro_price'];
$total_price = $_POST['total_price'];
$realname = $_POST['realname'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];
$username = $_SESSION['username'];

$link = mysqli_connect("localhost", "root", "", "shop_db");

if (mysqli_connect_errno())
    exit("خطاي با شرح زير رخ داده است :" . mysqli_connect_error());


$query = "INSERT INTO orders 
    (id,
     username,
     orderdate,
     pro_code,
     pro_qty,
     pro_price,
     mobile,
     address,
     trackcode,
     state
     ) VALUES
      ('0',
       '$username',
       '" . date('y-m-d') . "',
       '$pro_code',
       '$pro_qty',
       '$pro_price',
       '$mobile',
       '$address',
       '000000000000000000000000',
       '0')";

if (mysqli_query($link, $query) === true) {
    echo ("<p style='color:#00695C; text-align:center; font-size:20px; border: 3px solid rgba(0, 137, 123,0.3); padding-bottom: 20px; border-radius: 20px; width: 725px; background-color:rgba(0, 137, 123,0.3); margin-top:20px; margin-bottom:20;'><br/><b>سفارش شما با موفقیت در سامانه ثبت شد</b></p>");
    ?>
    <div
        style=" background-color:rgba(255, 111, 0,0.5); width: 725px; height: 325px; position:absolute; border-radius:20px; border: 3px solid rgb(255, 111, 0); top:130;">
    </div>
    <?php
    echo ("<p style='color:#1A237E; padding-right: 15px;'><br/><b>کاربر گرامی آقا/خانم $realname</b></p>");
    echo ("<p style='color:#1A237E; padding-right: 15px;'><b>محصول $pro_name با کد $pro_code به تعداد/مقدار $pro_qty با قیمت پایه $pro_price تومان را سفارش داده‌اید.</b></p>");
    echo ("<p style='color:#880E4F; padding-right: 15px;'><br/><b>مبلغ قابل پرداخت برای سفارش ثبت شده $total_price تومان است.</b></p>");

    echo ("<p style='color:blue; padding-right: 15px;'><br/><b>پس از بررسی سفارش و تایید آن با شما تماس گرفته خواهد شد.</b></p>");
    echo ("<p style='color:blue; padding-right: 15px;'><b>محصول خریداری شده از طریق پست جمهوری اسلامی ایران طبق آدرس درج شده ارسال خواهد شد.</b></p>");
    echo ("<p style='color:blue; padding-right: 15px;'><b>در هنگام تحویل گرفتن محصول آن را بررسی و از صحت و سالم بودن آن اطمینان حاصل کنید سپس مبلغ کالا را طبق فاکتور ارائه شده به مامور پست تحویل دهید.</b><br/><br/></p>");

    $query = "UPDATE products SET pro_qty=pro_qty-$pro_qty WHERE pro_code='$pro_code'";
    mysqli_query($link, $query);

} else
    echo ("<p style='color:red;'><b>خطا در ثبت سفارش</b></p>");


mysqli_close($link);

include ("includes/footer.php");
?>