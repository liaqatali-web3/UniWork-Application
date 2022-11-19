<?php
include '../BackendLogic/database_connectivity.php';
include '../BackendLogic/url.php';


$requirement=$_FILES['requirement_document'];// file variable
// Uploads files // if save button on the form is clicked
    // name of the uploaded file
    if(isset($requirement))
    {
    $filename = $_FILES['requirement_document']['name'];

    // destination of the file on the server
    $destination = '../projects/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['requirement_document']['tmp_name'];
    $size = $_FILES['requirement_document']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) 
    {
        header("location:seller/freelancer_project_dashboard.php?extension=1");
    }
     elseif ($_FILES['requirement_document']['size'] > 2000000) 
    { // file shouldn't be larger than 2Megabyte
        header("location:seller/freelancer_project_dashboard.php?large=1");
    } 
    else
    {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) 
        {
            $sql="UPDATE s_b_order SET o_requirment='{$filename}' WHERE o_id={$_POST['order_id']}";
            $sql_run=mysqli_query($DatabaseConnect,$sql);
            if($sql_run)
            {
                header("location:seller/freelancer_project_dashboard.php?success=1");
            }
        }
         else 
        {
            echo "Failed to upload file.";
        }
    }
    }


?>