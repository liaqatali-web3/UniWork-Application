<?php

session_start();

include '../BackendLogic/url.php';
if($_SESSION['Role_redirect']!="1")
{
  header("location:");
}

include '../BackendLogic/database_connectivity.php';




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Project Dashboard</title>
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
            <a class="navbar-brand" href="freelancer_main_page.php"><span class="title normal_text_color">Cusit Fiverr</sapn><sub style="font-size:11px;font-family: Arial, Helvetica, sans-serif;">Seller Project Dashboard</sub></a>
                
                <!-- Buyer navigation-->
                <div>
                    <a href="freelancer_main_page.php" class="link-text" style="font-size:15px;">Home</a>
                    <a href="freelancer_dashboard.php" class="link-text" style="font-size:15px;">DashBoard</a>
                    <a href="freelancer_security.php" class="link-text" style="font-size:15px;">Security</a>
                    <a href="freelancer_profile_creation.php" class="link-text" style="font-size:15px;">Profile</a>
                    <!-- <a href="freelancer_texation.php" class="link-text" style="font-size:15px;">Texation</a>
                    <a href="freelancer_payment.php" class="link-text" style="font-size:15px;">Payment</a> -->
                    <a href="../BackendLogic/logout.php" class="link-text" style="font-size:15px;">Signout</a>
                </div>
                <!-- Buyer navigation End-->    
        </div>
    </nav>
    <!-- navbar end-->
