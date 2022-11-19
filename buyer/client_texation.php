<?php

include "../BackendLogic/url.php";
include "../BackendLogic/database_connectivity.php";
session_start();
if($_SESSION['Role_redirect']!="2")
{
    header("location:");
}
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Texation</title>
    <link rel="shortcut icon" href="../hardcode_images/cusit-logo.png" type="image/x-icon">
    <!-- bootstrap Linke -->
    <link rel="stylesheet" href="../asset/css/bootstrap.css">
    <!-- Custom css-->
    <link rel="stylesheet" href="../asset/custom/custom.css">
    <!-- icon link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  </head>
<body>

    <!-- navbar  -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border border-bottom-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.html"><span class="title normal_text_color">Cusit Fiverr</sapn><sub style="font-size:11px;font-family: Arial, Helvetica, sans-serif;">buyer Texation</sub></a>

                <!-- Buyer navigation-->
                <div>
                <a href="client_main_page.php" class="link-text" style="font-size:15px;">Home</a>
                <a href="client_project_dashboard.php" class="link-text" style="font-size:15px;">Project DashBoard</a>
                <a href="client_profile.php" class="link-text" style="font-size:15px;">Profile</a>
                <a href="client_payment.php" class="link-text" style="font-size:15px;">Payment</a>
                <a href="../BackendLogic/logout.php" class="link-text" style="font-size:15px;">Signout</a>
                </div>
                <!-- Buyer navigation End-->

        </div>  
    </nav>
    <!-- navbar end-->
<br><br>

