<?php
ob_start();
ini_set("allow_url_fopen", 1);
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
      <link rel="shortcut icon" href="images/alpha.ico" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.23/angular.min.js"></script>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.css">
    <!-- Latest compiled and minified CSS -->

    <!-- jQuery library -->
    <!-- Latest compiled JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- jQuery library -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/datejs/1.0/date.min.js" charset="utf-8"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.css">
    <script src="js/main.js" charset="utf-8"></script>

    <script src="js/moment.min.js" charset="utf-8"></script>
    <meta charset="utf-6">
    <title></title>
<style media="screen">
@media only screen and (max-width: 767px) {
  #bigscreen{

    display: none;
  }

  #mobiledisplay{
    display: block;

  }
  #remove{
    display:none;
  }
  #lotteryname{
    display: none;
  }
}


@media only screen and (min-width: 767px) {


  #mobiledisplay{
    display: none;
  }
}



</style>
<!-- Loader -->
<style media="screen">
#loader {
  bottom: 0;
  height: 175px;
  left: 0;
  margin: auto;
  position: absolute;
  right: 0;
  top: 0;
  width: 175px;
}
#loader {
  bottom: 0;
  height: 175px;
  left: 0;
  margin: auto;
  position: absolute;
  right: 0;
  top: 0;
  width: 175px;
}
#loader .dot {
  bottom: 0;
  height: 100%;
  left: 0;
  margin: auto;
  position: absolute;
  right: 0;
  top: 0;
  width: 87.5px;
}
#loader .dot::before {
  border-radius: 100%;
  content: "";
  height: 87.5px;
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
  transform: scale(0);
  width: 87.5px;
}
#loader .dot:nth-child(7n+1) {
  transform: rotate(45deg);
}
#loader .dot:nth-child(7n+1)::before {
  animation: 0.8s linear 0.1s normal none infinite running load;
  background: #00ff80 none repeat scroll 0 0;
}
#loader .dot:nth-child(7n+2) {
  transform: rotate(90deg);
}
#loader .dot:nth-child(7n+2)::before {
  animation: 0.8s linear 0.2s normal none infinite running load;
  background: #00ffea none repeat scroll 0 0;
}
#loader .dot:nth-child(7n+3) {
  transform: rotate(135deg);
}
#loader .dot:nth-child(7n+3)::before {
  animation: 0.8s linear 0.3s normal none infinite running load;
  background: #00aaff none repeat scroll 0 0;
}
#loader .dot:nth-child(7n+4) {
  transform: rotate(180deg);
}
#loader .dot:nth-child(7n+4)::before {
  animation: 0.8s linear 0.4s normal none infinite running load;
  background: #0040ff none repeat scroll 0 0;
}
#loader .dot:nth-child(7n+5) {
  transform: rotate(225deg);
}
#loader .dot:nth-child(7n+5)::before {
  animation: 0.8s linear 0.5s normal none infinite running load;
  background: #2a00ff none repeat scroll 0 0;
}
#loader .dot:nth-child(7n+6) {
  transform: rotate(270deg);
}
#loader .dot:nth-child(7n+6)::before {
  animation: 0.8s linear 0.6s normal none infinite running load;
  background: #9500ff none repeat scroll 0 0;
}
#loader .dot:nth-child(7n+7) {
  transform: rotate(315deg);
}
#loader .dot:nth-child(7n+7)::before {
  animation: 0.8s linear 0.7s normal none infinite running load;
  background: magenta none repeat scroll 0 0;
}
#loader .dot:nth-child(7n+8) {
  transform: rotate(360deg);
}
#loader .dot:nth-child(7n+8)::before {
  animation: 0.8s linear 0.8s normal none infinite running load;
  background: #ff0095 none repeat scroll 0 0;
}
#loader .lading {
  background-image: url("../images/loading.gif");
  background-position: 50% 50%;
  background-repeat: no-repeat;
  bottom: -40px;
  height: 20px;
  left: 0;
  position: absolute;
  right: 0;
  width: 180px;
}
@keyframes load {
100% {
  opacity: 0;
  transform: scale(1);
}
}
@keyframes load {
100% {
  opacity: 0;
  transform: scale(1);
}
}

</style>
<style media="screen">
<style media="screen">
#loadertwo {
  bottom: 0;
  height: 175px;
  left: 0;
  margin: auto;
  position: absolute;
  right: 0;
  top: 0;
  width: 175px;
}
#loadertwo {
  bottom: 0;
  height: 175px;
  left: 0;
  margin: auto;
  position: absolute;
  right: 0;
  top: 0;
  width: 175px;
}
#loadertwo .dot {
  bottom: 0;
  height: 100%;
  left: 0;
  margin: auto;
  position: absolute;
  right: 0;
  top: 0;
  width: 87.5px;
}
#loadertwo .dot::before {
  border-radius: 100%;
  content: "";
  height: 87.5px;
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
  transform: scale(0);
  width: 87.5px;
}
#loadertwo .dot:nth-child(7n+1) {
  transform: rotate(45deg);
}
#loadertwo .dot:nth-child(7n+1)::before {
  animation: 0.8s linear 0.1s normal none infinite running load;
  background: #00ff80 none repeat scroll 0 0;
}
#loadertwo .dot:nth-child(7n+2) {
  transform: rotate(90deg);
}
#loadertwo .dot:nth-child(7n+2)::before {
  animation: 0.8s linear 0.2s normal none infinite running load;
  background: #00ffea none repeat scroll 0 0;
}
#loadertwo .dot:nth-child(7n+3) {
  transform: rotate(135deg);
}
#loadertwo .dot:nth-child(7n+3)::before {
  animation: 0.8s linear 0.3s normal none infinite running load;
  background: #00aaff none repeat scroll 0 0;
}
#loadertwo .dot:nth-child(7n+4) {
  transform: rotate(180deg);
}
#loadertwo .dot:nth-child(7n+4)::before {
  animation: 0.8s linear 0.4s normal none infinite running load;
  background: #0040ff none repeat scroll 0 0;
}
#loadertwo .dot:nth-child(7n+5) {
  transform: rotate(225deg);
}
#loadertwo .dot:nth-child(7n+5)::before {
  animation: 0.8s linear 0.5s normal none infinite running load;
  background: #2a00ff none repeat scroll 0 0;
}
#loadertwo .dot:nth-child(7n+6) {
  transform: rotate(270deg);
}
#loadertwo .dot:nth-child(7n+6)::before {
  animation: 0.8s linear 0.6s normal none infinite running load;
  background: #9500ff none repeat scroll 0 0;
}
#loadertwo .dot:nth-child(7n+7) {
  transform: rotate(315deg);
}
#loadertwo .dot:nth-child(7n+7)::before {
  animation: 0.8s linear 0.7s normal none infinite running load;
  background: magenta none repeat scroll 0 0;
}
#loadertwo .dot:nth-child(7n+8) {
  transform: rotate(360deg);
}
#loadertwo .dot:nth-child(7n+8)::before {
  animation: 0.8s linear 0.8s normal none infinite running load;
  background: #ff0095 none repeat scroll 0 0;
}
#loadertwo .lading {
  background-image: url("../images/loading.gif");
  background-position: 50% 50%;
  background-repeat: no-repeat;
  bottom: -40px;
  height: 20px;
  left: 0;
  position: absolute;
  right: 0;
  width: 180px;
}
@keyframes load {
100% {
  opacity: 0;
  transform: scale(1);
}
}
@keyframes load {
100% {
  opacity: 0;
  transform: scale(1);
}
}