<br><br>
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-12">
            <div class="card p-3 ScrollBar">
                <center>
                <h5 class="common-title pt-2">Total Earning</h5>
                <table class="table">
                    <thead style="text-align:center;">
                        <th>Gig</th>
                        <th>Basic</th>
                        <th>Standard</th>
                        <th>Premium</th>
                    </thead>
                    <tbody style="text-align:center">
                    <?php
                    $sum=0;
                    $sql="SELECT * FROM s_b_order where o_receiver_email='{$_SESSION['Email_redirect']}' && o_complete=1";
                    $result=mysqli_query($DatabaseConnect,$sql);
                    if(mysqli_num_rows($result)>0)
                    {

                        while($row=mysqli_fetch_assoc($result))
                        {
                            // start basic gig
                            if($row['type_of_gig']==1)
                            {
                                $sql_b="SELECT * FROM s_gig inner join basic_gig on s_gig.s_gig_id=basic_gig.b_gig_id where s_gig.s_gig_id='{$row['order_gig_id']}'";
                                $result_b=mysqli_query($DatabaseConnect,$sql_b);
                                while($b_gig_row=mysqli_fetch_assoc($result_b))
                                {
                                    $sum+=$b_gig_row['b_gig_price'];
                                   echo "<tr>";
                                   echo "<td>{$b_gig_row['g_name']}</td>";
                                   echo "<td>Rs. {$b_gig_row['b_gig_price']}</td>";
                                   echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                   echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                   echo "</tr>";
                                }
                            }
                            /// end of basic gig.

                            // start standard gig
                            else if($row['type_of_gig']==2)
                            {
                                $sql_s="SELECT * FROM s_gig inner join standard_gig on s_gig.s_gig_id=standard_gig.s_gig_id where s_gig.s_gig_id='{$row['order_gig_id']}'";
                                $result_s=mysqli_query($DatabaseConnect,$sql_s);
                                while($s_gig_row=mysqli_fetch_assoc($result_s))
                                {
                                    $sum+=$s_gig_row['s_gig_price'];
                                   echo "<tr>";
                                   echo "<td>{$s_gig_row['g_name']}</td>";
                                   echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                   echo "<td>Rs. {$s_gig_row['s_gig_price']}</td>";
                                   echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                   echo "</tr>";
                                }
                            }
                            /// end of standard gig.


                            // start premium gig
                            if($row['type_of_gig']==3)
                            {
                                $sql_p="SELECT * FROM s_gig inner join premium_gig on s_gig.s_gig_id=premium_gig.p_gig_id where s_gig.s_gig_id='{$row['order_gig_id']}'";
                                $result_p=mysqli_query($DatabaseConnect,$sql_p);
                                while($p_gig_row=mysqli_fetch_assoc($result_p))
                                {
                                    $sum+=$p_gig_row['p_gig_price'];
                                   echo "<tr>";
                                   echo "<td>{$p_gig_row['g_name']}</td>";
                                   echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                   echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                   echo "<td>Rs. {$p_gig_row['p_gig_price']}</td>";
                                   echo "</tr>";
                                }
                            }
                            /// end of premium gig.

                        }
                    }
                      ?>
                    </tbody>
                </table>
                Rs. <?php echo $sum; ?>
                </center>
            </div>

        </div>
        <div class="col-lg-4 col-12 mt-3 mt-lg-0">
            <div class="card p-3 ScrollBar">
                <center>
                <h5 class="common-title pt-2">Total Texation</h5>
                <table class="table">
                    <thead style="text-align:center;">
                        <th>Buyer</th>
                        <th>Basic</th>
                        <th>Standard</th>
                        <th>Premium</th>
                    </thead>
                    <tbody style="text-align:center">
                    <?php
                    $sum=0;
                    $sql="SELECT * FROM s_b_order where o_receiver_email='{$_SESSION['Email_redirect']}' && o_complete=1";
                    $result=mysqli_query($DatabaseConnect,$sql);
                    if(mysqli_num_rows($result)>0)
                    {

                        while($row=mysqli_fetch_assoc($result))
                        {
                            // start basic gig
                            if($row['type_of_gig']==1)
                            {
                                $sql_b="SELECT * FROM s_gig inner join basic_gig on s_gig.s_gig_id=basic_gig.b_gig_id where s_gig.s_gig_id='{$row['order_gig_id']}'";
                                $result_b=mysqli_query($DatabaseConnect,$sql_b);
                                while($b_gig_row=mysqli_fetch_assoc($result_b))
                                {
                                    $sum+=50;
                                   echo "<tr>";
                                   echo "<td>{$row['o_sender_name']}</td>";
                                   echo "<td>Rs. 50 </td>";
                                   echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                   echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                   echo "</tr>";
                                }
                            }
                            /// end of basic gig.

                            // start standard gig
                            else if($row['type_of_gig']==2)
                            {
                                $sql_s="SELECT * FROM s_gig inner join standard_gig on s_gig.s_gig_id=standard_gig.s_gig_id where s_gig.s_gig_id='{$row['order_gig_id']}'";
                                $result_s=mysqli_query($DatabaseConnect,$sql_s);
                                while($s_gig_row=mysqli_fetch_assoc($result_s))
                                {
                                    $sum+=100;
                                   echo "<tr>";
                                   echo "<td>{$row['o_sender_name']}</td>";
                                   echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                   echo "<td>Rs.100 </td>";
                                   echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                   echo "</tr>";
                                }
                            }
                            /// end of standard gig.


                            // start premium gig
                            if($row['type_of_gig']==3)
                            {
                                $sql_p="SELECT * FROM s_gig inner join premium_gig on s_gig.s_gig_id=premium_gig.p_gig_id where s_gig.s_gig_id='{$row['order_gig_id']}'";
                                $result_p=mysqli_query($DatabaseConnect,$sql_p);
                                while($p_gig_row=mysqli_fetch_assoc($result_p))
                                {
                                    $sum+=150;
                                   echo "<tr>";
                                   echo "<td>{$row['o_sender_name']}</td>";
                                   echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                   echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                   echo "<td>Rs. 150 </td>";
                                   echo "</tr>";
                                }
                            }
                            /// end of premium gig.

                        }
                    }
                      ?>
 
                    </tbody>
                </table>
                Rs. <?php echo $sum; ?>
                </center>
            </div>

        </div>
        <div class="col-lg-4 col-12 mt-3 mt-lg-0">
            <div class="card p-3 ScrollBar">
                <center>
                <h5 class="common-title pt-2">Pending Earning</h5>
                <table class="table">
                    <thead style="text-align:center;">
                        <th>Gig</th>
                        <th>Basic</th>
                        <th>Standard</th>
                        <th>Premium</th>
                    </thead>
                    <tbody style="text-align:center">
                    <?php
                    $sum=0;
                    $sql="SELECT * FROM s_b_order where o_receiver_email='{$_SESSION['Email_redirect']}' && o_complete=0";
                    $result=mysqli_query($DatabaseConnect,$sql);
                    if(mysqli_num_rows($result)>0)
                    {

                        while($row=mysqli_fetch_assoc($result))
                        {
                            // start basic gig
                            if($row['type_of_gig']==1)
                            {
                                $sql_b="SELECT * FROM s_gig inner join basic_gig on s_gig.s_gig_id=basic_gig.b_gig_id where s_gig.s_gig_id='{$row['order_gig_id']}'";
                                $result_b=mysqli_query($DatabaseConnect,$sql_b);
                                while($b_gig_row=mysqli_fetch_assoc($result_b))
                                {
                                    $sum+=$b_gig_row['b_gig_price'];
                                   echo "<tr>";
                                   echo "<td>{$b_gig_row['g_name']}</td>";
                                   echo "<td>Rs. {$b_gig_row['b_gig_price']}</td>";
                                   echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                   echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                   echo "</tr>";
                                }
                            }
                            /// end of basic gig.

                            // start standard gig
                            else if($row['type_of_gig']==2)
                            {
                                $sql_s="SELECT * FROM s_gig inner join standard_gig on s_gig.s_gig_id=standard_gig.s_gig_id where s_gig.s_gig_id='{$row['order_gig_id']}'";
                                $result_s=mysqli_query($DatabaseConnect,$sql_s);
                                while($s_gig_row=mysqli_fetch_assoc($result_s))
                                {
                                    $sum+=$s_gig_row['s_gig_price'];
                                   echo "<tr>";
                                   echo "<td>{$s_gig_row['g_name']}</td>";
                                   echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                   echo "<td>Rs. {$s_gig_row['s_gig_price']}</td>";
                                   echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                   echo "</tr>";
                                }
                            }
                            /// end of standard gig.


                            // start premium gig
                            if($row['type_of_gig']==3)
                            {
                                $sql_p="SELECT * FROM s_gig inner join premium_gig on s_gig.s_gig_id=premium_gig.p_gig_id where s_gig.s_gig_id='{$row['order_gig_id']}'";
                                $result_p=mysqli_query($DatabaseConnect,$sql_p);
                                while($p_gig_row=mysqli_fetch_assoc($result_p))
                                {
                                    $sum+=$p_gig_row['p_gig_price'];
                                   echo "<tr>";
                                   echo "<td>{$p_gig_row['g_name']}</td>";
                                   echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                   echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                   echo "<td>Rs. {$p_gig_row['p_gig_price']}</td>";
                                   echo "</tr>";
                                }
                            }
                            /// end of premium gig.

                        }
                    }
                      ?>
                    </tbody>
                </table>
                Rs. <?php echo $sum; ?>
                </center>
            </div>

        </div>
    </div>
