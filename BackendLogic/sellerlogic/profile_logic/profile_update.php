<?php
include '../../database_connectivity.php';
include '../../url.php';
session_start();

$new_name='';

if($_FILES['simage']['name'] !='')
{
    $filename=$_FILES['simage']['name'];

    $extension=pathinfo($filename,PATHINFO_EXTENSION);

    $valid_extension=array("jpg","png","jpeg",'gif');

    if(in_array($extension,$valid_extension))
    {
        $new_name=rand().".".$extension;
        $path="../image/".$new_name;

        if(move_uploaded_file($_FILES['simage']['tmp_name'],$path))
        {

        }
        else
        {
            echo "Sorry Refresh the Page and check you internet connection.";
        }
    }
    else
    {
        echo "Sorry Extension is not Valid Refresh the page.";
    }
}
else
{
    // if user not select any image.
        $fetch_profile="SELECT * FROM seller where s_email='{$_SESSION['Email_redirect']}'";
        $sql_result=mysqli_query($DatabaseConnect,$fetch_profile);
      
        while($row=mysqli_fetch_assoc($sql_result))
        {
        $new_name=$row['s_image'];
        }
 
}

$name=$_POST['sname'];
$story=$_POST['sstory'];



$sql="UPDATE seller SET s_name='{$name}',s_story='{$story}',s_image='{$new_name}' where s_email='{$_SESSION['Email_redirect']}'";
if(mysqli_query($DatabaseConnect,$sql))
{

    $form_back="<img  src='../Backendlogic/sellerlogic/image/$new_name' style='width:100px;height:100px;border-radius:50%'>
    <div class='transpart_custom_bg'  style='height:100px; width:100px;border-radius:50%;opacity:0.9;position:relative;top:-100px'>
    <i class='fa fa-camera' style='color:white;font-size:40px;margin-top:30px'></i>
    <input name='simage' type='file'></div>
    <input name='sname' value='$name' class='custom_input w-75' placeholder='Edit Name'>
    <input name='sstory' value='$story' class='custom_input mt-4 w-75' placeholder='One line Story'>
    <br>
    <input type='submit' id='btnprofile' class='btn bg-primary text-white' value='Update'>";

    $form_back.="<script> alert('Successfully Profile Updated'); </script>";
    echo $form_back;
}
else
{
    echo "something happend";
}



?>