<div class="container">
    <div class="row">
        <div class="col-lg-5 col-12">
            <div class="card p-3 pt-4" style="border-radius:2px;">
                <h5 class="common-title text-center">Tex Rules And Regulations</h5>
                <hr>
                <div class="row">
                    <div class="col-1">
                        <i class="fa fa-check" style="color:rgb(36, 36, 190);font-size:25px;"></i>
                    </div>
                    <div class="col-11">
                       <b>Email Address will be not Changable once it verified.</b> 
                    </div>
                    <hr class="mt-3 w-100">
                    <div class="col-1">
                        <i class="fa fa-check" style="color:rgb(36, 36, 190);font-size:25px;"></i>
                    </div>
                    <div class="col-11">
                        <b>Password Of Your Account is Changable.</b> 
                    </div>
                    <hr class="mt-3 w-100">
                    <div class="col-1">
                        <i class="fa fa-check" style="color:rgb(36, 36, 190);font-size:25px;"></i>
                    </div>
                    <div class="col-11">
                        <b>Password Should Contain Special Characters To Impover Security.</b> 
                    </div>
                    
                    <hr class="mt-3 w-100">
                    <div class="col-1">
                        <i class="fa fa-check" style="color:rgb(36, 36, 190);font-size:25px;"></i>
                    </div>
                    <div class="col-11">
                        <b>Do Not Share Your Account Password With Others.</b> 
                    </div>
                    <hr class="mt-3 w-100">
                    <div class="col-1">
                        <i class="fa fa-check" style="color:rgb(36, 36, 190);font-size:25px;"></i>
                    </div>
                    <div class="col-11">
                        <b>Do Not Save Your Account Info in Any strange Browser & Device.</b> 
                    </div class="mt-3">
                    <hr>
                    <h5 class="common-title text-center">Thank You !</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-7 col-12">
            <div class="row">
            <div class="col-12">
            <div class="card  rounded-0 p-3" style="width:42rem">
                <h5 class="common-title text-center pt-1">Current Month</h5>
                <Center>
                    <div class="row ScrollBar">
                        <hr>
                        <div class="col-4 common-title">Order Type</div>
                        <div class="col-4 common-title">Quality</div>
                        <div class="col-4 common-title">Tex</div>
                        <?php
                            $total_tex_currnt=0;
                            $sql="SELECT * FROM s_b_order WHERE o_sender_email='ali@gmail.com' AND YEAR(order_date) = YEAR(CURRENT_DATE()) AND MONTH(order_date) = MONTH(CURRENT_DATE())";
                            $run=mysqli_query($DatabaseConnect,$sql);
                            while($row=mysqli_fetch_assoc($run))
                            {
                                $total_tex_currnt+=$row['tex'];
                        ?>
                        <hr>
                        <br>  
                        <?php
                            if($row['type_of_gig']==1)
                            {
                                $sql_basic="SELECT * FROM basic_gig inner join s_gig on basic_gig.b_gig_id=s_gig.s_gig_id where b_gig_id={$row['order_gig_id']}";
                                $sql_basic_run=mysqli_query($DatabaseConnect,$sql_basic);
                                while($row_basic=mysqli_fetch_assoc($sql_basic_run))
                                {

                            
                        ?>
                        <div class="col-4"><?php echo $row_basic['g_name']; ?></div>
                        <div class="col-4">Baisc</div>
                        <div class="col-4"><?php echo $row['tex']; ?></div>
                        <?php
                                }
                            }
                        ?>

                        <!-- standard-->
                        <?php
                            if($row['type_of_gig']==2)
                            {
                                $sql_standard="SELECT * FROM standard_gig inner join s_gig on standard_gig.s_gig_id=s_gig.s_gig_id where s_gig.s_gig_id={$row['order_gig_id']}";
                                $sql_standard_run=mysqli_query($DatabaseConnect,$sql_standard);
                                while($row_standard=mysqli_fetch_assoc($sql_standard_run))
                                {

                            
                        ?>
                        <div class="col-4"><?php echo $row_standard['g_name']; ?></div>
                        <div class="col-4">Standard</div>
                        <div class="col-4"><?php echo $row['tex']; ?></div>
                        <?php
                                }
                            }
                        ?>

                        <!-- premium -->

                        <?php
                            if($row['type_of_gig']==3)
                            {
                                $sql_premium="SELECT * FROM premium_gig inner join s_gig on premium_gig.p_gig_id=s_gig.s_gig_id where s_gig.s_gig_id={$row['order_gig_id']}";
                                $sql_premium_run=mysqli_query($DatabaseConnect,$sql_premium);
                                while($row_premium=mysqli_fetch_assoc($sql_premium_run))
                                {

                            
                        ?>
                        <div class="col-4"><?php echo $row_premium['g_name']; ?></div>
                        <div class="col-4">Premium</div>
                        <div class="col-4"><?php echo $row['tex']; ?></div>
                        <?php
                                }
                            }
                        ?>
                        <?php
                        
                         }
                         echo "<center style='font-weight:bold;height:52px;border:1px solid rgb(35, 14, 158);color:rgb(35, 14, 158);padding-top:13px;padding-bottom:13px;'>";
                         echo "Total Tex Previous Month ".$total_tex_currnt;
                         echo "</center>";

                        ?>                    
                        
                    </div>

                </Center>
            </div>
            </div>
        </div>
        <br>
        <center>
        <div class="row">
            <div class="col-12">
            <div class="card rounded-0 p-3" style="width:42rem">
                <h5 class="common-title text-center pt-1">Previous Month</h5>
                <Center>
                    <div class="row ScrollBar">
                        <hr>
                        <div class="col-4 common-title">Order Type</div>
                        <div class="col-4 common-title">Quality</div>
                        <div class="col-4 common-title">Tex</div>
                        <br>

                        <?php
                            $total_tex=0;
                            $sql="SELECT * FROM s_b_order WHERE o_sender_email='ali@gmail.com' AND YEAR(order_date) = YEAR(CURRENT_DATE()) AND MONTH(order_date) = MONTH(CURRENT_DATE())-1";
                            $run=mysqli_query($DatabaseConnect,$sql);
                            while($row=mysqli_fetch_assoc($run))
                            {
                                $total_tex+=$row['tex'];
                        ?>
                        <hr>
                        <br>  
                        <?php
                            if($row['type_of_gig']==1)
                            {
                                $sql_basic="SELECT * FROM basic_gig inner join s_gig on basic_gig.b_gig_id=s_gig.s_gig_id where b_gig_id={$row['order_gig_id']}";
                                $sql_basic_run=mysqli_query($DatabaseConnect,$sql_basic);
                                while($row_basic=mysqli_fetch_assoc($sql_basic_run))
                                {

                            
                        ?>
                        <div class="col-4"><?php echo $row_basic['g_name']; ?></div>
                        <div class="col-4">Baisc</div>
                        <div class="col-4"><?php echo $row['tex']; ?></div>
                        <?php
                                }
                            }
                        ?>

                        <!-- standard-->
                        <?php
                            if($row['type_of_gig']==2)
                            {
                                $sql_standard="SELECT * FROM standard_gig inner join s_gig on standard_gig.s_gig_id=s_gig.s_gig_id where s_gig.s_gig_id={$row['order_gig_id']}";
                                $sql_standard_run=mysqli_query($DatabaseConnect,$sql_standard);
                                while($row_standard=mysqli_fetch_assoc($sql_standard_run))
                                {

                            
                        ?>
                        <div class="col-4"><?php echo $row_standard['g_name']; ?></div>
                        <div class="col-4">Standard</div>
                        <div class="col-4"><?php echo $row['tex']; ?></div>
                        <?php
                                }
                            }
                        ?>

                        <!-- premium -->

                        <?php
                            if($row['type_of_gig']==3)
                            {
                                $sql_premium="SELECT * FROM premium_gig inner join s_gig on premium_gig.p_gig_id=s_gig.s_gig_id where s_gig.s_gig_id={$row['order_gig_id']}";
                                $sql_premium_run=mysqli_query($DatabaseConnect,$sql_premium);
                                while($row_premium=mysqli_fetch_assoc($sql_premium_run))
                                {

                            
                        ?>
                        <div class="col-4"><?php echo $row_premium['g_name']; ?></div>
                        <div class="col-4">Premium</div>
                        <div class="col-4"><?php echo $row['tex']; ?></div>
                        <?php
                                }
                            }
                        ?>
                        <?php  
                         }
                         echo "<center style='font-weight:bold;height:52px;border:1px solid rgb(35, 14, 158);color:rgb(35, 14, 158);padding-top:13px;padding-bottom:13px;'>";
                         echo "Total Tex Previous Month ".$total_tex;
                         echo "</center>";
                        ?>                    
                    </div>
                </Center>
            </div>
            </div>
        </div>

<br><br>
    
<!-- Custom Javacript-->
<script src="../asset/custom/custom.js"></script>
<!-- javascript Linke -->
<script src="../asset/js/bootstrap.js"></script>
</body>
</html>