</style>
</style>

  </head>
  <body  >

    <div class="container-fluid" ng-app="myApp">

      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbars" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

          </div>
          <div id="navbars" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">

              <li class="active">
                <a href="#">Username</a>
              <a href="#"><?php echo $_SESSION['username'] ?></a>
              <input type="hidden" name="" value="<?php echo $_SESSION['username'] ?>" id="userid">

            </li>
              <li>
                <a href="#">Balance</a>
              <a href="#"><?php $stmt=$db->prepare("select balance from users where username=:user");
               $stmt->bindParam(":user",$_SESSION['username']);
               $run=$stmt->execute();
               $result=$stmt->fetch(PDO::FETCH_ASSOC);

               echo $result["balance"];
               echo "<input type='hidden' value=$result[balance] id='currentbalance' >";
               ?></a>

            </li>




              <li>


<!-- Game time -->

              <select style="margin-top:40px; width:310px;" name="" class="form-control" id="lotteryname">
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

                  $todaygame[]='<option value="'.$array['lotteryRes']['closingtime'][$key].'">'.array_values($result)[0].' '.$cudate." ".$array['lotteryRes']['closingtime'][$key].PHP_EOL.'</option>';
                  $nextgame[]='<option value="nextday"; >'.array_values($result)[0].' '.$nextday." ".$array['lotteryRes']['closingtime'][$key].PHP_EOL.'</option>';
                  //echo '<option value="'.$array['lotteryRes']['closingtime'][$key].'">'.array_values($result)[0].' '.$cudate." ".$array['lotteryRes']['closingtime'][$key].PHP_EOL.'</option>';


              }


if ($going>"00:00:00" && $going <"01:15:00") {
  // code...
  //disawar
  echo $todaygame[0];//disawar 01:15:00
   echo $todaygame[1];//taj 14:15:00
  echo $todaygame[2];//dl 14:20:00
  echo $todaygame[3];//delhigold 15:00:00
    echo $todaygame[4];// faridabad 17:00:00
    echo $todaygame[5];// rajdhani 17:00:00
    echo $todaygame[6];//punjabday 17:30:00
  echo $todaygame[7];//gaziyabad 18:30:00
    echo $todaygame[8];//new gaziyabad 19:30:00
    //echo $todaygame[9];//neelamgold 20:00:00
  echo $todaygame[9];//gali 22:00:00
  echo $todaygame[10];//x90 22:00::00
    //echo $todaygame[9];//new game 00:00:00
}

elseif ($going>"01:15:00" && $going <"14:15:00") {
  echo $todaygame[1];//taj 14:15:00
 echo $todaygame[2];//dl 14:20:00
 echo $todaygame[3];//delhigold 15:00:00
   echo $todaygame[4];// faridabad 17:00:00
   echo $todaygame[5];// rajdhani 17:00:00
   echo $todaygame[6];//punjabday 17:30:00
 echo $todaygame[7];//gaziyabad 18:30:00
   echo $todaygame[8];//new gaziyabad 19:30:00
   //echo $todaygame[9];//neelamgold 20:00:00
 echo $todaygame[9];//gali 22:00:00
 echo $todaygame[10];//x90 22:00::00
}


elseif ($going>"14:15:00" && $going <"14:20:00") {

  echo $todaygame[2];//dl 14:20:00
  echo $todaygame[3];//delhigold 15:00:00
    echo $todaygame[4];// faridabad 17:00:00
    echo $todaygame[5];// rajdhani 17:00:00
    echo $todaygame[6];//punjabday 17:30:00
  echo $todaygame[7];//gaziyabad 18:30:00
    echo $todaygame[8];//new gaziyabad 19:30:00
    //echo $todaygame[9];//neelamgold 20:00:00
  echo $todaygame[9];//gali 22:00:00
  echo $todaygame[10];//x90 22:00::00
}

elseif ($going>"14:20:00" && $going <"15:00:00") {

  echo $todaygame[3];//delhigold 15:00:00
    echo $todaygame[4];// faridabad 17:00:00
    echo $todaygame[5];// rajdhani 17:00:00
    echo $todaygame[6];//punjabday 17:30:00
  echo $todaygame[7];//gaziyabad 18:30:00
    echo $todaygame[8];//new gaziyabad 19:30:00
    //echo $todaygame[9];//neelamgold 20:00:00
  echo $todaygame[9];//gali 22:00:00
  echo $todaygame[10];//x90 22:00::00
}




elseif ($going>"15:00:00" && $going <"17:00:00") {
  echo $todaygame[4];// faridabad 17:00:00
  echo $todaygame[5];// rajdhani 17:00:00
  echo $todaygame[6];//punjabday 17:30:00
echo $todaygame[7];//gaziyabad 18:30:00
  echo $todaygame[8];//new gaziyabad 19:30:00
  //echo $todaygame[9];//neelamgold 20:00:00
echo $todaygame[9];//gali 22:00:00
echo $todaygame[10];//x90 22:00::00
}

elseif ($going>"17:00:00" && $going <"17:30:00") {


  echo $todaygame[6];//punjabday 17:30:00
  echo $todaygame[7];//gaziyabad 18:30:00
  echo $todaygame[8];//new gaziyabad 19:30:00
  //echo $todaygame[9];//neelamgold 20:00:00
  echo $todaygame[9];//gali 22:00:00
  echo $todaygame[10];//x90 22:00::00

}


elseif ($going>"17:30:00" && $going <"18:30:00") {

  echo $todaygame[7];//gaziyabad 18:30:00
  echo $todaygame[8];//new gaziyabad 19:30:00
  //echo $todaygame[9];//neelamgold 20:00:00
  echo $todaygame[9];//gali 22:00:00
  echo $todaygame[10];//x90 22:00::00
}

elseif ($going>"18:30:00" && $going <"19:30:00") {


  echo $todaygame[8];//new gaziyabad 19:30:00
  //echo $todaygame[9];//neelamgold 20:00:00
  echo $todaygame[9];//gali 22:00:00
  echo $todaygame[10];//x90 22:00::00

}

elseif ($going>"19:30:00" && $going <"22:00:00") {
  echo $todaygame[9];//gali 22:00:00
  echo $todaygame[10];//x90 22:00::00
}



elseif ($going>"22:00:00" && $going<"23:59:59") {
  // code...
  //echo $todaygame[9];//new game 00:00:00

}
//echo $cutime;
                 ?>
                 </optgroup>
                 <optgroup label="Next Days Game">

<?php
$on=date('H:i:s');
if ($on>"01:15:00"  && $on <"14:15:00") {

  echo $nextgame[0]; //disawar 01:15:00

}
elseif ($on>"14:15:00" && $on <"14:20:00") {
  // code..
  echo $nextgame[0];///disawar 01:15:00
  echo $nextgame[1];//taj 14:15
}

elseif ($on>"14:20:00" && $on <"15:00:00") {
  // code..
  echo $nextgame[0];///disawar 01:15:00
   echo $nextgame[1];//taj 14:15
  echo $nextgame[2];//dl 14:20:00
}

elseif ($on>"15:00:00" && $on <"17:00:00") {
  // code..
  echo $nextgame[0];///disawar 01:15:00
   echo $nextgame[1];//taj 14:15
  echo $nextgame[2];//dl 14:20:00
  echo $nextgame[3];//delhigold 15:00:00
}