<br><br>
<!-- Second Row-->
<div class="row">
    <div class="col-lg-4 col-12">
        <div class="card p-3 ScrollBar">
            <center>
            <h5 class="common-title pt-2">Completed Projects</h5>
            <table class="table">
                <thead style="text-align:center;">
                    <th>Gig</th>
                    <th>Basic</th>
                    <th>Standard</th>
                    <th>Premium</th>
                </thead>
                <tbody style="text-align:center">
                    <?php
                    $sum=0;
                    $sql="SELECT * FROM s_b_order where o_receiver_email='{$_SESSION['Email_redirect']}' && o_complete=1";
                    $result=mysqli_query($DatabaseConnect,$sql);
                    if(mysqli_num_rows($result)>0)
                    {

                        while($row=mysqli_fetch_assoc($result))
                        {
                            // start basic gig
                            if($row['type_of_gig']==1)
                            {
                                $sql_b="SELECT * FROM s_gig inner join basic_gig on s_gig.s_gig_id=basic_gig.b_gig_id where s_gig.s_gig_id='{$row['order_gig_id']}'";
                                $result_b=mysqli_query($DatabaseConnect,$sql_b);
                                while($b_gig_row=mysqli_fetch_assoc($result_b))
                                {
                                    $sum+=1;
                                   echo "<tr>";
                                   echo "<td>{$b_gig_row['g_name']}</td>";
                                   echo "<td><i class='fa fa-check' style='color:green;font-size:25px;'></i></td>";
                                   echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                   echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                   echo "</tr>";
                                }
                            }
                            /// end of basic gig.

                            // start standard gig
                            else if($row['type_of_gig']==2)
                            {
                                $sql_s="SELECT * FROM s_gig inner join standard_gig on s_gig.s_gig_id=standard_gig.s_gig_id where s_gig.s_gig_id='{$row['order_gig_id']}'";
                                $result_s=mysqli_query($DatabaseConnect,$sql_s);
                                while($s_gig_row=mysqli_fetch_assoc($result_s))
                                {
                                    $sum+=1;
                                   echo "<tr>";
                                   echo "<td>{$s_gig_row['g_name']}</td>";
                                   echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                   echo "<td><i class='fa fa-check' style='color:green;font-size:25px;'></i></td>";
                                   echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                   echo "</tr>";
                                }
                            }
                            /// end of standard gig.


                            // start premium gig
                            if($row['type_of_gig']==3)
                            {
                                $sql_p="SELECT * FROM s_gig inner join premium_gig on s_gig.s_gig_id=premium_gig.p_gig_id where s_gig.s_gig_id='{$row['order_gig_id']}'";
                                $result_p=mysqli_query($DatabaseConnect,$sql_p);
                                while($p_gig_row=mysqli_fetch_assoc($result_p))
                                {
                                    $sum+=1;
                                   echo "<tr>";
                                   echo "<td>{$p_gig_row['g_name']}</td>";
                                   echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                   echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                   echo "<td><i class='fa fa-check' style='color:green;font-size:25px;'></i></td>";
                                   echo "</tr>";
                                }
                            }
                            /// end of premium gig.

                        }
                    }
                      ?>


                </tbody>
            </table>
                Total: <?php echo $sum; ?> Project has been completed
            </center>
        </div>

    </div>
    <div class="col-lg-4 col-12 mt-3 mt-lg-0">
        <div class="card p-3 ScrollBar">
            <center>
            <h5 class="common-title pt-2">Pending Project</h5>
            <table class="table">
                <thead style="text-align:center;">
                    <th>Gig</th>
                    <th>Basic</th>
                    <th>Standard</th>
                    <th>Premium</th>
                </thead>
                <tbody style="text-align:center">
                    <?php
                    $sum=0;
                    $sql="SELECT * FROM s_b_order where o_receiver_email='{$_SESSION['Email_redirect']}' && o_complete=0";
                    $result=mysqli_query($DatabaseConnect,$sql);
                    if(mysqli_num_rows($result)>0)
                    {

                        while($row=mysqli_fetch_assoc($result))
                        {
                            // start basic gig
                            if($row['type_of_gig']==1)
                            {
                                $sql_b="SELECT * FROM s_gig inner join basic_gig on s_gig.s_gig_id=basic_gig.b_gig_id where s_gig.s_gig_id='{$row['order_gig_id']}'";
                                $result_b=mysqli_query($DatabaseConnect,$sql_b);
                                while($b_gig_row=mysqli_fetch_assoc($result_b))
                                {
                                    $sum+=1;
                                   echo "<tr>";
                                   echo "<td>{$b_gig_row['g_name']}</td>";
                                   echo "<td><i class='fa fa-circle-o-notch' style='color:green;font-size:25px;'></i></td>";
                                   echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                   echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                   echo "</tr>";
                                }
                            }
                            /// end of basic gig.

                            // start standard gig
                            else if($row['type_of_gig']==2)
                            {
                                $sql_s="SELECT * FROM s_gig inner join standard_gig on s_gig.s_gig_id=standard_gig.s_gig_id where s_gig.s_gig_id='{$row['order_gig_id']}'";
                                $result_s=mysqli_query($DatabaseConnect,$sql_s);
                                while($s_gig_row=mysqli_fetch_assoc($result_s))
                                {
                                    $sum+=1;
                                   echo "<tr>";
                                   echo "<td>{$s_gig_row['g_name']}</td>";
                                   echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                   echo "<td><i class='fa fa-circle-o-notch' style='color:green;font-size:25px;'></i></td>";
                                   echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                   echo "</tr>";
                                }
                            }
                            /// end of standard gig.


                            // start premium gig
                            if($row['type_of_gig']==3)
                            {
                                $sql_p="SELECT * FROM s_gig inner join premium_gig on s_gig.s_gig_id=premium_gig.p_gig_id where s_gig.s_gig_id='{$row['order_gig_id']}'";
                                $result_p=mysqli_query($DatabaseConnect,$sql_p);
                                while($p_gig_row=mysqli_fetch_assoc($result_p))
                                {
                                    $sum+=1;
                                   echo "<tr>";
                                   echo "<td>{$p_gig_row['g_name']}</td>";
                                   echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                   echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                   echo "<td><i class='fa fa-circle-o-notch' style='color:green;font-size:25px;'></i></td>";
                                   echo "</tr>";
                                }
                            }
                            /// end of premium gig.

                        }
                    }
                      ?>

                </tbody>
            </table>
                Total: <?php echo $sum; ?> Project In Pending
            </center>
        </div>

    </div>
    <div class="col-lg-4 col-12 mt-3 mt-lg-0">
        <div class="card p-3 ScrollBar">
            <center>
            <h5 class="common-title pt-2">Gig Stars</h5>
            <table class="table">
                <thead style="text-align:center;">
                    <th>Gig</th>
                    <th>Basic</th>
                    <th>Standard</th>
                    <th>Premium</th>
                </thead>
                <tbody style="text-align:center">
                    <?php
                    $sql="SELECT * FROM s_b_order where o_receiver_email='{$_SESSION['Email_redirect']}' && o_complete=1 && star_per_order!=0";
                    $result=mysqli_query($DatabaseConnect,$sql);
                    if(mysqli_num_rows($result)>0)
                    {

                        while($row=mysqli_fetch_assoc($result))
                        {
                            // start basic gig star
                            if($row['type_of_gig']==1)
                            {

                                if($row['star_per_order']==1)
                                {
                                    
                                    $sql_b="SELECT * FROM s_gig inner join basic_gig on s_gig.s_gig_id=basic_gig.b_gig_id where s_gig.s_gig_id='{$row['order_gig_id']}'";
                                    $result_b=mysqli_query($DatabaseConnect,$sql_b);
                                    while($b_gig_row=mysqli_fetch_assoc($result_b))
                                    {

                                    echo "<tr>";
                                    echo "<td>{$b_gig_row['g_name']}</td>";
                                    echo "<td><li class='fa fa-star' style='color:gold'></li></td>";
                                    echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                    echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                    echo "</tr>";
                                    }
                                }
                                else if($row['star_per_order']==2)
                                {
                                    $sql_b="SELECT * FROM s_gig inner join basic_gig on s_gig.s_gig_id=basic_gig.b_gig_id where s_gig.s_gig_id='{$row['order_gig_id']}'";
                                    $result_b=mysqli_query($DatabaseConnect,$sql_b);
                                    while($b_gig_row=mysqli_fetch_assoc($result_b))
                                    {

                                    echo "<tr>";
                                    echo "<td>{$b_gig_row['g_name']}</td>";
                                    echo "<td><li class='fa fa-star' style='color:gold'></li>
                                    <li class='fa fa-star' style='color:gold'></li></td>";
                                    echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                    echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                    echo "</tr>";
                                    }
                                }
                                else if($row['star_per_order']==3)
                                {
                                    
                                    $sql_b="SELECT * FROM s_gig inner join basic_gig on s_gig.s_gig_id=basic_gig.b_gig_id where s_gig.s_gig_id='{$row['order_gig_id']}'";
                                    $result_b=mysqli_query($DatabaseConnect,$sql_b);
                                    while($b_gig_row=mysqli_fetch_assoc($result_b))
                                    {

                                    echo "<tr>";
                                    echo "<td>{$b_gig_row['g_name']}</td>";
                                    echo "<td><li class='fa fa-star' style='color:gold'></li>
                                    <li class='fa fa-star' style='color:gold'></li>
                                    <li class='fa fa-star' style='color:gold'></li></td>";
                                    echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                    echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                    

                                    echo "</tr>";
                                    }
                                }
                                else if($row['star_per_order']==4)
                                {
                                    $sql_b="SELECT * FROM s_gig inner join basic_gig on s_gig.s_gig_id=basic_gig.b_gig_id where s_gig.s_gig_id='{$row['order_gig_id']}'";
                                    $result_b=mysqli_query($DatabaseConnect,$sql_b);
                                    while($b_gig_row=mysqli_fetch_assoc($result_b))
                                    {

                                    echo "<tr>";
                                    echo "<td>{$b_gig_row['g_name']}</td>";
                                    echo "<td><li class='fa fa-star' style='color:gold'></li>
                                    <li class='fa fa-star' style='color:gold'></li>
                                    <li class='fa fa-star' style='color:gold'></li>
                                    <li class='fa fa-star' style='color:gold'></li></td>";
                                    echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";                                    
                                    echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                    echo "</tr>";
                                    }
                                }
                                else if($row['star_per_order']==5)
                                {
                                    
                                    $sql_b="SELECT * FROM s_gig inner join basic_gig on s_gig.s_gig_id=basic_gig.b_gig_id where s_gig.s_gig_id='{$row['order_gig_id']}'";
                                    $result_b=mysqli_query($DatabaseConnect,$sql_b);
                                    while($b_gig_row=mysqli_fetch_assoc($result_b))
                                    {

                                    echo "<tr>";
                                    echo "<td>{$b_gig_row['g_name']}</td>";
                                    echo "<td><li class='fa fa-star' style='color:gold'></li>
                                    <li class='fa fa-star' style='color:gold'></li>
                                    <li class='fa fa-star' style='color:gold'></li>
                                    <li class='fa fa-star' style='color:gold'></li>
                                    <li class='fa fa-star' style='color:gold'></li>";
                                    echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                    echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                    echo "</tr>";
                                    }  
                                 }
                            }
                            /// end of basic gig.

                            // start standard gig
                            if($row['type_of_gig']==2)
                            {

                                if($row['star_per_order']==1)
                                {
                                    
                                    $sql_b="SELECT * FROM s_gig inner join basic_gig on s_gig.s_gig_id=basic_gig.b_gig_id where s_gig.s_gig_id='{$row['order_gig_id']}'";
                                    $result_b=mysqli_query($DatabaseConnect,$sql_b);
                                    while($b_gig_row=mysqli_fetch_assoc($result_b))
                                    {

                                    echo "<tr>";
                                    echo "<td>{$b_gig_row['g_name']}</td>";
                                    echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                    echo "<td><li class='fa fa-star' style='color:gold'></li></td>";
                                    echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                    
                                    echo "</tr>";
                                    }
                                }
                                else if($row['star_per_order']==2)
                                {
                                    $sql_b="SELECT * FROM s_gig inner join basic_gig on s_gig.s_gig_id=basic_gig.b_gig_id where s_gig.s_gig_id='{$row['order_gig_id']}'";
                                    $result_b=mysqli_query($DatabaseConnect,$sql_b);
                                    while($b_gig_row=mysqli_fetch_assoc($result_b))
                                    {

                                    echo "<tr>";
                                    echo "<td>{$b_gig_row['g_name']}</td>";
                                    echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                    echo "<td>
                                    <li class='fa fa-star' style='color:gold'></li>
                                    <li class='fa fa-star' style='color:gold'></li>
                                    </td>";
                                    echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";

                                    echo "</tr>";
                                    }
                                }
                                else if($row['star_per_order']==3)
                                {
                                    
                                    $sql_b="SELECT * FROM s_gig inner join basic_gig on s_gig.s_gig_id=basic_gig.b_gig_id where s_gig.s_gig_id='{$row['order_gig_id']}'";
                                    $result_b=mysqli_query($DatabaseConnect,$sql_b);
                                    while($b_gig_row=mysqli_fetch_assoc($result_b))
                                    {

                                    echo "<tr>";
                                    echo "<td>{$b_gig_row['g_name']}</td>";
                                    echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                    echo "<td>
                                    <li class='fa fa-star' style='color:gold'></li>
                                    <li class='fa fa-star' style='color:gold'></li>
                                    <li class='fa fa-star' style='color:gold'></li>
                                    </td>";
                                    echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                    echo "</tr>";
                                    }
                                }
                                else if($row['star_per_order']==4)
                                {
                                    $sql_b="SELECT * FROM s_gig inner join basic_gig on s_gig.s_gig_id=basic_gig.b_gig_id where s_gig.s_gig_id='{$row['order_gig_id']}'";
                                    $result_b=mysqli_query($DatabaseConnect,$sql_b);
                                    while($b_gig_row=mysqli_fetch_assoc($result_b))
                                    {

                                    echo "<tr>";
                                    echo "<td>{$b_gig_row['g_name']}</td>";
                                    echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                    echo "<td>
                                    <li class='fa fa-star' style='color:gold'></li>;
                                    <li class='fa fa-star' style='color:gold'></li>
                                    <li class='fa fa-star' style='color:gold'></li>
                                    <li class='fa fa-star' style='color:gold'></li></td>";
                                    echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";


                                    echo "</tr>";
                                    }
                                }
                                else if($row['star_per_order']==5)
                                {
                                    
                                    $sql_b="SELECT * FROM s_gig inner join basic_gig on s_gig.s_gig_id=basic_gig.b_gig_id where s_gig.s_gig_id='{$row['order_gig_id']}'";
                                    $result_b=mysqli_query($DatabaseConnect,$sql_b);
                                    while($b_gig_row=mysqli_fetch_assoc($result_b))
                                    {

                                    echo "<tr>";
                                    echo "<td>{$b_gig_row['g_name']}</td>";
                                    echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                    echo "<td>
                                    <li class='fa fa-star' style='color:gold'></li>;
                                    <li class='fa fa-star' style='color:gold'></li>
                                    <li class='fa fa-star' style='color:gold'></li>
                                    <li class='fa fa-star' style='color:gold'></li>
                                    <li class='fa fa-star' style='color:gold'></li></td>";
                                    echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                    echo "</tr>";
                                    }                         
                                }
                            }

                            /// end of standard gig.


                            // start premium gig
                            if($row['type_of_gig']==3)
                            {

                                if($row['star_per_order']==1)
                                {
                                    
                                    $sql_b="SELECT * FROM s_gig inner join basic_gig on s_gig.s_gig_id=basic_gig.b_gig_id where s_gig.s_gig_id='{$row['order_gig_id']}'";
                                    $result_b=mysqli_query($DatabaseConnect,$sql_b);
                                    while($b_gig_row=mysqli_fetch_assoc($result_b))
                                    {

                                    echo "<tr>";
                                    echo "<td>{$b_gig_row['g_name']}</td>";
                                    echo "<td><li class='fa fa-star' style='color:gold'></li></td>";
                                    echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                    echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                    echo "</tr>";
                                    }
                                }
                                else if($row['star_per_order']==2)
                                {
                                    $sql_b="SELECT * FROM s_gig inner join basic_gig on s_gig.s_gig_id=basic_gig.b_gig_id where s_gig.s_gig_id='{$row['order_gig_id']}'";
                                    $result_b=mysqli_query($DatabaseConnect,$sql_b);
                                    while($b_gig_row=mysqli_fetch_assoc($result_b))
                                    {

                                    echo "<tr>";
                                    echo "<td>{$b_gig_row['g_name']}</td>";
                                    echo "<td>
                                    <li class='fa fa-star' style='color:gold'></li>
                                    <li class='fa fa-star' style='color:gold'></li>
                                    </td>";
                                    echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                    echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";

                                    echo "</tr>";
                                    }
                                }
                                else if($row['star_per_order']==3)
                                {
                                    
                                    $sql_b="SELECT * FROM s_gig inner join basic_gig on s_gig.s_gig_id=basic_gig.b_gig_id where s_gig.s_gig_id='{$row['order_gig_id']}'";
                                    $result_b=mysqli_query($DatabaseConnect,$sql_b);
                                    while($b_gig_row=mysqli_fetch_assoc($result_b))
                                    {

                                    echo "<tr>";
                                    echo "<td>{$b_gig_row['g_name']}</td>";
                                    echo "<td>
                                    <li class='fa fa-star' style='color:gold'></li>
                                    <li class='fa fa-star' style='color:gold'></li>
                                    <li class='fa fa-star' style='color:gold'></li>
                                    </td>";
                                    echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                    echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                    echo "</tr>";
                                    }
                                }
                                else if($row['star_per_order']==4)
                                {
                                    $sql_b="SELECT * FROM s_gig inner join basic_gig on s_gig.s_gig_id=basic_gig.b_gig_id where s_gig.s_gig_id='{$row['order_gig_id']}'";
                                    $result_b=mysqli_query($DatabaseConnect,$sql_b);
                                    while($b_gig_row=mysqli_fetch_assoc($result_b))
                                    {

                                    echo "<tr>";
                                    echo "<td>{$b_gig_row['g_name']}</td>";
                                    echo "<td>
                                    <li class='fa fa-star' style='color:gold'></li>;
                                    <li class='fa fa-star' style='color:gold'></li>
                                    <li class='fa fa-star' style='color:gold'></li>
                                    <li class='fa fa-star' style='color:gold'></li></td>";
                                    echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                    echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";


                                    echo "</tr>";
                                    }
                                }
                                else if($row['star_per_order']==5)
                                {
                                    
                                    $sql_b="SELECT * FROM s_gig inner join basic_gig on s_gig.s_gig_id=basic_gig.b_gig_id where s_gig.s_gig_id='{$row['order_gig_id']}'";
                                    $result_b=mysqli_query($DatabaseConnect,$sql_b);
                                    while($b_gig_row=mysqli_fetch_assoc($result_b))
                                    {

                                    echo "<tr>";
                                    echo "<td>{$b_gig_row['g_name']}</td>";
                                    echo "<td>
                                    <li class='fa fa-star' style='color:gold'></li>;
                                    <li class='fa fa-star' style='color:gold'></li>
                                    <li class='fa fa-star' style='color:gold'></li>
                                    <li class='fa fa-star' style='color:gold'></li>
                                    <li class='fa fa-star' style='color:gold'></li></td>";
                                    echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                    echo "<td><i class='fa fa-ellipsis-h' style='color:blue;font-size:25px;'></i></td>";
                                    echo "</tr>";
                                    }                         
                                }
                            }
                        }}
                      ?>
                </tbody>
            </table>
            </center>
        </div>

    </div>
