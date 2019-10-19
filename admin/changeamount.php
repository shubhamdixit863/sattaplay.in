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

$balance=$_POST['balance'];
$username=$_POST['userid'];
$stmt=$db->prepare("update users set balance=:bal where username=:user");
 $stmt->bindParam(":user",$username);
 $stmt->bindParam(":bal",$balance);
 $run=$stmt->execute();
 if ($run) {
   echo "Updation Succesfull,Please refresh the page";
   // code...
 }
 //$result=$stmt->fetch(PDO::FETCH_ASSOC);


 ?>
