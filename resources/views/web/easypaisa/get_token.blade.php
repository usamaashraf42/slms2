<html>
<title>EasyPay confirm</title>
<body>
<div class="clear"></div>
      <div align="center">
      <img src="images/wait.gif"></img>
      </div>
<form action="https://easypaystg.easypaisa.com.pk/easypay/Confirm.jsf " method="POST" id="easyPayAuthForm">
<input name="auth_token" value="<?php echo $_GET['auth_token'] ?>" hidden = "true"/>
<input name="postBackURL" value="http://localhost:8000/easypaisa" hidden = "true"/>
<input value="confirm" type = "submit" name= "pay"/> 
</form>
</body>
<script>
(function() {
  document.getElementById("easyPayAuthForm").submit();
})();
</script>
<html>
