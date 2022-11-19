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
    <title>Forget</title>
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





      <div class="SignUp-Form" style="margin-top:50px;margin-bottom:-10px">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-sm-12">  
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="GET" class="bg-grey Form_up">

      <?php
            if(isset($_GET['empty']))
            {
                echo "<span style='background-color:red;padding:8px;border:1px solid white;font-weight:bold'>Enter Verification Code Then Go Ahead</span><br>";
            }


            if(isset($_GET['notmatch']))
            {
                echo "<span style='background-color:red;padding:8px;border:1px solid white;font-weight:bold'>Sorry Enter Correct Verification Code</span><br>";
            }
        ?>
        <br>
        <p style='color:black;background-color:white;padding:5px;border-radius:8px;'>
            We have send verification code to your email address please check your email and Enter that code here to change your password.
        </p>
          <h3 class="form_title">Verification</h3>
          <div class="mb-3">
            <label for="exampleInputEmail1"  class="form-label">Enter Verification</label>
            <input type="text" placehoder="Enter You Account Email Here" name="verification" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
            <br><br>
          <input type="submit" name="verify" value="Verify" class="btn form_btn">
        </form>
  
      </div>
    </div>
  </div>
  </div>

</body>
</html>

<?php

    if(isset($_GET['verify']))
    {
        if(!empty($_GET['verification']))
        {
            $verification_code_here=$_GET['verification'];

            $sql="SELECT * FROM signup where email='{$_SESSION['email_for_verification']}'";
            $sql_run=mysqli_query($DatabaseConnect,$sql);
            while($row=mysqli_fetch_assoc($sql_run))
            {
                if($row['forget_code']==$verification_code_here)
                {
                    header('location:changepassword.php');
                }
                else
                {
                    
                    header('location:verification_code.php?notmatch=1');

                }
            }


        }
        else
        {

        header('location:verification_code.php?empty=1');

        }

    }

?>

