<?php
include "../url.php";
include "../database_connectivity.php";

    // validation Start From here
    function Input_Validation($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

$identifier=$_POST['identification'];


    if($_FILES['image']['name'] !='')
    {
        $filename=$_FILES['image']['name'];
    
        $extension=pathinfo($filename,PATHINFO_EXTENSION);
    
        $valid_extension=array("jpg","JPG","png","PNG","jpeg","JPEG",'gif',"GIF");
    
        if(in_array($extension,$valid_extension))
        {
            $new_name=rand().".".$extension;
            $path="image/".$new_name;
    
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
    
        // image update.
    
        $sql_image="UPDATE buyer SET b_image='{$new_name}' where b_id={$identifier}";
        mysqli_query($DatabaseConnect,$sql_image);
        
    }




    $firstname=$lastname=$phone=$email=$country=$province=$business=$brith='';
    $firstname_Error=$lastname_Error=$phone_Error=$email_Error=$country_Error=$province_Error=$business_Error=$brith_Error='';


    if(isset($_POST['upload']))
    {
     if(empty($_POST['firstname']))
     {
        $firstname_Error="First Name is Required";
     }   
     else
     {
        $firstname=Input_Validation($_POST['firstname']);
     }

     if(empty($_POST['lastname']))
     {
        $lastname_Error="Last Name is Required";
     }   
     else
     {
        $lastname=Input_Validation($_POST['lastname']);
     }

     if(empty($_POST['phone']))
     {
        $phone_Error="Phone Number is Required";
     }   
     else
     {
        $phone=Input_Validation($_POST['phone']);
     }

     if(empty($_POST['email']))
     {
        $email_Error="Email is Required";
     }   
     else
     {
        $email=Input_Validation($_POST['email']);
     }


     if(empty($_POST['country']))
     {
        $country_Error="country is Required";
     }   
     else
     {
        $country=Input_Validation($_POST['country']);
     }


     if(empty($_POST['province']))
     {
        $province_Error="Province is Required";
     }   
     else
     {
        $province=Input_Validation($_POST['province']);
     }

     if(empty($_POST['brith']))
     {
        $brith_Error="Brith is Required";
     }   
     else
     {
        $brith=Input_Validation($_POST['brith']);
     }

     if(!empty($_POST['business']))
     {
        $business=Input_Validation($_POST['business']);
     }
     else
     {
         $business=$_POST['old_business'];
     }
    // if Values is not set in Input Field so it will redirect to index page
    if(!$email_Error=="" || !$firstname_Error=="" || !$lastname_Error=="" || !$phone_Error=="" || !$country_Error=="" || !$province_Error=="" || !$brith_Error=="" || !$business_Error=="")
    {
         header("Location:buyer/client_profile.php?email_Error=$email_Error&firstname_Error=$firstname_Error&lastname_Error=$lastname_Error&phone_Error=$phone_Error&country_Error=$country_Error&province_Error=$province_Error&brith_Error=$brith_Error");

    }
    else
    {
        $fullname=$firstname." ".$lastname;
        $sql="UPDATE buyer SET b_name='{$fullname}', b_firstname='{$firstname}',b_lastname='{$lastname}',b_phone='{$phone}',b_optional_email='{$email}',b_country='{$country}',b_province='{$province}',b_dob='{$brith}',business='{$business}' where b_id=$identifier";

        $sql_run=mysqli_query($DatabaseConnect,$sql);
        if($sql_run)
        {

            $message=1;
            header("Location:buyer/client_profile.php?message=$message");

        }
        else
        {
            $message=0;
            header("Location:buyer/client_profile.php?message=$message");

       }
    }

    }
?>