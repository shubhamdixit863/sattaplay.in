<?php
ob_start();
session_start();
include 'config.php';
include 'database.php';
if (!isset($_SESSION['username'])) {
header('Location:../login.php');

}


if (isset($_REQUEST['logout'])) {
  session_destroy();
  header('Location:../login.php');
}

 ?>

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>UserPanel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet">
<!-- jQuery -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<!-- tables -->
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<link rel="stylesheet" type="text/css" href="css/basictable.css" />
<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" charset="utf-8"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" charset="utf-8"></script>

<script type="text/javascript">
    $(document).ready(function() {
      $('#table').basictable();

      $('#table-breakpoint').basictable({
        breakpoint: 768
      });

      $('#table-swap-axis').basictable({
        swapAxis: true
      });

      $('#table-force-off').basictable({
        forceResponsive: false
      });

      $('#table-no-resize').basictable({
        noResize: true
      });

      $('#table-two-axis').basictable();

      $('#table-max-height').basictable({
        tableWrapper: true
      });
    });
</script>
<!-- //tables -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
</head>
<body>
   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
				<div class="header-main">
					<div class="logo-w3-agile">
								<h1><a href="../playpage.php">SattaPlay</a></h1>
							</div>

						<div class="profile_details w3l">
								<ul>
									<li class="dropdown profile_details_drop">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<div class="profile_img">
												<span class="prfil-img"><img src="images/user.png" alt=""> </span>
												<div class="user-name">
													<p><?php echo $_SESSION['username'] ?></p>
													<span>User</span>
												</div>
												<i class="fa fa-angle-down"></i>
												<i class="fa fa-angle-up"></i>
												<div class="clearfix"></div>
											</div>
										</a>
										<ul class="dropdown-menu drp-mnu">


											<li> <a href="index.php?logout"><i class="fa fa-sign-out"></i> Logout</a> </li>
										</ul>
									</li>
								</ul>
							</div>

				     <div class="clearfix"> </div>
				</div>
<!--heder end here-->
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i>Tabels</li>
            </ol>
<div class="agile-grids">
				<!-- tables -->

				<div class="agile-tables">
					<!-- contetnt -->


          <div class="row">
            <div class="col-md-10">
              <h4 style="color:red">Withdrawls</h4>
              <table id="withdrawl" class='table table-bordered'>
                 <thead>
                   <tr><th>Date </th>
                     <th>userid </th>

                     <th>Amount</th>
                      <th>BankAccount</th>

                      <th>A.Number </th>
                      <th>IFSC</th>
                      <th>Name</th>
                       <th>Status</th>
                   </tr>
                 </thead>
                 <tbody>



                 </tbody>
               </table>


            </div>

          </div>

          <div class="row">
            <div class="col-md-10">
              <h4 style="color:red">Wins</h4>
              <table id="wins" class='table table-bordered'>
                 <thead>
                   <tr><th>Date </th>
                     <th>userid </th>

                     <th>Game</th>

                       <th>Amount</th>
                   </tr>
                 </thead>
                 <tbody>



                 </tbody>
               </table>

            </div>

          </div>
          <div class="row">
            <div class="col-md-10">
              <h4 style="color:red">Recharges</h4>
              <table id="recharges" class='table table-bordered'>
                 <thead>
                   <tr><th>Date </th>
                     <th>userid </th>

                     <th>Phone</th>

                       <th>Amount</th>
                       <th>Status</th>
                   </tr>
                 </thead>
                 <tbody>



                 </tbody>
               </table>


            </div>

          </div>
				<!-- //tables -->
			</div>
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop();
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });

		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">

</div>
<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
	 <p>© 2018 SattaPlay </p>
</div>
<!--COPY rights end here-->
</div>
</div>
  <!--//content-inner-->
		<!--/sidebar-menu-->
				<?php include 'includes/nav.php'; ?>
							  <div class="clearfix"></div>
							</div>
							<script>
							var toggle = true;

							$(".sidebar-icon").click(function() {
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }

											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->
   <script>
     $( function() {
       $( "#datepicker" ).datepicker();
     } );

     $( function() {
       $( "#hdatepicker" ).datepicker();
     } );
     </script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js" charset="utf-8"></script>

 <script type="text/javascript">
 $( "#datepicker" ).datepicker({
 dateFormat: "yy-mm-dd"
 });
 $( "#hdatepicker" ).datepicker({
 dateFormat: "yy-mm-dd"
 });


 $("#IFSC").on("change",function(e){
 //e.preventDefault();
 var ifsc=$("#IFSC").val();
 //var user=$("#user_it").val();
 //alert(mydate);
 $.ajax({
 type:'post',
 url:'getifsc.php',
 //dataType:'json',
 data:{ifsc:ifsc},
 success:function(result){
   if (result=="") {
     $("#ifsc_detail").empty();
     $("#ifsc_detail").append("<h5 style='color:red;'>No Result Found</h5>");
   }
   else {
     $("#ifsc_detail").empty();
     $("#ifsc_detail").append(result);

   }

 }
 });
 });
 </script>

 <script type="text/javascript">

 $("#transferform").on("submit",function(e){
 e.preventDefault();
 //var mydate=$("#hdatepicker").val();
 //var user=$("#huser_it").val();
 //alert(mydate);
 $.ajax({
 type:'post',
 url:'getmoney.php',
 data:$("#transferform").serialize(),
 success:function(result){
   if (result=="exceeded") {
   alert("Requested Amount Exceeded Your Balance");
   }
   else {
   alert(result);
   window.location.href="requestmoney.php";
   }

 }
 });
 });

 </script>


 <script type="text/javascript">
 $( document ).ready(function() {
 $('#withdrawl').dataTable({
        "bProcessing": true,
                "sAjaxSource": "userwithdrawl.php",
        "aoColumns": [
           { mData: 'date_t' } ,
                       { mData: 'userid' },
                       { mData: 'amount' },
                       { mData: 'bankaccount' },
                       { mData: 'accountnumber' },
                       { mData: 'ifsc' },
                       { mData: 'name' },

                       { mData: 'status' }
               ]
       });
 });
 </script>
 <script type="text/javascript">
 $( document ).ready(function() {
 $('#wins').dataTable({
        "bProcessing": true,
                "sAjaxSource": "userwins.php",
        "aoColumns": [
           { mData: 'date_t' } ,
           { mData: 'userid' },
           { mData: 'game' },

           { mData: 'amount' }

               ]
       });
 });
 </script>
 <script type="text/javascript">
 $( document ).ready(function() {
 $('#recharges').dataTable({
        "bProcessing": true,
                "sAjaxSource": "userrecharges.php",
        "aoColumns": [
           { mData: 'date_t' } ,
           { mData: 'userid' },
           { mData: 'phone' },

           { mData: 'amount' },
           { mData: 'status' }
               ]
       });
 });
 </script>
</body>
</html>
