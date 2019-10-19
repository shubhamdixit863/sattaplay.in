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

 ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title> Admin Panel</title>
  <!-- Bootstrap core CSS-->

  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/prettify.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<?php
include 'includes/nav.php';

 ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Users</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-md-6">


<?php
$stmt=$db->prepare("select * from users");
 //$stmt->bindParam(":user",$username);
 $run=$stmt->execute();
 $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
 $table="<table id='example6' class='table table-bordered'>
    <thead> <tr>
       <th>Id</th>
       <th>Username</th>
       <th>Password</th>
       <th>User Since</th>
        <th>Phone number</th>

        <th>Last Login</th>
        <th>Balance</th>
     </tr>
   </thead>
   <tbody>";
foreach ($result as $row) {

  $table.= "<tr>
       <td>$row[id]</td>
         <td>$row[username]</td>
         <td>$row[password]</td>
         <td>$row[doj]</td>
          <td>$row[phonenumber]</td>
          <td>$row[lastlogin]</td>
           <td>
          $row[balance]
           </td>

       </tr>

";
}

$table.="
     </tbody>
   </table>";
echo $table;
 ?>

    </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php
  include 'includes/footer.php';


     ?>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="index.php?logout">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
      <script src="js/tabledit.min.js"></script>
  </div>
<script type="text/javascript">

  $(".changebal").on('submit',function(){
  //var balance=document.getElementById('balance').value;
  //var userid=document.getElementById('username').value
   var theForm = $(this);
  var r = confirm("Are your sure you want to change the balance??");
  if (r == true) {
    $.ajax({
     type:'post',
     url:'changeamount.php',
     data:(theForm).serialize(),
     success:function(result){
       alert(result);
     }

    });
  } else {

  }

});
</script>

<script type="text/javascript">

$('#example6').Tabledit({
    url: 'example.php',
    columns: {
        identifier: [0, 'id'],
        editable: [[1, 'username'], [2, 'password'],[3, 'doj'],[4, 'phonenumber'],[5, 'lastlogin'],[6, 'balance'],]
    },
    onDraw: function() {
        console.log('onDraw()');
    },
    onSuccess: function(data, textStatus, jqXHR) {
        console.log('onSuccess(data, textStatus, jqXHR)');
        console.log(data);
        console.log(textStatus);
        console.log(jqXHR);
    },
    onFail: function(jqXHR, textStatus, errorThrown) {
        console.log('onFail(jqXHR, textStatus, errorThrown)');
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
    },
    onAlways: function() {
        console.log('onAlways()');
    },
    onAjax: function(action, serialize) {
        console.log('onAjax(action, serialize)');
        console.log(action);
        console.log(serialize);
    },

    buttons: {
    edit: {
        class: 'btn btn-sm btn-default',
        html: '<span class="glyphicon glyphicon-pencil"></span>',
        action: 'edit'
    },
    delete: {
        class: 'btn btn-sm btn-default',
        html: '<span class="glyphicon glyphicon-trash"></span>',
        action: 'delete'
    },
    save: {
        class: 'btn btn-sm btn-success',
        html: 'Save'
    },
    restore: {
        class: 'btn btn-sm btn-warning',
        html: 'Restore',
        action: 'restore'
    },
    confirm: {
        class: 'btn btn-sm btn-danger',
        html: 'Confirm'
    }
}
});

</script>
  </body>

</html>
