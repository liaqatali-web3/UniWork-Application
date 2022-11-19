<!-- Get Client SignUp Data -->

<!-- Buyer == 1 -->
<!-- Seller == 2 -->
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require 'vendor/autoload.php';
include 'url.php';
include 'database_connectivity.php';




//---------------------------------------//

    session_start();

//----------------------------------------//
  


    $Email_Error=$Password_Error=$Role_Error=$Email_Exist= "";
    $ClientEmail=$ClientPassword=$ClientRole= "";
    
    // validation Start From here
    function Input_Validation($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


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
        Hi Dear, We are welcome you to CusitFiveer. Keep Your Cardentials hide from 
        any untrust person because he can steal everythings which you own. 
        <br><br>
        Follow The CusitFiveer Rule And Regulation To Make Successful Your Account.
    </p>
    <br>
    <center>
    <a 
    style='border:1px solid white;
    text-align:center;
    margin: auto;
    padding:10px;
    border-radius:5px;
    background-color:blue;
    color:white;'
    href='localhost/fiverr/BackendLogic/verfication-email.php?token=$verification_code&identity=$email'>Click Here To Verify</a>
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
    header("location:signup.php");
}
 
 
}



    
// fetching data from form.
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {


     if(empty($_POST['SignUpEmail']))
     {
        $Email_Error="Email is Required";
     }   
     else
     {
        $ClientEmail=Input_Validation($_POST['SignUpEmail']);
     }

     if(empty($_POST['SignUpPassword']))
     {
        $Password_Error="Password is Required";
     }   
     else
     {
        $ClientPassword=Input_Validation($_POST['SignUpPassword']);
     }
     

     if(empty($_POST['SignUpClient']))
     {
        $Role_Error="Role is Required";
     }   
     else
     {
        $ClientRole=Input_Validation($_POST['SignUpClient']);
     }

     $selection="SELECT * FROM signup where email='$ClientEmail'";
     $run=mysqli_query($DatabaseConnect,$selection);
     if(mysqli_num_rows($run)>0)
     {
         $Email_Exist="Entered Email Already Exist";
     }
    // if Values is not set in Input Field so it will redirect to index page
    if(!$Email_Error=="" || !$Password_Error=="" || !$Role_Error=="" || !$Email_Exist=="")
    {
         header("Location:signup.php?Password_Error=$Password_Error&Role_Error=$Role_Error&Email_Error=$Email_Error&Email_Exist=$Email_Exist");
    }
    else
    {
    $ClientPassword=md5($ClientPassword);
    $Verfication_Code=md5(random_int(1,1000));
    $Verfication_Token=0;
    ///////// insertion of Data into SignUp Table ///////////////////
    
    //////////// Sent Email ///////////////
    
    $sentORnot=send_email($ClientEmail,$Verfication_Code);
    if($sentORnot)//if email sent if body will be execute otherwise else.
    {
    //insertion in signup table to register user .
    $current_date=date("y-m-d");
    $insertion_query="INSERT INTO signup(email,pass,role,verification_code,verification_token,signup_date) values('{$ClientEmail}','{$ClientPassword}',{$ClientRole},'{$Verfication_Code}',{$Verfication_Token},'{$current_date}')";
    $sql_run=mysqli_query($DatabaseConnect,$insertion_query);
    
    if($sql_run)
    {
        $_SESSION['Email']=$ClientEmail;
        
        if($ClientRole==1)
        {
        $insertion_seller="INSERT INTO seller(s_name,s_image,s_story,s_email,s_phone,s_description,s_website) values('null','null','null','{$ClientEmail}','null','null','null')";
        mysqli_query($DatabaseConnect,$insertion_seller);
        }
        else
        {
            $insertion_buyer="INSERT INTO buyer(b_name,b_phone,b_email,b_country,b_province,b_dob,business,b_image,b_firstname,b_lastname,b_optional_email) values('null','null','{$ClientEmail}','null','null','null','null','null','null','null','null')";
            mysqli_query($DatabaseConnect,$insertion_buyer);
    
        }


        
        header("location:BackendLogic/signin.php");

    }


    }
    
    else
    {
    $connection="connection";
    header("location:index.php?network=$connection");            
    }
 
    
    
    
    ////////// insertion End  ///////////////////////////////////////
    }
    }






?>

