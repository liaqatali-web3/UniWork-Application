<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="shortcut icon" href="hardcode_images/cusit-logo.png" type="image/x-icon">
    <!-- bootstrap Linke -->
    <link rel="stylesheet" href="asset/css/bootstrap.css">
    <!-- Custom css-->
    <link rel="stylesheet" href="asset/custom/custom.css">
    <!-- icon link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
</head>
<body class='bg-primary'>
        <!-- Top Banner Start -->
        <div class="banner-shield"></div>
        <video  autoplay muted loop style="margin-top:-14px;width:100%">
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
            <a href='index.php' class="text-white" style="border:1px solid white;">Home</a>
            <a href='signup.php' class="text-white" style="border:1px solid white;">Sign-Up</a>
          </div>
            
          </div>
        </div>
      </nav>



<!-- SignIn Form-->

<div class="SignUp-Form" style="margin-top:100px;margin-bottom:-10px">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-sm-12">  
      <form action="indexsignin.php" method="post" class="bg-grey Form_up">
          <center>
          <?php
                        if(isset($_GET['verify']))
                        {
                        echo "<br> <span style='background-color:red;color:white;padding:8px;font-size:15;font-weight:bold;border-radius:5px;'>".$_GET['verify']."</span><br>";
                        }
            ?>
            
          </center>

          <h3 class="form_title">Sign-In</h3>
          <center>
                   <?php
                        if(isset($_GET['Account_Existance']))
                        {
                        echo "<br> <span style='background-color:red;color:white;padding:8px;font-size:15;font-weight:bold;border:1px solid white;border-radius:5px;'>".$_GET['Account_Existance']."</span><br>";
                        }
                    ?>
          </center>
        
          <br>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="Email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <?php
                        if(isset($_GET['Email_Errors']))
                        {
                        echo "<br> <span style='color:red;font-size:15;font-weight:bold'>".$_GET['Email_Errors']."</span><br>";
                        }
            ?>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="Password" class="form-control" id="exampleInputPassword1">
            <?php
                        if(isset($_GET['Password_Errors']))
                        {
                        echo "<br> <span style='color:red;font-size:15;font-weight:bold'>".$_GET['Password_Errors']."</span><br>";
                        }
            ?>
          </div>
          <a href="forget_password/forgetpassword.php" style="font-size:13px;color:white;text-decoration:underline">Forget Password</a>
          <br>
          <br>
          <input type="submit" name="login" value="Login" class="btn form_btn">
        </form>
  
      </div>
    </div>
  </div>
  </div>











</body>
</html>