<?php
session_start();
include "../BackendLogic/url.php";

// if($_SESSION['Role_redirect']!="1")
// {
//   header("location:");
// }
include "../BackendLogic/database_connectivity.php";
$updation_id=$_GET['id'];



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gig Updation</title>
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
    <nav class="navbar navbar-expand-lg navbar-light bg-white border border-bottom-dark p-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="freelancer_main_page.php"><span class="title normal_text_color">Cusit Fiverr</sapn><sub style="color:grey;font-size:12px;font-family:sans-serif"> Gig Customization</sub></a>

                                
                <!-- Buyer navigation-->
                <div>
                    <a href="freelancer_main_page.php" class="link-text" style="font-size:15px;">Home</a>
                    <a href="freelancer_dashboard.php" class="link-text" style="font-size:15px;">DashBoard</a>
                    <a href="freelancer_security.php" class="link-text" style="font-size:15px;">Security</a>
                    <a href="freelancer_project_dashboard.php" class="link-text" style="font-size:15px;">Project DashBoard</a>
                    <!-- <a href="freelancer_texation.php" class="link-text" style="font-size:15px;">Texation</a>
                    <a href="freelancer_payment.php" class="link-text" style="font-size:15px;">Payment</a> -->
                    <a href="../BackendLogic/logout.php" class="link-text" style="font-size:15px;">Signout</a>
                </div>
                <!-- Buyer navigation End-->    

        </div>
    </nav>
    <!-- navbar end-->

    <!-- progress bar first -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border border-bottom-dark"
        style="margin-top:-22px;padding:20px 0px 5px 0px" id="GCProgressBar">
        <div class="container-fluid">
            <div class=" navbar-collapse" id="navbarSupportedContent">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-10 col-12">
                            <ol class="ProgressBar">
                                <li><span class="ProgressCircle">1</span> Banner & Title ></li>
                                <li><span class="ProgressCircle">2</span> Standard & Monatory Policy ></li>
                                <li><span class="ProgressCircle">3</span> Finish</li>
                            </ol>
                        </div>
                        <div class="col-lg-2 col-12" style="margin-top:-10px">
                            <span>Completion Rate:<span>20%</span></span>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar"
                                    style="width: 20%;background-color:rgb(35, 14, 158);" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- progress bar For Gig End-->




