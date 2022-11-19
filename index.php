<?php

include 'BackendLogic/database_connectivity.php';
include 'BackendLogic/url.php';
session_start();




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cusit-Fiverr</title>
    <link rel="shortcut icon" href="hardcode_images/cusit-logo.png" type="image/x-icon">
    <!-- bootstrap Linke -->
    <link rel="stylesheet" href="asset/css/bootstrap.css">
    <!-- Custom css-->
    <link rel="stylesheet" href="asset/custom/custom.css">
    <!-- icon link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  </head>
<body>







    <!-- Top Banner Start -->
    <div class="banner-shield"></div>
        <video  autoplay muted loop style="margin-top:-33px;width:100%">
            <source src="video/main_video2.mp4" type="video/mp4" width='100%'>
        </video>
        <br><br>
        <nav class="navbar navbar-expand-lg navbar-light bg-ligh pos">
        <div class="container-fluid">
          <h1 class="common-title" style="color:white;">Cusit-Fiverr</h1>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" ></span>
          </button>
          <div class="collapse navbar-collapse  " id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
              </li>
              <li class="nav-item " >
              </li>
            </ul>

            <div class="p-2">
            <a href='signin.php' class="text-white" style="border:1px solid white;">Sign-In</a>
            <a href='signup.php' class="text-white" style="border:1px solid white;" >Sign-Up</a>
          </div>
            
          </div>
        </div>
      </nav>

<!-- Recent Trands -->

<!-- Recent Trands -->
<div class="container-fluid">
  <hr>
    <center>
      <h2 class="common-title">Seller's Gigs <i class="fa fa-search" style="color:blue"></i> </h2>
    </center>
    <hr>
    <div class="row mt-3">
    <?php
    $checkpoint=0;
                    $sql="SELECT * FROM seller";
                    $sql_run=mysqli_query($DatabaseConnect,$sql);
                    while($row=mysqli_fetch_assoc($sql_run))
                    {
                      $check_validation_of_gig=1;

                      $sql_p="SELECT p_gig_image FROM premium_gig where p_gig_email='{$row["s_email"]}'";
                      $sql_run_p=mysqli_query($DatabaseConnect,$sql_p);
                      while($rowp=mysqli_fetch_assoc($sql_run_p))
                      {
                        if(empty($rowp['p_gig_image']))
                        {
                          $check_validation_of_gig+=1;
                        }
                        break;
                      }

                      $sql_s="SELECT s_gig_image FROM standard_gig where s_gig_email='{$row["s_email"]}'";
                      $sql_run_s=mysqli_query($DatabaseConnect,$sql_s);
                      while($rows=mysqli_fetch_assoc($sql_run_s))
                      {
                        if(empty($rowp['s_gig_image']))
                        {
                          $check_validation_of_gig+=1;
                        }

                        break;
                      }
                      
                      $sql_b="SELECT b_gig_image FROM basic_gig where b_gig_email='{$row["s_email"]}'";
                      $sql_run_b=mysqli_query($DatabaseConnect,$sql_b);
                      while($rowb=mysqli_fetch_assoc($sql_run_b))
                      {
                        if(empty($rowp['b_gig_image']))
                        {
                          $check_validation_of_gig+=1;
                        }
                        break;
                      }

                      if($check_validation_of_gig==3)
                      {
                        if($row['s_status']==1)
                      {
                      $checkpoint++;


    ?>

    <div class="col-sm-12 col-lg-3 mt-3">
            <div class="card" style="width: 19rem;height:410px;">
              <!--carousel Start-->
              <a href="show_freelancer_profile.php?id=<?php echo $row['s_id']; ?>" style="font-size:16px;text-align:justify;padding:0;">
              <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                  </div>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                    <?php
                    $sql_p="SELECT p_gig_image FROM premium_gig where p_gig_email='{$row["s_email"]}'";
                    $sql_run_p=mysqli_query($DatabaseConnect,$sql_p);
                    while($rowp=mysqli_fetch_assoc($sql_run_p))
                    {
                    ?>  
                      <img src="BackendLogic/sellerlogic/gig_images/<?php echo $rowp['p_gig_image']; ?>" class="d-block w-100" alt="..."  style="height:210px;">
                    <?php
                    break;
                    }
                    ?>

                    </div>
                    <div class="carousel-item">
                    <?php
                    $sql_s="SELECT s_gig_image FROM standard_gig where s_gig_email='{$row["s_email"]}'";
                    $sql_run_s=mysqli_query($DatabaseConnect,$sql_s);
                    while($rows=mysqli_fetch_assoc($sql_run_s))
                    {
                    ?>  
                      <img src="BackendLogic/sellerlogic/gig_images/<?php echo $rows['s_gig_image']; ?>" class="d-block w-100" alt="..." style="height:210px">
                    <?php
                    break;
                    }
                    ?>
                    </div>
                    <div class="carousel-item">
                    <?php
                    $sql_b="SELECT b_gig_image FROM basic_gig where b_gig_email='{$row["s_email"]}'";
                    $sql_run_b=mysqli_query($DatabaseConnect,$sql_b);
                    while($rowb=mysqli_fetch_assoc($sql_run_b))
                    {
                    ?>
                      <img src="BackendLogic/sellerlogic/gig_images/<?php echo $rowb['b_gig_image']; ?>" class="d-block w-100" alt="..." style="height:210px" >
                      <?php
                    break;
                    }
                    ?>
                    </div>
                  </div>
                </div>
              <!-- Carousel end-->
              <div class="card-body">
                  <img src="BackendLogic/sellerlogic/image/<?php echo $row['s_image']; ?>" alt="" class="rounded-circle" width="40" height="40">
                <span class="card-title" style="font-size:22px;color:rgb(36, 36, 190);;font-family:Georgia, 'Times New Roman', Times, serif;"><?php echo $row['s_name']; ?></span>
                <?php
                    $sql_g="SELECT g_description FROM s_gig where s_email='{$row["s_email"]}'";
                    $sql_run_g=mysqli_query($DatabaseConnect,$sql_g);
                    while($rowg=mysqli_fetch_assoc($sql_run_g))
                    {
                    ?>
                    <hr>
                    <p class="card-text mt-2" style="text-align:left"><?php echo $rowg['g_description']; ?></p>

                <?php
                    break;
                    }
                    ?>

                <!-- <span>
                  <li class="fa fa-star" style="color:gold"></li>
                  <li class="fa fa-star" style="color:gold"></li>
                  <li class="fa fa-star" style="color:gold"></li>
                  <li class="fa fa-star" style="color:gold"></li>
              </span> -->
              </div>
            </div>
          </a>
      </div>
      <?php
                      }
                    }
      if($checkpoint==4)
      {
        break;
      }
                               
      }
    
    ?>
    </div>
