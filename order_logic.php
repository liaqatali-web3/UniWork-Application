<?php
include 'BackendLogic/database_connectivity.php';
include 'BackendLogic/url.php';


$seller=$_POST['seller_name'];
$seller_email=$_POST['seller_email'];

$buyer=$_POST['buyer_name'];
$buyer_email=$_POST['buyer_email'];

$current_date=$_POST['current_date'];
$delivery_date=$_POST['delivery'];

$gig=$_POST['gig_name'];
$price=$_POST['price'];
$complete_status=$_POST['complete'];


$gig_id=$_POST['gig_id'];
$gig_type=$_POST['gig_type'];




if(empty($delivery_date))
{
    $delivery_date="none";
}


$requirement=$_FILES['requirement_document'];// file variable
// Uploads files // if save button on the form is clicked
    // name of the uploaded file
    if(isset($requirement))
    {
    $filename = $_FILES['requirement_document']['name'];

    // destination of the file on the server
    $destination = 'projects/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['requirement_document']['tmp_name'];
    $size = $_FILES['requirement_document']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) 
    {
        echo "You file extension must be .zip, .pdf or .docx";
    }
     elseif ($_FILES['requirement_document']['size'] > 1000000) 
    { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } 
    else
    {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) 
        {
            $requirement=$filename;

        }
         else 
        {
            echo "Failed to upload file.";
        }
    }
    }



if(isset($requirement))
{
$sql="INSERT INTO s_b_order(o_sender_email,o_receiver_email,
o_sender_name,o_receiver_name,o_price,o_delivery_data,o_requirment,o_upload,o_complete,order_gig_id,type_of_gig,star_per_order,tex,order_date,gig_name)
 values('{$buyer_email}','{$seller_email}','{$buyer}','{$seller}','{$price}','{$delivery_date}','{$requirement}',null,
 '{$complete_status}','{$gig_id}','{$gig_type}',null,null,'{$current_date}','{$gig}')";

$result=mysqli_query($DatabaseConnect,$sql);

if($result)
{

   header("location:success.php");
    
}

}
else
{
   header("location:error.php");
}








?>