<!-- GigBanner -->
<form action="../BackendLogic/sellerlogic/gig_logic/gig_updation.php" method="POST" enctype="multipart/form-data">
<div class="container mt-5" id="GBannerTitle">
     <div class="row">
            <div class="col-4">
            <?php
               $fetch_language="SELECT * FROM basic_gig where b_gig_id='{$updation_id}'";
               $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
               while($row=mysqli_fetch_assoc($fetch_language_run))
                {
                ?>
                <input type="text" name="counterid" value="<?php echo $row['b_gig_id'];?>"  style="display:none">
                <?php
                }
                ?>
                <div class="card border-0">
            <?php
               $fetch_language="SELECT * FROM basic_gig where b_gig_id='{$updation_id}'";
               $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
               while($row=mysqli_fetch_assoc($fetch_language_run))
                {
                ?>
                    <img src="../BackendLogic/sellerlogic/gig_images/<?php echo $row['b_gig_image'];?>" alt="" height="230px">
                    <input type="file" name="firstimage" value="<?php echo $row['b_gig_image']; ?>" style="width:330px;height:175px;position:absolute;top:10px;border-radius:0px;z-index:10;">
                    <i class="GigBanner">Upload Gig Banner Click</i>
                    <span class="common-title" style="text-align:center;color:grey">Basic</span>

                <?php
                }
                ?>
                </div>

            </div>
            <div class="col-4">                
                <div class="card border-0">

                    <?php
                    $fetch_language="SELECT * FROM standard_gig where s_gig_id='{$updation_id}'";
                    $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
                     while($row=mysqli_fetch_assoc($fetch_language_run))
                        {
                    ?>


                    <img src="../BackendLogic/sellerlogic/gig_images/<?php echo $row['s_gig_image'];?>" alt="" height="230px">
                    <input type="file" name="secondimage" value="<?php echo $row['s_gig_image']; ?>"  style="width:330px;height:175px;position:absolute;top:10px;border-radius:0px;z-index:10;">
                    <i class="GigBanner">Upload Gig Banner Click</i>
                    <span class="common-title" style="text-align:center;color:grey">Standard</span>
                      <?php
                        }
                      ?>
                </div>

            </div>
            <div class="col-4">
                
                <div class="card border-0">
                    
                <?php
                    $fetch_language="SELECT * FROM premium_gig where p_gig_id='{$updation_id}'";
                    $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
                     while($row=mysqli_fetch_assoc($fetch_language_run))
                        {
                    ?>

                    <img src="../BackendLogic/sellerlogic/gig_images/<?php echo $row['p_gig_image'];?>" alt="" height="230px">
                    <input type="file" name="thirdimage" value="<?php echo $row['p_gig_image']; ?>" style="width:330px;height:175px;position:absolute;top:10px;border-radius:0px;z-index:10;">
                    <i class="GigBanner">Upload Gig Banner Click</i>
                    <span class="common-title" style="text-align:center;color:grey">Premium</span>

                        <?php
                        }
                        ?>
                </div>

            </div>
        </div>
        <br>
        <h4 style="color:grey;margin-left:4px;">Warning<span style="color:red;">*</span> <span style="font-size:14px">Image Should be 5MB or less & Video Clip Should be 60 Seconds or Less</span></h4>
        
    <hr>
    <br><br>
    <div class="row">
        <div class="col-3">
            <h4>Gig Title<span style="color:red;">*</span></h4>
            <span>
                Write Gig title Here which you can do.
            </span>
        </div>
        <div class="col-9">
            <?php
            $fetch_language="SELECT * FROM s_gig where s_gig_id='{$updation_id}'";
            $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
            while($row=mysqli_fetch_assoc($fetch_language_run))
            {
            ?>

            <textarea class="card border-0 p-3" name="gigdescription" id="" cols="70" rows="7" class="InputField" placeholder="I will do....."><?php echo $row['g_description']; ?></textarea>
            <?php
            }
            ?>
            <br>
            <span style="margin-left:55%;color:grey">10/30 Words</span>
        </div>
        
        <div class="col-3 mt-4">
            <h4>Select Name<span style="color:red;">*</span></h4>
            <span>
                This Name Will be Representing Your Gig
            </span>
        </div>
        <div class="col-9 mt-5">
        <?php
            $fetch_language="SELECT * FROM s_gig where s_gig_id='{$updation_id}'";
            $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
            while($row=mysqli_fetch_assoc($fetch_language_run))
            {
        ?>
            <select name="gigname" id="" value="<?php echo $row['g_name'];?>" class="InputField" style="width:68%" >
            <option value="default">Select New if You Want</option>
            <option value="Web Design & Development" class="option" name="LanEnglish">Web Design & Development</option>
            <option value="Android Development" class="option" name="LanUrud">Android Development</option>
            <option value="IOS Development" class="option" name="LanPashto">IOS Development</option> 
            <option value="Logo Design" class="option" name="LanPashto">Logo Design</option>
            <option value="Video Editing" class="option" name="LanPashto">Video Editing</option> 
            <option value="Gif File & Animation" class="option" name="LanPashto">Gif File and Animation</option>                                                     
            <option value="Email Writing" class="option" name="LanPashto">Email Writing</option> 
            <option value="Letter Writing" class="option" name="LanPashto">Letter Writing</option> 
            <option value="Creative writing" class="option" name="LanPashto">Creative Writing</option> 
            </select>
            <br>
            <?php echo "<i style='color:red'> This name is Already Selected:  </i>".$row['g_name'];?>
            <?php
            }
            ?>
            <br>
        </div>
    </div>
    <div class="row justify-content-end">
        <div class="col-1">
        <div class="custom-btn" id="GBannerTitleBtn" style="width:100%;cursor:pointer">Save</div>
        </div>
    </div>
    <br><br>
</div>
<!-- GigBannerTitle-->


<!-- second Progress bar -->
   <nav id="GStandardMonatory" class="navbar navbar-expand-lg navbar-light bg-white border border-bottom-dark"
   style="margin-top:-25px;padding:20px 0px 5px 0px">
   <div class="container-fluid">
       <div class=" navbar-collapse" id="navbarSupportedContent">
           <div class="container-fluid">
               <div class="row">
                   <div class="col-lg-10 col-12">
                       <ol class="ProgressBar">
                           <li style="color:rgb(35, 14, 158);font-weight: bolder;"><span class="ProgressCircle"
                                   style="background-color:rgb(35, 14, 158);color:white;border:1px solid rgb(35, 14, 158);">1</span>
                               Banner & Title ></li>
                            <li><span class="ProgressCircle">2</span> Standards & Monatory Policy > </li>
                           <li><span class="ProgressCircle">3</span> Finish </li>
                       </ol>
                   </div>
                   <div class="col-lg-2 col-12" style="margin-top:-10px">
                       <span>Completion Rate:<span>80%</span></span>
                       <div class="progress">
                           <div class="progress-bar" role="progressbar"
                               style="width: 80%;background-color:rgb(35, 14, 158);" aria-valuenow="25"
                               aria-valuemin="50" aria-valuemax="100"></div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
</nav>
<!-- Second Progress Bar-->

