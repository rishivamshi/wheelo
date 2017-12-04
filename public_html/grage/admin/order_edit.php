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
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJlXOAfUt6tttLcSxRgvF20k1XRiSMrvM&callback=initMap" async defer></script>


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
                                        <li><a href="order_mangment.php">Orders Management</a></li>
                                        <li><a href="Accepted orders">New Orders Received</a></li>
                                        <li><a href="completed_orders">All Orders</a></li>
                                       
                                    </ul>
                                </li>


                                <li><a href="users_manage.php"><i class="ti-spray"></i> Users Management </a></li>
                                
                               <li><a href="logout.php"><i class="ti-spray"></i> Logout </a></li>
                            </ul>
                        </div>
                    </div><!--Scrollbar wrapper-->
                </aside>
                <!--left navigation end-->


              
             <?php
$user_id    =   $_GET['id'];
 $query = "SELECT * FROM `orders` WHERE `id` ='$user_id'";
                $result = $con->query($query);
            $row=  $result->fetch_array();
           


?>



                <!-- START PAGE CONTENT -->
                <div id="page-right-content">

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="m-b-20 header-title">Update  Order</h4>
                        
                                <div class="row">
                                    <div class="col-md-6">
                                        <form class="form-horizontal" role="form" method="post" action="process/order_update.php" enctype="multipart/form-data">
                                            <div class="form-group">
                                            <input type="hidden" name="id" value="<?php echo  $_GET['id'] ?>">
                                                <label class="col-md-2 control-label">Order Name</label>
                                                <div class="col-md-10">
                       <input type="text" class="form-control" value="" name="order_name" value="<?php echo $row['order_name']; ?>" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="example-email">Short Description</label>
                                                <div class="col-md-10">
                                                <textarea name="decription" class="form-control"><?php echo $row['decription']; ?></textarea>
                                                    
                                                </div>
                                            </div>

                                            
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Profile Picture</label>
                                                <div class="col-md-10">
                                                    <input type="file" class="form-control" name="picture">
                                                    <img src="uploads/<?php echo $row['picture']; ?>" width="100px" height="100px">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <input class="btn btn-primary" value="Update" type="submit" class="form-control" >
                                                </div>
                                            </div>



                                        </form>
                                    </div>

                                   

                                </div>
                                <!-- end row -->

                              


                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div>
                    <!-- end container -->

                    

                </div>
                <!-- End #page-right-content -->

                    <div class="footer">
                        <div class="pull-right hidden-xs">
                            Project Completed <strong class="text-custom">100%</strong>.
                        </div>
                        <div>
                            <strong>Wheelo</strong> - Copyright &copy; 2017
                        </div>
                    </div> <!-- end footer -->

                </div>
                <!-- End #page-right-content -->

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




    </body>

<!-- Mirrored from coderthemes.com/simple_1.1/light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Aug 2017 14:59:17 GMT -->
</html>