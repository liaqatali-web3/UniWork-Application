<?php

include "../BackendLogic/url.php";
include "../BackendLogic/database_connectivity.php";
session_start();
if($_SESSION['Role_redirect']!="2")
{
    header("location:");
  }
  
?>

<!DOCTYPE php>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Profile</title>
    <link rel="shortcut icon" href="../hardcode_images/cusit-logo.png" type="image/x-icon">
    <!-- bootstrap Linke -->
    <link rel="stylesheet" href="../asset/css/bootstrap.css">
    <!-- Custom css-->
    <link rel="stylesheet" href="../asset/custom/custom.css">
    <!-- icon link-->
    <link rel="stylesheet" href="../https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  </head>
<body>

    <!-- navbar  -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border border-bottom-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php"><span class="title normal_text_color">Cusit Fiverr</sapn><sub style="font-size:11px;font-family: Arial, Helvetica, sans-serif;">Buyer Profile</sub></a>

                <!-- Buyer navigation-->
                <div>
                <a href="client_main_page.php" class="link-text" style="font-size:15px;">Home</a>
                <a href="client_project_dashboard.php" class="link-text" style="font-size:15px;">Project DashBoard</a>
                <a href="client_security.php" class="link-text" style="font-size:15px;">Security</a>
                <!-- <a href="client_texation.php" class="link-text" style="font-size:15px;">Texation</a>
                <a href="client_payment.php" class="link-text" style="font-size:15px;">Payment</a> -->
                <a href="../BackendLogic/logout.php" class="link-text" style="font-size:15px;">Signout</a>
                </div>
                <!-- Buyer navigation End-->

        </div>
    </nav>
    <!-- navbar end-->

    <div class="container">

        <div class="row justify-content-center mt-5">
            <div class="col-lg-7 col-12">
                <form action="../BackendLogic/buyerlogic/buyer_profile.php" method="post" enctype="multipart/form-data" class="card p-5">    
                    <center>
                        <?php
                        $sql="SELECT * FROM buyer where b_email='{$_SESSION['Email_redirect']}'";
                        $sql_run=mysqli_query($DatabaseConnect,$sql);
                        while($row=mysqli_fetch_assoc($sql_run))
                        {
                            if($row['b_image']!="null")
                            {

                            
                        ?>
                        <img src="../BackendLogic/buyerlogic/image/<?php echo $row['b_image']; ?>" alt="" style="width:100px;height:100px;border-radius:50%">
                        <div class="transpart_custom_bg"  style="height:100px; width:100px;border-radius:50%;opacity:0.9;position:relative;top:-100px"><i class="fa fa-camera" style="color:white;font-size:40px;margin-top:30px"></i>
                        <input type="file" name="image">
                        
                        

                        <?php
                            }
                            else
                            {
                                echo "<img src='../BackendLogic/buyerlogic/image/default.png' alt='' style='width:100px;height:100px;border-radius:50%'>";
                                echo "<div class='transpart_custom_bg'  style='height:100px; width:100px;border-radius:50%;opacity:0.9;position:relative;top:-100px'><i class='fa fa-camera' style='color:white;font-size:40px;margin-top:30px'></i>";
                                echo "<input type='file' name='image'>";


                            }
                           }
                        ?>

                       </div>    
                        <!-- First and Last Name Start -->
                        <div class="row" style="margin-top: -75px;">
                            <div class="col-lg-6 col-12">
                                First Name <br>
                                <?php
                                $sql="SELECT * FROM buyer where b_email='{$_SESSION['Email_redirect']}'";
                                $sql_run=mysqli_query($DatabaseConnect,$sql);
                                while($row=mysqli_fetch_assoc($sql_run))
                                {
                                ?>
                                <input type="text" value="<?php echo $row['b_firstname'] ?>" name="firstname" class="InputField" style="width:100%" placeholder="Example: Liaqat ">
                                <input type="text" name="identification" value="<?php echo $row['b_id']; ?>" style="display:none" >

                                <?php
                                }
                                if(isset($_GET['firstname_Error']))
                                {
                                    echo "<i style='color:red'>".$_GET['firstname_Error']."</i>";
                                }
                                ?>
                            </div>
                            <div class="col-lg-6 col-12">
                            <?php
                                $sql="SELECT * FROM buyer where b_email='{$_SESSION['Email_redirect']}'";
                                $sql_run=mysqli_query($DatabaseConnect,$sql);
                                while($row=mysqli_fetch_assoc($sql_run))
                                {
                                ?>
                                Last Name <br>
                                <input type="text" value="<?php echo $row['b_lastname']; ?>" name="lastname" class="InputField" style="width:100%" placeholder="Example: Ali">
                                <?php
                                }

                                if(isset($_GET['lastname_Error']))
                                {
                                    echo "<i style='color:red'>".$_GET['lastname_Error']."</i>";
                                }
                                ?>
                            </div>
                        </div>
                        <!-- First and Last Name End -->
                        <br>
                        <!-- Phone Number and Email Address Start -->
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                Phone Number <br>
                                <?php
                                $sql="SELECT * FROM buyer where b_email='{$_SESSION['Email_redirect']}'";
                                $sql_run=mysqli_query($DatabaseConnect,$sql);
                                while($row=mysqli_fetch_assoc($sql_run))
                                {
                                ?>
                                <input type="text" value="<?php echo $row['b_phone']; ?>" name="phone" class="InputField" style="width:100%" placeholder="Example: 0303.......92">
                                <?php
                                }
                                if(isset($_GET['phone_Error']))
                                {
                                    echo "<i style='color:red'>".$_GET['phone_Error']."</i>";
                                }
                                ?>
                            </div>
                            <div class="col-lg-6 col-12">
                                Email Address <span style="font-size:11px;color:grey">Second One Optional</span><br>
                                <?php
                                $sql="SELECT * FROM buyer where b_email='{$_SESSION['Email_redirect']}'";
                                $sql_run=mysqli_query($DatabaseConnect,$sql);
                                while($row=mysqli_fetch_assoc($sql_run))
                                {
                                ?>
                                <input type="text" value="<?php echo $row['b_optional_email']; ?>" name="email" class="InputField" style="width:100%" placeholder="Example: Ali">
                                <?php
                                }
                                if(isset($_GET['email_Error']))
                                {
                                    echo "<i style='color:red'>".$_GET['email_Error']."</i>";
                                }
                                ?>
                            </div>
                        </div>
                        <!-- Phone and Email End -->

                        <br>
                        <!-- country -->
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                Country <br>
                                <?php
                                $sql="SELECT * FROM buyer where b_email='{$_SESSION['Email_redirect']}'";
                                $sql_run=mysqli_query($DatabaseConnect,$sql);
                                while($row=mysqli_fetch_assoc($sql_run))
                                {
                                ?>
                                <input type="text" value="<?php echo $row['b_country']; ?>" name="country" class="InputField" style="width:100%" placeholder="Example: Pakistan">
                                <?php
                                }
                                if(isset($_GET['country_Error']))
                                {
                                    echo "<i style='color:red'>".$_GET['country_Error']."</i>";
                                }
                                ?>
                            </div>
                            <div class="col-lg-6 col-12">
                                Province<br>
                                <?php
                                $sql="SELECT * FROM buyer where b_email='{$_SESSION['Email_redirect']}'";
                                $sql_run=mysqli_query($DatabaseConnect,$sql);
                                while($row=mysqli_fetch_assoc($sql_run))
                                {
                                ?>
                                <input type="text" value="<?php echo $row['b_province']; ?>" name="province" class="InputField" style="width:100%" placeholder="Example: KpK">
                                <?php
                                }
                                if(isset($_GET['province_Error']))
                                {
                                    echo "<i style='color:red'>".$_GET['province_Error']."</i>";
                                }
                                ?>
                            </div>
                        </div>
                        <!-- country -->

                        <br>
                        <!-- business and data of brith -->
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                Date Of Brith <br>
                                <?php
                                $sql="SELECT * FROM buyer where b_email='{$_SESSION['Email_redirect']}'";
                                $sql_run=mysqli_query($DatabaseConnect,$sql);
                                while($row=mysqli_fetch_assoc($sql_run))
                                {
                                ?>
                                <input type="type" value="<?php echo $row['b_dob']; ?>" name="brith" class="InputField" style="width:100%" placeholder="Example: Pakistan">
                                <?php
                                }
                                if(isset($_GET['brith_Error']))
                                {
                                    echo "<i style='color:red'>".$_GET['brith_Error']."</i>";
                                }
                                ?>
                            </div>
                            <div class="col-lg-6 col-12">
                                Business<br>
                                <select name="business" id="" class="InputField" style="width:100%">
                                    <option value="">Business Type</option>
                                    <option value="Web Development">Web Development</option>
                                    <option value="Android Development">Android Development</option>
                                    <option value="Desktop Development">Desktop Development</option>
                                    <option value="Logo Design">Logo Design</option>
                                    <option value="Content Writing">Content Writing</option>
                                    <option value="Video Animation">Video Animation</option>
                                    <option value="Other">Other</option>
                                    
                                </select>
                                <?php
                                $sql="SELECT * FROM buyer where b_email='{$_SESSION['Email_redirect']}'";
                                $sql_run=mysqli_query($DatabaseConnect,$sql);
                                while($row=mysqli_fetch_assoc($sql_run))
                                {
                                echo "Selected:".$row['business']."<br>"; 
                                
                                ?>
                                <input type="text" name="old_business" value="<?php echo $row['business']; ?>" style="display:none">
                                <?php
                                }
                                if(isset($_GET['business_Error']))
                                {
                                    echo "<i style='color:red'>".$_GET['business_Error']."</i>";
                                }

                                if(isset($_GET['message']))
                                {
                                    if($_GET['message']==1)
                                    {
                                        echo "<script> alert('You have Successfully Updated Your Profile. Thank You')</script>";
                                    }
                                    else if($_GET['message']==0)
                                    {
                                       echo "<script> alert('Error Occure Please Try again. Thank You')</script>";
                                    }
                                }

                                ?>
                            </div>
                        </div>
                        <!-- country -->
                        <br><br>
                    <input type="submit" name="upload" class="custom-btn" value="Upload">
                    </center>
                </form>
            </div>
        </div>
    </div>



<br><br>
    
<!-- Custom Javacript-->
<script src="../asset/custom/custom.js"></script>
<!-- javascript Linke -->
<script src="../asset/js/bootstrap.js"></script>
</body>
</php>