</div>
<br><br>
<!-- Second Row-->
<div class="row">
    <div class="col-lg-4 col-12">
        <div class="card p-3 ScrollBar">
            <center>
            <h5 class="common-title pt-2">Gig Impression</h5>
            <table class="table">
                <thead style="text-align:center;">
                    <th>Gig</th>
                    <th>Basic</th>
                    <th>Standard</th>
                    <th>Premium</th>
                </thead>
                <tbody style="text-align:center">
                    <tr>
                        <td>Android</td>
                        <td>2</td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                </tbody>
            </table>
                Total: 7 Project has been completed
            </center>
        </div>

    </div>
    <div class="col-lg-8 col-12 mt-3 mt-lg-0">
        <div class="card p-3 ScrollBar">
            <center>
            <h5 class="common-title pt-2">Transactions</h5>
            <table class="table">
                <thead style="text-align:center;">
                    <th>Transcation No</th>
                    <th>Transcation Date</th>
                    <th>Buyer Name</th>
                    <th>Amount</th>
                </thead>
                <tbody style="text-align:center">
                <?php
                $sql_transcation="SELECT * FROM s_b_order where o_receiver_email='{$_SESSION['Email_redirect']}'";
                $sql_transcation_run=mysqli_query($DatabaseConnect,$sql_transcation);
                if(mysqli_num_rows($sql_transcation_run)>0)
                {
                    $s_no=0;
                    while($row=mysqli_fetch_assoc($sql_transcation_run))
                    {
                        $s_no++;
                ?>
                    <tr>
                        <td><?php echo $s_no;?></td>
                        <td><?php echo $row['order_date'];?></td>
                        <td><?php echo $row['o_sender_name'];?></td>
                        <td>Rs.<?php echo $row['o_price'];?></td>
                    </tr>
                <?php
                    }
                }
                else
                {
                    echo "No Transcation Yet";
                }
                ?>
                </tbody>
            </table>
            </center>
        </div>

    </div>
