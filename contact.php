<?php
include ("includes/header.php");
if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true)) {
   ?>
   <script type="text/javascript">

      location.replace("index.php");

   </script>
   <?php
}

$link = mysqli_connect("localhost", "root", "", "shop_db");

if (mysqli_connect_errno())
   exit("خطاي با شرح زير رخ داده است :" . mysqli_connect_error());

$query = "SELECT * FROM users WHERE username='{$_SESSION['username']}'";
$result = mysqli_query($link, $query);
if ($row = mysqli_fetch_array($result)) {

   $realname = $row['realname'];
   $email = $row['email'];
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
</style>
<form name="contact" action="action_contact.php" method="POST"
   style="width: 100%;margin-left: auto;margin-right: auto; margin-top:15px; margin-bottom:35px; display:flex;  justify-content: space-between; flex-wrap:wrap;">


   <div style=" display:inline-block; width:25%;">نام و نام خانودگي <span style="color: red;">*</span></div>
   <div style=" display:inline-block; width:75%;"><input type="text" id="realname" name="realname" value="<?php echo ($realname) ?>" /></div>
   <div style=" display:inline-block; width:25%;">آدرس پست الكترونيك <span style="color: red;">*</span></div>
   <div style=" display:inline-block; width:75%;"><input type="text" style="text-align: right;" id="email" name="email" value="<?php echo ($email) ?>" /></div>
   <div style=" display:inline-block; width:25%;">متن پيام <span style="color: red;">*</span></div>
   <div style=" display:inline-block; width:75%;"><textarea id="detail" name="detail" cols="39" rows="10" wrap="virtual" style="border: 2px solid rgb(255, 87, 34); border-radius: 8px;"></textarea></div>
   <div style=" display:inline-block; width:100%;"><input type="submit" value="ارسال" style="width: 34.5%; background-color:rgb(255, 87, 34); font-family:inherit; border-radius:8px; padding: 10px; margin-top:10px;" />&nbsp;&nbsp;&nbsp;<input type="reset" value="جديد" style="width: 34.5%; background-color:rgb(255, 87, 34); font-family:inherit; border-radius:8px; padding: 10px; margin-top:10px;"/></div>
</form>



<?php
include ("includes/footer.php");
?>