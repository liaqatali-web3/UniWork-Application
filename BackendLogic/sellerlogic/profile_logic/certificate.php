<?php

include '../../database_connectivity.php';
include '../../url.php';
session_start();

$certificate=$_POST['certificate'];
$from=$_POST['from'];
$year=$_POST['year'];


$sql="INSERT INTO s_certificate(s_certificate,s_certificate_from,s_certificate_year,s_email) value('{$certificate}','{$from}','{$year}','{$_SESSION['Email_redirect']}')";

$sql_result=mysqli_query($DatabaseConnect,$sql);

if($sql_result)
{

    $fetch_certificate="SELECT * FROM s_certificate where s_email='{$_SESSION['Email_redirect']}'";
    $fetch_certificate_run=mysqli_query($DatabaseConnect,$fetch_certificate);
    $form_back="";
    while($row=mysqli_fetch_assoc($fetch_certificate_run))
    {
    $form_back .="
    <tr style='text-align: center;'>
    <td>{$row["s_certificate"]}</td>
    <td>{$row['s_certificate_from']}</td>
    <td>{$row['s_certificate_year']}</td>
    <td><button class='fa fa-trash btn btn-delete' id='delete_certificate' data-id='{$row['s_certificate_id']}'></button></td>
    </tr>
    ";
    }
    $form_back.="<script> alert('Successfully Certificate Added'); </script>";
    echo $form_back;

}
else
{
    echo "hi";
}


?>