</div>


<br>
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card p-3 ScrollBar">
                <center>
                <h5 class="common-title pt-2">Received Projects</h5>
                <table class="table">
                    <thead style="text-align:center;">
                        <th>No</th>
                        <th>Project Name</th>
                        <th>Buyer Name</th>
                        <th>Assign Date</th>
                        <th>Delivery Date</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Download Project</th>
                        <th>Upload Project</th>
                        
                    </thead>
                    <tbody style="text-align:center;">
                        
                        <!-- <tr>
                            <td>1</td>
                            <td>web</td>
                            <td>Liaqat Ali</td>
                            <td>Premium</td>
                            <td>1/2/2021</td>
                            <td>4/4/2022</td>
                            <td>Rs: 100000</td>
                            <td><button class="custom-btn mt-1"><i class="fa fa-download" style="color:white;font-size: 20px;"></i></button> <br><span style="font-size:11px;position:relative;left:10px;color:grey"> Client Requirement </span></td>
                        </tr> -->

                        <?php
                    $sql_transcation="SELECT * FROM s_b_order where o_receiver_email='{$_SESSION['Email_redirect']}'";
                    $sql_transcation_run=mysqli_query($DatabaseConnect,$sql_transcation);
                    if(mysqli_num_rows($sql_transcation_run)>0)
                    {
                        $s_no=0;
                        while($row=mysqli_fetch_assoc($sql_transcation_run))
                        {
                            $s_no++;
                    ?>
                        <tr>
                            <td><?php echo $s_no; ?></td>
                            <td><?php  echo $row['o_receiver_name']?></td>
                            <td><?php  echo $row['o_sender_name']?></td>
                            <td><?php  echo $row['order_date']?></td>
                            <td><?php  echo $row['o_delivery_data']?></td>
                            <td>Rs.<?php  echo $row['o_price']?></td>
                            <td style="padding:15px;"><?php  if($row['o_complete']==0){echo "<span style='background-color:red;color:white;padding:7px;border-radius:5px;margin-top:10px;'>Incomplete<span>";} else{echo "<span style='background-color:green;color:white;padding:7px;border-radius:5px;margin-top:10px;padding-left:12;padding-right:12px;'> Complete <span>";}?></td>
                            <?php if(!empty($row["o_requirment"]))
                            {
                            ?>
                            <td style="padding:15px;" ><a href="<?php echo $URL.'/projects/'.$row["o_requirment"]; ?>" class="custom-btn mt-5"><i class="fa fa-download" style="color:white;font-size: 20px;"></i></a></td>
                            <?php
                            }
                            else 
                            {
                                echo "<td style='padding:15px;' ></td>";
                            }

                            ?>
                            <td>
                                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="get">
                                <input type="text" hidden name='order_id' value='<?php echo $row['o_id'];?>'>
                                <input type="submit" name="upload_project" id="upload_file" class="custom-btn mt-1" value='Upload'> <br><span style="font-size:11px;position:relative;left:10px;color:grey"> When Done </span>
                                </form>
                            </td>
                        </tr>
                    <?php
                        }}
                        else
                        {
                            echo "No Project Assign Yet";
                        }
                        
                    ?>

                    </tbody>
                </table>
                </center>
            </div>
        </div>
    </div>
