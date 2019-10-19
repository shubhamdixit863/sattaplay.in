<?php

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
  <script src="https://use.fontawesome.com/41bf7e75f1.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.css">
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
        <li class="breadcrumb-item active">My Dashboard</li>


            <li><i class="fa fa-print fa-3x" aria-hidden="true" onclick="print();"></i></li>

<li><button id="btnExport"class="ui olive basic button" onclick="fnExcelReport();"> EXPORT AS EXCEL </button></li><br>
<li> <a class="ui teal basic button" href="sattawinners.php">Update Winners</a> </li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <form class="" action="index.php" method="get">
            <select style="margin-top:40px; width:310px;" name="game" class="form-control">
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



foreach ($todaygame as $key ) {
  echo $key;
}

// code...


//echo $cutime;
               ?>
               </optgroup>

            </select>
<input type="submit" name="submit" value="FetchData" class="btn btn-success" style="margin-top:20px;">
          </form>

        </div>
        <?php


function  gamearray($digit,$game,$date)
{
  include 'config.php';
  include 'database.php';
  $gam="%".$game ."%";
  // code...
  $stmt=$db->prepare("SELECT  SUM(amount) gamesum FROM `game_data` WHERE date_t=:d AND game LIKE :g AND digit=:dig");
   $stmt->bindParam(":d",$date);
   $stmt->bindParam(":g",$gam);
   $stmt->bindParam(":dig",$digit);
   $run=$stmt->execute();
   $result=$stmt->fetch(PDO::FETCH_ASSOC);
   return $result['gamesum'];


}


function total($game,$date)
{
  include 'config.php';
  include 'database.php';
  $gam="%".$game ."%";
  // code...
  $stmt=$db->prepare("SELECT  SUM(amount) gamesum FROM `game_data` WHERE date_t=:d AND game LIKE :g");
   $stmt->bindParam(":d",$date);
   $stmt->bindParam(":g",$gam);
  //$stmt->bindParam(":dig",$digit);
   $run=$stmt->execute();
   $result=$stmt->fetch(PDO::FETCH_ASSOC);
   return $result['gamesum'];
  // code...
}


date_default_timezone_set('Asia/Kolkata');
$cudate=date('Y-m-d');
if (!isset($_REQUEST['game'])) {
  $game="alpha";
}
else {
$game=preg_replace('/\s+/', ' ', trim($_REQUEST['game']));
}

//echo "<h5 style='border-top:1px solid black;'>". gamearray("52",$game,$cudate)."</h5>";






//echo $game;





         ?>

<table class="table table-bordered" style="margin-top:50px;" id="example">

<tbody>
  <tr>
    <th colspan="10"><?php echo $game;
echo "/Total:".total($game,$cudate);


    ?></th>
  </tr>
<tr>
<td>00<br><br>
  <?php echo "<h5 style='border-top:1px solid black;'>". gamearray("00",$game,$cudate)."</h5>"; ?>

</td>
<td>01<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("01",$game,$cudate)."</h5>"; ?>

</td>
<td>
02<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("02",$game,$cudate)."</h5>"; ?>

</td>
<td>03<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("03",$game,$cudate)."</h5>"; ?></td>
<td>04<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("04",$game,$cudate)."</h5>"; ?></td>
<td>05<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("05",$game,$cudate)."</h5>"; ?></td>
<td>06<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("06",$game,$cudate)."</h5>"; ?></td>
<td>07<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("07",$game,$cudate)."</h5>"; ?></td>
<td>08<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("08",$game,$cudate)."</h5>"; ?></td>
<td>09<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("09",$game,$cudate)."</h5>"; ?></td>
</tr>
<tr>
<td>10<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("10",$game,$cudate)."</h5>"; ?></td>
<td>11<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("11",$game,$cudate)."</h5>"; ?></td>
<td>12<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("12",$game,$cudate)."</h5>"; ?></td>
<td>13<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("13",$game,$cudate)."</h5>"; ?></td>
<td>14<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("14",$game,$cudate)."</h5>"; ?></td>
<td>15<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("15",$game,$cudate)."</h5>"; ?></td>
<td>16<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("16",$game,$cudate)."</h5>"; ?></td>
<td>17<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("17",$game,$cudate)."</h5>"; ?></td>
<td>18<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("18",$game,$cudate)."</h5>"; ?></td>
<td>19<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("19",$game,$cudate)."</h5>"; ?></td>
</tr>
<tr>
<td>20<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("20",$game,$cudate)."</h5>"; ?></td>
<td>21<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("21",$game,$cudate)."</h5>"; ?></td>
<td>22<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("22",$game,$cudate)."</h5>"; ?></td>
<td>23<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("23",$game,$cudate)."</h5>"; ?></td>
<td>24<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("24",$game,$cudate)."</h5>"; ?></td>
<td>25<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("25",$game,$cudate)."</h5>"; ?></td>
<td>26<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("26",$game,$cudate)."</h5>"; ?></td>
<td>27<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("27",$game,$cudate)."</h5>"; ?></td>
<td>28<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("28",$game,$cudate)."</h5>"; ?></td>
<td>29<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("29",$game,$cudate)."</h5>"; ?></td>
</tr>
<tr>
<td>30<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("30",$game,$cudate)."</h5>"; ?></td>
<td>31<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("31",$game,$cudate)."</h5>"; ?></td>
<td>32<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("32",$game,$cudate)."</h5>"; ?></td>
<td>33<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("33",$game,$cudate)."</h5>"; ?></td>
<td>34<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("34",$game,$cudate)."</h5>"; ?></td>
<td>35<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("35",$game,$cudate)."</h5>"; ?></td>
<td>36<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("36",$game,$cudate)."</h5>"; ?></td>
<td>37<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("37",$game,$cudate)."</h5>"; ?></td>
<td>38<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("38",$game,$cudate)."</h5>"; ?></td>
<td>39<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("39",$game,$cudate)."</h5>"; ?></td>
</tr>
<tr>
<td>40<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("40",$game,$cudate)."</h5>"; ?></td>
<td>41<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("41",$game,$cudate)."</h5>"; ?></td>
<td>42<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("42",$game,$cudate)."</h5>"; ?></td>
<td>43<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("43",$game,$cudate)."</h5>"; ?></td>
<td>44<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("44",$game,$cudate)."</h5>"; ?></td>
<td>45<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("45",$game,$cudate)."</h5>"; ?></td>
<td>46<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("46",$game,$cudate)."</h5>"; ?></td>
<td>47<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("47",$game,$cudate)."</h5>"; ?></td>