</div> <!--End of Row-->
</div> <!-- End of Container-->
<br><br><br>
<center>

            <a href="buyer/newbie.php" class="custom-btn" style="color:white">See More</a>

</center>
<br>
<hr>

<!-- footer Start -->

<div class="container">

  <div class="row">
    <div class="col-sm-12 col-lg-3">
     <h5 class="common-title">Categories</h5>
     <p>Graphics & Design</p>
     <p>Digital Marketing</p>
     <p>Writing & Translation</p>
     <p>Video & Animation</p>
     <p>Music & Audio</p>
     <p>Programming & Tech</p>
     <p>Data</p>
     <p>Business</p>
     <p>Lifestyle</p>
     <p>Sitemap</p>
     </div>
     <div class="col-sm-12 col-lg-2">
      <h5 class="common-title">About</h5>
      <p>Careers</p>
      <p>Press & News</p>
      <p>Partnerships</p>
      <p>Privacy Policy</p>
      <p>Terms of Service</p>
      <p>Intellectual Property Claims</p>
      <p>Investor Relations </p>
      </div>
     <div class="col-sm-12 col-lg-2">
      <h5 class="common-title">Support</h5>
      <p>Help & Support</p>
      <p>Trust & Safety</p>
      <p>Selling on Fiverr</p>
      <p>Buying on Fiverr</p>
     </div>
     <div class="col-sm-12 col-lg-2">
      <h5 class="common-title">Community</h5>
      <p>Events</p>
      <p>Blog</p>
      <p>Forum</p>
      <p>Community Standards</p>
      <p>Podcast</p>
      <p>Affiliates</p>
      <p>Invite a Friend</p>
      <p>Become a Sellerdiv</p> 
      </div>
      <div class="col-sm-12 col-lg-3">
      <h5 class="common-title">More From Cusit-Fiverr</h5>
      <p>Fiverr Pro</p>
      <p>Fiverr Studios</p>
      <p>Fiverr Logo Maker</p>
      <p>Fiverr Guides</p>
      <p>Get Inspired</p>
      <p>ClearVoice</p>
      <p>Content Marketing</p>
      <p>Fiverr Workspace</p>
      <p>Invoice Software</p>
      </div>
    </div>
</div>

<div class="container">
  <hr>
  <div class="row">
  <div class="col-sm-12 col-lg-6"><span class="common-title" style="font-size:30px">Cusit-Fiverr</span> ©City University Peshware</div>
  <div class="col-sm-12 col-lg-6">
    <span class="float-lg-end">
    <i class="fa fa-whatsapp" style="color:green;font-size:30px;margin-right:12px"></i>
    <i class="fa fa-youtube" style="color:red;font-size:30px;margin-right:12px"></i>
    <i class="fa fa-facebook" style="color:blue;font-size:30px;margin-right:12px"></i>
    <i class="fa fa-instagram" style="color:red;font-size:30px;margin-right:12px"></i>
    <i class="fa fa-twitter" style="color:rgb(0, 225, 255);font-size:30px;margin-right:12px"></i>
    <i class="fa fa-google" style="color:blue;font-size:30px;margin-right:12px"></i>
  </span>
    </div>
  </div>
</div>
<br>
<!-- footer End-->

<script>

</script>

<!-- Custom Javacript-->
<script src="asset/custom/custom.js"></script>
<!-- javascript Linke -->
<script src="asset/js/bootstrap.js"></script>

</body>
</html>

