<!DOCTYPE html>
<html lang="en">
<?php 
include 'config/config.php';

if($_SESSION['admin']==''){
header('location: index.php');
}

?>  
<head>
        <meta charset="utf-8" />
        <title>Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="assets/plugins/morris/morris.css">

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="assets/css/metisMenu.min.css" rel="stylesheet">
        <!-- Icons CSS -->
        <link href="assets/css/icons.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.css"/>
 


    </head>

    <body>

        <div id="page-wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="">
                        <a href="index.html" class="logo">
                            <img src="assets/images/logo.png" alt="logo" class="logo-lg" />
                            <img src="assets/images/logo_sm.png" alt="logo" class="logo-sm hidden" />
                        </a>
                    </div>
                </div>

                <!-- Top navbar -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">

                            <!-- Mobile menu button -->
                            <div class="pull-left">
                                <button type="button" class="button-menu-mobile visible-xs visible-sm">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>

                           

                            <!-- Top nav Right menu -->
                          
                        </div>
                    </div> <!-- end container -->
                </div> <!-- end navbar -->
            </div>
            <!-- Top Bar End -->


            <!-- Page content start -->
            <div class="page-contentbar">

                <!--left navigation start-->
                <aside class="sidebar-navigation">
                    <div class="scrollbar-wrapper">
                        <div>
                            <button type="button" class="button-menu-mobile btn-mobile-view visible-xs visible-sm">
                                <i class="mdi mdi-close"></i>
                            </button>
                            <!-- User Detail box -->
                            <div class="user-details">
                            
                                    <p class="text-muted m-0">Administrator</p>
                               
                            </div>
                            <!--- End User Detail box -->

                            <!-- Left Menu Start -->
                            <ul class="metisMenu nav" id="side-menu">
                                <li><a href="home.php"><i class="ti-home"></i> Dashboard </a></li>

                               <li>
                                    <a href="javascript: void(0);" aria-expanded="true"><i class="ti-files"></i>Orders Management <span class="fa arrow"></span></a>
                                    <ul class="nav-second-level nav" aria-expanded="true">
                                        <li><a href="order_mangment.php">Create Orders</a></li>
                                        <li><a href="new_orders.php">New Orders Received</a></li>
                                     
                                       
                                    </ul>
                                </li>
 

                                <li><a href="users_manage.php"><i class="ti-spray"></i> Users Management </a></li>
                               
                               <li><a href="logout.php"><i class="ti-spray"></i> Logout </a></li>
                            </ul>
                        </div>
                    </div><!--Scrollbar wrapper-->
                </aside>
                <!--left navigation end-->


               
               <!-- START PAGE CONTENT -->
                <div id="page-right-content">

                    <div class="container">
                       


                     
                       <div class="row">
                            <div class="col-lg-10 center-page">
                                

                                

                                    <!--Pricing Column-->

                                    <?php 
   

    
    $query="SELECT t1.*, t2.* FROM orders as t1 , users_order as t2 WHERE t1.id = t2.order_id and t2.status IN(1,2)" ;
                             // echo $query;

    $result = $con->query($query);
    $count = 0;

?>
<div class="row m-t-30">
<?php
        while($res = $result->fetch_array()){ ?>
          <article class="pricing-column col-md-4">
                                <div class="inner-box">
                                    <div class="plan-header text-center">
                                        <h3 class="plan-title"><?php echo $res['order_name']?></h3>
                                         <img src="uploads/<?php echo $res['picture']?>" height="200px" width="200px">
                                    </div>

                                    <div class="text-center">
                                       
                                    </div>
                                    <div class="text-center">
                                       <?php if($res['status']==1){ ?>
                                           <a href="process/process_accept.php?id=<?php echo $res['order_id']; ?>&user_id=<?php echo $res['user_id']; ?>" class="btn btn-success btn-bordred btn-rounded waves-effect waves-light">Accepted</a>
                                           <a href="process/process_reject.php?id=<?php echo $res['order_id']; ?>&user_id=<?php echo $res['user_id']; ?>" class="btn btn-danger btn-bordred btn-rounded waves-effect waves-light">Reject</a>
                                    <?php }elseif($res['status']==2){ ?>
<a href="process/process_finish.php?id=<?php echo $res['order_id']; ?>&user_id=<?php echo $res['user_id']; ?>" class="btn btn-primary btn-bordred btn-rounded waves-effect waves-light">Finish</a>
                                      <?php } ?>

                                        

                                        <!-- 

                                        <a href="#" class="btn btn- btn-bordred btn-rounded waves-effect waves-light">Order Now</a>
                                        <a href="#" class="btn btn-warning btn-bordred btn-rounded waves-effect waves-light">Order Now</a> -->
                                    </div>
                                </div>
                            </article>   
        
        <?php } ?>
                
   
   
                                   



                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                    </div>

            </div>
            <!-- end .page-contentbar -->
        </div>
        <!-- End #page-wrapper -->



        <!-- js placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery-2.1.4.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/jquery.slimscroll.min.js"></script>

        <!--Morris Chart-->
		<script src="assets/plugins/morris/morris.min.js"></script>
		<script src="assets/plugins/raphael/raphael-min.js"></script>

        <!-- Dashboard init -->
		<script src="assets/pages/jquery.dashboard.js"></script>

        <!-- App Js -->
        <script src="assets/js/jquery.app.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.js"></script>
    <script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
});

    </script>

    </body>


</html>