<div class="container" id="GStandardMonatoryBody">

    <div class="row mt-5">
        
        <div class="col-4">

            <div class="card p-3 border-0">
                <h4 class="GigTitle common-title">Basic</h4>
                <hr>
                <br>
                <center>
                <!-- Number of Pages-->
                <div class="row">
                <div class="col-6">
                    <p style="margin-top:10px;">Number Of Pages</p>
                </div>
                <div class="col-6">
                <?php
            $fetch_language="SELECT * FROM basic_gig where b_gig_id='{$updation_id}'";
            $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
            while($row=mysqli_fetch_assoc($fetch_language_run))
            {
            ?>
            
            <input type="number" name="b_npage" value="<?php echo $row['b_number_of_pages']; ?>"  class="GInputField" style="width:80%" placeholder="Pages">

             <?php
            }
             ?>       
                </div>
                </div>
                <br>
                <!-- Number of Pages End-->
                <!-- Price Start-->
                <div class="row">
                    <div class="col-6">
                        <p style="margin-top:10px;">Price</p>
                    </div>
                    <div class="col-6">
                    <?php
                    $fetch_language="SELECT * FROM basic_gig where b_gig_id='{$updation_id}'";
                    $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
                    while($row=mysqli_fetch_assoc($fetch_language_run))
                    {
                    ?>
                        <input type="number" name="b_price" value="<?php echo $row['b_gig_price']; ?>"  class="GInputField" style="width:80%" placeholder="Price">
                    <?php
                    }
                    ?>
                    </div>
                </div>
                <!-- Price End-->
                <br>
                <!-- Duration-->
                <div class="row">
                <div class="col-6">
                    <p style="margin-top:10px;">Delivery Time</p>
                </div>
                <div class="col-6">
                <?php
                    $fetch_language="SELECT * FROM basic_gig where b_gig_id='{$updation_id}'";
                    $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
                    while($row=mysqli_fetch_assoc($fetch_language_run))
                    {
                    ?>

                    <input type="number" name="b_dtime" value="<?php echo $row['b_delivery_time']; ?>" class="GInputField" style="width:80%" placeholder="Days">
                    <?php
                    }
                    ?>
                </div>
                </div>
                <!-- Duration End-->

                <br>
                <!-- Version-->
                <div class="row">
                <div class="col-6">
                    <p style="margin-top:10px;">Reversions</p>
                </div>
                <div class="col-6">
                <?php
                    $fetch_language="SELECT * FROM basic_gig where b_gig_id='{$updation_id}'";
                    $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
                    while($row=mysqli_fetch_assoc($fetch_language_run))
                    {
                    ?>
                    <input type="number" name="b_reversion" value="<?php echo $row['b_revision']; ?>" class="GInputField" style="width:80%" placeholder="Versions">
                    <?php
                    }
                    ?>
                </div>
                </div>
                <!-- Version End-->
                <br>
                <!-- Source File-->
                <div class="row">
                <div class="col-6">
                    <p style="margin-top:10px;">Source File</p>
                </div>
                <div class="col-6">
                <?php
                    $fetch_language="SELECT * FROM basic_gig where b_gig_id='{$updation_id}'";
                    $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
                    while($row=mysqli_fetch_assoc($fetch_language_run))
                    {
                        $condition="";
                        if($row['b_source_file']==1)
                        {
                            $condition="checked";
                        }
                ?>
                    
                <input type="checkbox" <?php echo $condition; ?> name="b_sfile" value="<?php echo $row['b_source_file']; ?>" style="margin-top:15px;" placeholder="Prices">

                <?php
                    }
                  ?>
                </div>
                </div>
                <!-- Source file End-->
                <br>
                <!-- logo Transparancy-->
                <div class="row">
                <div class="col-6">
                    <p style="margin-top:10px;">Logo Transparancy</p>
                </div>
                <div class="col-6">
                <?php
                    $fetch_language="SELECT * FROM basic_gig where b_gig_id='{$updation_id}'";
                    $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
                    while($row=mysqli_fetch_assoc($fetch_language_run))
                    {
                        $condition="";
                        if($row['b_logo_transparancy']==1)
                        {
                            $condition="checked";
                        }
                    ?>

                    <input type="checkbox" <?php echo $condition; ?> name="b_ltransparancy" value="<?php echo $row['b_logo_transparancy'];?>"  style="margin-top:15px;" placeholder="Prices">
                    <?php
                    }
                    ?>
                </div>
                </div>
                <!-- logo Transparancy End-->
                <br>
                <!-- Resolution-->
                <div class="row">
                <div class="col-6">
                    <p style="margin-top:10px;">High Resolution</p>
                </div>
                <div class="col-6">
                <?php
                    $fetch_language="SELECT * FROM basic_gig where b_gig_id='{$updation_id}'";
                    $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
                    while($row=mysqli_fetch_assoc($fetch_language_run))
                    {
                        $condition="";
                        if($row['b_high_resolution']==1)
                        {
                            $condition="checked";
                        }
                    ?>

                    <input type="checkbox" <?php echo $condition; ?> name="b_hresolution" value="<?php echo $row['b_high_resolution'];?>" style="margin-top:15px;" placeholder="Prices">

                    <?php
                    }
                    ?>
                </div>
                </div>
                <!--Resolution End-->
                <br>
                <!-- 3D Mockup-->
                <div class="row">
                    <div class="col-6">
                        <p style="margin-top:10px;">3D Mockup</p>
                    </div>
                    <div class="col-6">
                    <?php
                    $fetch_language="SELECT * FROM basic_gig where b_gig_id='{$updation_id}'";
                    $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
                    while($row=mysqli_fetch_assoc($fetch_language_run))
                    {
                        $condition="";
                        if($row['b_3d_mockup']==1)
                        {
                            $condition="checked";
                        }
                    ?>

                    <input type="checkbox" <?php echo $condition; ?> name="b_dmockup" value="<?php echo $row['b_3d_mockup'];?>"  style="margin-top:15px;" placeholder="Prices">
                
                    <?php
                    }
                    ?>
                    </div>
                    </div>
                <!--3D Mockup End-->
                <br>
                <!-- Stationary Design-->
                <div class="row">
                <div class="col-6">
                    <p style="margin-top:10px;">Stationary Designs</p>
                </div>
                <div class="col-6">
                <?php
                    $fetch_language="SELECT * FROM basic_gig where b_gig_id='{$updation_id}'";
                    $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
                    while($row=mysqli_fetch_assoc($fetch_language_run))
                    {
                        $condition="";
                        if($row['b_stationary_design']==1)
                        {
                            $condition="checked";
                        }
                    ?>

                    <input type="checkbox" <?php echo $condition; ?> name="b_sdesign" value="<?php echo $row['b_stationary_design'];?>"  style="margin-top:15px;" placeholder="Prices">
                    <?php
                    }
                    ?>
                </div>
                </div>
                <!--Stationary Design end-->
                <br>
                <!-- Social Media Kit-->
                <div class="row">
                    <div class="col-6">
                        <p style="margin-top:10px;">Social Media Kit</p>
                    </div>
                    <div class="col-6">
                    <?php
                    $fetch_language="SELECT * FROM basic_gig where b_gig_id='{$updation_id}'";
                    $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
                    while($row=mysqli_fetch_assoc($fetch_language_run))
                    {
                        $condition="";
                        if($row['b_social_kit']==1)
                        {
                            $condition="checked";
                        }
                    ?>
                    
                    <input type="checkbox" <?php echo $condition; ?> name="b_smedia" value="<?php echo $row['b_social_kit'];?>" style="margin-top:15px;" placeholder="Prices">
                    
                    <?php
                    }
                    ?>
                    </div>
                    </div>
                <!--Social Meida kit End-->
                <br>
                <!-- My vector kit-->
                <div class="row">
                <div class="col-6">
                    <p style="margin-top:10px;">My Vector Kit</p>
                </div>
                <div class="col-6">
                <?php
                    $fetch_language="SELECT * FROM basic_gig where b_gig_id='{$updation_id}'";
                    $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
                    while($row=mysqli_fetch_assoc($fetch_language_run))
                    {
                        $condition="";
                        if($row['b_vector_kit']==1)
                        {
                            $condition="checked";
                        }
                    ?>

                    <input type="checkbox" <?php echo $condition; ?> name="b_smedia" value="<?php echo $row['b_vector_kit'];?>" style="margin-top:15px;" placeholder="Prices">

                    <?php
                    }
                    ?>
                </div>
                </div>
                <!--My Vector Kit End-->

            </center>
            </div>

        </div><!-- col end-->

        <div class="col-4">
            <div class="card p-3 border-0">
                <h4 class="GigTitle common-title">Standard</h4>
                <hr>
                <br>
                <center>
                <!-- Number of Pages-->
                <div class="row">
                <div class="col-6">
                    <p style="margin-top:10px;">Number Of Pages</p>
                </div>
                <div class="col-6">
                <?php
            $fetch_language="SELECT * FROM standard_gig where s_gig_id='{$updation_id}'";
            $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
            while($row=mysqli_fetch_assoc($fetch_language_run))
            {
            ?>
            
            <input type="number" name="s_npage" value="<?php echo $row['s_number_of_pages']; ?>"  class="GInputField" style="width:80%" placeholder="Pages">

             <?php
            }
             ?>       
                </div>
                </div>
                <br>
                <!-- Number of Pages End-->
                <!-- Price Start-->
                <div class="row">
                    <div class="col-6">
                        <p style="margin-top:10px;">Price</p>
                    </div>
                    <div class="col-6">
                    <?php
                    $fetch_language="SELECT * FROM standard_gig where s_gig_id='{$updation_id}'";
                    $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
                    while($row=mysqli_fetch_assoc($fetch_language_run))
                    {
                    ?>
                        <input type="number" name="s_price" value="<?php echo $row['s_gig_price']; ?>"  class="GInputField" style="width:80%" placeholder="Price">
                    <?php
                    }
                    ?>
                    </div>
                </div>
                <!-- Price End-->
                <br>
                <!-- Duration-->
                <div class="row">
                <div class="col-6">
                    <p style="margin-top:10px;">Delivery Time</p>
                </div>
                <div class="col-6">
                <?php
                    $fetch_language="SELECT * FROM standard_gig where s_gig_id='{$updation_id}'";
                    $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
                    while($row=mysqli_fetch_assoc($fetch_language_run))
                    {
                    ?>

                    <input type="number" name="s_dtime" value="<?php echo $row['s_delivery_time']; ?>" class="GInputField" style="width:80%" placeholder="Days">
                    <?php
                    }
                    ?>
                </div>
                </div>
                <!-- Duration End-->

                <br>
                <!-- Version-->
                <div class="row">
                <div class="col-6">
                    <p style="margin-top:10px;">Reversions</p>
                </div>
                <div class="col-6">
                <?php
                    $fetch_language="SELECT * FROM standard_gig where s_gig_id='{$updation_id}'";
                    $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
                    while($row=mysqli_fetch_assoc($fetch_language_run))
                    {
                    ?>
                    <input type="number" name="s_reversion" value="<?php echo $row['s_revision']; ?>" class="GInputField" style="width:80%" placeholder="Versions">
                    <?php
                    }
                    ?>
                </div>
                </div>
                <!-- Version End-->
                <br>
                <!-- Source File-->
                <div class="row">
                <div class="col-6">
                    <p style="margin-top:10px;">Source File</p>
                </div>
                <div class="col-6">
                <?php
                    $fetch_language="SELECT * FROM standard_gig where s_gig_id='{$updation_id}'";
                    $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
                    while($row=mysqli_fetch_assoc($fetch_language_run))
                    {
                        $condition="";
                        if($row['s_source_file']==1)
                        {
                            $condition="checked";
                        }
                ?>
                    
                <input type="checkbox" <?php echo $condition; ?> name="s_sfile" value="<?php echo $row['s_source_file']; ?>" style="margin-top:15px;" placeholder="Prices">

                <?php
                    }
                  ?>
                </div>
                </div>
                <!-- Source file End-->
                <br>
                <!-- logo Transparancy-->
                <div class="row">
                <div class="col-6">
                    <p style="margin-top:10px;">Logo Transparancy</p>
                </div>
                <div class="col-6">
                <?php
                    $fetch_language="SELECT * FROM standard_gig where s_gig_id='{$updation_id}'";
                    $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
                    while($row=mysqli_fetch_assoc($fetch_language_run))
                    {
                        $condition="";
                        if($row['s_logo_transparancy']==1)
                        {
                            $condition="checked";
                        }
                    ?>

                    <input type="checkbox" <?php echo $condition; ?> name="s_ltransparancy" value="<?php echo $row['s_logo_transparancy'];?>"  style="margin-top:15px;" placeholder="Prices">
                    <?php
                    }
                    ?>
                </div>
                </div>
                <!-- logo Transparancy End-->
                <br>
                <!-- Resolution-->
                <div class="row">
                <div class="col-6">
                    <p style="margin-top:10px;">High Resolution</p>
                </div>
                <div class="col-6">
                <?php
                    $fetch_language="SELECT * FROM standard_gig where s_gig_id='{$updation_id}'";
                    $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
                    while($row=mysqli_fetch_assoc($fetch_language_run))
                    {
                        $condition="";
                        if($row['s_high_resolution']==1)
                        {
                            $condition="checked";
                        }
                    ?>

                    <input type="checkbox" <?php echo $condition; ?> name="s_hresolution" value="<?php echo $row['s_high_resolution'];?>" style="margin-top:15px;" placeholder="Prices">

                    <?php
                    }
                    ?>
                </div>
                </div>
                <!--Resolution End-->
                <br>
                <!-- 3D Mockup-->
                <div class="row">
                    <div class="col-6">
                        <p style="margin-top:10px;">3D Mockup</p>
                    </div>
                    <div class="col-6">
                    <?php
                    $fetch_language="SELECT * FROM standard_gig where s_gig_id='{$updation_id}'";
                    $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
                    while($row=mysqli_fetch_assoc($fetch_language_run))
                    {
                        $condition="";
                        if($row['s_3d_mockup']==1)
                        {
                            $condition="checked";
                        }
                    ?>

                    <input type="checkbox" <?php echo $condition; ?> name="s_dmockup" value="<?php echo $row['s_3d_mockup'];?>"  style="margin-top:15px;" placeholder="Prices">
                
                    <?php
                    }
                    ?>
                    </div>
                    </div>
                <!--3D Mockup End-->
                <br>
                <!-- Stationary Design-->
                <div class="row">
                <div class="col-6">
                    <p style="margin-top:10px;">Stationary Designs</p>
                </div>
                <div class="col-6">
                <?php
                    $fetch_language="SELECT * FROM standard_gig where s_gig_id='{$updation_id}'";
                    $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
                    while($row=mysqli_fetch_assoc($fetch_language_run))
                    {
                        $condition="";
                        if($row['s_stationary_design']==1)
                        {
                            $condition="checked";
                        }
                    ?>

                    <input type="checkbox" <?php echo $condition; ?> name="s_sdesign" value="<?php echo $row['s_stationary_design'];?>"  style="margin-top:15px;" placeholder="Prices">
                    <?php
                    }
                    ?>
                </div>
                </div>
                <!--Stationary Design end-->
                <br>
                <!-- Social Media Kit-->
                <div class="row">
                    <div class="col-6">
                        <p style="margin-top:10px;">Social Media Kit</p>
                    </div>
                    <div class="col-6">
                    <?php
                    $fetch_language="SELECT * FROM standard_gig where s_gig_id='{$updation_id}'";
                    $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
                    while($row=mysqli_fetch_assoc($fetch_language_run))
                    {
                        $condition="";
                        if($row['s_social_kit']==1)
                        {
                            $condition="checked";
                        }
                    ?>
                    
                    <input type="checkbox" <?php echo $condition; ?> name="s_smedia" value="<?php echo $row['s_social_kit'];?>" style="margin-top:15px;" placeholder="Prices">
                    
                    <?php
                    }
                    ?>
                    </div>
                    </div>
                <!--Social Meida kit End-->
                <br>
                <!-- My vector kit-->
                <div class="row">
                <div class="col-6">
                    <p style="margin-top:10px;">My Vector Kit</p>
                </div>
                <div class="col-6">
                <?php
                    $fetch_language="SELECT * FROM standard_gig where s_gig_id='{$updation_id}'";
                    $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
                    while($row=mysqli_fetch_assoc($fetch_language_run))
                    {
                        $condition="";
                        if($row['s_vector_kit']==1)
                        {
                            $condition="checked";
                        }
                    ?>

                    <input type="checkbox" <?php echo $condition; ?> name="s_smedia" value="<?php echo $row['s_vector_kit'];?>" style="margin-top:15px;" placeholder="Prices">

                    <?php
                    }
                    ?>
                </div>
                </div>
                <!--My Vector Kit End-->
                </center>
            </div>
        </div><!-- col end-->

        <div class="col-4">
            <div class="card p-3 border-0">
                <h4 class="GigTitle common-title">Premium</h4>
                <hr>
                <br>
                <center>
                <!-- Number of Pages-->
                <div class="row">
                <div class="col-6">
                    <p style="margin-top:10px;">Number Of Pages</p>
                </div>
                <div class="col-6">
                <?php
            $fetch_language="SELECT * FROM premium_gig where p_gig_id='{$updation_id}'";
            $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
            while($row=mysqli_fetch_assoc($fetch_language_run))
            {
            ?>
            
            <input type="number" name="p_npage" value="<?php echo $row['p_number_of_pages']; ?>"  class="GInputField" style="width:80%" placeholder="Pages">

             <?php
            }
             ?>       
                </div>
                </div>
                <br>
                <!-- Number of Pages End-->
                <!-- Price Start-->
                <div class="row">
                    <div class="col-6">
                        <p style="margin-top:10px;">Price</p>
                    </div>
                    <div class="col-6">
                    <?php
                    $fetch_language="SELECT * FROM premium_gig where p_gig_id='{$updation_id}'";
                    $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
                    while($row=mysqli_fetch_assoc($fetch_language_run))
                    {
                    ?>
                        <input type="number" name="p_price" value="<?php echo $row['p_gig_price']; ?>"  class="GInputField" style="width:80%" placeholder="Price">
                    <?php
                    }
                    ?>
                    </div>
                </div>
                <!-- Price End-->
                <br>
                <!-- Duration-->
                <div class="row">
                <div class="col-6">
                    <p style="margin-top:10px;">Delivery Time</p>
                </div>
                <div class="col-6">
                <?php
                    $fetch_language="SELECT * FROM premium_gig where p_gig_id='{$updation_id}'";
                    $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
                    while($row=mysqli_fetch_assoc($fetch_language_run))
                    {
                    ?>

                    <input type="number" name="p_dtime" value="<?php echo $row['p_delivery_time']; ?>" class="GInputField" style="width:80%" placeholder="Days">
                    <?php
                    }
                    ?>
                </div>
                </div>
                <!-- Duration End-->

                <br>
                <!-- Version-->
                <div class="row">
                <div class="col-6">
                    <p style="margin-top:10px;">Reversions</p>
                </div>
                <div class="col-6">
                <?php
                    $fetch_language="SELECT * FROM premium_gig where p_gig_id='{$updation_id}'";
                    $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
                    while($row=mysqli_fetch_assoc($fetch_language_run))
                    {
                    ?>
                    <input type="number" name="p_reversion" value="<?php echo $row['p_revision']; ?>" class="GInputField" style="width:80%" placeholder="Versions">
                    <?php
                    }
                    ?>
                </div>
                </div>
                <!-- Version End-->
                <br>
                <!-- Source File-->
                <div class="row">
                <div class="col-6">
                    <p style="margin-top:10px;">Source File</p>
                </div>
                <div class="col-6">
                <?php
                    $fetch_language="SELECT * FROM premium_gig where p_gig_id='{$updation_id}'";
                    $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
                    while($row=mysqli_fetch_assoc($fetch_language_run))
                    {
                        $condition="";
                        if($row['p_source_file']==1)
                        {
                            $condition="checked";
                        }
                ?>
                    
                <input type="checkbox" <?php echo $condition; ?> name="p_sfile" value="<?php echo $row['p_source_file']; ?>" style="margin-top:15px;" placeholder="Prices">

                <?php
                    }
                  ?>
                </div>
                </div>
                <!-- Source file End-->
                <br>
                <!-- logo Transparancy-->
                <div class="row">
                <div class="col-6">
                    <p style="margin-top:10px;">Logo Transparancy</p>
                </div>
                <div class="col-6">
                <?php
                    $fetch_language="SELECT * FROM premium_gig where p_gig_id='{$updation_id}'";
                    $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
                    while($row=mysqli_fetch_assoc($fetch_language_run))
                    {
                        $condition="";
                        if($row['p_logo_transparancy']==1)
                        {
                            $condition="checked";
                        }
                    ?>

                    <input type="checkbox" <?php echo $condition; ?> name="p_ltransparancy" value="<?php echo $row['p_logo_transparancy'];?>"  style="margin-top:15px;" placeholder="Prices">
                    <?php
                    }
                    ?>
                </div>
                </div>
                <!-- logo Transparancy End-->
                <br>
                <!-- Resolution-->
                <div class="row">
                <div class="col-6">
                    <p style="margin-top:10px;">High Resolution</p>
                </div>
                <div class="col-6">
                <?php
                    $fetch_language="SELECT * FROM premium_gig where p_gig_id='{$updation_id}'";
                    $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
                    while($row=mysqli_fetch_assoc($fetch_language_run))
                    {
                        $condition="";
                        if($row['p_high_resolution']==1)
                        {
                            $condition="checked";
                        }
                    ?>

                    <input type="checkbox" <?php echo $condition; ?> name="p_hresolution" value="<?php echo $row['p_high_resolution'];?>" style="margin-top:15px;" placeholder="Prices">

                    <?php
                    }
                    ?>
                </div>
                </div>
                <!--Resolution End-->
                <br>
                <!-- 3D Mockup-->
                <div class="row">
                    <div class="col-6">
                        <p style="margin-top:10px;">3D Mockup</p>
                    </div>
                    <div class="col-6">
                    <?php
                    $fetch_language="SELECT * FROM premium_gig where p_gig_id='{$updation_id}'";
                    $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
                    while($row=mysqli_fetch_assoc($fetch_language_run))
                    {
                        $condition="";
                        if($row['p_3d_mockup']==1)
                        {
                            $condition="checked";
                        }
                    ?>

                    <input type="checkbox" <?php echo $condition; ?> name="p_dmockup" value="<?php echo $row['p_3d_mockup'];?>"  style="margin-top:15px;" placeholder="Prices">
                
                    <?php
                    }
                    ?>
                    </div>
                    </div>
                <!--3D Mockup End-->
                <br>
                <!-- Stationary Design-->
                <div class="row">
                <div class="col-6">
                    <p style="margin-top:10px;">Stationary Designs</p>
                </div>
                <div class="col-6">
                <?php
                    $fetch_language="SELECT * FROM premium_gig where p_gig_id='{$updation_id}'";
                    $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
                    while($row=mysqli_fetch_assoc($fetch_language_run))
                    {
                        $condition="";
                        if($row['p_stationary_design']==1)
                        {
                            $condition="checked";
                        }
                    ?>

                    <input type="checkbox" <?php echo $condition; ?> name="p_sdesign" value="<?php echo $row['p_stationary_design'];?>"  style="margin-top:15px;" placeholder="Prices">
                    <?php
                    }
                    ?>
                </div>
                </div>
                <!--Stationary Design end-->
                <br>
                <!-- Social Media Kit-->
                <div class="row">
                    <div class="col-6">
                        <p style="margin-top:10px;">Social Media Kit</p>
                    </div>
                    <div class="col-6">
                    <?php
                    $fetch_language="SELECT * FROM premium_gig where p_gig_id='{$updation_id}'";
                    $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
                    while($row=mysqli_fetch_assoc($fetch_language_run))
                    {
                        $condition="";
                        if($row['p_social_kit']==1)
                        {
                            $condition="checked";
                        }
                    ?>
                    
                    <input type="checkbox" <?php echo $condition; ?> name="p_smedia" value="<?php echo $row['p_social_kit'];?>" style="margin-top:15px;" placeholder="Prices">
                    
                    <?php
                    }
                    ?>
                    </div>
                    </div>
                <!--Social Meida kit End-->
                <br>
                <!-- My vector kit-->
                <div class="row">
                <div class="col-6">
                    <p style="margin-top:10px;">My Vector Kit</p>
                </div>
                <div class="col-6">
                <?php
                    $fetch_language="SELECT * FROM premium_gig where p_gig_id='{$updation_id}'";
                    $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);    
                    while($row=mysqli_fetch_assoc($fetch_language_run))
                    {
                        $condition="";
                        if($row['p_vector_kit']==1)
                        {
                            $condition="checked";
                        }
                    ?>

                    <input type="checkbox" <?php echo $condition; ?> name="p_smedia" value="<?php echo $row['p_vector_kit'];?>" style="margin-top:15px;" placeholder="Prices">

                    <?php
                    }
                    ?>
                </div>
                </div>
                <!--My Vector Kit End-->

            </center>
        
        </div>
        </div><!-- col end-->
        <div class="row justify-content-end">
            <div class="col-1">
            <br>
            <input type="submit" class="custom-btn" id="GStandardMonatoryBtn" value="Continue">
            </div>
        </div>
    </div><!-- Row End-->
