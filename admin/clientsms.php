<?php
include 'config.php';
include 'database.php';


$number=$_POST['number'];
$str=$_POST['msg'];



  //$str="Hi-your-new-loginid-is-(".$userid.")and-password-is-(".$password.")-Please-use-it-to-login-in-your-account.";

$url = "http://45.249.108.134/api.php?username=krishnamurari&password=918429&sender=PLBAZR&sendto=$number&message=$str";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$curl_scraped_page = curl_exec($ch);
curl_close($ch);

  echo"Message has been sent successfully";




 ?>
