<?php
include 'config.php';
include 'database.php';
ob_start();
session_start();
if (!isset($_SESSION['user'])) {
header('Location:login.php');

}


if (isset($_GET['logout'])) {
  session_destroy();
  header('Location:login.php');
}

 ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title> Admin Panel</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/cupertino/jquery-ui.css">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<?php
include 'includes/nav.php';

 ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">HadapGame</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <form class="" action="" method="post" id="winnerform">
            <label for="">Select Date:</label>
         <input type="text" id="datepicker" name="date" class="form-control">




<input type="submit" name="submit" value="Get Users" class="btn btn-block btn-success" style="margin-top:20px;">
          </form>
        </div>

    </div>
    <div class="row" style="border-top:1px solid black; margin-top:30px;">
      <div class="col-md-4" id="winners">

      </div>

    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php
  include 'includes/footer.php';


     ?>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="index.php?logout">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js" charset="utf-8"></script>
  </div>
<script type="text/javascript">

  $("#balance").on('change',function(){
  var balance=document.getElementById('balance').value;
  var userid=document.getElementById('username').value
  var r = confirm("Are your sure you want to change the balance??");
  if (r == true) {
    $.ajax({
     type:'post',
     url:'changeamount.php',
     data:{balance:balance,userid:userid},
     success:function(result){
       alert(result);
     }

    });
  } else {

  }

});
</script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );


  </script>
  <script type="text/javascript">
  $("#datepicker").on("change",function () {
    var date=$("#datepicker").val();
    //alert(date);
    $.ajax({
    type:'post',
    url:'gethadapgames.php',
    data:{date:date},
    success:function (result) {
      if (result=="") {
        $("#gamename").empty();
        $("#gamename").append("<option>No user Played the Game</option>");
      }
      else {
        $("#gamename").empty();
        $("#gamename").append(result);
          //alert(result);
      }

    }


    });
  });


  $( "#datepicker" ).datepicker({
    dateFormat: "yy-mm-dd"
  });

  $("#winnerform").on("submit",function(e){
e.preventDefault();
$.ajax({
 type:'post',
 data:$("#winnerform").serialize(),
 url:'hadapwinnerform.php',
 success:function(re){
   if (re=="") {
     $("#winners").empty();
     $("#winners").append("<h3>No Users Found</h3>");

   }
   else{

     $("#winners").empty();
     $("#winners").append(re);
   }

 }


});

  });
  </script>
  </body>

</html>
