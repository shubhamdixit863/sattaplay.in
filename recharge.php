
<?php
ob_start();
//header('Access-Control-Allow-Origin: *');
include 'config.php';
include 'database.php';

session_start();
if (!isset($_SESSION['username'])) {
header('Location:login.php');

}


if (isset($_GET['logout'])) {
  session_destroy();
  header('Location:login.php');
}

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=2, user-scalable=no" name="viewport" />
    <meta content="Semantic-UI-Forest, collection of design, themes and templates for Semantic-UI." name="description" />
    <meta content="Semantic-UI, Theme, Design, Template" name="keywords" />
    <meta content="PPType" name="author" />
    <meta content="#ffffff" name="theme-color" />
    <title>Satta</title>
    <link href="static/dist/semantic-ui/semantic.min.css" rel="stylesheet" type="text/css" />
    <link href="static/stylesheets/default.css" rel="stylesheet" type="text/css" />
    <link href="static/stylesheets/pandoc-code-highlight.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/cupertino/jquery-ui.css">
    <script src="static/dist/jquery/jquery.min.js"></script>

  </head>
  <body>
    <div class="ui inverted huge borderless fixed fluid menu">
      <a class="header item">Hi ,<?php echo $_SESSION['username'] ?></a>
      <div class="right menu">
        <div class="item">
          <div class="ui small input">
            <input placeholder="Search..." />
          </div>
        </div>
        <a class="item" href="dashboard.php">Dashboard</a><a class="item" href="playpage.php">Booking</a><a class="item" href="myprofile.php">Profile</a><a class="item" href="playpage.php?signout">Sign Out</a>
      </div>
    </div>
    <div class="ui grid">
      <div class="row">
        <div class="column" id="sidebar">
          <div class="ui secondary vertical fluid menu">
            <a class="item" href="dashboard.php">Overview</a>
              <a class="  item" href="requestmoney.php">Redeem Money</a>
            <a class="item" href="analytics.php">Analytics</a>
            <a class="active item" href="recharge.php">Recharge</a>



          </div>
        </div>
        <div class="column" id="content">
<div class="row">
  <h4>Current Balance- <?php   $stmt=$db->prepare("SELECT balance FROM `users` WHERE username=:user ");
     $stmt->bindParam(":user",$_SESSION['username']);
     $run=$stmt->execute();
     $result=$stmt->fetch(PDO::FETCH_ASSOC);
echo $result['balance'];

     ?></h4>
  <div class="col-md-6">
    <form class="" action="" method="post" id="transferform">
      <label for="">Phone</label>
      <input type="number" name="iname" value="" class="form-control" placeholder="Phone" required>
        <label for="">Amount</label>
      <input type="text" name="amount" value="" class="form-control" placeholder="Amount" id="amount" required>
<input type="hidden" name="userid" value="<?php echo $_SESSION['username'] ?>">

<input type="submit" name="" value="SUBMIT" class="btn btn-block btn-info" style="margin-top:20px;">
    </form>

  </div>

  </div>

</div>

    </div>
    <style type="text/css">
      body {
        display: relative;
      }

      #sidebar {
        position: fixed;
        top: 51.8px;
        left: 0;
        bottom: 0;
        width: 18%;
        background-color: #f5f5f5;
        padding: 0px;
      }
      #sidebar .ui.menu {
        margin: 2em 0 0;
        font-size: 16px;
      }
      #sidebar .ui.menu > a.item {
        color: #337ab7;
        border-radius: 0 !important;
      }
      #sidebar .ui.menu > a.item.active {
        background-color: #337ab7;
        color: white;
        border: none !important;
      }
      #sidebar .ui.menu > a.item:hover {
        background-color: #4f93ce;
        color: white;
      }

      #content {
        margin-left: 19%;
        width: 81%;
        margin-top: 3em;
        padding-left: 3em;
        float: left;
      }
      #content > .ui.grid {
        padding-right: 4em;
        padding-bottom: 3em;
      }
      #content h1 {
        font-size: 36px;
      }
      #content .ui.divider:not(.hidden) {
        margin: 0;
      }
      #content table.ui.table {
        border: none;
      }
      #content table.ui.table thead th {
        border-bottom: 2px solid #eee !important;
      }
    </style>
    <script>
      $( function() {
        $( "#datepicker" ).datepicker();
      } );

      $( function() {
        $( "#hdatepicker" ).datepicker();
      } );
      </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js" charset="utf-8"></script>

<script type="text/javascript">
$( "#datepicker" ).datepicker({
  dateFormat: "yy-mm-dd"
});
$( "#hdatepicker" ).datepicker({
  dateFormat: "yy-mm-dd"
});


$("#IFSC").on("change",function(e){
  //e.preventDefault();
  var ifsc=$("#IFSC").val();
 //var user=$("#user_it").val();
//alert(mydate);
$.ajax({
  type:'post',
  url:'getifsc.php',
  //dataType:'json',
  data:{ifsc:ifsc},
  success:function(result){
    if (result=="") {
      $("#ifsc_detail").empty();
      $("#ifsc_detail").append("<h5 style='color:red;'>No Result Found</h5>");
    }
    else {
      $("#ifsc_detail").empty();
      $("#ifsc_detail").append(result);

    }

  }
});
});
</script>

<script type="text/javascript">

$("#transferform").on("submit",function(e){
  e.preventDefault();
  //var mydate=$("#hdatepicker").val();
 //var user=$("#huser_it").val();
//alert(mydate);
$.ajax({
  type:'post',
  url:'getrecharge.php',
  data:$("#transferform").serialize(),
  success:function(result){


    alert(result);
    window.location.href="recharge.php";


  }
});
});

</script>
  </body>
</html>
