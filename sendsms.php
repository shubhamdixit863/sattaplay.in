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


if (isset($_POST['createuser'])) {
  $number="91".$_POST['number'];
  $userid=$_POST['number'];
  $name=$_POST['your_name'];
  $stmt=$db->prepare("select password from users where username=:a");
   $stmt->bindParam(":a",$userid);
   $run=$stmt->execute();

   //$num= $stmt->fetchColumn();
  if($stmt->rowCount()>0){

echo "<script>
window.location.href='login.php';
alert('You are already registered with us,please reset your password incase you forgot!');</script>";
  }
else{
//$msg=urlencode($str);
$number=$_POST['number'];
$userid=$_POST['number'];
$password=random(6);
date_default_timezone_set('Asia/Kolkata');
$cudate= date('Y-m-d H:i:s');
$stmt=$db->prepare("INSERT INTO `users`( `username`, `password`, `doj`,`phonenumber`,`name`) VALUES (:a,:b,:d,:p,:q)");
 $stmt->bindParam(":a",$userid);
 $stmt->bindParam(":b",$password);
 $stmt->bindParam(":d",$cudate);
 $stmt->bindParam(":p",$number);
 $stmt->bindParam(":q",$name);
 $run=$stmt->execute();
 if($run){


  $str="Hi-your-new-loginid-is-(".$userid.")and-password-is-(".$password.")-Please-use-it-to-login-in-your-account.";
$url = "http://www.kit19.com/ComposeSMS.aspx?username=stplay272500&password=Rit_123&sender=STPLAY&to=$number&message=$str&priority=1&dnd=1&unicode=0";
//$url = "http://45.249.108.134/api.php?username=krishnamurari&password=918429&sender=PLBAZR&sendto=$number&message=$str";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$curl_scraped_page = curl_exec($ch);
curl_close($ch);
if ($curl_scraped_page) {
  echo "<script>window.location.href='login.php';
  alert('Username password sent')</script>";
}}
}
}



 ?>