elseif ($on >"17:00:00" && $on<"17:30:00" ) {
  echo $nextgame[0];///disawar 01:15:00
   echo $nextgame[1];//taj 14:15
  echo $nextgame[2];//dl 14:20:00
  echo $nextgame[3];//delhigold 15:00:00
    echo $nextgame[4];//faridabad 17:00:00
      echo $nextgame[5];//rajdhani 17:00:00

}

elseif ($on>"17:30:00" && $on <"18:30:00") {
  echo $nextgame[0];///disawar 01:15:00
   echo $nextgame[1];//taj 14:15
  echo $nextgame[2];//dl 14:20:00
  echo $nextgame[3];//delhigold 15:00:00
    echo $nextgame[4];//faridabad 17:00:00
      echo $nextgame[5];//rajdhani 17:00:00
    echo $nextgame[6];//punjabday 17:30:00
}


elseif ($on>"18:30:00" && $on <"19:30:00" ) {
  echo $nextgame[0];///disawar 01:15:00
   echo $nextgame[1];//taj 14:15
  echo $nextgame[2];//dl 14:20:00
  echo $nextgame[3];//delhigold 15:00:00
    echo $nextgame[4];//faridabad 17:00:00
      echo $nextgame[5];//rajdhani 17:00:00
  echo $nextgame[6];//punjabday 17:30:00
    echo $nextgame[7];//gaziyabad 18:30:00


}

elseif ($on>"19:30:00" && $on <"22:00:00" ) {
  echo $nextgame[0];///disawar 01:15:00
   echo $nextgame[1];//taj 14:15
  echo $nextgame[2];//dl 14:20:00
  echo $nextgame[3];//delhigold 15:00:00
    echo $nextgame[4];//faridabad 17:00:00
      echo $nextgame[5];//rajdhani 17:00:00
  echo $nextgame[6];//punjabday 17:30:00
    echo $nextgame[7];//gaziyabad 18:30:00
      echo $nextgame[8];//new gaziyabad 18:30:00


}


elseif ($on>"22:00:00"  && $on <"23:59:20" ) {
  // code...
  echo $nextgame[0];///disawar 01:15:00
   echo $nextgame[1];//taj 14:15
  echo $nextgame[2];//dl 14:20:00
  echo $nextgame[3];//delhigold 15:00:00
    echo $nextgame[4];//faridabad 17:00:00
      echo $nextgame[5];//rajdhani 17:00:00
  echo $nextgame[6];//punjabday 17:30:00
    echo $nextgame[7];//gaziyabad 18:30:00
      echo $nextgame[8];//new gaziyabad 18:30:00
  echo $nextgame[9];//galii 22:00::00
  echo $nextgame[10];//x90 22:00::00
}
 ?>

                  </optgroup>
              </select>
              </li>


            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li>

              <h3 id="remove"style="margin-right:350px; margin-top:40px;"><a href="#" ng-controller='TimeCtrl'>{{ clock  | date:'medium'}}</a></h3>

              </li>
              <li><a href="userpanel/index.php">Reports</a></li>
              <li><a href="playpage.php?logout">Sign Out</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
      <section id="mobiledisplay" style="background-color:#F8F9F9"  ng-controller="myCtrl">
        <div class="alert alert-info" style="display:none;" id="alertmenu">

 </div>
        <div class="container-fluid">
          <MARQUEE WIDTH=330 HEIGHT=65>
           <h3 style=" color:Red;">अपना अकाउंट रिचार्ज करवाने के लिए इस नंबर पर संपर्क करे - 18001033188</h3>
           </MARQUEE>


<span style="background-color:#FAD7A0  ; ">             <h3 style="color:#1B2631 ;">Username-
        <?php echo $_SESSION['username'] ?>
          <input type="hidden" name="" value="<?php echo $_SESSION['username'] ?>" id="userid">
