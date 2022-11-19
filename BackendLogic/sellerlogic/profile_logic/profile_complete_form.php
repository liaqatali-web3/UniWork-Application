<?php
include '../../database_connectivity.php';
include '../../url.php';
session_start();

$new_name='';

if($_FILES['image']['name'] !='')
{
    $filename=$_FILES['image']['name'];

    $extension=pathinfo($filename,PATHINFO_EXTENSION);

    $valid_extension=array("jpg","png","jpeg",'gif');

    if(in_array($extension,$valid_extension))
    {
        $new_name=rand().".".$extension;
        $path="../image/".$new_name;

        if(move_uploaded_file($_FILES['image']['tmp_name'],$path))
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

$name=$_POST['name'];
$website=$_POST['website'];
$description=$_POST['description'];




$sql="UPDATE seller SET s_name='{$name}',s_website='{$website}',s_description='{$description}',s_image='{$new_name}' where s_email='{$_SESSION['Email_redirect']}'";
if(mysqli_query($DatabaseConnect,$sql))
{
    echo "success";
}
else
{
    echo "failed";
}



?>