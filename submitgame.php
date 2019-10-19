<?php
include 'config.php';
include 'database.php';

$data = json_decode(stripslashes($_POST['data']));
$name=$_POST['user'];
$game=preg_replace('/\s+/', ' ', trim($_POST['game']));

$total=$_POST['totalvalue'];
$ifnext=$_POST['ifnext'];
date_default_timezone_set('Asia/Kolkata');
$cudate;
//echo $ifnext;
$bettime=date('Y-m-d H:i:s');

if ($ifnext=="nextday") {
  // code...
  $cudate=date('Y-m-d', strtotime(' +1 day'));
}


  else {
    // code...
    $cudate= date('Y-m-d');
  }


//$currentbalance=$_POST['currentbalance'];

if ($total>0) {
  // code...





  // code...


//echo $game;
//echo $name;
  // here i would like use foreach:


  foreach($data as $d){
    //print_r( $d);
    $digit= $d->key;

    switch ($digit) {
    case "one":
      $digit="01";
        break;
    case "two":
          $digit="02";
        break;
    case "three":
        $digit="03";
        break;
        case "four":
            $digit="04";
            break;
            case "five":
                $digit="05";
                break;
        case "six":
        $digit="06";
        break;
        case "seven":
            $digit="07";
            break;
            case "eight":
                $digit="08";
                break;
case "nine":
$digit="09";
break;
case "ten":
$digit=10;
break;
case "eleven":
$digit=12;
break;
                case "twelve":
                  $digit=12;
                  break;
                  case "thirteen":
                      $digit=13;
                      break;
            case "fourteen":
              $digit=14;
            break;
            case "fifteen":
                $digit=15;
                break;
                case "sixteen":
                    $digit=16;
                    break;
                    case "seventeen":
                        $digit=17;
                        break;
                        case "eighteen":
                            $digit=18;
                            break;
case "nineteen":
$digit=19;
break;
case "twenty":
$digit=20;
break;
case "twentyone":
$digit=21;
break;
case "twentytwo":
$digit=22;
break;case "twentythree":
$digit=23;
break;
case "twentyfour":
$digit=24;
break;
case "twentyfour":
$digit=24;
break;
case "twentyfive":
$digit=25;
break;
case "twentysix":
$digit=26;
break;
case "twentyseven":
$digit=27;
break;
case "twentyeight":
$digit=28;
break;
case "twentynine":
$digit=29;
break;
case "thirty":
$digit=30;
break;
case "thirtyone":
$digit=31;
break;
case "thirtytwo":
$digit=32;
break;
case "thirtythree":
$digit=33;
break;
case "thirtyfour":
$digit=34;
break;
case "thirtyfive":
$digit=35;
break;
case "thirtysix":
$digit=36;
break;
case "thirtyseven":
$digit=37;
break;
case "thirtyeight":
$digit=38;
break;
case "thirtynine":
$digit=39;
break;
case "fourty":
$digit=40;
break;
case "fourtyone":
$digit=41;
break;
case "fourtytwo":
$digit=42;
break;
case "fourtythree":
$digit=43;
break;
case "fourtyfour":
$digit=44;
break;
case "fourtyfive":
$digit=45;
break;
case "fourtysix":
$digit=46;
break;
case "fourtyseven":
$digit=47;
break;
case "fourtyeight":
$digit=48;
break;
case "fourtynine":
$digit=47;
break;
case "fifty":
$digit=48;
break;
case "fiftyone":
  $digit=51;
    break;
case "fiftytwo":
      $digit=52;
    break;
case "fiftythree":
    $digit=53;
    break;
    case "fiftyfour":
        $digit=54;
        break;
        case "fiftyfive":
            $digit=55;
            break;
    case "fiftysix":
    $digit=56;
    break;
    case "fiftyseven":
        $digit=57;
        break;
        case "fiftyeight":
            $digit="58";
            break;
case "fiftynine":
$digit="59";
break;
case "sixty":
$digit=60;
break;
case "sixtyone":
$digit=61;
break;
            case "sixtytwo":
              $digit=62;
              break;
              case "sixtythree":
                  $digit=63;
                  break;
        case "sixtyfour":
          $digit=64;
        break;
        case "sixtyfive":
            $digit="65";
            break;
            case "sixtysix":
                $digit=66;
                break;
                case "sixtyseven":
                    $digit=67;
                    break;
                    case "sixtyeight":
                        $digit=68;
                        break;
case "sixtynine":
$digit=69;
break;
case "seventy":
$digit=70;
break;
case "seventyone":
$digit=71;
break;
case "seventytwo":
$digit=72;
break;case "seventythree":
$digit=73;
break;
case "seventyfour":
$digit=74;
break;

case "seventyfive":
$digit=75;
break;
case "seventysix":
$digit=76;
break;
case "seventyseven":
$digit=77;
break;
case "seventyeight":
$digit=78;
break;
case "seventynine":
$digit=79;
break;
case "eighty":
$digit=80;
break;
case "eightyone":
$digit=81;
break;
case "eightytwo":
$digit=82;
break;
case "eightythree":
$digit=83;
break;
case "eightyfour":
$digit=84;
break;
case "eightyfive":
$digit=85;
break;
case "eightysix":
$digit=86;
break;
case "eightyseven":
$digit=87;
break;
case "eightyeight":
$digit="88";
break;
case "eightynine":
$digit=89;
break;
case "ninty":
$digit=90;
break;
case "nintyone":
$digit=91;
break;
case "nintytwo":
$digit=92;
break;
case "nintythree":
$digit=93;
break;
case "nintyfour":
$digit=94;
break;
case "nintyfive":
$digit=95;
break;
case "nintysix":
$digit=96;
break;
case "nintyseven":
$digit=97;
break;
case "nintyeight":
$digit=98;
break;
case "nintynine":
$digit=99;
break;
case "hundred":
$digit="00";
break;
case "a":
$adigit=1;
break;
case "b":
$bdigit=1;
break;
case "c":
$adigit=2;
break;
case "d":
$bdigit=2;
break;
case "e":
$adigit=3;
break;
case "f":
$bdigit=3;
break;
case "g":
$adigit=4;
break;
case "h":
$bdigit=4;
break;
case "i":
$adigit=5;
break;
case "j":
$bdigit=5;
break;
case "k":
$adigit=6;
break;
case "l":
$bdigit=6;
break;
case "m":
$adigit=7;
break;
case "n":
$bdigit=7;
break;
case "o":
$adigit=8;
break;
case "p":
$bdigit=8;
break;
case "q":
$adigit=9;
break;
case "r":
$bdigit=9;
break;
case "s":
$adigit=0;
break;
case "t":
$bdigit=0;
break;

}
    $amount=$d->value;


if (isset($adigit)) {
  $stmt=$db->prepare("INSERT INTO `andar`( `userid`, `game`, `date_t`, `hdigit`, `andar`) VALUES (:a,:b,:c,:d,:e)");
  $stmt->bindParam(":a",$name);
  $stmt->bindParam(":b",$game);
   $stmt->bindParam(":c",$cudate);

   $stmt->bindParam(":d",$adigit);
    $stmt->bindParam(":e",$amount);

   $run=$stmt->execute();
   //echo "<h1>आपकी बेट सफलतापूर्वक लगा दी गयी </h1>";
   //$flag++;
}

elseif (isset($bdigit)) {
  $stmt=$db->prepare("INSERT INTO `bahar`( `userid`, `game`, `date_t`, `hdigit`, `bahar`) VALUES (:a,:b,:c,:d,:e)");
  $stmt->bindParam(":a",$name);
  $stmt->bindParam(":b",$game);
   $stmt->bindParam(":c",$cudate);

   $stmt->bindParam(":d",$bdigit);
    $stmt->bindParam(":e",$amount);

   $run=$stmt->execute();
  //echo "<h1>आपकी बेट सफलतापूर्वक लगा दी गयी </h1>";
   //$flag++;
}
elseif (isset($digit)) {
  // code...

  $stmt=$db->prepare("INSERT INTO `game_data`( `date_t`, `userid`, `game`, `digit`, `amount`,bet_place_time) VALUES (:a,:b,:c,:d,:e,:f)");
   $stmt->bindParam(":a",$cudate);
   $stmt->bindParam(":b",$name);
   $stmt->bindParam(":c",$game);
   $stmt->bindParam(":d",$digit);
    $stmt->bindParam(":e",$amount);
    $stmt->bindParam(":f",$bettime);

   $run=$stmt->execute();
//echo "<h1>आपकी बेट सफलतापूर्वक लगा दी गयी </h1>";

//$flag++;


}
}


}
else {
  echo "Please Ensure that you have placed proper bidding amount";
}









 ?>
