<?php

include 'database_connectivity.php';
include 'url.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="../hardcode_images/cusit-logo.png" type="image/x-icon">
    <!-- bootstrap Linke -->
    <link rel="stylesheet" href="../asset/css/bootstrap.css">
    <!-- Custom css-->
    <link rel="stylesheet" href="../asset/custom/custom.css">
    <!-- icon link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  </head>
<body >
    
    <!-- navbar  -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border border-bottom-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html"><span class="title normal_text_color">Cusit Fiverr</sapn><sub style="font-size:11px;font-family: Arial, Helvetica, sans-serif;">Login</sub></a>
        </div>
    </nav>
    <!-- navbar end-->

    <?php
        $verifcation_message='';
        //check the email : we go email from gamil ---> identity
        $check_verfication="SELECT * from signup where email='{$_SESSION['Email']}'";
        $check_verfication_run=mysqli_query($DatabaseConnect,$check_verfication);
        
        if(mysqli_num_rows($check_verfication_run))
        {
            $row=mysqli_fetch_array($check_verfication_run);
            if($row['verification_token']==1)
            {
                $verifcation_message="Verified Now You Can Login";
                $status=1;
            }
            else
            {
                $verifcation_message="Verify Your Account First";
                $status=0;
            }
        }

    ?>

    <br><br><br><br>
    <div class="container">
        <center>
                   <?php
                        if(isset($_GET['Account_Existance']))
                        {
                        echo "<br> <span style='color:red;font-size:15;font-weight:bold'>".$_GET['Account_Existance']."</span><br>";
                        }
                    ?>
        </center>
         <div class="row justify-content-center">
            <div class="col-lg-6 col-12">
                <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="card p-4" style="box-shadow:2px 2px 2px 1px 10px rgb(250, 250, 250)">
                    <center>
                    <h5 style="color:green" class="common-title"><?php echo $verifcation_message; ?></h5>
                    <br>
                    Enter Your Email<br>
                    <input type="text" name="Email" class="InputField w-100" placeholder="Verified Email">
                    <?php
                        if(isset($_GET['Email_Error']))
                        {
                        echo "<br> <span style='color:red;font-size:15;font-weight:bold'>".$_GET['Email_Error']."</span><br>";
                        }
                    ?>
                    <br><br>
                    Enter Your Password<br>
                    <input type="text" name="Password" class="InputField w-100" placeholder="Correct Password">
                    <?php
                        if(isset($_GET['Password_Error']))
                        {
                        echo "<br> <span style='color:red;font-size:15;font-weight:bold'>".$_GET['Password_Error']."</span><br>";
                        }
                    ?>

                    <br><br><br>
                    <input type="submit" class="custom-btn" name="login">
                    </center>
                </div>
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
</html>

<?php

if(isset($_POST['login']))
{
    // validation Start From here
    function Input_Validation($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $Email=$Password="";
    $Email_Error=$Password_Error="";
    
    if(empty($_POST['Email']))
    {
       $Email_Error="Email is Required";
    }   
    else
    {
        $Email=Input_Validation($_POST['Email']);
    }
    

    if(empty($_POST['Password']))
    {
       $Password_Error="Password is Required";
    }   
    else
    {
       $Password=Input_Validation($_POST['Password']);
    }

    $Password=md5($Password);


    if(!$Email_Error =="" || !$Password_Error=="" || $status!=1)
    {
        header("location:BackendLogic/SignIn.php?Email_Error=$Email_Error&Password_Error=$Password_Error");
    }
    else
    {
        $email_existance="SELECT * from signup where email='{$Email}' and pass='{$Password}'";
        $email_existance_run=mysqli_query($DatabaseConnect,$email_existance);

        if(mysqli_num_rows($email_existance_run)>0)
        {
        
        $get_row=mysqli_fetch_array($email_existance_run);
            
        $_SESSION['Password_redirect']=$get_row['pass'];
        $_SESSION['Email_redirect']=$get_row['email'];
        $_SESSION['Role_redirect']=$get_row['role'];
           
        if($get_row['role']==1)
        {
            header("location:seller/freelancer_main_page.php");
        }
        else
        {
            header("location:buyer/client_main_page.php");

        }

        }
        else
        {
            $Connot_Exist="Sorry Your Account Does't Exist";
            header("location:BackendLogic/SignIn.php?Account_Existance=$Connot_Exist");            
        }

    }


}
?>