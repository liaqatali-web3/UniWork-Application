<?php
include 'BackendLogic/database_connectivity.php';
include 'BackendLogic/url.php';
session_start();



$verifcation_message='';

$check_verfication="SELECT * from signup where email='{$_POST['Email']}'";
$check_verfication_run=mysqli_query($DatabaseConnect,$check_verfication);

if(mysqli_num_rows($check_verfication_run)>0)
{
    $row=mysqli_fetch_array($check_verfication_run);
    if($row['verification_token']==1)
    {
        $verifcation_message='Account is Verified';        
        $status=1;
    }
    else
    {
        $verifcation_message='Verify Your Account';
        $status=0;
    }
}


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


    if(!$Email_Error =="" || !$Password_Error=="" || $status==0)
    {
        header("location:signin.php?Email_Errors=$Email_Error&Password_Errors=$Password_Error&verify=$verifcation_message");
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
            $Connot_Exist="Your credential is Wrong";
            header("location:signin.php?Account_Existance=$Connot_Exist");            
        }

    }



?>