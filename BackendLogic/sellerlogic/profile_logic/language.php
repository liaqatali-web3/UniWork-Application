<?php

include '../../database_connectivity.php';
include '../../url.php';
session_start();


$language=$_POST['language'];
$level=$_POST['level'];

$sql="INSERT INTO s_language(s_language,s_language_level,s_email) value('{$language}','{$level}','{$_SESSION['Email_redirect']}')";

$sql_result=mysqli_query($DatabaseConnect,$sql);

if($sql_result)
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
    $form_back.="<script> alert('Successfully Language Added'); </script>";
    echo $form_back;

}
else
{
    echo "hi";
}


?>
