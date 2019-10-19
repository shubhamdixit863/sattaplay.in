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

        <li><button id="btnExport"class="ui olive basic button" onclick="fnExcelReport();"> EXPORT AS EXCEL </button></li><br>
            <li><i class="fa fa-print fa-3x" aria-hidden="true" onclick="print();"></i></li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <form class="" action="haruptotal.php" method="get">
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



// code...
foreach ($todaygame as $key ) {
  echo $key;
}




//echo $cutime;
               ?>
               </optgroup>

            </select>
<input type="submit" name="submit" value="FetchData" class="btn btn-success" style="margin-top:20px;">
          </form>

        </div>
        <?php


function  gameandar($digit,$game,$date)
{
  include 'config.php';
  include 'database.php';
  $gam="%".$game ."%";
  // code...
  $stmt=$db->prepare("SELECT  SUM(andar) gamesum FROM `andar` WHERE date_t=:d AND game LIKE :g AND hdigit=:dig");
   $stmt->bindParam(":d",$date);
   $stmt->bindParam(":g",$gam);
   $stmt->bindParam(":dig",$digit);
   $run=$stmt->execute();
   $result=$stmt->fetch(PDO::FETCH_ASSOC);
   return $result['gamesum'];


}




function  gamebahar($digit,$game,$date)
{
  include 'config.php';
  include 'database.php';
  $gam="%".$game ."%";
  // code...
  $stmt=$db->prepare("SELECT  SUM(bahar) gamesum FROM `bahar` WHERE date_t=:d AND game LIKE :g AND hdigit=:dig");
   $stmt->bindParam(":d",$date);
   $stmt->bindParam(":g",$gam);
   $stmt->bindParam(":dig",$digit);
   $run=$stmt->execute();
   $result=$stmt->fetch(PDO::FETCH_ASSOC);
   return $result['gamesum'];


}


function totalandar($game,$date)
{
  include 'config.php';
  include 'database.php';
  $gam="%".$game ."%";
  // code...
  $stmt=$db->prepare("SELECT  SUM(andar) gamesum FROM `andar` WHERE date_t=:d AND game LIKE :g");
   $stmt->bindParam(":d",$date);
   $stmt->bindParam(":g",$gam);
  //$stmt->bindParam(":dig",$digit);
   $run=$stmt->execute();
   $result=$stmt->fetch(PDO::FETCH_ASSOC);
   return $result['gamesum'];
  // code...
}


function totalbahar($game,$date)
{
  include 'config.php';
  include 'database.php';
  $gam="%".$game ."%";
  // code...
  $stmt=$db->prepare("SELECT  SUM(bahar) gamesum FROM `bahar` WHERE date_t=:d AND game LIKE :g");
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

         <table  id="example" class="table table-bordered" style="width: 400px; margin-top:40px;" border="1" cellpadding="8">
         <tbody>
           <tr>
             <th colspan="3"><?php echo $game;?></th>
             <th>Total:<?php echo totalandar($game,$cudate)+totalbahar($game,$cudate); ?></th>
           </tr>
         <tr>
         <td>Harup</td>
         <td>Andar</td>
         <td>Bahar</td>
         <td>Total(Andar+Bahar)</td>
         </tr>
         <tr>
         <td>0</td>
         <td><?php echo gameandar("0",$game,$cudate) ?></td>
         <td><?php echo gamebahar("0",$game,$cudate) ?></td>
         <td><?php echo gameandar("0",$game,$cudate)+ gamebahar("0",$game,$cudate)?></td>
         </tr>
         <tr>
           <tr>
           <td>1</td>
           <td><?php echo gameandar("1",$game,$cudate) ?></td>
           <td><?php echo gamebahar("1",$game,$cudate) ?></td>
           <td><?php echo gameandar("1",$game,$cudate)+ gamebahar("1",$game,$cudate)?></td>
           </tr>
           <tr>
             <tr>
             <td>2</td>
             <td><?php echo gameandar("2",$game,$cudate) ?></td>
             <td><?php echo gamebahar("2",$game,$cudate) ?></td>
             <td><?php echo gameandar("2",$game,$cudate)+ gamebahar("2",$game,$cudate)?></td>
             </tr>
             <tr>
               <tr>
               <td>3</td>
               <td><?php echo gameandar("3",$game,$cudate) ?></td>
               <td><?php echo gamebahar("3",$game,$cudate) ?></td>
               <td><?php echo gameandar("3",$game,$cudate)+ gamebahar("3",$game,$cudate)?></td>
               </tr>
               <tr>
                 <tr>
                 <td>4</td>
                 <td><?php echo gameandar("4",$game,$cudate) ?></td>
                 <td><?php echo gamebahar("4",$game,$cudate) ?></td>
                 <td><?php echo gameandar("4",$game,$cudate)+ gamebahar("4",$game,$cudate)?></td>
                 </tr>
                 <tr>
                   <tr>
                   <td>5</td>
                   <td><?php echo gameandar("5",$game,$cudate) ?></td>
                   <td><?php echo gamebahar("5",$game,$cudate) ?></td>
                   <td><?php echo gameandar("5",$game,$cudate)+ gamebahar("5",$game,$cudate)?></td>
                   </tr>
                   <tr>

                     <tr>
                     <td>6</td>
                     <td><?php echo gameandar("6",$game,$cudate) ?></td>
                     <td><?php echo gamebahar("6",$game,$cudate) ?></td>
                     <td><?php echo gameandar("6",$game,$cudate)+ gamebahar("6",$game,$cudate)?></td>
                     </tr>
                     <tr>
                       <tr>
                       <td>7</td>
                       <td><?php echo gameandar("7",$game,$cudate) ?></td>
                       <td><?php echo gamebahar("7",$game,$cudate) ?></td>
                       <td><?php echo gameandar("7",$game,$cudate)+ gamebahar("7",$game,$cudate)?></td>
                       </tr>
                       <tr>
                         <tr>
                         <td>8</td>
                         <td><?php echo gameandar("8",$game,$cudate) ?></td>
                         <td><?php echo gamebahar("8",$game,$cudate) ?></td>
                         <td><?php echo gameandar("8",$game,$cudate)+ gamebahar("8",$game,$cudate)?></td>
                         </tr>
                         <tr>
                           <tr>
                           <td>9</td>
                           <td><?php echo gameandar("9",$game,$cudate) ?></td>
                           <td><?php echo gamebahar("9",$game,$cudate) ?></td>
                           <td><?php echo gameandar("9",$game,$cudate)+ gamebahar("9",$game,$cudate)?></td>
                           </tr>
                           <tr>

         </tbody>
         </table>
         <!-- DivTable.com -->
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
