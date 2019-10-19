<?php
include 'config.php';
include 'database.php';




 ?>


 <!--
 Author: W3layouts
 Author URL: http://w3layouts.com
 License: Creative Commons Attribution 3.0 Unported
 License URL: http://creativecommons.org/licenses/by/3.0/
 -->
 <!DOCTYPE html>
 <html>
 <head>
 		<meta charset="utf-8">
 		<link href="css/style.css" rel='stylesheet' type='text/css' />
    <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 		<meta name="viewport" content="width=device-width, initial-scale=1">
 		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 		<!--webfonts-->
 		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text.css'/>
 		<!--//webfonts-->
 </head>
 <body>
 	<div class="main">
 		<div class="header" >
 			<h1>Login or Create a Free Account!</h1>
 		</div>
 		<p>Create Your Free Account To Access Our Services </p>
 			  <form  method="post" action="sendsms.php">
 				<ul class="left-form">
 					<h2>New Account:</h2>
          <li>



            <input type="text"  name="your_name" placeholder="Your Name" maxlength="10" required/>
            <a href="#" class="icon ticker"> </a>
            <div class="clear"> </div>
          </li>

 					<li>



 						<input type="text"  name="number" placeholder="Mobile Number" maxlength="10" required/>
 						<a href="#" class="icon ticker"> </a>
 						<div class="clear"> </div>
 					</li>


 					<label class="checkbox">*<i> </i>You will receive an sms with your login id and password</label>
 					<input type="submit" name="createuser"  value="Create Account">
          </form>
 						<div class="clear"> </div>
 				</ul>
        <form method="post" action="" id="loginform">
 				<ul class="right-form">
 					<h3>Login:</h3>
 					<div>
 						<li><input type="text" name="username" placeholder="Username" required/></li>
 						<li> <input type="password"  name="password" placeholder="Password" required/></li>
 					<a href="forgotpassword.php"> forgot Password!</a>
 							<input type="submit"  value="Login" >
            </form>
 					</div>
 					<div class="clear"> </div>
 				</ul>
 				<div class="clear"> </div>



 		</div>
 			<!-----start-copyright---->
    					<div class="copy-right">
 						<p>Copyright <a href="sattaplay.in">SattaPlay</a></p>
 					</div>
 				<!-----//end-copyright---->


<script>
$("#loginform").submit(function (e) {
  e.preventDefault();
  $.ajax({
   type:'post',
   url:'logincheck.php',
   data:$("#loginform").serialize(),//this _token should be as it is
   success:function (result) {
     if (result=="success") {
      window.location.href='playpage.php';
     }
     else {
         alert(result);
     }

   }

  });


});


</script>

 </body>
 </html>
