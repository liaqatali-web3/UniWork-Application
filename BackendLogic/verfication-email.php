<?php

include "database_connectivity.php";
include "url.php";

$update_verfication_token="UPDATE signup set verification_token='1' where email='{$_GET['identity']}' and verification_code='{$_GET['token']}'";

if(mysqli_query($DatabaseConnect,$update_verfication_token))
{
    header("location:BackendLogic/SignIn.php");
}
else
{
    Echo "your verfication is not correct...";
}

?>