<br><br>
</div><!-- Container End-->
</form>


<!-- ProgressBar last-->
<nav id="FinishProgressBar" class="navbar navbar-expand-lg navbar-light bg-white border border-bottom-dark"
style="margin-top:-25px;padding:20px 0px 5px 0px">
<div class="container-fluid">
    <div class=" navbar-collapse" id="navbarSupportedContent">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 col-12">
                    <ol class="ProgressBar">
                        <li style="color:rgb(35, 14, 158);font-weight: bolder;"><span class="ProgressCircle"
                                style="background-color:rgb(35, 14, 158);color:white;border:1px solid rgb(35, 14, 158);">1</span>
                            Banner & Title ></li>
                        <li style="color:rgb(35, 14, 158);font-weight: bolder;"><span class="ProgressCircle"
                                style="background-color:rgb(35, 14, 158);color:white;border:1px solid rgb(35, 14, 158);">2</span>
                            Standards & Monatory Policy ></li>
                        <li style="color:rgb(35, 14, 158);font-weight: bolder;"><span class="ProgressCircle" style="background-color:rgb(35, 14, 158);color:white;border:1px solid rgb(35, 14, 158);">3</span> Finish ></li>
                    </ol>
                </div>
                <div class="col-lg-2 col-12" style="margin-top:-10px">
                    <span>Completion Rate:<span>100%</span></span>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar"
                            style="width: 100%;background-color:rgb(35, 14, 158);" aria-valuenow="25"
                            aria-valuemin="50" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</nav>
<!-- progress bar For Gig End-->

<!-- done Box-->    

    <div class="container" id="FinishMessage">
        <br>
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card h-100 w-100 border-0">
                    <img src="../hardcode_images/congratulation.png" alt="" srcset="" height="250px">
                    <p style="text-align:center;margin-top:20px" class="p-2">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure magni, neque et porro alias voluptatum ipsum saepe praesentium, vitae consectetur fugiat, ipsam dicta sed incidunt facere eos! Nostrum, deserunt illo?
                    </p>
                    <br>
                    <a href="freelancer_dashboard.html" class="custom-btn" style="text-align:center;border-radius:0%;border:0;width:100%;margin-left:0px;color:white;">Finish</a>
                </div>
            </div>
        </div>
    </div>

<!-- done box End-->



    <!-- Custom Javacript-->
    <script src="../asset/custom/gigCustomization.js"></script>
    <!-- javascript Linke -->
    <script src="../asset/js/bootstrap.js"></script>




</body>
</html>