<?php

include "../BackendLogic/url.php";
include "../BackendLogic/database_connectivity.php";
session_start();


  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newbie</title>
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
            <a class="navbar-brand" href="#"><span class="title normal_text_color">Cusit Fiverr</sapn><sub style="font-size:11px;font-family: Arial, Helvetica, sans-serif;">Welcome To Seller Gigs</sub></a>

                 <!-- Buyer navigation-->
                <div>
                <?php
                $role=10;
                if(isset($_SESSION['Role_redirect']))
                {
                  $role=$_SESSION['Role_redirect'];
                }

                if($role==1)
                {
                ?>
                <a href="../seller/freelancer_main_page.php" class="link-text" style="font-size:15px;border:1px solid blue;margin-right:14px;">Home</a>
                <?php
                }
                else if($role==2)
                {
                ?>
                <a href="client_main_page.php" class="link-text" style="font-size:15px;border:1px solid blue;margin-right:14px;">Home</a>
                <?php
                }
                else
                {
                ?>                
                <a href="../index.php" class="link-text" style="font-size:15px;border:1px solid blue;margin-right:14px;">Home</a>
                <?php
                }
                ?>

                 
                </div>
                <!-- Buyer navigation End-->

        </div>
    </nav>
  

<div class="container-fluid mt-2">
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

    ?>

    <div class="col-sm-12 col-lg-3 mt-3">
            <div class="card" style="width: 19rem;height:410px;">
              <!--carousel Start-->
              <a href="../show_freelancer_profile.php?id=<?php echo $row['s_id']; ?>" style="font-size:16px;text-align:justify;padding:0;">
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
                      <img src="../BackendLogic/sellerlogic/gig_images/<?php echo $rowp['p_gig_image']; ?>" class="d-block w-100" alt="..."  style="height:210px;">
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
                      <img src="../BackendLogic/sellerlogic/gig_images/<?php echo $rows['s_gig_image']; ?>" class="d-block w-100" alt="..." style="height:210px">
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
                      <img src="../BackendLogic/sellerlogic/gig_images/<?php echo $rowb['b_gig_image']; ?>" class="d-block w-100" alt="..." style="height:210px" >
                      <?php
                    break;
                    }
                    ?>
                    </div>
                  </div>
                </div>
              <!-- Carousel end-->
              <div class="card-body">
                  <img src="../BackendLogic/sellerlogic/image/<?php echo $row['s_image']; ?>" alt="" class="rounded-circle" width="40" height="40">
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
<!-- 
                <span>
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
                               
      
    
    ?>


    </div>
</div> <!--End of Row-->
</div> <!-- End of Container-->
<br><br>
<!-- Custom Javacript-->
<script src="../asset/custom/custom.js"></script>
<!-- javascript Linke -->
<script src="../asset/js/bootstrap.js"></script>




</body>
</html>