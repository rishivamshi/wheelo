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

  <?php
                $user_id =   $_SESSION['user_id'];
                $query = "SELECT * FROM users_order WHERE `user_id`='$user_id' ";
                $result = $con->query($query);

                $row = $result->fetch_all();
//print_r($row); exit();
            
          


                

                $fb_query = "SELECT * FROM `users_order` WHERE `user_id`='$user_id' and `status`=1";
              // echo $fb;
                $fb_result = $con->query($fb_query);
                $fb_users = $fb_result->num_rows;
                
                $gm_query = "SELECT * FROM `users_order` WHERE `user_id`='$user_id' and `status`=2";
                $gm_result = $con->query($gm_query);
                $gm_users = $gm_result->num_rows;
                
                $tw_query = "SELECT * FROM `users_order` WHERE `user_id`='$user_id' and `status`=3";
                $tw_result = $con->query($tw_query);
                $tw_users = $tw_result->num_rows;

                $tw_query = "SELECT * FROM `users_order` WHERE `user_id`='$user_id' and `status`=4";
                $tw_result = $con->query($tw_query);
                $total_users = $tw_result->num_rows;
            ?>
                
                <!-- START PAGE CONTENT -->
                <div id="page-right-content">

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box widget-inline">
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="widget-inline-box text-center">
                                                <h3 class="m-t-10"><i class="text-primary fa fa-first-order"></i> <b data-plugin="counterup"><?php echo $fb_users; ?></b></h3>
                                                <p class="text-muted">New Orders Received</p>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-6">
                                            <div class="widget-inline-box text-center">
                                                <h3 class="m-t-10"><i class="text-custom fa fa-first-order"></i> 
                                                <b data-plugin="counterup"><?php echo $gm_users; ?></b></h3>
                                                <p class="text-muted">Accepted Orders</p>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-6">
                                            <div class="widget-inline-box text-center">
                                                <h3 class="m-t-10"><i class="text-info fa fa-first-order"></i> 
                                                <b data-plugin="counterup"><?php echo $tw_users; ?></b></h3>
                                                <p class="text-muted">Rejected Orders</p>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-6">
                                            <div class="widget-inline-box text-center b-0">
                                                <h3 class="m-t-10"><i class="text-danger mdi mdi-cellphone-link"></i> <b data-plugin="counterup"><?php echo $total_users; ?></b></h3>
                                                <p class="text-muted">Completed Orders</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row -->
                <?php


                
                 $query="SELECT t1.*, t2.* FROM orders as t1 , users_order as t2 WHERE t1.id = t2.order_id";
$result = $con->query($query);
               

                ?>


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                  <h4 class="m-t-0">Orders</h4> <a href="add_order.php" class="btn btn-success">Add New Orders</a>
                                    <div class="table-responsive">
                                        <table id="example" class="table table-hover mails m-0 table table-actions-bar">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>Name</th>
                                                    <th>description</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                            <?php 
                                            while ($res= $result->fetch_assoc()) { ?>
                       


                                                <tr>
                                                    

                                                    <td>
                                                        <?php  echo $res['order_name']; ?> 
                                                    </td>

                                                    <td>
                                                        <a href="#" class="text-muted">
                                                        <?php  echo $res['decription']; ?></a>
                                                    </td>


                                                    <td>
                                                       


                                                       <?php

                                       if ($res['status']==0) {?>
                                           <a href="#" class="btn btn-primary btn-bordred btn-rounded waves-effect waves-light">Order Now</a>
                                       <?php    
                                       }elseif ($res['status']==1) { ?>
                                       <a href="#" class="btn btn-warning btn-bordred btn-rounded waves-effect waves-light">Pending Order</a>
                                        
                                       <?php    
                                       }elseif ($res['status']==2) { ?>
                                           <a href="#" class="btn btn-success btn-bordred btn-rounded waves-effect waves-light">Accepted</a>
                                           
                                       <?php }elseif ($res['status']==3) { ?>
                                           <a href="#" class="btn btn-danger btn-bordred btn-rounded waves-effect waves-light">Rejected</a>
                                       <?php }elseif ($res['status']==4) {
                                          ?>
                                       <a href="#" class="btn btn-success btn-bordred btn-rounded waves-effect waves-light">Completed</a>
                                       <?php    
                                       }


                                        ?>
                                                    </td>

                                                </tr>

                                                <?php } ?>

                                              

                                                


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- end container -->

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

</html>