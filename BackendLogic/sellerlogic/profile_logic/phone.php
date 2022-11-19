<?php


include '../../database_connectivity.php';
include '../../url.php';
session_start();

$phone=$_POST['phone'];

$sql="UPDATE seller SET s_phone='{$phone}' where s_email='{$_SESSION['Email_redirect']}'";

if(mysqli_query($DatabaseConnect,$sql))
{
    echo "success";
}
else
{
    echo "failed";
}

?>