</h3></span>



            <span style="background-color:#FAD7A0  ; "><h3>Balance-
          <?php $stmt=$db->prepare("select balance from users where username=:user");
           $stmt->bindParam(":user",$_SESSION['username']);
           $run=$stmt->execute();
           $result=$stmt->fetch(PDO::FETCH_ASSOC);

           echo $result["balance"];
           echo "<input type='hidden' value=$result[balance] id='currentbalance' >";
           ?></h3></span>
          <span style="font-size:20px ;margin-top:8px;"><a href="userpanel/index.php">Reports</a></span>

                        <select style="margin-top:40px; width:310px;" name="" class="form-control" id="mobile" >
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

                            $todaygame[]='<option value="'.$array['lotteryRes']['closingtime'][$key].'">'.array_values($result)[0].' '.$cudate." ".$array['lotteryRes']['closingtime'][$key].PHP_EOL.'</option>';
                            $nextgame[]='<option value="nextday"; >'.array_values($result)[0].' '.$nextday." ".$array['lotteryRes']['closingtime'][$key].PHP_EOL.'</option>';
                            //echo '<option value="'.$array['lotteryRes']['closingtime'][$key].'">'.array_values($result)[0].' '.$cudate." ".$array['lotteryRes']['closingtime'][$key].PHP_EOL.'</option>';


                        }

                        if ($going>"00:00:00" && $going <"01:15:00") {
                          // code...
                          //disawar
                          echo $todaygame[0];//disawar 01:15:00
                           echo $todaygame[1];//taj 14:15:00
                          echo $todaygame[2];//dl 14:20:00
                          echo $todaygame[3];//delhigold 15:00:00
                            echo $todaygame[4];// faridabad 17:00:00
                            echo $todaygame[5];// rajdhani 17:00:00
                            echo $todaygame[6];//punjabday 17:30:00
                          echo $todaygame[7];//gaziyabad 18:30:00
                            echo $todaygame[8];//new gaziyabad 19:30:00
                            //echo $todaygame[9];//neelamgold 20:00:00
                          echo $todaygame[9];//gali 22:00:00
                          echo $todaygame[10];//x90 22:00::00
                            //echo $todaygame[9];//new game 00:00:00
                        }

                        elseif ($going>"01:15:00" && $going <"14:15:00") {
                          echo $todaygame[1];//taj 14:15:00
                         echo $todaygame[2];//dl 14:20:00
                         echo $todaygame[3];//delhigold 15:00:00
                           echo $todaygame[4];// faridabad 17:00:00
                           echo $todaygame[5];// rajdhani 17:00:00
                           echo $todaygame[6];//punjabday 17:30:00
                         echo $todaygame[7];//gaziyabad 18:30:00
                           echo $todaygame[8];//new gaziyabad 19:30:00
                           //echo $todaygame[9];//neelamgold 20:00:00
                         echo $todaygame[9];//gali 22:00:00
                         echo $todaygame[10];//x90 22:00::00
                        }


                        elseif ($going>"14:15:00" && $going <"14:20:00") {

                          echo $todaygame[2];//dl 14:20:00
                          echo $todaygame[3];//delhigold 15:00:00
                            echo $todaygame[4];// faridabad 17:00:00
                            echo $todaygame[5];// rajdhani 17:00:00
                            echo $todaygame[6];//punjabday 17:30:00
                          echo $todaygame[7];//gaziyabad 18:30:00
                            echo $todaygame[8];//new gaziyabad 19:30:00
                            //echo $todaygame[9];//neelamgold 20:00:00
                          echo $todaygame[9];//gali 22:00:00
                          echo $todaygame[10];//x90 22:00::00
                        }

                        elseif ($going>"14:20:00" && $going <"15:00:00") {

                          echo $todaygame[3];//delhigold 15:00:00
                            echo $todaygame[4];// faridabad 17:00:00
                            echo $todaygame[5];// rajdhani 17:00:00
                            echo $todaygame[6];//punjabday 17:30:00
                          echo $todaygame[7];//gaziyabad 18:30:00
                            echo $todaygame[8];//new gaziyabad 19:30:00
                            //echo $todaygame[9];//neelamgold 20:00:00
                          echo $todaygame[9];//gali 22:00:00
                          echo $todaygame[10];//x90 22:00::00
                        }




                        elseif ($going>"15:00:00" && $going <"17:00:00") {
                          echo $todaygame[4];// faridabad 17:00:00
                          echo $todaygame[5];// rajdhani 17:00:00
                          echo $todaygame[6];//punjabday 17:30:00
                        echo $todaygame[7];//gaziyabad 18:30:00
                          echo $todaygame[8];//new gaziyabad 19:30:00
                          //echo $todaygame[9];//neelamgold 20:00:00
                        echo $todaygame[9];//gali 22:00:00
                        echo $todaygame[10];//x90 22:00::00
                        }

                        elseif ($going>"17:00:00" && $going <"17:30:00") {


                          echo $todaygame[6];//punjabday 17:30:00
                          echo $todaygame[7];//gaziyabad 18:30:00
                          echo $todaygame[8];//new gaziyabad 19:30:00
                          //echo $todaygame[9];//neelamgold 20:00:00
                          echo $todaygame[9];//gali 22:00:00
                          echo $todaygame[10];//x90 22:00::00

                        }


                        elseif ($going>"17:30:00" && $going <"18:30:00") {

                          echo $todaygame[7];//gaziyabad 18:30:00
                          echo $todaygame[8];//new gaziyabad 19:30:00
                          //echo $todaygame[9];//neelamgold 20:00:00
                          echo $todaygame[9];//gali 22:00:00
                          echo $todaygame[10];//x90 22:00::00
                        }

                        elseif ($going>"18:30:00" && $going <"19:30:00") {


                          echo $todaygame[8];//new gaziyabad 19:30:00
                          //echo $todaygame[9];//neelamgold 20:00:00
                          echo $todaygame[9];//gali 22:00:00
                          echo $todaygame[10];//x90 22:00::00

                        }

                        elseif ($going>"19:30:00" && $going <"22:00:00") {
                          echo $todaygame[9];//gali 22:00:00
                          echo $todaygame[10];//x90 22:00::00
                        }



                        elseif ($going>"22:00:00" && $going<"23:59:59") {
                          // code...
                          //echo $todaygame[9];//new game 00:00:00

                        }
                        //echo $cutime;
                                         ?>
                                         </optgroup>
                                         <optgroup label="Next Days Game">

                        <?php
                        $on=date('H:i:s');
                        if ($on>"01:15:00"  && $on <"14:15:00") {

                          echo $nextgame[0]; //disawar 01:15:00

                        }
                        elseif ($on>"14:15:00" && $on <"14:20:00") {
                          // code..
                          echo $nextgame[0];///disawar 01:15:00
                          echo $nextgame[1];//taj 14:15
                        }

                        elseif ($on>"14:20:00" && $on <"15:00:00") {
                          // code..
                          echo $nextgame[0];///disawar 01:15:00
                           echo $nextgame[1];//taj 14:15
                          echo $nextgame[2];//dl 14:20:00
                        }

                        elseif ($on>"15:00:00" && $on <"17:00:00") {
                          // code..
                          echo $nextgame[0];///disawar 01:15:00
                           echo $nextgame[1];//taj 14:15
                          echo $nextgame[2];//dl 14:20:00
                          echo $nextgame[3];//delhigold 15:00:00
                        }


                        elseif ($on >"17:00:00" && $on<"17:30:00" ) {
                          echo $nextgame[0];///disawar 01:15:00
                           echo $nextgame[1];//taj 14:15
                          echo $nextgame[2];//dl 14:20:00
                          echo $nextgame[3];//delhigold 15:00:00
                            echo $nextgame[4];//faridabad 17:00:00
                              echo $nextgame[5];//rajdhani 17:00:00

                        }

                        elseif ($on>"17:30:00" && $on <"18:30:00") {
                          echo $nextgame[0];///disawar 01:15:00
                           echo $nextgame[1];//taj 14:15
                          echo $nextgame[2];//dl 14:20:00
                          echo $nextgame[3];//delhigold 15:00:00
                            echo $nextgame[4];//faridabad 17:00:00
                              echo $nextgame[5];//rajdhani 17:00:00
                            echo $nextgame[6];//punjabday 17:30:00
                        }


                        elseif ($on>"18:30:00" && $on <"19:30:00" ) {
                          echo $nextgame[0];///disawar 01:15:00
                           echo $nextgame[1];//taj 14:15
                          echo $nextgame[2];//dl 14:20:00
                          echo $nextgame[3];//delhigold 15:00:00
                            echo $nextgame[4];//faridabad 17:00:00
                              echo $nextgame[5];//rajdhani 17:00:00
                          echo $nextgame[6];//punjabday 17:30:00
                            echo $nextgame[7];//gaziyabad 18:30:00


                        }

                        elseif ($on>"19:30:00" && $on <"22:00:00" ) {
                          echo $nextgame[0];///disawar 01:15:00
                           echo $nextgame[1];//taj 14:15
                          echo $nextgame[2];//dl 14:20:00
                          echo $nextgame[3];//delhigold 15:00:00
                            echo $nextgame[4];//faridabad 17:00:00
                              echo $nextgame[5];//rajdhani 17:00:00
                          echo $nextgame[6];//punjabday 17:30:00
                            echo $nextgame[7];//gaziyabad 18:30:00
                              echo $nextgame[8];//new gaziyabad 18:30:00


                        }


                        elseif ($on>"22:00:00"  && $on <"23:59:20" ) {
                          // code...
                          echo $nextgame[0];///disawar 01:15:00
                           echo $nextgame[1];//taj 14:15
                          echo $nextgame[2];//dl 14:20:00
                          echo $nextgame[3];//delhigold 15:00:00
                            echo $nextgame[4];//faridabad 17:00:00
                              echo $nextgame[5];//rajdhani 17:00:00
                          echo $nextgame[6];//punjabday 17:30:00
                            echo $nextgame[7];//gaziyabad 18:30:00
                              echo $nextgame[8];//new gaziyabad 18:30:00
                          echo $nextgame[9];//galii 22:00::00
                          echo $nextgame[10];//x90 22:00::00
                        }
                         ?>


                            </optgroup>
                        </select>


          <h3 style="margin-right:80px; margin-top:40px;"><a href="#" ng-controller='TimeCtrl'>{{ clock  | date:'medium'}}</a></h3>


          <?php

          $json = file_get_contents('http://www.multiply90.com/api/users.php');

          $array = json_decode($json, true);
          $my=array();
          foreach (array_values($array['lotteryRes']['result']) as $key => $result) {
              $my[]= array_values($result)[0].' '.$array['lotteryRes']['closingtime'][$key];
          }
          //print_r($my);
          date_default_timezone_set('Asia/Kolkata');
          $time=date('H:i:s');


          if ($time <"01:15:00" && $time>"00:00:00") {
            echo "<h2 style='color:blue;'>Booking Closing Time-".$my[0]."</h2>";
          }
          elseif ($time <"14:15:00" && $time>"01:15:00") {
            // code...
            echo "<h2 style='color:blue;'>Booking Closing Time-".$my[1]."</h2>";
          }
          elseif ($time <"14:20:00" && $time>"14:15:00") {
            echo "<h2 style='color:blue;'>Booking Closing Time-".$my[2]."</h2>";
          }

          elseif ($time <"15:00:00" && $time>"14:20:00") {
          echo "<h2 style='color:blue;'>Booking Closing Time-".$my[3]."</h2>";
          }
          elseif ($time <"17:00:00" && $time>"15:00:00") {
          echo "<h2 style='color:blue;'>Booking Closing Time-".$my[4]."</h2>";
          echo "<h2 style='color:blue;'>Booking Closing Time-".$my[5]."</h2>";
          }

          elseif ($time <"17:30:00" && $time>"17:00:00") {
          echo "<h2 style='color:blue;'>Booking Closing Time-".$my[6]."</h2>";
          }

          elseif ($time <"18:30:00" && $time>"17:30:00") {
            // code...
            //echo $time;
            echo "<h2 style='color:blue;'>Booking Closing Time-".$my[7]."</h2>";
          }

          elseif ($time <"19:30:00" && $time>"18:30:00") {
            // code...
            //echo $time;
            echo "<h2 style='color:blue;'>Booking Closing Time-".$my[8]."</h2>";
          }


          elseif ($time <"22:00:00" && $time>"19:30:00") {
            // code...
            //echo $time;
            echo "<h2 style='color:blue;'>Booking Closing Time-".$my[9]."</h2>";
            echo "<h2 style='color:blue;'>Booking Closing Time-".$my[10]."</h2>";
          }

          elseif ($time <"23:59:00" && $time >"22:00:00") {
            // code...

            //echo "<h2 style='color:blue;'>Booking Closing Time-".$my[9]."</h2>";

          }
           ?>



          <h1 style="color:red;">जोड़ी </h1>


      <div class="row">


        <div class="col-md-12">
          <table class=" table table-bordered " >

         <tr>
           <th>01</th>
           <th>02</th>
           <th>03</th>
           <th>04</th>
           <th>05</th>
         </tr>


        <tbody>

        <form class="" action="" method="post" id="myform">


               <tr>
           <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"    class="hobbit " style="width:30px;margin:6px;"  ng-model="one" ></td>
           <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"  ng-model="two"></td>
           <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;" ng-model="three"></td>
           <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;" ng-model="four"></td>
           <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;" ng-model="five"></td>
         </tr>

         <tr>
         <th>06</th>
         <th>07</th>
         <th>08</th>
         <th>09</th>
         <th>10</th>
        </tr>
           <tr>
           <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"  ng-model="six"></td>
           <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"   ng-model="seven"></td>
           <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"   ng-model="eight"></td>
           <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"   ng-model="nine"></td>
           <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"   ng-model="ten"></td>

         </tr>



        <tr>
        <th>11</th>
        <th>12</th>
        <th>13</th>
        <th>14</th>
        <th>15</th>
        </tr>


        <tr>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;" ng-model="eleven"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;" ng-model="twelve"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;" ng-model="thirteen"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="fourteen"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="fifteen"></td>
        </tr>
        <tr>
        <th>16</th>
        <th>17</th>
        <th>18</th>
        <th>19</th>
        <th>20</th>
        </tr>
           <tr>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="sixteen"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="seventeen"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="eighteen"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="nineteen"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="twenty"></td>

        </tr>


        <tr>
        <th>21</th>
        <th>22</th>
        <th>23</th>
        <th>24</th>
        <th>25</th>
        </tr>

        <tr>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="twentyone"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="twentytwo"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="twentythree"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="twentyfour"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="twentyfive"></td>
        </tr>
        <tr>
        <th>26</th>
        <th>27</th>
        <th>28</th>
        <th>29</th>
        <th>30</th>
        </tr>
           <tr>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="twentysix"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="twentyseven"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="twentyeight"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="twentynine"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="thirty"></td>

        </tr>


        <tr>
        <th>31</th>
        <th>32</th>
        <th>33</th>
        <th>34</th>
        <th>35</th>
        </tr>


        <tr>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="thirtyone"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="thirtytwo"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="thirtythree"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="thirtyfour"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="thirtyfive"></td>
        </tr>
        <tr>
        <th>36</th>
        <th>37</th>
        <th>38</th>
        <th>39</th>
        <th>40</th>
        </tr>
           <tr>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="thirtysix"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="thirtyseven"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="thirtyeight"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="thirtynine"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="fourty"></td>

        </tr>


        <tr>
        <th>41</th>
        <th>42</th>
        <th>43</th>
        <th>44</th>
        <th>45</th>
        </tr>


        <tr>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="fourtyone"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="fourtytwo"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="fourtythree"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="fourtyfour"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="fourtyfive"></td>
        </tr>
        <tr>
        <th>46</th>
        <th>47</th>
        <th>48</th>
        <th>49</th>
        <th>50</th>
        </tr>
           <tr>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="fourtysix"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="fourtyseven"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="fourtyeight"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="fourtynine"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="fifty"></td>
        </tr>


        <tr>
        <th>51</th>
        <th>52</th>
        <th>53</th>
        <th>54</th>
        <th>55</th>
        </tr>

        <tr>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="fiftyone"></td>

        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="fiftytwo"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="fiftythree"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="fiftyfour"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="fiftyfive"></td>
        </tr>
        <tr>
        <th>56</th>
        <th>57</th>
        <th>58</th>
        <th>59</th>
        <th>60</th>
        </tr>
           <tr>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="fiftysix"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="fiftyseven"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="fiftyeight"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="fiftynine"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="sixty"></td>

        </tr>



        <tr>
        <th>61</th>
        <th>62</th>
        <th>63</th>
        <th>64</th>
        <th>65</th>
        </tr>


        <tr>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="sixtyone"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="sixtytwo"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="sixtythree"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="sixtyfour"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="sixtyfive"></td>
        </tr>
        <tr>
        <th>66</th>
        <th>67</th>
        <th>68</th>
        <th>69</th>
        <th>70</th>
        </tr>
           <tr>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="sixtysix"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="sixtyseven"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="sixtyeight"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="sixtynine"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="seventy"></td>

        </tr>



        <tr>
        <th>71</th>
        <th>72</th>
        <th>73</th>
        <th>74</th>
        <th>75</th>
        </tr>


        <tr>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="seventyone"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="seventytwo"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="seventythree"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="seventyfour"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="seventyfive"></td>
        </tr>
        <tr>
        <th>76</th>
        <th>77</th>
        <th>78</th>
        <th>79</th>
        <th>80</th>
        </tr>
           <tr>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="seventysix"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="seventyseven"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="seventyeight"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="seventynine"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="eighty"></td>

        </tr>



        <tr>
        <th>81</th>
        <th>82</th>
        <th>83</th>
        <th>84</th>
        <th>85</th>
        </tr>


        <tr>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="eightyone"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="eightytwo"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="eightythree"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="eightyfour"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="eightyfive"></td>
        </tr>
        <tr>
        <th>86</th>
        <th>87</th>
        <th>88</th>
        <th>89</th>
        <th>90</th>
        </tr>
           <tr>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="eightysix"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="eightyseven"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="eightyeight"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="eightynine"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="ninty"></td>

        </tr>


        <tr>
        <th>91</th>
        <th>92</th>
        <th>93</th>
        <th>94</th>
        <th>95</th>
        </tr>


        <tr>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="nintyone"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="nintytwo"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="nintythree"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="nintyfour"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="nintyfive"></td>
        </tr>
        <tr>
        <th>96</th>
        <th>97</th>
        <th>98</th>
        <th>99</th>
        <th>00</th>
        </tr>
        <tr>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="nintysix"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="nintyseven"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="nintyeight"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="nintynine"></td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;"ng-model="hundred"></td>
        </tr>

        </tbody>
        </table>

        </div>

