<?php
include 'config.php';
include 'database.php';
session_start();

$username=$_POST['username'];
$password=$_POST['password'];

if ($username=="" || $password=="") {
 echo "Please enter username and password";
}

else {


$stmt=$db->prepare("select password from admin where username=:user");
 $stmt->bindParam(":user",$username);
 $run=$stmt->execute();
 $result=$stmt->fetch(PDO::FETCH_ASSOC);

if ($result["password"]==$password) {
  echo "success";

 $_SESSION['user']=$username;
 //header('Location:playpage.php');

}

else {
 echo "Wrong username or password";

}



}





 ?>
