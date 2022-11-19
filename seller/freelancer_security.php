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
    <title>Seller Security</title>
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
            <a class="navbar-brand" href="freelancer_main_page.php"><span class="title normal_text_color">Cusit Fiverr</sapn><sub style="font-size:11px;font-family: Arial, Helvetica, sans-serif;">Seller Security</sub></a>

                <!-- Buyer navigation-->
                <div>
                <a href="freelancer_main_page.php" class="link-text" style="font-size:15px;">Home</a>
                <a href="freelancer_dashboard.php" class="link-text" style="font-size:15px;">Dashboard</a>
                <a href="freelancer_project_dashboard.php" class="link-text" style="font-size:15px;">Project DashBoard</a>
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
        <div class="col-lg-5 col-12">
            <div class="card p-3 pt-4" style="border-radius:2px;">
                <h5 class="common-title text-center">Security Recommandation</h5>
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
            <div class="col-6">
            <div class="card p-3" style="width:20rem">
                <h5 class="common-title text-center pt-2">Email Status</h5>
                <Center>
                <i class="fa fa-check" style="color:rgb(36, 36, 190);font-size:25px;"></i>
                <b style="font-family:Arial, Helvetica, sans-serif">Verified</b>
                </Center>
            </div>
            </div>
            <div class="col-6">
            <div class="card p-3" style="width:20rem">
                <h5 class="common-title text-center pt-2">Password Status</h5>
                <Center>
                <div>
                <i class="fa fa-check" style="color:rgb(36, 36, 190);font-size:25px;"></i>
                <b style="font-family:Arial, Helvetica, sans-serif">Strong</b>
                </div>

                <div class="d-none">
                    <i class="fa fa-close" style="color:rgb(36, 36, 190);font-size:25px;"></i>
                    <b style="font-family:Arial, Helvetica, sans-serif">Weak</b>
                </div>
    
                
                <div class="d-none">
                    <i class="fa fa-plus-square" style="color:rgb(36, 36, 190);font-size:25px;"></i>
                    <b style="font-family:Arial, Helvetica, sans-serif">Median</b>
                </div>
                </Center>
            </div>
            </div>
        </div>
        <br><br><br>
        <center>
        <div class="card p-4" style="width:30rem;border-radius:3px;">
        
            <center>
            <h5 class="common-title text-center">Change Password</h5>
            <hr><br>
            <form action="../BackendLogic/sellerlogic/security/security.php" method="post">
            <b>Enter Your New Password</b>
            <input type="text" name="pass" class="InputField w-100" placeholder="Include Special Characters like: @ # $ _ - ^ , . !">
            <?php
                if(isset($_GET['back']))
                {
                    echo "<i style='color:red'>".$_GET['back']."</i>";
                }
            ?>
            <br><br><br>
            <input type="text" value="<?php echo $_SESSION['Email_redirect']; ?>" name="identifier" style="display:none">
            <input type="submit" class="custom-btn" value="Change">
            </form>
            </center>
        </div>
        </center>
    </div>
</div>


<br><br>
    
<!-- Custom Javacript-->
<script src="../asset/custom/custom.js"></script>
<!-- javascript Linke -->
<script src="../asset/js/bootstrap.js"></script>
</body>
</html>