<div class="row">
        <div class="col-md-12">
          <div id="loadertwo" style="display:none">
               <div class="dot"></div>
             <div class="dot"></div>
             <div class="dot"></div>
             <div class="dot"></div>
             <div class="dot"></div>
             <div class="dot"></div>
             <div class="dot"></div>
             <div class="dot"></div>
             <div class="lading"></div>
           </div>
          <h1 style="color:red;">हरूप  </h1>
          <table class="table table-bordered">

          <tbody>
            <tr>
            <th>S.No</th>
            <th>Andar</th>
            <th>Bahar</th>
            </tr>


      <tr>
      <td>1</td>
      <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"  class="hobbit "  style="width:30px;margin:6px;" ng-model="a"></td>
      <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"  class="hobbit "  style="width:30px;margin:6px;" ng-model="b"></td>
      </tr>


      <tr>
      <td>2</td>
         <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"  class="hobbit "  style="width:30px;margin:6px;" ng-model="c"></td>
           <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"  class="hobbit "  style="width:30px;margin:6px;" ng-model="d"></td>
      </tr>


      <tr>
      <td>3</td>
      <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;" ng-model="e"></td>
       <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;" ng-model="f"></td>
      </tr>

      <tr>
      <td>4</td>
      <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;" ng-model="g"></td>
         <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;" ng-model="h"></td>
      </tr>


      <tr>
        <td>5</td>
        <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;" ng-model="i"></td>
           <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;" ng-model="j"></td>

      </tr>

          <tr>
              <td>6</td>
                 <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;" ng-model="k"></td>
                   <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;" ng-model="l"></td>
          </tr>

          <tr>
                <td>7</td>
                   <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;" ng-model="m"></td>
                       <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;" ng-model="n"></td>
          </tr>



      <tr>
      <td>8</td>
      <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;" ng-model="o"></td>
           <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;" ng-model="p"></td>
      </tr>



            <tr>
                <td>9</td>
                    <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;" ng-model="q"></td>
                       <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;" ng-model="r"></td>

            </tr>

            <tr>


              <td>0</td>
              <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;" ng-model="s"></td>

                <td><input     type="text"  autocomplete="off"  onkeypress="return AllowOnlyNumbers(event);"   class="hobbit "  style="width:30px;margin:6px;" ng-model="t"></td>
      </tr>

    </tbody>
    </table>

    </div>
  </div>

  </div>

  <div class="row" style="margin-bottom:20px;">

    <table class="table table-bordered">
  <thead>
   <tr>
     <th>TOTAL</th>
     <th>QTY</th>
     <th>AMT</th>
   </tr>
  </thead>
  <tbody>
   <tr>
     <td></td>
  <!-- Getting sum of all the values entered here -->
     <td><input     type="text"  class="form-control bata"  style="width:80px;margin:6px;" value="{{getTotal()}}"  id='totalvalue' readonly> </td>
     <td><input     type="text"   class="form-control bata" value="{{getTotal()}}" style="width:80px;margin:6px;"  readonly></td>


   </tr>

  </tbody>
  </table>

  </div>

  <div class="row" style="margin-bottom:20px;">
  <div class="col-md-4 col-md-offset-4">
  <button  type="submit" class="ui teal  basic button btn-block">Submit</button>
   </form>
  </div>

  </div>



  </div>
  </section>



      <!--large screen -->
     <section id="bigscreen" style="background-color:#F8F9F9"  ng-controller="myCtrltwo">
       <div class="container">




       <div class="alert alert-info" style="display:none;" id="alertmenutwo">

