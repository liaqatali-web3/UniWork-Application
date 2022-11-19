<?php

include '../../database_connectivity.php';
include '../../url.php';
session_start();

$description=$_POST['description'];

$sql="UPDATE seller SET s_description='{$description}' where s_email='{$_SESSION['Email_redirect']}'";
if(mysqli_query($DatabaseConnect,$sql))
{

    $form_back='
    <h6 class="m-4 mr-0 mt-2 mb-0 common-title" id="Description">Description</h6>
    <br>
    <textarea class="w-75 custom-textarea"  name="" id="DescriptionArea">"{$_POST[$description]}"</textarea>
    <br>
    <button type="submit" class="btn mb-3 bg-primary text-white" id="DescriptionUpdate">Update</button>';
    echo $form_back;
}
else
{
    echo "sorry";
}



?>