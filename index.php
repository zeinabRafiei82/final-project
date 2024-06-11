<?php

include ("includes/header.php");

$link = mysqli_connect("localhost", "root", "", "shop_db");

if (mysqli_connect_errno())
    exit("خطاي با شرح زير رخ داده است :" . mysqli_connect_error());

$query = "SELECT * FROM products";

$result = mysqli_query($link, $query);

$counter = 0;
while ($row = mysqli_fetch_array($result)) {
    $counter++;
    ?>


    <div
        style="border: 5px solid #BF360C;vertical-align: top;width: 235px; margin-top:15px; text-align:center; border-radius:15px; background-color:rgba(191, 54, 12,0.2); position:relative; height: 350px; box-shadow:0 0 2.5px #BF360C">

        <h4 style="color: #BF360C; font-size:20px; height:36px;"><?php echo ($row['pro_name']) ?></h4>
        <a href="product_detail.php?id=<?php echo ($row['pro_code']) ?>" style="text-decoration: none;">
            <img src="images/products/<?php echo ($row['pro_image']) ?>" width="200px" height="130px"
                style="border: 3px solid #BF360C; border-radius:10px;" />
        </a>
        <br />

        قيمت : <?php echo ($row['pro_price']) ?> &nbsp; تومان
        <br />

        تعداد موجودي : <span style="color:#BF360C; font-weight:bold;"><?php echo ($row['pro_qty']) ?></span>
        <br />

        توضيحات : <span
            style="color:green; width: 200px; display:inline-block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
            <?php echo (substr($row['pro_detail'], 0, 230)) ?> ...</span>

        <br /><br />
        <b><a href="product_detail.php?id=<?php echo ($row['pro_code']) ?>"
                style="text-decoration: none; position:absolute; background-color:#BF360C; border-radius:10px; bottom: 10px; right: 10px; left: 10px; padding: 4px 0 4px;">توضيحات
                تكميلي و
                خريد</a></b>

    </div>

    <?php
    if ($counter % 3 == 0)
        echo ("</tr><tr>");
}

if ($counter % 3 != 0)
    echo ("</tr>");

include ("includes/footer.php");
?>