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

?>

<br />

<?php

$query = "SELECT * FROM orders";
$result = mysqli_query($link, $query);
$countOrders = 0;

?>

<div border="1px" style="width: 768px; flex-wrap:nowrap;">



	<?php
	while ($row = mysqli_fetch_array($result)) {
		$countOrders++;
		?>
		<div
			style="height: 50px; background-color:rgb(142, 36, 170); border-radius:10px; margin-top:15px; text-align:center; color: #E1BEE7; padding-top:5px; font-size:25px;">
			شماره سفارش: <?php echo ($countOrders) ?>
		</div>

		<div style=" display:flex; justify-content: space-between; text-align:center;">
			<div style=" background-color:#D81B60; width:14%; border-radius:10px; margin-top: 15px;">كد سفارش</div>
			<div style=" background-color:#D81B60; width:14%; border-radius:10px; margin-top: 15px;">نام خریدار</div>
			<div style=" background-color:#D81B60; width:14%; border-radius:10px; margin-top: 15px;">نام محصول</div>
			<div style=" background-color:#D81B60; width:14%; border-radius:10px; margin-top: 15px;">تاریخ سفارش</div>
			<div style=" background-color:#D81B60; width:14%; border-radius:10px; margin-top: 15px;">تعداد سفارش</div>
			<div style=" background-color:#D81B60; width:14%; border-radius:10px; margin-top: 15px;">قيمت كالا</div>
			<div style=" background-color:#D81B60; width:14%; border-radius:10px; margin-top: 15px;">قیمت نهایی</div>
		</div>
		<div style=" display:flex; justify-content: space-between; text-align:center;">
			<div style=" background-color:#F48FB1; width:14%; border-radius:10px; margin-top: 5px;">
				<?php echo ($row['id']) ?>
			</div>
			<div style=" background-color:#F48FB1; width:14%; border-radius:10px; margin-top: 5px;">
				<?php
				$query = "SELECT * FROM users  WHERE username='{$row['username']}'";
				$result2 = mysqli_query($link, $query);
				$row_user = mysqli_fetch_array($result2);
				echo ($row_user['realname'])
					?>
			</div>
			<div style=" background-color:#F48FB1; width:14%; border-radius:10px; margin-top: 5px;">
				<?php
				$query = "SELECT * FROM products WHERE pro_code='{$row['pro_code']}'";
				$result2 = mysqli_query($link, $query);
				$row_product = mysqli_fetch_array($result2);
				echo ($row_product['pro_name'])
					?>
			</div>
			<div style=" background-color:#F48FB1; width:14%; border-radius:10px; margin-top: 5px;">
				<?php echo ($row['orderdate']) ?>
			</div>
			<div style=" background-color:#F48FB1; width:14%; border-radius:10px; margin-top: 5px;">
				<?php echo ($row['pro_qty']) ?>
			</div>
			<div style=" background-color:#F48FB1; width:14%; border-radius:10px; margin-top: 5px;">
				<?php echo ($row['pro_price']) ?>&nbsp; تومان
			</div>
			<div style=" background-color:#F48FB1; width:14%; border-radius:10px; margin-top: 5px;">
				<?php
				echo ($row['pro_qty'] * $row['pro_price']);
				?>
				&nbsp; تومان
			</div>
		</div>
		<div style=" display:flex; justify-content: space-between; text-align:center;">
			<div style=" background-color:#D81B60; width:14%; border-radius:10px; margin-top: 5px;">شماره تماس</div>
			<div style=" background-color:#D81B60; width:14%; border-radius:10px; margin-top: 5px;">آدرس</div>
			<div style=" background-color:#D81B60; width:14%; border-radius:10px; margin-top: 5px;">کد مرسوله پستی</div>
			<div style=" background-color:#D81B60; width:14%; border-radius:10px; margin-top: 5px;">وضعیت سفارش</div>
			<div style=" background-color:#D81B60; width:42%; border-radius:10px; margin-top: 5px;">ابزار مديريتی</div>
		</div>
		<div style=" display:flex; justify-content: space-between; text-align:center;">
			<div style=" background-color:#F48FB1; width:14%; border-radius:10px; margin-top: 5px;">
				<?php echo ($row['mobile']) ?>
			</div>
			<div style=" background-color:#F48FB1; width:14%; border-radius:10px; margin-top: 5px; overflow:auto;">
				<?php echo ($row['address']) ?>
			</div>
			<div style=" background-color:#F48FB1; width:14%; border-radius:10px; margin-top: 5px; overflow:auto;">
				<?php echo ($row['trackcode']) ?>
			</div>
			<div style=" background-color:#F48FB1; width:14%; border-radius:10px; margin-top: 5px;" bgcolor="#88FFC9">
				<?php
				switch ($row['state']) {
					case 0:
						echo ("تحت بررسی");
						break;
					case 1:
						echo ("آماده برای ارسال");
						break;
					case 2:
						echo ("ارسال شده ");
						break;
					case 3:
						echo ("سفارش لغو شده است");
						break;
				}
				?>
			</div>

			<div
				style=" background-color:#F48FB1; width:42%; border-radius:10px; margin-top: 5px; position:relative; padding-bottom:10px;">
				<div style=" margin-top:10px;"><a
						href="action_admin_manage_order.php?id=<?php echo ($row['id']) ?>&action=BARASI"
						style="text-decoration: none; background-color:#D81B60; border-radius:10px; padding:0px 76px 0px;">تحت
						بررسی</a></div>

				<div style=" margin-top:10px;"><a
						href="action_admin_manage_order.php?id=<?php echo ($row['id']) ?>&action=AMADEHERSAL"
						style="text-decoration: none; background-color:#D81B60; border-radius:10px; padding:0px 58px 0px;">آماده
						برای ارسال</a></div>

				<div style=" margin-top:10px;"><a
						href="action_admin_manage_order.php?id=<?php echo ($row['id']) ?>&action=ERSALSHODEH"
						style="text-decoration: none; background-color:#D81B60; border-radius:10px; padding:0px 76px 0px;">ارسال
						شده</a></div>

				<div style=" margin-top:15px;"><a
						href="action_admin_manage_order.php?id=<?php echo ($row['id']) ?>&action=LAGHV"
						style="text-decoration: none; color:rgb(239, 83, 80); background-color:#D81B60; border-radius:10px; padding:0px 55px 0px;">سفارش
						لغو شده</a></div>

			</div>



		</div>


		<?php
	} //while
	?>

	</>

	<?php
	include ("includes/footer.php");
	?>