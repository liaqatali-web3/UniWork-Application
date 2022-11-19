<?php


include '../../database_connectivity.php';
include '../../url.php';
session_start();

$id=$_POST['id'];

$sql="DELETE FROM s_language where s_language_id='{$id}'";
if(mysqli_query($DatabaseConnect,$sql))
{
    $fetch_language="SELECT * FROM s_language where s_email='{$_SESSION['Email_redirect']}'";
    $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);
    $form_back="";
    while($row=mysqli_fetch_assoc($fetch_language_run))
    {
    $form_back .="
    <tr style='text-align: center;'>
    <td>{$row["s_language"]}</td>
    <td>{$row['s_language_level']}</td>
    <td><button class='fa fa-trash btn btn-delete' id='delete_language' data-id='{$row['s_language_id']}'></button></td>
    </tr>
    ";
    }
    $form_back.="<script> alert('Successfully Language Deleted'); </script>";
    echo $form_back;
}
else
{
    echo "Sorry We can't Delete the Language ";
}

?>
