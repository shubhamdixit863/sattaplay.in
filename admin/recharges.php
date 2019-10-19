<?php
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
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link rel="stylesheet" href="css/editor.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.5/css/select.dataTables.min.css">
  <!-- jQuery library -->

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
          <li><button id="btnExport"class="ui olive basic button" onclick="fnExcelReport();"> EXPORT AS EXCEL </button></li><br>
        <li class="breadcrumb-item active">Recharges</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <table id="example" class="table table-bordered">
           <thead>
             <tr> <th>S.No</th>
               <th>UserID</th>
               <th>Amount</th>
               <th>Date</th>
                <th>Phone</th>


                    <th>Status</th>
             </tr>
           </thead>
           <tbody>


           </tbody>
         </table>
    </div>

    <div class="row"  style="margin-top:20px;margin-bottom:20px;">
      <div class="col-md-8">
        <h4 style="color:red;">**Message Should not contain spaces between Words</h4>
        <form class="" action="" id="smsform" method="post">


                <textarea name="msg" rows="8" cols="80" class="form-control">Recharge-Success.Thanks.SattaPlay.in</textarea>
            <label for="">Phone</label>
        <input type="text" name="number" id="pi"  placeholder="Phone number" class="form-control" required>


        <input type="submit" name="" value="Send Message" style="margin-top:20px;margin-bottom:20px;" class="btn btn-info">
</form>
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

    <!-- Custom scripts for all pages-->

    <!-- Custom scripts for this page-->


  </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" charset="utf-8"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js" charset="utf-8"></script>

<script src="datajs/dataTables.editor.js" charset="utf-8"></script>
<script src="https://cdn.datatables.net/select/1.2.5/js/dataTables.select.min.js" charset="utf-8"></script>
<script type="text/javascript">

var editor; // use a global for the submit and return data rendering in the examples

$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: "requestdatatable.php",
        table: "#example",
        fields: [
          {
                  label: "S.No",
                  name: "id"
              },
           {
                label: "Userid",
                name: "userid"
            }, {
                label: "Amount/Requested",
                name: "amount"
            }, {
                label: "Date",
                name: "date_t"
            },
            {
                label: "Phone",
                name: "phone"

            },
            {
                label: "Status",
                name: "status"

            }
        ]
    } );

    $('#example').on( 'click', 'tbody td:not(:first-child)', function (e) {
        editor.inline( this, {
            submit: 'allIfChanged'
        } );
    } );

    $('#example').DataTable( {
        dom: "Bfrtip",
        ajax: "requestdatatable.php",
        columns: [

            { data: "id" },
            { data: "userid" },
            { data: "amount" },
            { data: "date_t" },

            { data: "phone" },
            { data: "status" }

        ],
        order: [ 1, 'asc' ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        buttons: [
            { extend: "create", editor: editor },
            { extend: "edit",   editor: editor },
            { extend: "remove", editor: editor }
        ]
    } );
} );

</script>
<script type="text/javascript">
  $("#smsform").on("submit",function(e){
e.preventDefault();
$.ajax({
type:'POST',
url:'clientsms.php',
data:$("#smsform").serialize(),
success:function (e) {
  $("#pi").val("");
  alert(e);
}

});

  });
</script>

<script type="text/javascript">
function fnExcelReport()
{
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('example'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++)
    {
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus();
        sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
    }
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));

    return (sa);
}

</script>
</html>
