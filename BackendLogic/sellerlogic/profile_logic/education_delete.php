<?php


include '../../database_connectivity.php';
include '../../url.php';
session_start();

$id=$_POST['id'];

$sql="DELETE FROM s_education where s_education_id='{$id}'";
if(mysqli_query($DatabaseConnect,$sql))
{
    $fetch_language="SELECT * FROM s_education where s_email='{$_SESSION['Email_redirect']}'";
    $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);
    $form_back="";
    while($row=mysqli_fetch_assoc($fetch_language_run))
    {
    $form_back .="
    <tr style='text-align: center;'>
    <td>{$row["s_education_title"]}</td>
    <td>{$row['s_education_major']}</td>
    <td>{$row['s_education_year']}</td>
    <td><button class='fa fa-trash btn btn-delete-education' id='delete_education' data-id='{$row['s_education_id']}'></button></td>
    </tr>
    ";
    }
    $form_back.="<script> alert('Successfully Education Delete'); </script>";
    echo $form_back;
}
else
{
    echo "Sorry We can't Delete the Language ";
}

?>
