<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up</title>
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
        <video  autoplay muted loop style="margin-top:-33px;width:100%">
            <source src="video/main_video2.mp4" type="video/mp4" width='100%'>
        </video>
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
            <a href='signin.php' class="text-white" style="border:1px solid white;">Sign-in</a>
          </div>
            
          </div>
        </div>
      </nav>


<!-- SignUp Form-->
<div class="SignUp-Form mt-5">
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-5 col-sm-12">
      <!-- Form Start From Here -->
      <form action="BackendLogic/SignUp.php" method="post" class="bg-grey Form_up">
        <?php
            if(isset($_GET['network']))
            {
              echo "<br> <span style='background-color:red;color:white;padding:8px;font-size:15;font-weight:bold;border-radius:5px;'> Check Your Internet Connection Please </span>";
            }

            if(isset($_GET['Email_Exist']))
            {
              echo "<br> <span style='background-color:red;color:white;padding:8px;font-size:15;font-weight:bold;border-radius:5px;'>".$_GET['Email_Exist']."</span>";
            }
          ?>
        <h3 class="form_title">Sign-Up</h3>
        <br>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <?php
            if(isset($_GET['Email_Error']))
            {
              echo "<br> <span style='color:red;font-size:15;font-weight:bold'>".$_GET['Email_Error']."</span>";
            }
          ?>
          <input type="email" name="SignUpEmail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text text-white">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <?php
            if(isset($_GET['Password_Error']))
            {
              echo "<br> <span style='color:red;font-size:15;font-weight:bold'>".$_GET['Password_Error']."</span>";
            }
          ?>
          <input type="password" name="SignUpPassword" class="form-control" id="exampleInputPassword1">
        </div>

        <?php
            if(isset($_GET['Role_Error']))
            {
              echo "<br> <span style='color:red;font-size:15;font-weight:bold'>".$_GET['Role_Error']."</span>";
            }
          ?>
        <div class="mb-3 form-check">
          <input type="radio" name="SignUpClient" value="1" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">As a Seller</label>
        </div>
        <div class="mb-3 form-check">
          <input type="radio" name="SignUpClient" value="2" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">As a Buyer</label>
        </div>

        <br>
        <button type="submit" name="SignUp" class="btn form_btn">Sign Up</button>
      </form>

    </div>
  </div>
</div>
</div>
<!--SignUp Form End-->

    
</body>
</html>