</div>
   <div class="row" >

     <MARQUEE WIDTH=1100 HEIGHT=65>
     <h1 style=" color:blue;">अपना अकाउंट रिचार्ज करवाने के लिए इस नंबर पर संपर्क करे - 18001033188</h1>
     </MARQUEE>

     <div class="col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
       <?php

       $json = file_get_contents('http://www.multiply90.com/api/users.php');

       $array = json_decode($json, true);
       $my=array();
       foreach (array_values($array['lotteryRes']['result']) as $key => $result) {
           $my[]= array_values($result)[0].' '.$array['lotteryRes']['closingtime'][$key];
       }
       //print_r($my);
       date_default_timezone_set('Asia/Kolkata');
       $time=date('H:i:s');


       if ($time <"01:15:00" && $time>"00:00:00") {
         echo "<h2 style='color:blue;'>Booking Closing Time-".$my[0]."</h2>";
       }
       elseif ($time <"14:15:00" && $time>"01:15:00") {
         // code...
         echo "<h2 style='color:blue;'>Booking Closing Time-".$my[1]."</h2>";
       }
       elseif ($time <"14:20:00" && $time>"14:15:00") {
         echo "<h2 style='color:blue;'>Booking Closing Time-".$my[2]."</h2>";
       }

       elseif ($time <"15:00:00" && $time>"14:20:00") {
       echo "<h2 style='color:blue;'>Booking Closing Time-".$my[3]."</h2>";
       }
       elseif ($time <"17:00:00" && $time>"15:00:00") {
       echo "<h2 style='color:blue;'>Booking Closing Time-".$my[4]."</h2>";
       echo "<h2 style='color:blue;'>Booking Closing Time-".$my[5]."</h2>";
       }

       elseif ($time <"17:30:00" && $time>"17:00:00") {
       echo "<h2 style='color:blue;'>Booking Closing Time-".$my[6]."</h2>";
       }

       elseif ($time <"18:30:00" && $time>"17:30:00") {
         // code...
         //echo $time;
         echo "<h2 style='color:blue;'>Booking Closing Time-".$my[7]."</h2>";
       }

       elseif ($time <"19:30:00" && $time>"18:30:00") {
         // code...
         //echo $time;
         echo "<h2 style='color:blue;'>Booking Closing Time-".$my[8]."</h2>";
       }


       elseif ($time <"22:00:00" && $time>"19:30:00") {
         // code...
         //echo $time;
         echo "<h2 style='color:blue;'>Booking Closing Time-".$my[9]."</h2>";
         echo "<h2 style='color:blue;'>Booking Closing Time-".$my[10]."</h2>";
       }

       elseif ($time <"23:59:00" && $time >"22:00:00") {
         // code...

         //echo "<h2 style='color:blue;'>Booking Closing Time-".$my[9]."</h2>";

       }
        ?>


       <h1 style="color:red;">जोड़ी </h1>

       <table class="table-bordered " >

      <tr>
        <th>01</th>
        <th>02</th>
        <th>03</th>
        <th>04</th>
        <th>05</th>
        <th>06</th>
        <th>07</th>
        <th>08</th>
        <th>09</th>
        <th>10</th>
      </tr>

    <tbody>