<td>48<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("48",$game,$cudate)."</h5>"; ?></td>


<td>49<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("49",$game,$cudate)."</h5>"; ?></td>
</tr>
<tr>
<td>50<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("50",$game,$cudate)."</h5>"; ?></td>
<td>51<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("51",$game,$cudate)."</h5>"; ?></td>
<td>52<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("52",$game,$cudate)."</h5>"; ?></td>
<td>53<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("53",$game,$cudate)."</h5>"; ?></td>
<td>54<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("54",$game,$cudate)."</h5>"; ?></td>
<td>55<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("55",$game,$cudate)."</h5>"; ?></td>
<td>56<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("56",$game,$cudate)."</h5>"; ?></td>
<td>57<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("57",$game,$cudate)."</h5>"; ?></td>
<td>58<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("58",$game,$cudate)."</h5>"; ?></td>

<td>59<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("59",$game,$cudate)."</h5>"; ?></td>
</tr>
<tr>
<td>60<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("60",$game,$cudate)."</h5>"; ?></td>
<td>61<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("61",$game,$cudate)."</h5>"; ?></td>
<td>62<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("62",$game,$cudate)."</h5>"; ?></td>
<td>63<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("63",$game,$cudate)."</h5>"; ?></td>
<td>64<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("64",$game,$cudate)."</h5>"; ?></td>
<td>65<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("65",$game,$cudate)."</h5>"; ?></td>
<td>66<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("66",$game,$cudate)."</h5>"; ?></td>
<td>67<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("67",$game,$cudate)."</h5>"; ?></td>
<td>68<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("68",$game,$cudate)."</h5>"; ?></td>

<td>69<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("69",$game,$cudate)."</h5>"; ?></td>
</tr>
<tr>
<td>70<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("70",$game,$cudate)."</h5>"; ?></td>
<td>71<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("71",$game,$cudate)."</h5>"; ?></td>
<td>72<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("72",$game,$cudate)."</h5>"; ?></td>
<td>73<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("73",$game,$cudate)."</h5>"; ?></td>
<td>74<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("74",$game,$cudate)."</h5>"; ?></td>
<td>75<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("75",$game,$cudate)."</h5>"; ?></td>
<td>76<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("76",$game,$cudate)."</h5>"; ?></td>
<td>77<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("77",$game,$cudate)."</h5>"; ?></td>
<td>78<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("78",$game,$cudate)."</h5>"; ?></td>

<td>79<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("79",$game,$cudate)."</h5>"; ?></td>
</tr>
<tr>
<td>80<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("80",$game,$cudate)."</h5>"; ?></td>
<td>81<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("81",$game,$cudate)."</h5>"; ?></td>
<td>82<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("82",$game,$cudate)."</h5>"; ?></td>
<td>83<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("83",$game,$cudate)."</h5>"; ?></td>
<td>84<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("84",$game,$cudate)."</h5>"; ?></td>
<td>85<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("85",$game,$cudate)."</h5>"; ?></td>
<td>86<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("86",$game,$cudate)."</h5>"; ?></td>
<td>87<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("87",$game,$cudate)."</h5>"; ?></td>
<td>88<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("88",$game,$cudate)."</h5>"; ?></td>

<td>89<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("89",$game,$cudate)."</h5>"; ?></td>
</tr>
<tr>
<td>90<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("90",$game,$cudate)."</h5>"; ?></td>
<td>91<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("91",$game,$cudate)."</h5>"; ?></td>
<td>92<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("92",$game,$cudate)."</h5>"; ?></td>
<td>93<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("93",$game,$cudate)."</h5>"; ?></td>
<td>94<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("94",$game,$cudate)."</h5>"; ?></td>
<td>95<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("95",$game,$cudate)."</h5>"; ?></td>
<td>96<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("96",$game,$cudate)."</h5>"; ?></td>
<td>97<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("97",$game,$cudate)."</h5>"; ?></td>
<td>98<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("98",$game,$cudate)."</h5>"; ?></td>
<td>99<br><br>
<?php echo "<h5 style='border-top:1px solid black;'>". gamearray("99",$game,$cudate)."</h5>"; ?></td>

</tr>
</tbody>
</table>
<!-- DivTable.com -->
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
  </div>

  <script type="text/javascript">
  function print() {

    var divToPrint = document.getElementById('example');

  var htmlToPrint = '' +
      '<style type="text/css">' +
      'table th, table td {' +
      'border:1px solid #000;' +
      'padding;0.5em;' +
      'width:700px;' +
      '}' +
      '</style>';
  htmlToPrint += divToPrint.outerHTML;
  newWin = window.open("");
  newWin.document.write(htmlToPrint);
  newWin.print();
  newWin.close();

  }

  </script>



<script type="text/javascript">
function fnExcelReport()
{
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('example'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++)
    {
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
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
