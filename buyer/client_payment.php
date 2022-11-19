<?php
session_start();

include '../BackendLogic/url.php';
if($_SESSION['Role_redirect']!="2")
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
    <title>Payment</title>
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
            <a class="navbar-brand" href="client_main_page.php"><span class="title normal_text_color">Cusit Fiverr</sapn><sub style="font-size:11px;font-family: Arial, Helvetica, sans-serif;">Buyer Payment</sub></a>

                <!-- Buyer navigation-->
                <div>
                <a href="client_main_page.php" class="link-text" style="font-size:15px;">Home</a>
                <a href="client_project_dashboard.php" class="link-text" style="font-size:15px;">Project DashBoard</a>
                <a href="client_Profile_creation.php" class="link-text" style="font-size:15px;">Profile</a>
                <a href="client_Security.php" class="link-text" style="font-size:15px;">Security</a>
                <!-- <a href="client_Texation.php" class="link-text" style="font-size:15px;">Texation</a> -->
                <a href="../BackendLogic/logout.php" class="link-text" style="font-size:15px;border:1px solid blue">Signout</a>
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
