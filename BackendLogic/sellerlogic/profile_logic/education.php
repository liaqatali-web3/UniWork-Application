<?php

include '../../database_connectivity.php';
include '../../url.php';

session_start();

$title=$_POST['title'];
$major=$_POST['major'];
$year=$_POST['year'];


$sql="INSERT INTO s_education(s_education_title,s_education_major,s_education_year,s_email) value('{$title}','{$major}','{$year}','{$_SESSION['Email_redirect']}')";

$sql_result=mysqli_query($DatabaseConnect,$sql);

if($sql_result)
{

    $fetch_education="SELECT * FROM s_education where s_email='{$_SESSION['Email_redirect']}'";
    $fetch_education_run=mysqli_query($DatabaseConnect,$fetch_education);
    $form_back="";
    while($row=mysqli_fetch_assoc($fetch_education_run))
    {
    $form_back .="
    <tr style='text-align: center;'>
    <td>{$row["s_education_title"]}</td>
    <td>{$row['s_education_major']}</td>
    <td>{$row['s_education_year']}</td>
    <td><button class='fa fa-trash btn btn-delete' id='delete_education' data-id='{$row['s_education_id']}'></button></td>
    </tr>
    ";
    }
    $form_back.="<script> alert('Successfully Education Added'); </script>";
    echo $form_back;

}
else
{
    echo "hi";
}


?>
