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

<script type="text/javascript">

   function check_empty() {
      var username = "";
      username = document.getElementById("username").value;
      if (username == "")
         alert('وارد کردن نام کاربری الزامی است');
      else {
         var r = confirm("از صحت اطلاعات وارد شده اطمینان دارید؟");
         if (r == true)
            document.register.submit();
      }
   }

</script>
<br />
<form name="register" action="action_register.php" method="POST"
   style="width: 100%;margin-left: auto;margin-right: auto; margin-bottom: 97.5px; margin-top:97.5px; display:flex;  justify-content: space-between; flex-wrap:wrap;">
   <div style=" display:inline-block; width:30%;">نام واقعي <span style="color: red;">*</span></div>
   <div style=" display:inline-block; width:70%; font-family:inherit;"><input type="text" id="realname"
         name="realname" /></div>
   <div style=" display:inline-block; width:30%;">نام كاربري <span style="color: red;">*</span></div>
   <div style=" display:inline-block; width:70%;"><input type="text" style="text-align: left;" id="username"
         name="username" /></div>
   <div style=" display:inline-block; width:30%;">كلمه عبور <span style="color: red;">*</span></div>
   <div style=" display:inline-block; width:70%;"><input type="password" style="text-align: left;" id="password"
         name="password" /></div>
   <div style=" display:inline-block; width:30%;">تكرار كلمه عبور <span style="color: red;">*</span></div>
   <div style=" display:inline-block; width:70%;"><input type="password" style="text-align: left;" id="repassword"
         name="repassword" /></div>
   <div style=" display:inline-block; width:30%;">پست الكترونيكي <span style="color: red;">*</span></div>
   <div style=" display:inline-block; width:70%;"><input type="text" style="text-align: left;" id="email"
         name="email" /></div>
   <div style=" display:inline-block; width:100%;">
      <input type="button" value="ثبت نام" onclick="check_empty()"
         style="width: 35%; background-color:rgb(255, 87, 34); font-family:inherit; border-radius:8px; padding: 10px;" />
      &nbsp;&nbsp;&nbsp;
      <input type="reset" value="جديد"
         style="width: 35%; background-color:rgb(255, 87, 34); font-family:inherit; border-radius:8px; padding: 10px;" />
   </div>
</form>


<?php
include ("includes/footer.php");
?>