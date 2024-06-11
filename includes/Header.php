<?php
session_start();
?>
<html>

<head>
    <meta charset="UTF-8" />
    <title>فروشگاه ایرانیان</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&family=Marhey:wght@300..700&display=swap"
        rel="stylesheet">

    <style type="text/css">
        .marhey {
            font-family: "Marhey", sans-serif;
            font-optical-sizing: auto;
            font-weight: weight;
            font-style: normal;
        }

        * {
            font-family: "Marhey";
            box-sizing: border-box;
            margin: 0px;
        }

        body {
            background-image: url(http://localhost/toyShop/images/products/30.jpg);
            background-size: cover;
            background-attachment: fixed;
            position: relative;
        }

        a:link {
            color: #FFCC80;
        }

        a:visited {
            color: #FFCC80;
        }

        a:hover {
            color: #7B1FA2;
        }

        .set_style_link {
            text-decoration: none;
            font-weight: bold;
        }
    </style>

</head>

<body>

    <div class="image" style=" position:absolute; top: 5px; right: 445px;; background-size: 100px;"> <img
            src="http://localhost/toyShop/images/products/duck-svgrepo-com.png" alt="" width="100px" height="auto">
    </div>
    <div class="image" style=" position:absolute; top: 5px; left: 445px; background-size: 100px;"> <img
            src="http://localhost/toyShop/images/products/123.png" alt="" width="100px" height="auto"></div>
    <div class="image" style=" position:absolute; top: 5px; right: 250px; background-size: 100px;"> <img
            src="http://localhost/toyShop/images/products/bear-svgrepo-com.png" alt="" width="100px" height="auto">
    </div>
    <div class="image" style=" position:absolute; top: 5px; left: 250px; background-size: 100px;"> <img
            src="http://localhost/toyShop/images/products/trolley-svgrepo-com.png" alt="" width="100px" height="auto">
    </div>
    <div class="image" style=" position:absolute; top: 8px; right: 55px; background-size: 100px;"> <img
            src="http://localhost/toyShop/images/products/horse-toy-svgrepo-com.png" alt="" width="100px" height="auto">
    </div>
    <div class="image" style=" position:absolute; top: 8px; left: 55px; background-size: 100px;"> <img
            src="http://localhost/toyShop/images/products/ball-svgrepo-com.png" alt="" width="100px" height="auto">
    </div>

    <div class="header"
        style=" background-color:rgba(230, 81, 0,0.95); width:100%; height: 165px; color:#FFCC80; padding-top:20px;  ">
        <h1 style=" text-align: center; font-size:40px;">اسباب بازی ایرانيان</h1>
        <div
            style="text-align: center; width:1024; display:flex; justify-content: space-between; margin-left:auto; margin-right:auto; flex-direction: row-reverse; font-size:20px; margin-top:20px;">
            <div><a href="index.php" class="set_style_link">صفحه اصلی</a></div>

            <?php
            
            if (isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true) {
                ?>
                <div><a href="logout.php" class="set_style_link">خروج از سایت
                        <?php echo (" ({$_SESSION["realname"]}) ") ?></a></div>
                <?php
            } 
            else {
                ?>
                <div><a href="register.php" class="set_style_link">عضويت در سايت</a></div>
                <div><a href="login.php" class="set_style_link">ورود به سايت</a></div>
                <?php
            } 
            ?>
            <div><a href="#" class="set_style_link">درباره ما</a></div>
            <div><a href="contact.php" class="set_style_link">ارتباط با ما</a></div>

            <?php
            if (isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true && $_SESSION["user_type"] == "admin") {
                ?>
                <div><a href="admin_products.php" class="set_style_link">مدیریت محصولات</a></div>
                <div><a href="admin_manage_order.php" class="set_style_link">مدیریت سفارشات</a></div>
                <?php
            } 
            ?>

        </div>
    </div>

    <div dir="rtl"
        style=" background-color:rgba(238, 238, 238,0.7) ; border: 15px solid rgba(230, 81, 0,0.9); font-size: 13pt;width: 1024px;margin-left: auto;margin-right: auto; position:relative; ">

        <div style="width: 100%; display:flex;  justify-content: space-between; gap:15px; ">

            <div style="width: 25%; text-align:center; align-self: center; ">
                بخش امكانات سايت
            </div>
            <div
                style="width: 768px; margin-bottom:50px; display:flex;  justify-content: space-between; flex-wrap:wrap; margin-left:15px;">