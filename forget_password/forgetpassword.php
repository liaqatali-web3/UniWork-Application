<?php
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\SMTP;
            use PHPMailer\PHPMailer\Exception;

    session_start();
    include '../BackendLogic/database_connectivity.php';
    include '../BackendLogic/url.php';
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





      <div class="SignUp-Form" style="margin-top:100px;margin-bottom:-10px">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-sm-12">  
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="GET" class="bg-grey Form_up">

      <?php
            if(isset($_GET['notfound']))
            {
                echo "<span style='background-color:red;padding:8px;border:1px solid white;font-weight:bold'>Sorry We Could't Found Your Account</span>";
            }

            if(isset($_GET['empty']))
            {
                echo "<span style='background-color:red;padding:8px;border:1px solid white;font-weight:bold'>Please Enter Your Account Email First</span>";
            }

            if(isset($_GET['connection']))
            {
                echo "<span style='background-color:red;padding:8px;border:1px solid white;font-weight:bold'>Check Your Internet Connection</span>";
            }
        ?>

        <br><br>
          <h3 class="form_title">Forget Password</h3>
          <div class="mb-3">
            <label for="exampleInputEmail1"  class="form-label">Email address</label>
            <input type="email" placehoder="Enter You Account Email Here" name="Email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
            <br><br>
          <input type="submit" name="login" value="Forget" class="btn form_btn">
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
        if(!empty($_GET['Email']))
        {
        
            $email=$_GET['Email'];
        
        $sql="SELECT * FROM signup where email='{$email}'";
        $sql_run=mysqli_query($DatabaseConnect,$sql);
        if(mysqli_num_rows($sql_run))
        {



            //Load Composer's autoloader
            require 'vendor/autoload.php';


                //Email Sending Funcation
                Function send_email($email,$verification_code)
                {  
                $mail = new PHPMailer(true);
                try {
                //Server settings
                $mail->SMTPDebug = false;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'cusitfiverr@gmail.com';                     //SMTP username
                $mail->Password   = 'hkpzzcuxtarxllqn';                               //SMTP password
                $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('cusitfiverr@gmail.com');
                $mail->addAddress($email);     //Add a recipient
                

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'CusitFiveer';
                $email_template="

                <h3 
                style='border:1px solid blue;
                text-align:center;
                padding:10px;
                color:blue;
                '>Welcome to CusitFiveer</h3>
                
                <p style='font-family: Arial, Helvetica, sans-serif;text-align:center'>
                    Hi Dear, We are welcome you to The CusitFiveer. Copy The below verification code and paste in verification form to continue password change process.  
                    <br><br>
                    Follow The CusitFiveer Rule And Regulation To Make Successful Your Account.
                </p>
                <br>
                <center>
                <span style='border:1px solid blue;padding:10px;'>
                   Verification Code: $verification_code 
                </span>
                </center>";
                //we change $url here if any issue come here.

                $mail->Body    = $email_template;

                if($mail->send())
                {
                    return true;
                }
                else
                {
                    return false;
                }

            } catch (Exception $e) {
                header("location:forgetpassword.php");
            }
            
            
            }

            $verification_code=random_int(1,10000);

            $sentORnot=send_email($_GET['Email'],$verification_code);
            
            if($sentORnot)
            {
                $update_forget_code="UPDATE signup SET forget_code='{$verification_code}' where email='{$_GET['Email']}'";
                $update_forget_code_run=mysqli_query($DatabaseConnect,$update_forget_code);
                if($update_forget_code_run)
                {
                header("location:verification_code.php");
                $_SESSION['email_for_verification']=$email;
                }
            }
            else
            {
                header('location:forgetpassword.php?connection=1');

            }




        }
        else
        {
            header('location:forgetpassword.php?notfound=1');
        }

        }// when field empty
        else
        {
            header('location:forgetpassword.php?empty=1');
            
        }

    }

?>

