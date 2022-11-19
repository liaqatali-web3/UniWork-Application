<?php
session_start();
include "BackendLogic/url.php";
include "BackendLogic/database_connectivity.php";

$email="";
$get_email="SELECT * FROM seller where s_id={$_GET['id']}";
$get_email_run=mysqli_query($DatabaseConnect,$get_email);
while($email_row=mysqli_fetch_assoc($get_email_run))
{
  $email=$email_row['s_email'];
}

//first email is of freelancer
// echo $email."<br>";
// //the second email is of the buyer

$_SESSION['email']=$email;
$_SESSION['product_id']=$_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelancer Info</title>
    <link rel="shortcut icon" href="hardcode_images/cusit-logo.png" type="image/x-icon">
    <!-- bootstrap Linke -->
    <link rel="stylesheet" href="asset/css/bootstrap.css">
    <!-- Custom css-->
    <link rel="stylesheet" href="asset/custom/custom.css">
    <!-- icon link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
    

    
    <!-- navbar  -->
    <?php
    if(!isset($_SESSION['Email_redirect']) || $_SESSION['Role_redirect']==1 )
    {
        echo "<div class='bg-danger text-white text-center p-3' style='font-weight:bold'><span style='font-size:23px;'>Warning</span> : Some Feature Is Disable Like Order and Chat In Order To Enable these feature You have to SignIn First As Buyer . Thank You!</div>";
    }
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-white border border-bottom-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="freelancer_main_page.html"><span class="title normal_text_color">Cusit Fiverr</sapn><sub style="font-size:11px;font-family: Arial, Helvetica, sans-serif;">Seller From PK<sup> * </sup></sub></a>
            <?php
                if(isset($_SESSION['Email_redirect']) && $_SESSION['Role_redirect']==2)
                {

                    $toSend = $_SESSION['Email_redirect'];
                    $fromMsg = $_SESSION['email'];
            ?>
            <span class="common-title" style="font-size:11px;position:relative;right:30px;"> <a href="<?php echo $URL ?>/chat.php" class="bg-none pt-4"> <i class="fa fa-comment-o" style="font-size:40px;color:rgb(35, 14, 158)"></i></a></span>
            <?php
                }
            ?>
        </div>
    </nav>
    <br>


    <!-- navbar end-->
    <div class="container">
    <br>
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card p-3 border-0 rounded-0">
                <?php

                $sql="SELECT * FROM seller where s_email='{$email}'";
                $sql_run=mysqli_query($DatabaseConnect,$sql);
                while($row=mysqli_fetch_assoc($sql_run))
                {
                ?>
                <center>
                <img src="BackendLogic/sellerlogic/image/<?php echo $row['s_image']; ?>" alt="" class="profile_image" style="width:25%;height:25%">
                <br><br>
                <span class="common-title" style="font-size:25px;"><?php echo $row['s_name']; ?></span>
                <br><br>
            <center>
            <span class="float-lg-center">
            <?php
                $links="SELECT * FROM s_social where s_email='{$email}'";
                $links_run=mysqli_query($DatabaseConnect,$links);
                while($row_liks=mysqli_fetch_assoc($links_run))
                {
            ?>
            <a href="<?php echo $row_liks['s_facebook']; ?>"><i class="fa fa-facebook" style="color:blue;font-size:30px;margin-right:25px"></i></a>
            <a href="<?php echo $row_liks['s_instagram']; ?>"><i class="fa fa-instagram" style="color:red;font-size:30px;margin-right:25px"></i></a>
            <a href="<?php echo $row_liks['s_twitter']; ?>"><i class="fa fa-twitter" style="color:rgb(0, 225, 255);font-size:30px;margin-right:25px"></i></a>
            <?php
                }
            ?>
          </span>
          </center>

                <hr>
                <span class="common-title" style="font-size:17px"> Story </span>
                <p> <?php echo $row['s_story']; ?> </p>
                <hr>
                <span class="common-title" style="font-size:17px">Description </span>
                <div class="ScrollBar border">
                <?php echo $row['s_description']; ?>
               </div>
                </center>
                <?php
                }
                ?>
            </div>
            <br><br>
            
            
            <div class="card p-3 border-0 ScrollBar">
                    <center>
                    <span class="common-title" style="font-size:17px">Skills </span>
                    </center>
                    <br>
                    <div class="row">
                    <div class="col">
                    <center>
                    <table class="table" style="text-align:center">
                    <thead>
                    <th>No</th>
                    <th>Skills</th>
                    <th>Experience</th>
                    </thead>
                    <?php
                    $s_no=0;
                    $sql_skill="SELECT * FROM s_skill where s_email='{$email}'";
                    $sql_skill_run=mysqli_query($DatabaseConnect,$sql_skill);
                    while($row_skill=mysqli_fetch_assoc($sql_skill_run))
                    {
                        $s_no+=1;
                    ?>
                    <tr>
                        <td><?php echo $s_no; ?></td>
                        <td><?php echo $row_skill['s_skill']; ?></td>
                        <td><?php echo $row_skill['s_skill_level']; ?> Years</td>
                    </tr>
                    <?php
                    }
                    ?>
                    </table>
                    </center>
                    </div>
                    </div
                    <br>
            </div>


            <br><br>
            <div class="card p-3 border-0 ScrollBar">
                <center>
                <span class="common-title" style="font-size:18px">Education:</span>
                <table class="table">
                    <thead>
                        <th>No</th>
                        <th>Education Title</th>
                        <th>Education Major</th>
                        <th>Passing Year</th>
                    </thead>
                    <tbody>
                    <?php
                    $s_no=0;
                    $sql_education="SELECT * FROM s_education where s_email='{$email}'";
                    $sql_education_run=mysqli_query($DatabaseConnect,$sql_education);
                    while($row_education=mysqli_fetch_assoc($sql_education_run))
                    {
                        $s_no+=1;
                    ?>
                        <tr>
                            <td><?php echo $s_no; ?></td>
                            <td><?php echo $row_education['s_education_title'];?></td>
                            <td><?php echo $row_education['s_education_major'];?></td>
                            <td><?php echo $row_education['s_education_year'];?></td>
                        </tr>

                    <?php

                    }

                    ?>
                      <tbody>
                </table>
            </center>
            </div>
            <br><br>
            <div class="card border-0 p-3 ScrollBar">
                <center>
                <span class="common-title" style="font-size:18px">Certification:</span>
                <table class="table">
                    <thead>
                        <th>No</th>
                        <th>Certificate</th>
                        <th>From</th>
                        <th>Passing Year</th>
                    </thead>
                    <tbody>
                    <?php
                    $s_no=0;
                    $sql_certificate="SELECT * FROM s_certificate where s_email='{$email}'";
                    $sql_certificate_run=mysqli_query($DatabaseConnect,$sql_certificate);
                    while($row_certificate=mysqli_fetch_assoc($sql_certificate_run))
                    {
                        $s_no+=1;
                    ?>
                        <tr>
                            <td><?php echo $s_no; ?></td>
                            <td><?php echo $row_certificate['s_certificate']; ?></td>
                            <td><?php echo $row_certificate['s_certificate_from']; ?></td>
                            <td><?php echo $row_certificate['s_certificate_year']; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </center>
            </div>
        </div>

        <div class="col-4 mt-0 mr-0 mb-0 m-5" style="width:25rem">
        <div class="card p-3 border-0">
            <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                  <?php
                    $count=0;
                    $sql_basic="SELECT * FROM basic_gig inner join s_gig on basic_gig.b_gig_id=s_gig.s_gig_id where b_gig_email='{$email}'";
                    $sql_basic_run=mysqli_query($DatabaseConnect,$sql_basic);
                    while($row_basic=mysqli_fetch_assoc($sql_basic_run))
                    {
                        $count++;
                    ?>
                    <p class="common-title" style="font-size:25px; text-align:center;"><?php echo $row_basic['g_name']; ?></p> 
                    <img src="BackendLogic/sellerlogic/gig_images/<?php echo $row_basic['b_gig_image']; ?>" class="d-block" alt="..." style="height:250px;width:100%">
                    <p class="common-title" style="font-size:25px; text-align:center;margin-top:25px;">Basic Gig</p>
                    <div class="ScrollBar" style="height:100px">
                    <?php echo $row_basic['g_description']; ?>                    
                    </div>

                    <hr>
                    <table class="table" style="text-align: center;">
                        <tr>
                            <td>Price</td>
                            <td>Rs. <?php echo $row_basic['b_gig_price']; ?></td>
                        </tr>
                        <tr>
                            <td>Delivery Time</td>
                            <td><?php echo $row_basic['b_delivery_time']; ?> Days</td>
                        </tr>
                        <tr>
                            <td>Number of Pages </td>
                            <td><?php echo $row_basic['b_number_of_pages']; ?></td>
                        </tr>
                        <tr>
                            <td>Version</td>
                            <td><?php echo $row_basic['b_revision']; ?> Times</td>
                        </tr>
                        <tr>
                            <td>Source Code</td>
                            <td><?php  if($row_basic['b_source_file']==1) { echo "Yes";} else {echo "No";}; ?></td>
                        </tr>
                        <tr>
                            <td>Transparent Logo</td>
                            <td><?php  if($row_basic['b_logo_transparancy']==1) { echo "Yes";} else {echo "No";}; ?></td>
                        </tr>
                        <tr>
                            <td>High Resolution</td>
                            <td><?php  if($row_basic['b_high_resolution']==1) { echo "Yes";} else {echo "No";}; ?></td>
                        </tr>
                        <tr>
                            <td>3D Mockup</td>
                            <td><?php  if($row_basic['b_3d_mockup']==1) { echo "Yes";} else {echo "No";}; ?></td>
                        </tr>
                        <tr>
                            <td>Stationary Design</td>
                            <td><?php  if($row_basic['b_stationary_design']==1) { echo "Yes";} else {echo "No";}; ?></td>
                        </tr>

                        <tr>
                            <td>Soical Kit</td>
                            <td><?php  if($row_basic['b_social_kit']==1) { echo "Yes";} else {echo "No";}; ?></td>
                        </tr>

                        <tr>
                            <td>Vector Kit</td>
                            <td><?php  if($row_basic['b_vector_kit']==1) { echo "Yes";} else {echo "No";}; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="border-0 mb-0 pb-0">
                                <br>
                                <?php
                                if(isset($_SESSION['Email_redirect']) && $_SESSION['Role_redirect']==2)
                                {
                                ?>
                            <a href="order.php?email=<?php echo $email;?>&gig_id=<?php echo $row_basic['b_gig_id']?>&gig_type=1&price=<?php echo $row_basic['b_gig_price']?>" class="custom-btn" style="color:white">Order Now </a>
                            <?php
                                }
                            ?>
                            </td>
                        </tr>
                    </table>
                    <?php

                    if($count==1)
                    {
                        break;
                    }

                    }
                    ?>
                </div>
                  <div class="carousel-item">
                  <?php
                    $count=0;
                    $sql_standard="SELECT * FROM standard_gig inner join s_gig on standard_gig.s_gig_id=s_gig.s_gig_id where standard_gig.s_gig_email='{$email}'";
                    $sql_standard_run=mysqli_query($DatabaseConnect,$sql_standard);
                    while($row_standard=mysqli_fetch_assoc($sql_standard_run))
                    {
                        $count++;
                    ?>
                    <p class="common-title" style="font-size:25px; text-align:center;"><?php echo $row_basic['g_name']; ?></p> 
                    <img src="BackendLogic/sellerlogic/gig_images/<?php echo $row_standard['s_gig_image']; ?>" class="d-block w-100" alt="..." style="height:250px;">
                    <p class="common-title" style="font-size:25px; text-align:center;margin-top:25px;">Standard Gig</p>
                    <div class="ScrollBar" style="height:100px">
                    <?php echo $row_basic['g_description']; ?>                    
                    </div>

                    <hr>
                    <table class="table" style="text-align: center;">
                        <tr>
                            <td>Price</td>
                            <td>Rs. <?php echo $row_standard['s_gig_price']; ?></td>
                        </tr>
                        <tr>
                            <td>Delivery Time</td>
                            <td><?php echo $row_standard['s_delivery_time']; ?> Days</td>
                        </tr>
                        <tr>
                            <td>Number of Pages </td>
                            <td><?php echo $row_standard['s_number_of_pages']; ?></td>
                        </tr>
                        <tr>
                            <td>Version</td>
                            <td><?php echo $row_standard['s_revision']; ?> Times</td>
                        </tr>
                        <tr>
                            <td>Source Code</td>
                            <td><?php  if($row_standard['s_source_file']==1) { echo "Yes";} else {echo "No";}; ?></td>
                        </tr>
                        <tr>
                            <td>Transparent Logo</td>
                            <td><?php  if($row_standard['s_logo_transparancy']==1) { echo "Yes";} else {echo "No";}; ?></td>
                        </tr>
                        <tr>
                            <td>High Resolution</td>
                            <td><?php  if($row_standard['s_high_resolution']==1) { echo "Yes";} else {echo "No";}; ?></td>
                        </tr>
                        <tr>
                            <td>3D Mockup</td>
                            <td><?php  if($row_standard['s_3d_mockup']==1) { echo "Yes";} else {echo "No";}; ?></td>
                        </tr>
                        <tr>
                            <td>Stationary Design</td>
                            <td><?php  if($row_standard['s_stationary_design']==1) { echo "Yes";} else {echo "No";}; ?></td>
                        </tr>

                        <tr>
                            <td>Soical Kit</td>
                            <td><?php  if($row_standard['s_social_kit']==1) { echo "Yes";} else {echo "No";}; ?></td>
                        </tr>

                        <tr>
                            <td>Vector Kit</td>
                            <td><?php  if($row_standard['s_vector_kit']==1) { echo "Yes";} else {echo "No";}; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="border-0 mb-0 pb-0">
                                <br>
                                <?php
                                    if(isset($_SESSION['Email_redirect']) && $_SESSION['Role_redirect']==2)
                                    {
                                ?>
                            <a href="order.php?email=<?php echo $email;?>&gig_id=<?php echo $row_basic['b_gig_id']?>&gig_type=1&price=<?php echo $row_basic['b_gig_price']?>" class="custom-btn" style="color:white">Order Now </a>
                                <?php
                                    }
                                ?>
                            </td>
                        </tr>
                    </table>
                    <?php

                    if($count==1)
                    {
                        break;
                    }

                    }
                    ?>

                  </div>
                  <div class="carousel-item">
                  <?php
                    $count=0;
                    $sql_premium="SELECT * FROM premium_gig inner join s_gig on premium_gig.p_gig_id=s_gig.s_gig_id where premium_gig.p_gig_email='{$email}'";
                    $sql_premium_run=mysqli_query($DatabaseConnect,$sql_premium);
                    while($row_premium=mysqli_fetch_assoc($sql_premium_run))
                    {
                        $count++;
                    ?>
                    <p class="common-title" style="font-size:25px; text-align:center;"><?php echo $row_premium['g_name']; ?></p> 
                    <img src="BackendLogic/sellerlogic/gig_images/<?php echo $row_premium['p_gig_image']; ?>" class="d-block w-100" alt="..." style="height:250px;">
                    <p class="common-title" style="font-size:25px; text-align:center;margin-top:25px;">Premium Gig</p>
                    <div class="ScrollBar" style="height:100px">
                    <?php echo $row_premium['g_description']; ?>                    
                    </div>

                    <hr>
                    <table class="table" style="text-align: center;">
                        <tr>
                            <td>Price</td>
                            <td>Rs. <?php echo $row_premium['p_gig_price']; ?></td>
                        </tr>
                        <tr>
                            <td>Delivery Time</td>
                            <td><?php echo $row_premium['p_delivery_time']; ?> Days</td>
                        </tr>
                        <tr>
                            <td>Number of Pages </td>
                            <td><?php echo $row_premium['p_number_of_pages']; ?></td>
                        </tr>
                        <tr>
                            <td>Version</td>
                            <td><?php echo $row_premium['p_revision']; ?> Times</td>
                        </tr>
                        <tr>
                            <td>Source Code</td>
                            <td><?php  if($row_premium['p_source_file']==1) { echo "Yes";} else {echo "No";}; ?></td>
                        </tr>
                        <tr>
                            <td>Transparent Logo</td>
                            <td><?php  if($row_premium['p_logo_transparancy']==1) { echo "Yes";} else {echo "No";}; ?></td>
                        </tr>
                        <tr>
                            <td>High Resolution</td>
                            <td><?php  if($row_premium['p_high_resolution']==1) { echo "Yes";} else {echo "No";}; ?></td>
                        </tr>
                        <tr>
                            <td>3D Mockup</td>
                            <td><?php  if($row_premium['p_3d_mockup']==1) { echo "Yes";} else {echo "No";}; ?></td>
                        </tr>
                        <tr>
                            <td>Stationary Design</td>
                            <td><?php  if($row_premium['p_stationary_design']==1) { echo "Yes";} else {echo "No";}; ?></td>
                        </tr>

                        <tr>
                            <td>Soical Kit</td>
                            <td><?php  if($row_premium['p_social_kit']==1) { echo "Yes";} else {echo "No";}; ?></td>
                        </tr>

                        <tr>
                            <td>Vector Kit</td>
                            <td><?php  if($row_premium['p_vector_kit']==1) { echo "Yes";} else {echo "No";}; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="border-0 mb-0 pb-0">
                                <br>
                                <?php
                                    if(isset($_SESSION['Email_redirect']) && $_SESSION['Role_redirect']==2)
                                    {
                                ?>
                            <a href="order.php?email=<?php echo $email;?>&gig_id=<?php echo $row_basic['b_gig_id']?>&gig_type=1&price=<?php echo $row_basic['b_gig_price']?>" class="custom-btn" style="color:white">Order Now </a>
                            <?php
                                    }
                            ?>
                            </td>
                        </tr>
                    </table>
                    <?php

                    if($count==1)
                    {
                        break;
                    }

                    }
                    ?>

                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            </div>
            <br>
            <div class="card p-3 border-0 ScrollBar">
                <center>
                    <span class="common-title" style="font-size:18px">Languages </span>
                </center>
                <hr>
                <div class="row">
                    <div class="col">
                    <table class="table">
                    <thead>
                        <th>No</th>
                        <th>Languages</th>
                        <th>Level</th>
                    </thead>
                    <tbody>
                    <?php
                    $s_no=0;
                    $sql_language="SELECT * FROM s_language where s_email='{$email}'";
                    $sql_language_run=mysqli_query($DatabaseConnect,$sql_language);
                    while($row_language=mysqli_fetch_assoc($sql_language_run))
                    {
                        $s_no+=1;
                    ?>
                        <tr>
                            <td><?php echo $s_no; ?></td>
                            <td><?php echo $row_language['s_language']; ?></td>
                            <td><?php echo $row_language['s_language_level']; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>

                    </div>
                    
                </div>
                
            </div>

        </div>
    </div>
<hr>
<h5 class="common-title text-center">More Gigs</h5>
<hr>
<!--

    Remember the collapse effect logic


-->

                    <?php
                    $all_gigs=0;
                    $sql_all="SELECT * FROM basic_gig inner join standard_gig on basic_gig.b_gig_id=standard_gig.s_gig_id inner join premium_gig on standard_gig.s_gig_id=premium_gig.p_gig_id inner join s_gig on premium_gig.p_gig_id=s_gig.s_gig_id  where premium_gig.p_gig_email='{$email}' order by premium_gig.p_gig_id DESC";
                    $sql_all_run=mysqli_query($DatabaseConnect,$sql_all);
                    while($row_all=mysqli_fetch_assoc($sql_all_run))
                    {
                     $all_gigs+=1;

                    }
                    ?>

                    <?php
                    $reach_to_target=0;
                    $sql_all="SELECT * FROM basic_gig inner join standard_gig on basic_gig.b_gig_id=standard_gig.s_gig_id inner join premium_gig on standard_gig.s_gig_id=premium_gig.p_gig_id inner join s_gig on premium_gig.p_gig_id=s_gig.s_gig_id  where premium_gig.p_gig_email='{$email}' order by premium_gig.p_gig_id DESC";
                    $sql_all_run=mysqli_query($DatabaseConnect,$sql_all);
                    while($row_all=mysqli_fetch_assoc($sql_all_run))
                    {
                        $reach_to_target++;
                        if($reach_to_target==$all_gigs)
                        {
                            break;
                        }

                    ?>
<div class="row">
    <div class="col-lg-4 col-12">
    <h5 class="common-title text-center mt-2">Basic</h5>
    <div class="card">
        <img src="BackendLogic/sellerlogic/gig_images/<?php echo $row_all['b_gig_image']; ?>" style="height:200px" alt="" srcset="">
        <h6 class="common-title text-center mt-2"><?php echo $row_all['g_name']; ?></h6>
         <center>
         <div class="ScrollBar" style="height:80px"><?php echo $row_all['g_description']; ?></div>                    

            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Show Details
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse hide" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body ScrollBar">
            
                        <div class="row">
                            <div class="col-6" style="text-align:left;padding-left:25px;">
                               Price 
                            </div>
                            <div class="col-6">
                               Rs. <?php echo $row_all['b_gig_price']; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                           <div class="col-6" style="text-align:left;padding-left:25px;">
                              Delivery Time 
                           </div>
                           <div class="col-6">
                           <?php echo $row_all['b_delivery_time']; ?> Days
                           </div>
                       </div>
                       <hr>
                       <div class="row">
                           <div class="col-6" style="text-align:left;padding-left:25px;">
                              Number Of Pages 
                           </div>
                           <div class="col-6">
                           <?php echo $row_all['b_number_of_pages']; ?>
                           </div>
                       </div>
                       <hr>
                       <div class="row">
                          <div class="col-6" style="text-align:left;padding-left:25px;">
                             Reversion
                          </div>
                          <div class="col-6">
                          <?php echo $row_all['b_revision']; ?> Times
                          </div>
                      </div>
                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                            Source Code 
                         </div>
                         <div class="col-6">
                         <?php  if($row_all['b_source_file']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>
                      
                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                            Transparent Logo
                         </div>
                         <div class="col-6">
                         <?php  if($row_all['b_logo_transparancy']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>

                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                         High Resolution
                         </div>
                         <div class="col-6">
                         <?php  if($row_all['b_high_resolution']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>

                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                         3D Mockup
                         </div>
                         <div class="col-6">
                         <?php  if($row_all['b_3d_mockup']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>
                      
                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                         Stationary Design
                         </div>
                         <div class="col-6">
                         <?php  if($row_all['b_stationary_design']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>

                      
                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                         Soical Kit
                         </div>
                         <div class="col-6">
                         <?php  if($row_all['b_social_kit']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>

                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                         Vector Kit
                         </div>
                         <div class="col-6">
                         <?php  if($row_all['b_vector_kit']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>
                      <!-- local Row End-->    
                    </div>
                  </div>
                </div>
            </div>
            <br>            
            <?php
                if(isset($_SESSION['Email_redirect']) && $_SESSION['Role_redirect']==2)
                {
                
            ?>
         <a href="order.php?email=<?php echo $email?>&gig_id=<?php echo $row_all['b_gig_id']?>&gig_type=1&price=<?php echo $row_all['b_gig_price']?>" class="custom-btn mb-2 text-white">Order</a>      
         <?php
                }
         ?>
        </center>
        <br>
    </div>    
    </div>
    <div class="col-lg-4 col-12">
        <h5 class="common-title text-center mt-2">Standard</h5>
        <div class="card ">
            <img src="BackendLogic/sellerlogic/gig_images/<?php echo $row_all['s_gig_image']; ?>" style="height:200px" alt="" srcset="">
            <h6 class="common-title text-center mt-2"><?php echo $row_all['g_name']; ?></h6>
            <center>
                
            <div class="ScrollBar" style="height:80px"><?php echo $row_all['g_description']; ?></div>                    
                <div class="accordion" id="accordionExample2">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne2" aria-expanded="true" aria-controls="collapseOne">
                          Show Details
                        </button>
                      </h2>
                      <div id="collapseOne2" class="accordion-collapse collapse hide" aria-labelledby="headingOne" data-bs-parent="#accordionExample2">
                        <div class="accordion-body ScrollBar">
                
                            
                        <div class="row">
                            <div class="col-6" style="text-align:left;padding-left:25px;">
                               Price 
                            </div>
                            <div class="col-6">
                               Rs. <?php echo $row_all['s_gig_price']; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                           <div class="col-6" style="text-align:left;padding-left:25px;">
                              Delivery Time 
                           </div>
                           <div class="col-6">
                           <?php echo $row_all['s_delivery_time']; ?> Days
                           </div>
                       </div>
                       <hr>
                       <div class="row">
                           <div class="col-6" style="text-align:left;padding-left:25px;">
                              Number Of Pages 
                           </div>
                           <div class="col-6">
                           <?php echo $row_all['s_number_of_pages']; ?>
                           </div>
                       </div>
                       <hr>
                       <div class="row">
                          <div class="col-6" style="text-align:left;padding-left:25px;">
                             Reversion
                          </div>
                          <div class="col-6">
                          <?php echo $row_all['s_revision']; ?> Times
                          </div>
                      </div>
                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                            Source Code 
                         </div>
                         <div class="col-6">
                         <?php  if($row_all['s_source_file']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>
                      
                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                            Transparent Logo
                         </div>
                         <div class="col-6">
                         <?php  if($row_all['s_logo_transparancy']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>

                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                         High Resolution
                         </div>
                         <div class="col-6">
                         <?php  if($row_all['s_high_resolution']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>

                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                         3D Mockup
                         </div>
                         <div class="col-6">
                         <?php  if($row_all['s_3d_mockup']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>
                      
                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                         Stationary Design
                         </div>
                         <div class="col-6">
                         <?php  if($row_all['s_stationary_design']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>

                      
                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                         Soical Kit
                         </div>
                         <div class="col-6">
                         <?php  if($row_all['s_social_kit']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>

                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                         Vector Kit
                         </div>
                         <div class="col-6">
                         <?php  if($row_all['s']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>
                      <!-- local Row End-->    
                        </div>
                      </div>
                    </div>
                </div>
                <br>
                <?php
                if(isset($_SESSION['Email_redirect']) && $_SESSION['Role_redirect']==2)
                {
                ?>            
                <a href="order.php?email=<?php echo $email?>&gig_id=<?php echo $row_all['s_gig_id']?>&gig_type=2&price=<?php echo $row_all['s_gig_price']?>" class="custom-btn mb-2 text-white">Order</a>      
                <?php
                }
                ?>
            </center>
            <br>
        </div>    
        </div>

    <div class="col-lg-4 col-12">
        <h5 class="common-title text-center mt-2">Premuim</h5>
        <div class="card ">
        <img src="BackendLogic/sellerlogic/gig_images/<?php echo $row_all['p_gig_image']; ?>" style="height:200px" alt="" srcset="">
        <h6 class="common-title text-center mt-2"><?php echo $row_all['g_name']; ?></h6>
         <center>
         <div class="ScrollBar" style="height:80px"><?php echo $row_all['g_description']; ?></div>                    

                <div class="accordion" id="accordionExample3">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne3" aria-expanded="true" aria-controls="collapseOne">
                          Show Details
                        </button>
                      </h2>
                      <div id="collapseOne3" class="accordion-collapse collapse hide" aria-labelledby="headingOne" data-bs-parent="#accordionExample3">
                        <div class="accordion-body ScrollBar">
                

                        <div class="row">
                            <div class="col-6" style="text-align:left;padding-left:25px;">
                               Price 
                            </div>
                            <div class="col-6">
                               Rs. <?php echo $row_all['p_gig_price']; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                           <div class="col-6" style="text-align:left;padding-left:25px;">
                              Delivery Time 
                           </div>
                           <div class="col-6">
                           <?php echo $row_all['p_delivery_time']; ?> Days
                           </div>
                       </div>
                       <hr>
                       <div class="row">
                           <div class="col-6" style="text-align:left;padding-left:25px;">
                              Number Of Pages 
                           </div>
                           <div class="col-6">
                           <?php echo $row_all['p_number_of_pages']; ?>
                           </div>
                       </div>
                       <hr>
                       <div class="row">
                          <div class="col-6" style="text-align:left;padding-left:25px;">
                             Reversion
                          </div>
                          <div class="col-6">
                          <?php echo $row_all['p_revision']; ?> Times
                          </div>
                      </div>
                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                            Source Code 
                         </div>
                         <div class="col-6">
                         <?php  if($row_all['p_source_file']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>
                      
                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                            Transparent Logo
                         </div>
                         <div class="col-6">
                         <?php  if($row_all['p_logo_transparancy']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>

                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                         High Resolution
                         </div>
                         <div class="col-6">
                         <?php  if($row_all['p_high_resolution']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>

                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                         3D Mockup
                         </div>
                         <div class="col-6">
                         <?php  if($row_all['p_3d_mockup']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>
                      
                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                         Stationary Design
                         </div>
                         <div class="col-6">
                         <?php  if($row_all['p_stationary_design']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>

                      
                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                         Soical Kit
                         </div>
                         <div class="col-6">
                         <?php  if($row_all['p_social_kit']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>

                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                         Vector Kit
                         </div>
                         <div class="col-6">
                         <?php  if($row_all['p_vector_kit']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>
                    </div><!-- end of local row -->

                      </div>
                    </div>
                </div>
                <br>
                <?php
                if(isset($_SESSION['Email_redirect']) && $_SESSION['Role_redirect']==2)
                {
                ?>            
                <a href="order.php?email=<?php echo $email?>&gig_id=<?php echo $row_all['p_gig_id']?>&gig_type=3&price=<?php echo $row_all['p_gig_price']?>" class="custom-btn mb-2 text-white">Order</a>      
                <?php
                }
                ?>
            </center>
            <br>
        </div>    
    </div>
    </div>

<br><br>
    <?php
        }
    ?>         
</div>
</div>

<br><br>

    <!-- Custom Javacript-->
    <script src="asset/custom/createGig.js"></script>
    <!-- javascript Linke-->
    <script src="asset/js/bootstrap.js"></script>
    <!-- javascript Linke -->
    <!-- <script src="asset/js/bootstrap.bundle.js"></script> -->
</body>
</html>