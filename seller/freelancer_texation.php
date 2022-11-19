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
            <a class="navbar-brand" href="freelancer_main_page.php"><span class="title normal_text_color">Cusit Fiverr</sapn><sub style="font-size:11px;font-family: Arial, Helvetica, sans-serif;">Seller Texation</sub></a>

                <!-- Buyer navigation-->
                <div>
                <a href="freelancer_main_page.php" class="link-text" style="font-size:15px;">Home</a>
                <a href="freelancer_dashboard.php" class="link-text" style="font-size:15px;">Dashboard</a>
                <a href="freelancer_project_dashboard.php" class="link-text" style="font-size:15px;">Project DashBoard</a>
                <a href="freelancer_Profile_creation.php" class="link-text" style="font-size:15px;">Profile</a>
                <a href="freelancer_Security.php" class="link-text" style="font-size:15px;">Security</a>
                <a href="freelancer_payment.php" class="link-text" style="font-size:15px;">Payment</a>
                <a href="../BackendLogic/logout.php" class="link-text" style="font-size:15px;">Signout</a>
                </div>
                <!-- Buyer navigation End-->

        </div>  
    </nav>
    <!-- navbar end-->


<br><br>
    
<!-- Custom Javacript-->
<script src="../asset/custom/custom.js"></script>
<!-- javascript Linke -->
<script src="../asset/js/bootstrap.js"></script>
</body>
</html>
