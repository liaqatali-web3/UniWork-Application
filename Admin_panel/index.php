<?php

  include("../BackendLogic/database_connectivity.php");
  include("../BackendLogic/url.php");

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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
          <h1 class="common-title" style="color:white;">Admin Login</h1>
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

            
          </div>
        </div>
      </nav>



<!-- SignIn Form-->

<div class="SignUp-Form" style="margin-top:100px;margin-bottom:-10px">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-sm-12">  
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="get" class="bg-grey Form_up">
          <h3 class="form_title">Sign-In</h3>
          <center>
                   <?php
                        if(isset($_GET['error']))
                        {
                        echo "<br> <span style='background-color:red;color:white;padding:8px;font-size:15;font-weight:bold;border:1px solid white;border-radius:5px;'>Please Enter Correct Name or Password</span><br>";
                        }
                    ?>
          </center>
        
          <br>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Admin Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="Password" class="form-control" id="exampleInputPassword1">
          </div>
          <input type="submit" name="login" value="Login" class="btn form_btn">
        </form>
  
      </div>
    </div>
  </div>
  </div>

</body>
</html>


<?php

if(isset($_GET['login']))
{
    $sql="SELECT * FROM admin_signin";
    $sql_run=mysqli_query($DatabaseConnect,$sql);
    while($row=mysqli_fetch_assoc($sql_run))
    {
        if($row['name']==$_GET['name'] && $row['passwrod']==$_GET['Password'])
        {
            session_start();
            $_SESSION['admin_login']=1;
            header("location:dashboard.php");
        }
        else
        {
            header("location:admin_panel/index.php?error=1");
        }
    }

}

?>