<?php
include 'config.php';
include 'database.php';
$userid=$_POST['userid'];
$amount=$_POST['amount'];
$phone=$_POST['iname'];

date_default_timezone_set('Asia/Kolkata');
$cudate= date('Y-m-d');


$stmt=$db->prepare("INSERT INTO `recharge`( `userid`, `amount`,`date_t`, phone) VALUES (:user,:amount,:date_t,:phone)");
   $stmt->bindParam(":user",$userid);
    //$stmt->bindParam(":am",$account);
   $stmt->bindParam(":amount",$amount);
   $stmt->bindParam(":date_t",$cudate);
   //$stmt->bindParam(":bank",$bank);
   //$stmt->bindParam(":ifsc",$ifsc);
   $stmt->bindParam(":phone",$phone);
   $run=$stmt->execute();
if ($run) {
  // code...
echo "Request Sent";

}







 ?>