</div>


<br><br>




<!-- upload Project Form-->
<?php
if(isset($_GET['upload_project']))
{
?>
<div class="SignUp-Form"  id="SignInForm">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-sm-12">  
      <form action="upload_project.php" method="post" class="bg-grey Form_up" enctype="multipart/form-data">
          <div class="row justify-content-end">
            <div class="col-1">
              <div class="close" id="closeSignIn">X</div>
            </div>
          </div>

                    <center>
                    <h5>Upload Your Project</h5>
                    <br><br><br><br><br>
                     <div class="transpart_custom_bg"  style="height:100px; width:100px;border-radius:50%;background-color:white;position:relative;top:-80px"><i class="fa fa-book" style="color:rgb(35, 14, 158);font-size:40px;margin-top:30px"></i>
                      <input type="file" name="requirement_document"  title="Select File">
                      <input type="text" hidden name="order_id" value="<?php echo $_GET['order_id'] ?>">
                     </div>
                     </center>

          <input type="submit" name="Upload" value="Login" class="btn form_btn">
        </form>
  
      </div>
    </div>
  </div>
  </div>
<?php
}
?>

<!-- close file button -->
  <script>
      document.getElementById("closeSignIn").addEventListener('click',(e)=>{
        document.getElementById("SignInForm").style="display:none";
      });
      
  </script>

<!-- success and Error message from project upload -->

<?php
    if(isset($_GET['success']))
    {
        echo "<script>alert('Your Project Successfully Uploaded Now You download it')</script>";
    }
    else if(isset($_GET['large']))
    {
        echo "<script>alert('Sorry, We Could not Upload Your File Because Your File Size is Large than 2MB')</script>";
    }
    else if(isset($_GET['extension']))
    {
        echo "<script>alert('Sorry, Your File Extension Should be PDF,Docx,zip')</script>";
    }
?>
<!-- Custom Javacript-->
<script src="../asset/custom/custom.js"></script>
<!-- javascript Linke -->
<script src="../asset/js/bootstrap.js"></script>
</body>
</php>
