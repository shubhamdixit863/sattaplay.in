<?php
include 'config.php';
include 'database.php';
$userid=$_POST['userid'];
$amount=$_POST['amount'];
$name=$_POST['iname'];
$bank=$_POST['bank'];
$account=$_POST['a_number'];
$ifsc=$_POST['ifsc'];
date_default_timezone_set('Asia/Kolkata');
$cudate= date('Y-m-d H:i:s');
$oldbal;
$stmt=$db->prepare("SELECT balance FROM `users` WHERE username=:user ");
   $stmt->bindParam(":user",$userid);
   $run=$stmt->execute();
   $result=$stmt->fetch(PDO::FETCH_ASSOC);
if ($amount >$oldbal=$result['balance'] ) {
  echo "exceeded";
}

elseif ($amount <=$result['balance'] ) {
  $stmt=$db->prepare("INSERT INTO `withdrawls`( `userid`, `amount`, `accountnumber`,`date_t`, `bankaccount`, `ifsc`, `name`) VALUES (:user,:amount,:am,:date_t,:bank,:ifsc,:name)");
     $stmt->bindParam(":user",$userid);
      $stmt->bindParam(":am",$account);
     $stmt->bindParam(":amount",$amount);
     $stmt->bindParam(":date_t",$cudate);
     $stmt->bindParam(":bank",$bank);
     $stmt->bindParam(":ifsc",$ifsc);
     $stmt->bindParam(":name",$name);
     $run=$stmt->execute();
     //$result=$stmt->fetch(PDO::FETCH_ASSOC);
     if ($run) {
       $final=$oldbal-$amount;
       $stmt=$db->prepare("UPDATE `users` SET `balance`=:bal WHERE username=:user");
          $stmt->bindParam(":user",$userid);
          $stmt->bindParam(":bal",$final);
           $run=$stmt->execute();
           if ($run) {
             // code...
                echo "Request Send";
           }

       // code...
     }
}
















 ?>
