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
        <li class="breadcrumb-item active">Winner</li><br>
          <li><button id="btnExport"class="ui olive basic button" onclick="fnExcelReport();"> EXPORT AS EXCEL </button></li><br>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-md-4 col-md-offset-2">
          <form class="" action="" method="post" id="winnerform">
            <label for="">Select Date:</label>
         <input type="text" id="datepicker" name="date" class="form-control" required>
         <label for="">Name Of Game</label>
         <select  name="game" class="form-control">
           <optgroup label="Today's Game">
           <?php
           $json = file_get_contents('http://www.multiply90.com/api/users.php');
           $array = json_decode(stripslashes($json),true);
           //print_r($obj);
           //echo "<option>  $array[msg]<span class='caret'></option>";
           $var="";

           date_default_timezone_set('Asia/Kolkata');
             $cudate=date('Y-m-d');
             $nextday=date('Y-m-d', strtotime(' +1 day'));
             $going=date('H:i:s');
           $cutime= new DateTime('Asia/Kolkata');

   $todaygame=array();
   $nextgame= array();
           //echo $cutime;
           $today = (new DateTime())->setTime(0,0);

           foreach (array_values($array['lotteryRes']['result']) as $key => $result) {

             $arr=explode(" ",$array['lotteryRes']['lottery_date'][$key]);
             if ($array['lotteryRes']['closingtime'][$key]>$today) {
               // code...
               $cudate=date('Y-m-d', strtotime(' +1 day'));
             }
             else{
               $cudate=date('Y-m-d');
             }

             $todaygame[]='<option value="'.array_values($result)[0].' '.$cudate." ".$array['lotteryRes']['closingtime'][$key].PHP_EOL.'">'.array_values($result)[0].' '.$cudate." ".$array['lotteryRes']['closingtime'][$key].PHP_EOL.'</option>';
             $nextgame[]='<option value=""; >'.array_values($result)[0].' '.$nextday." ".$array['lotteryRes']['closingtime'][$key].PHP_EOL.'</option>';
             //echo '<option value="'.$array['lotteryRes']['closingtime'][$key].'">'.array_values($result)[0].' '.$cudate." ".$array['lotteryRes']['closingtime'][$key].PHP_EOL.'</option>';


         }



   // code...
   foreach ($todaygame as $key ) {
     echo $key;
   }


   //echo $cutime;
            ?>
            </optgroup>

         </select>

<label for="">Winning number</label>
<input type="text" name="winning_number" maxlength="2" minlength="2"  class="form-control" value="" id="winning_number" required>
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

<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );


  </script>
  <script type="text/javascript">


  $("#winnerform").on("submit",function(e){
e.preventDefault();
$.ajax({
 type:'post',
 data:$("#winnerform").serialize(),
 url:'getharupwinner.php',
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
  <script type="text/javascript">
  $( "#datepicker" ).datepicker({
    dateFormat: "yy-mm-dd"
  });
  </script>

  <script type="text/javascript">
  function fnExcelReport()
  {
      var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
      var tab_texttwo="<table border='2px'><tr bgcolor='#87AFC6'>";
      var textRange; var j=0;
      tab = document.getElementById('alpha'); // id of table
      tab_two = document.getElementById('beta'); // id of table
     //tab=tab_one+tab_two;
      for(j = 0 ; j < tab.rows.length ; j++)
      {
          tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
          //tab_text=tab_text+"</tr>";
      }
      for(j = 0 ; j < tab_two.rows.length ; j++)
      {
          tab_texttwo=tab_texttwo+tab_two.rows[j].innerHTML+"</tr>";
          //tab_text=tab_text+"</tr>";
      }



      tab_text=tab_texttwo+tab_text+"</table>";
      tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
      tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
      tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

      var ua = window.navigator.userAgent;
      var msie = ua.indexOf("MSIE ");

      if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
      {
          txtArea1.document.open("txt/html","replace");
          txtArea1.document.write(tab_text);
          txtArea1.document.close();
          txtArea1.focus();
          sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
      }
      else                 //other browser not tested on IE 11
          sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));

      return (sa);
  }

  </script>
  </body>

</html>