<form class="" action="" method="post" id="myformtwo">


            <tr>
        <td><input type="number"  class="hobbit" min="0" style="width:60px;margin:6px;"  ng-model="one" ></td>
        <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"  ng-model="two"></td>
        <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;" ng-model="three"></td>
        <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;" ng-model="four"></td>
        <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;" ng-model="five"></td>
        <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"  ng-model="six"></td>
        <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"   ng-model="seven"></td>
        <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"   ng-model="eight"></td>
        <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"   ng-model="nine"></td>
        <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"   ng-model="ten"></td>

      </tr>



 <tr>
   <th>11</th>
   <th>12</th>
   <th>13</th>
   <th>14</th>
   <th>15</th>
   <th>16</th>
   <th>17</th>
   <th>18</th>
   <th>19</th>
   <th>20</th>
 </tr>

 <tr>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;" ng-model="eleven"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;" ng-model="twelve"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;" ng-model="thirteen"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="fourteen"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="fifteen"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="sixteen"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="seventeen"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="eighteen"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="nineteen"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="twenty"></td>

 </tr>


 <tr>
   <th>21</th>
   <th>22</th>
   <th>23</th>
   <th>24</th>
   <th>25</th>
   <th>26</th>
   <th>27</th>
   <th>28</th>
   <th>29</th>
   <th>30</th>
 </tr>

 <tr>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="twentyone"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="twentytwo"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="twentythree"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="twentyfour"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="twentyfive"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="twentysix"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="twentyseven"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="twentyeight"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="twentynine"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="thirty"></td>

 </tr>


 <tr>
   <th>31</th>
   <th>32</th>
   <th>33</th>
   <th>34</th>
   <th>35</th>
   <th>36</th>
   <th>37</th>
   <th>38</th>
   <th>39</th>
   <th>40</th>
 </tr>

 <tr>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="thirtyone"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="thirtytwo"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="thirtythree"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="thirtyfour"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="thirtyfive"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="thirtysix"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="thirtyseven"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="thirtyeight"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="thirtynine"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="fourty"></td>

 </tr>


 <tr>
   <th>41</th>
   <th>42</th>
   <th>43</th>
   <th>44</th>
   <th>45</th>
   <th>46</th>
   <th>47</th>
   <th>48</th>
   <th>49</th>
   <th>50</th>
 </tr>

 <tr>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="fourtyone"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="fourtytwo"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="fourtythree"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="fourtyfour"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="fourtyfive"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="fourtysix"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="fourtyseven"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="fourtyeight"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="fourtynine"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="fifty"></td>
 </tr>


 <tr>
   <th>51</th>
   <th>52</th>
   <th>53</th>
   <th>54</th>
   <th>55</th>
   <th>56</th>
   <th>57</th>
   <th>58</th>
   <th>59</th>
   <th>60</th>
 </tr>
 <tr>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="fiftyone"></td>

   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="fiftytwo"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="fiftythree"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="fiftyfour"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="fiftyfive"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="fiftysix"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="fiftyseven"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="fiftyeight"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="fiftynine"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="sixty"></td>

 </tr>



 <tr>
   <th>61</th>
   <th>62</th>
   <th>63</th>
   <th>64</th>
   <th>65</th>
   <th>66</th>
   <th>67</th>
   <th>68</th>
   <th>69</th>
   <th>70</th>
 </tr>

 <tr>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="sixtyone"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="sixtytwo"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="sixtythree"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="sixtyfour"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px; "ng-model="sixtyfive"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="sixtysix"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="sixtyseven"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="sixtyeight"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="sixtynine"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="seventy"></td>

 </tr>



 <tr>
   <th>71</th>
   <th>72</th>
   <th>73</th>
   <th>74</th>
   <th>75</th>
   <th>76</th>
   <th>77</th>
   <th>78</th>
   <th>79</th>
   <th>80</th>
 </tr>

 <tr>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="seventyone"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="seventytwo"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="seventythree"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="seventyfour"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="seventyfive"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="seventysix"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="seventyseven"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="seventyeight"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="seventynine"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="eighty"></td>

 </tr>



 <tr>
   <th>81</th>
   <th>82</th>
   <th>83</th>
   <th>84</th>
   <th>85</th>
   <th>86</th>
   <th>87</th>
   <th>88</th>
   <th>89</th>
   <th>90</th>
 </tr>

 <tr>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="eightyone"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="eightytwo"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="eightythree"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="eightyfour"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="eightyfive"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="eightysix"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="eightyseven"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="eightyeight"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="eightynine"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="ninty"></td>

 </tr>


 <tr>
   <th>91</th>
   <th>92</th>
   <th>93</th>
   <th>94</th>
   <th>95</th>
   <th>96</th>
   <th>97</th>
   <th>98</th>
   <th>99</th>
   <th>00</th>
 </tr>

 <tr>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="nintyone"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="nintytwo"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="nintythree"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="nintyfour"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="nintyfive"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="nintysix"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="nintyseven"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="nintyeight"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="nintynine"></td>
   <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;"ng-model="hundred"></td>
 </tr>

</tbody>
</table>


     </div>

   </div>

   <div class="row" style="margin-top:80px;">


          <div class="col-md-12">
            <div id="loader" style="display:none">
                 <div class="dot"></div>
               <div class="dot"></div>
               <div class="dot"></div>
               <div class="dot"></div>
               <div class="dot"></div>
               <div class="dot"></div>
               <div class="dot"></div>
               <div class="dot"></div>
               <div class="lading"></div>
             </div>

<h1 style="color:red;">हरूप  </h1>
         <table class="table table-bordered">

         <tbody>
           <tr>
           <th>S.No</th>
             <td>1</td>
             <td>2</td>
             <td>3</td>
             <td>4</td>
             <td>5</td>
             <td>6</td>
             <td>7</td>
             <td>8</td>
             <td>9</td>
             <td>0</td>




           </tr>
      <tr>
      <th>Andar</th>
       <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;" ng-model="a"></td>
      <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;" ng-model="c"></td>
      <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;" ng-model="e"></td>
       <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;" ng-model="g"></td>
       <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;" ng-model="i"></td>
      <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;" ng-model="k"></td>
      <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;" ng-model="m"></td>
       <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;" ng-model="o"></td>
       <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;" ng-model="q"></td>
        <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;" ng-model="s"></td>

    </tr>
        <tr>
        <th>Bahar</th>
        <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;" ng-model="b"></td>
       <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;" ng-model="d"></td>
       <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;" ng-model="f"></td>
        <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;" ng-model="h"></td>
        <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;" ng-model="j"></td>
       <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;" ng-model="l"></td>
       <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;" ng-model="n"></td>
        <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;" ng-model="p"></td>
        <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;" ng-model="r"></td>
         <td><input type="number" class="hobbit" min="0"  style="width:60px;margin:6px;" ng-model="t"></td>

        </tr>

         </tbody>
       </table>

       </div>
       <table class="table table-bordered">
    <thead>
      <tr>
        <th>TOTAL</th>
        <th>QTY</th>
        <th>AMT</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td></td>
