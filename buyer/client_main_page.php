<?php
include "../BackendLogic/url.php";
session_start();

if($_SESSION['Role_redirect']!="2")
{
  header("location:");
}
include "../BackendLogic/database_connectivity.php";

?>


<!DOCTYPE php>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Home</title>
    <link rel="shortcut icon" href="../hardcode_images/cusit-logo.png" type="image/x-icon">
    <!-- bootstrap Linke -->
    <link rel="stylesheet" href="../asset/css/bootstrap.css">
    <!-- Custom css-->
    <link rel="stylesheet" href="../asset/custom/custom.css">
    <!-- icon link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  </head>
<body>

<?php
   $sql_block_status="SELECT * FROM buyer where b_email='{$_SESSION['Email_redirect']}'";
    $sql_block_status_run=mysqli_query($DatabaseConnect,$sql_block_status);
    while($row=mysqli_fetch_assoc($sql_block_status_run))
    {
        if($row['b_status']!=1)
        {
          echo "<div class='container-fluid' style='height:100vh;position:absolute;background-color:rgb(204, 90, 78);opacity:0.9;z-index:20;width:100%;color:white;font-size:18px;text-align:center;padding-top:300px;font-weight:bold;'>Sorry, Your Account Has Been Blocked Due The Malicious Acitivites <br> You Can't Buy AnyThings Until Your Account Unblock</div>";
          break;
    }
   ?>

    <!-- navbar  -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border border-bottom-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><span class="title normal_text_color">Cusit Fiverr</sapn><sub style="font-size:11px;font-family: Arial, Helvetica, sans-serif;">Buyer Home</sub></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" ></span>
          </button>
          <div class="collapse navbar-collapse  " id="navbarSupportedContent">
            
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item" hidden>
                <form class="d-flex">
                    <div class="border-radius-0 p-2 search-left" id="btnGroupAddon"><i class="fa fa-search" ></i></div>
                    <input type="text" class="custom-border me-2" placeholder="Find Services" >
                    <button class="btn border border-primary bg-primary text-white" type="submit"><span>Search</span></button>
                  </form>
              </li>
            </ul>
            <span class="common-title" style="font-size:11px;position:relative;right:30px;"> <a href="<?php echo $URL ?>/chat.php" class="bg-none pt-4"> <i class="fa fa-comment-o" style="font-size:40px;color:rgb(35, 14, 158)"></i></a></span>

            <div class="btn-group mb-2 ml-">
                <?php
                $sql="SELECT * FROM buyer where b_email='{$_SESSION['Email_redirect']}'";
                $sql_run=mysqli_query($DatabaseConnect,$sql);
                while($row=mysqli_fetch_assoc($sql_run))
                {
              ?>
              <span class="common-title" style="margin-top:14px;"><?php 
                  if($row['b_name']=="null")
                  {
                    echo "Hi, Dear";
                  }
                  else
                  {
                    echo "Hi, ".$row['b_name'];
                  } ?>
               </span>
            <?php
                }
            ?>


            <div class="btn-group m-lg-4 ml-lg-0 mt-lg-2 mb-lg-0">
              <?php

                $sql="SELECT * FROM buyer where b_email='{$_SESSION['Email_redirect']}'";
                $sql_run=mysqli_query($DatabaseConnect,$sql);
                while($row=mysqli_fetch_assoc($sql_run))
                {
                  if($row['b_image']!="null")
                  {
              ?>
              <img src="../Backendlogic/buyerlogic/image/<?php echo $row['b_image']; ?>" alt="" class="profile_image  " type="button" id="defaultDropdown" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
              <?php
                  }
                  else
                  {
                   echo  "<img src='../Backendlogic/buyerlogic/image/default.png'  class='profile_image' type='button' id='defaultDropdown' data-bs-toggle='dropdown' data-bs-auto-close='true' aria-expanded='false'>";
                  }
                }
              ?>


              <ul class="dropdown-menu  dropdown-menu-end dropdown-menu-lg-end" aria-labelledby="defaultDropdown">
                <div class="row p-3">
                  <div class="col-2 p-3 pt-2 pl-5">
                    <i class="fa fa-user" style="color:rgb(36, 36, 190)"></i>
                  </div>
                  <div class="col-10">
                    <li class="dropdown-item" style="text-align:left;"><a href="client_profile.php"><span class="link-text">Profile</span></a></li>
                  </div>
  
                  <div class="col-2 p-3 pt-2 pl-5">
                    <i class="fa fa-th" style="color:rgb(36, 36, 190)"></i>
                  </div>
                  <div class="col-10">
                    <li class="dropdown-item" style="text-align:left;"><a href="client_project_dashboard.php"><span class="link-text">Dashboard</span></a></li>
                  </div>
  
                  <div class="col-2 p-3 pt-2 pl-5">
                    <i class="fa fa-unlock" style="color:rgb(36, 36, 190)"></i>                
                  </div>

                  <div class="col-10">
                    <li class="dropdown-item" style="text-align:left;"><a href="client_security.php" ><span class="link-text">Security</span></a></li>
                  </div>
  
<!--   
                  <div class="col-2 p-3 pt-2 pl-5">
                    <i class="fa fa-gift" style="color:rgb(36, 36, 190)"></i>
                  </div>
                  <div class="col-10">
                    <li class="dropdown-item" style="text-align:left;"><a href="client_texation.php"><span class="link-text">Texation</span></a></li>
                  </div>
  
                  <div class="col-2 p-3 pt-2 pl-5">
                    <i class="fa fa-credit-card" style="color:rgb(36, 36, 190)"></i>
                  </div>
                  <div class="col-10">
                    <li class="dropdown-item" style="text-align:left;"><a href="client_payment.php"><span class="link-text">Payment</span></a></li>
                  </div> -->
  
                  <div class="col-2 p-3 pt-2 pl-5">
                    <i class="fa fa-exclamation-circle" style="color:red" style="color:rgb(36, 36, 190)"></i>
                  </div>
                  <div class="col-10">
                    <li class="dropdown-item" style="text-align:left;"><a href="../BackendLogic/logout.php"><span class="link-text">Logout</span></a></li>
                  </div>
  
                  </div><!-- End of Row-->
  
              </ul>

            </div>

            
        </div>
        </div>
      </nav>
<!-- navbar end-->

<!-- what you need to brand your business -->
<div class="container">
    <div class="row mt-5">
        <div class="col-lg-3 col-sm-12">
            <div class="card w-100">
            <div class="card-body">
            <CENTER>
            <?php

$sql="SELECT * FROM buyer where b_email='{$_SESSION['Email_redirect']}'";
$sql_run=mysqli_query($DatabaseConnect,$sql);

while($row=mysqli_fetch_assoc($sql_run))
{
?>
<span class="common-title" style="margin-top:14px;"><?php 
  if($row['b_name']=="null")
  {
    echo "Hi, Dear";
  }
  else
  {
    echo "Hi, ".$row['b_name'];
  } ?>
<br>
</span>
<br>
<span> welcome to to the CusitFiverr</span>
<br>
<br>
<?php
}
?>
                <button class="btn btn-primary w-100">Post a Request</button>
            </div>
            </CENTER>
            </div>
        </div>
        <div class="col-lg-9 col-sm-12 mt-5 mt-lg-0">
            <div class="card w-100" >
                <div class="card-body">
                <CENTER>
                  <div class="common-title" style="font-size:23px;">Humble Request</div>
                  Here Every Seller follow the CusitFiverr Rule & Regulation We Also Request You To Follow The CusitFiverr Rules & Regulation.
                  <br> <span>If You Face any Issue from the seller sent us Email address and Name of that Seller on Following Address:<br><i> CusitFiverrHelp@gmail.com</i></span>
                </div>
                </CENTER>
                </div>
            </div>
        </div>
    </div></div>
<!-- what you need to brand your business end -->

<!-- Recent Trands -->
<br>
<hr>

<!-- Newbie Trands -->
<div class="container-fluid mt-5">
    <center>
      <h2 class="common-title">Seller's Gigs <i class="fa fa-search" style="color:blue"></i> </h2>
    </center>
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
      if($checkpoint==16)
      {
        break;
      }
                               
      }
    
    ?>

    </div>
</div> <!--End of Row-->
</div> <!-- End of Container-->
<br><br>


<center>

            <a href="newbie.php" class="custom-btn" style="color:white">See More</a>

</center>
<br>
<!-- -->

<!-- footer Start -->
<hr>
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
<script src="../asset/custom/custom.js"></script>
<!-- javascript Linke -->
<script src="../asset/js/bootstrap.js"></script>

</body>

<?php

  }
?>