<?php

include '../BackendLogic/database_connectivity.php';
include '../BackendLogic/url.php';
session_start();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Change</title>
    <link rel="shortcut icon" href="../hardcode_images/cusit-logo.png" type="image/x-icon">
    <!-- bootstrap Linke -->
    <link rel="stylesheet" href="../asset/css/bootstrap.css">
    <!-- Custom css-->
    <link rel="stylesheet" href="../asset/custom/custom.css">
    <!-- icon link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
</head>
<body class='bg-primary'>
        <!-- Top Banner Start -->
        <div class="banner-shield"></div>
        <video  autoplay muted loop style="margin-top:-14px;width:100%">
            <source src="../video/main_video2.mp4" type="video/mp4" width='100%'>
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
            <a href='../index.php' class="text-white" style="border:1px solid white;">Home</a>
            <a href='../signin.php' class="text-white" style="border:1px solid white;">Sign-In</a>
          </div>
            
          </div>
        </div>
      </nav>



<!-- SignIn Form-->

<div class="SignUp-Form" style="margin-top:100px;margin-bottom:-10px">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-sm-12">  
        
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="get" class="bg-grey Form_up">
      <center>
          <?php
                        if(isset($_GET['empty']))
                        {
                        echo "<br> <span style='background-color:red;color:white;padding:8px;font-size:15;font-weight:bold;border:1px solid white;border-radius:5px;'>Sorry Field Is Empty</span><br>";
                        }

                        if(isset($_GET['success']))
                        {
                        echo "<br> <span style='background-color:green;color:white;padding:8px;font-size:15;font-weight:bold;border:1px solid white;border-radius:5px;'>Password Has Been Changed</span><br>";
                        }


                        if(isset($_GET['error']))
                        {
                        echo "<br> <span style='background-color:red;color:white;padding:8px;font-size:15;font-weight:bold;border:1px solid white;border-radius:5px;'>Sorry We Could't Change Your Password</span><br>";
                        }
  
            ?>
            
          </center>
        <br>
        <h3 class="form_title">Change Password</h3>        
          <br>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Enter New Password</label>
            <input type="password" name="password" placeholder="Strong Password Improve Can Your Security" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <br>
          <input type="submit" name="change" value="Change" class="btn form_btn">
        </form>
  
      </div>
    </div>
  </div>
  </div>

</body>
</html>



<?php

if(isset($_GET['change']))
{
    if(!empty($_GET['password']))
    {
        $password=md5($_GET['password']);
        $sql="UPDATE signup SET pass='{$password}' WHERE email='{$_SESSION['email_for_verification']}'";
        $sql_run=mysqli_query($DatabaseConnect,$sql);
        if($sql_run)
        {

            header("location:changepassword.php?success=1");            
        }
        else
        {
            header("location:changepassword.php?error=1");            

        }
    }
    else
    {
        header("location:changepassword.php?empty=1");
    }
}
    

?>