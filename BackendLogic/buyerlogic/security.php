<?php


include '../database_connectivity.php';
include '../url.php';

if($_POST['pass']!=null)
{

    $new_password=md5($_POST['pass']);
    $identifier=$_POST['identifier'];

    $sql="UPDATE signup SET pass='{$new_password}' where email='{$identifier}'";
    mysqli_query($DatabaseConnect,$sql);

    $message="<script> alert('Successfully Updated Your Password')</script>";
    header("location:buyer/client_security.php?back=$message");

}
else
{
    $message="Please Enter some characters and special characters";
    header("location:buyer/client_security.php?back=$message");
}


?>