<?php
include 'config.php';
include 'database.php';
function random($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
{
    $str = '';
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $str .= $keyspace[random_int(0, $max)];
    }
    return $str;
}

if (isset($_POST['submit'])) {
  $number=$_POST['number'];

  $stmt=$db->prepare("select doj, password from users where username=:a");
   $stmt->bindParam(":a",$number);
   $run=$stmt->execute();
   $result=$stmt->fetch(PDO::FETCH_ASSOC);

   //$num= $stmt->fetchColumn();
  if($stmt->rowCount()==0){

  echo "<script>
  window.location.href='forgotpassword.php';
  alert('You are not registered us ,Please register with us first');</script>";
  }
  else{
    date_default_timezone_set('Asia/Kolkata');
    $cudate= date('Y-m-d H:i:s');
    $datetime1 = strtotime($result['doj']);
$datetime2 = strtotime($cudate);
$interval  = abs($datetime2 - $datetime1);
$minutes   = round($interval / 60);

//$elapsed = $interval->format('%i minutes');
//echo $elapsed;
    if ($minutes>12) {
      // code...
      date_default_timezone_set('Asia/Kolkata');
      $curdate= date('Y-m-d H:i:s');

$password=random(4);
  $stmt=$db->prepare("UPDATE `users` SET password=:b ,doj=:d WHERE  phonenumber=:p");
   //$stmt->bindParam(":a",$userid);

   $stmt->bindParam(":b",$password);
   $stmt->bindParam(":d",$curdate);
   $stmt->bindParam(":p",$number);
   $run=$stmt->execute();
   if($run){


    $str="Hi-your-loginid-is-(".$number.")and-password-is-(".$password.")-Please-use-it-to-login-in-your-account.";
$url = "http://www.kit19.com/ComposeSMS.aspx?username=stplay272500&password=Rit_123&sender=STPLAY&to=$number&message=$str&priority=1&dnd=1&unicode=0";
  //$url = "http://45.249.108.134/api.php?username=krishnamurari&password=918429&sender=PLBAZR&sendto=$number&message=$str";
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $curl_scraped_page = curl_exec($ch);
  curl_close($ch);
  if ($curl_scraped_page) {
    echo "<script>window.location.href='forgotpassword.php';
    alert('Username password sent')</script>";
  }}



}

else{
  echo "<script>window.location.href='forgotpassword.php';
  alert('You can retrieve a new password only after 15 min')</script>";
}
}



}




 ?>
