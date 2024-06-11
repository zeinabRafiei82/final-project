<?php
include ("includes/header.php");

if (isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true) {
   ?>
   <script type="text/javascript">

      location.replace("index.php");

   </script>
   <?php
}
?>
<style>
   input[type="text"],
   input[type="password"] {
      width: 59%;
      border: 2px solid rgb(255, 87, 34);
      padding: 10px;
      border-radius: 8px;
      color: #1b1b1b;
      display: block;
      transition: 180ms ease-in border-color;
      margin-bottom: 5px;
   }
</style>
<br />
<form name="login" action="action_login.php" method="POST"
   style="width: 100%;margin-left: auto;margin-right: auto; margin-bottom: 163px; margin-top:163px; display:flex;  justify-content: space-between; flex-wrap:wrap;">

   <div div style=" display:inline-block; width:30%;">نام كاربري <span style="color: red;">*</span></div>
   <div div style=" display:inline-block; width:70%;"><input type="text" style="text-align: left;" id="username"
         name="username" /></div>
   <div div style=" display:inline-block; width:30%;">كلمه عبور <span style="color: red;">*</span></div>
   <div div style=" display:inline-block; width:70%;"><input type="password" style="text-align: left;" id="password"
         name="password" /></div>
   <div div style=" display:inline-block; width:100%;"><input type="submit" value="ورود" style="width: 35%; background-color:rgb(255, 87, 34); font-family:inherit; border-radius:8px; padding: 10px; padding: 10px; margin-top:10px;" />&nbsp;&nbsp;&nbsp;<input
         type="reset" value="جديد" style="width: 35%; background-color:rgb(255, 87, 34); font-family:inherit; border-radius:8px; padding: 10px; margin-top:10px;" /></div>

</form>


<?php
include ("includes/footer.php");
?>