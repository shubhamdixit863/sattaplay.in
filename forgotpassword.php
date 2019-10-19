
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>



<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!------ Include the above in your HEAD tag ---------->

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<style media="screen">
.form-gap {
  padding-top: 70px;
}
</style>
</head>
 <div class="form-gap"></div>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>You can reset your password here.</p>
                  <div class="panel-body">

                    <form action="resetpassword.php"  method="post" >

                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="number" placeholder="phone number" class="form-control" maxlength="10" type="number" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <input  class="btn btn-lg btn-primary btn-block" value="Reset Password" name="submit" type="submit">
                      </div>
                      <div class="form-group">
                      <a class="btn btn-lg btn-primary btn-block" href="login.php">Login</a>
                      </div>

                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
<div class="copy-right">
<p>Copyright <a href="login.php">SattaPlay</a></p>
</div>