<!-- Getting sum of all the values entered here -->
        <td><input     type="text"  class="form-control bata"  style="width:80px;margin:6px;" value="{{getTotal()}}"  id='totalvaluetwo' readonly> </td>
        <td><input     type="text"   class="form-control bata" value="{{getTotal()}}" style="width:80px;margin:6px;"  readonly></td>


      </tr>

    </tbody>
  </table>




   </div>
   <div class="row" style="margin-bottom:20px;">
     <div class="col-md-4 col-md-offset-4">
<button  type="submit" class="ui teal  basic button btn-block">Submit</button>
      </form>
     </div>

   </div>
    </div>
</section>

    </div>
<footer style="padding:20px; background-color:#154360;">
    <!--Copyright-->
        <div class="footer-copyright py-3 text-center">
            © 2018 Copyright:
            <a href="sattaplay.in"> SattaPlay.in </a>
        </div>
      </footer>
        <!--/.Copyright-->

<script type="text/javascript">
//mobiledisplay form submitting here
$("#myform").on("submit",function (e) {

  e.preventDefault();
  //getting totalvalue
  var totalvalue=$("#totalvalue").val();
  //getting current balance
  var currentbalance=$("#currentbalance").val();
  var game=$("#mobile option:selected").text();
  //=
  //alert(games);
    var ifnext=$("#mobile option:selected").val();
//alert(ifnext);
  var userid=$("#userid").val();
  //var id=$("#check").attr("ng-model");

 if (parseInt(totalvalue)> parseInt(currentbalance)) {
    alert("कृपया अपने खाते को रिचार्ज करें");
    return false;
  }
  else if (parseInt(totalvalue)<= parseInt(currentbalance)) {
    $("#loadertwo").css("display","block");
    $.ajax({
        type: "post",
        url: "deductbalance.php",
        data: {totalvalue:totalvalue,userid:userid,currentbalance:currentbalance},
        success: function (data) {
          alert(data);

          $(".hobbit").each(function () {
         var vop=$(this).val();
         if(parseInt(vop)>0){
          var modid=$(this).attr("ng-model");
          var modval=$(this).val();
          //alert(modid);
          //alert(modval);
          var objtosend=[];
          objtosend.push({
          key:  modid,
          value: modval
        });
          //var i=120;

          var jsonString = JSON.stringify(objtosend);

          $.ajax({
         type:'post',
         url:'submitgame.php',
         data: {data : jsonString,user:userid,game:game,totalvalue:totalvalue,currentbalance:currentbalance,ifnext:ifnext},
         //cache: false,
         success: function(result){
           //window.Location.href="playpage.php";
           //window.location.href="playpage.php";


                 }
          });

         }


          });

        }
    });




}});


</script>

<script type="text/javascript">
//for bigscreen
$("#myformtwo").on("submit",function (e) {
  e.preventDefault();
  var totalvalue=$("#totalvaluetwo").val();
  var currentbalance=$("#currentbalance").val();
  var game=$("#lotteryname option:selected").text();
  //alert(game);
  console.log(game);
  var ifnext=$("#lotteryname option:selected").val();
  //alert(ifnext);
console.log(ifnext);
  var userid=$("#userid").val();
  //var id=$("#check").attr("ng-model");

 if (parseInt(totalvalue)> parseInt(currentbalance)) {
    alert("कृपया अपने खाते को रिचार्ज करें");
    return false;
  }
  else if (parseInt(totalvalue)<= parseInt(currentbalance)) {
    $("#loader").css("display","block");
    $.ajax({
        type: "post",
        url: "deductbalancetwo.php",
        data: {totalvalue:totalvalue,userid:userid,currentbalance:currentbalance},
        success: function (data) {
          alert(data);

          $(".hobbit").each(function () {
         var vop=$(this).val();
         if(parseInt(vop)>0){
          var modid=$(this).attr("ng-model");
          var modval=$(this).val();
          //alert(modid);
          //alert(modval);
          var objtosend=[];
          objtosend.push({
          key:  modid,
          value: modval
        });
          //var i=120;

          var jsonString = JSON.stringify(objtosend);

          $.ajax({
         type:'post',
         url:'submitgametwo.php',
         data: {data : jsonString,user:userid,game:game,totalvalue:totalvalue,currentbalance:currentbalance,ifnext:ifnext},
         //cache: false,
         success: function(result){
           //window.Location.href="playpage.php";
           //window.location.href="playpage.php";
           //$("#alertmenutwo").css("display","block");
          //$("#alertmenutwo").empty();
          //$("#alertmenutwo").append(result);
          //$(".hobbit").val("");
          //$(".bata").val("0");
        //setInterval(function(){ window.location.href="playpage.php" }, 1000);

                 }
          });

         }


          });

        }
    });




}});


$(document).ajaxStop(function () {

  //$("#alertmenu").css("display","block");
 //$("#alertmenu").empty();
 //$("#alertmenu").append(result);
 $(".hobbit").val("");
 $(".bata").val("0");
//setInterval(function(){ window.location.href="playpage.php" }, 1000);
  $("#loadertwo").css("display","none");

    window.location.href="playpage.php"
  });

</script>


<script type="text/javascript">
//function for allowing numbers only in mobile view



function AllowOnlyNumbers(e) {

    e = (e) ? e : window.event;
    var key = null;
    var charsKeys = [
        97, // a  Ctrl + a Select All
        65, // A Ctrl + A Select All
        99, // c Ctrl + c Copy
        67, // C Ctrl + C Copy
        118, // v Ctrl + v paste
        86, // V Ctrl + V paste
        115, // s Ctrl + s save
        83, // S Ctrl + S save
        112, // p Ctrl + p print
        80 // P Ctrl + P print
    ];

    var specialKeys = [
    8, // backspace
    9, // tab
    27, // escape
    13, // enter
    35, // Home & shiftKey +  #
    36, // End & shiftKey + $
    37, // left arrow &  shiftKey + %
    39, //right arrow & '
    46, // delete & .
    45 //Ins &  -
    ];

    key = e.keyCode ? e.keyCode : e.which ? e.which : e.charCode;

    //console.log("e.charCode: " + e.charCode + ", " + "e.which: " + e.which + ", " + "e.keyCode: " + e.keyCode);
    //console.log(String.fromCharCode(key));

    // check if pressed key is not number
    if (key && key < 48 || key > 57) {

        //Allow: Ctrl + char for action save, print, copy, ...etc
        if ((e.ctrlKey && charsKeys.indexOf(key) != -1) ||
            //Fix Issue: f1 : f12 Or Ctrl + f1 : f12, in Firefox browser
            (navigator.userAgent.indexOf("Firefox") != -1 && ((e.ctrlKey && e.keyCode && e.keyCode > 0 && key >= 112 && key <= 123) || (e.keyCode && e.keyCode > 0 && key && key >= 112 && key <= 123)))) {
            return true
        }
            // Allow: Special Keys
        else if (specialKeys.indexOf(key) != -1) {
            //Fix Issue: right arrow & Delete & ins in FireFox
            if ((key == 39 || key == 45 || key == 46)) {
                return (navigator.userAgent.indexOf("Firefox") != -1 && e.keyCode != undefined && e.keyCode > 0);
            }
                //DisAllow : "#" & "$" & "%"
            else if (e.shiftKey && (key == 35 || key == 36 || key == 37)) {
                return false;
            }
            else {
                return true;
            }
        }
        else {
            return false;
        }
    }
    else {
        return true;
       }
    }


</script>




  </body>
</html>
