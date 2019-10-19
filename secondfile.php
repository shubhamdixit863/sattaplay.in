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

 <script type="text/javascript">
   alert(<?php echo $_SESSION['username'] ?>)
 </script>
