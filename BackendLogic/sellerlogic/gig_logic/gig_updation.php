<?php

session_start();
include "../../url.php";
include "../../database_connectivity.php";


$identifier=$_POST['counterid'];

if($_FILES['firstimage']['name'] !='')
{
    $filename=$_FILES['firstimage']['name'];

    $extension=pathinfo($filename,PATHINFO_EXTENSION);

    $valid_extension=array("jpg","JPG","png","PNG","jpeg","JPEG",'gif',"GIF");

    if(in_array($extension,$valid_extension))
    {
        $new_name=rand().".".$extension;
        $path="../gig_images/".$new_name;

        if(move_uploaded_file($_FILES['firstimage']['tmp_name'],$path))
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

    $sql_image="UPDATE basic_gig SET b_gig_image='{$new_name}' where b_gig_id=$identifier";
    mysqli_query($DatabaseConnect,$sql_image);
    
}




if($_FILES['secondimage']['name'] !='')
{
    $filename=$_FILES['secondimage']['name'];

    $extension=pathinfo($filename,PATHINFO_EXTENSION);

    $valid_extension=array("jpg","JPG","png","PNG","jpeg","JPEG",'gif',"GIF");

    if(in_array($extension,$valid_extension))
    {
        $new_name2=rand().".".$extension;
        $path="../gig_images/".$new_name2;

        if(move_uploaded_file($_FILES['secondimage']['tmp_name'],$path))
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

    // image update
    $sql_image="UPDATE standard_gig SET s_gig_image='{$new_name2}' where s_gig_id=$identifier";
    mysqli_query($DatabaseConnect,$sql_image);

}

if($_FILES['thirdimage']['name'] !='')
{
    $filename=$_FILES['thirdimage']['name'];

    $extension=pathinfo($filename,PATHINFO_EXTENSION);

    $valid_extension=array("jpg","JPG","png","PNG","jpeg","JPEG",'gif',"GIF");

    if(in_array($extension,$valid_extension))
    {
        $new_name3=rand().".".$extension;
        $path="../gig_images/".$new_name3;

        if(move_uploaded_file($_FILES['thirdimage']['tmp_name'],$path))
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

    //image update.

    $sql_image="UPDATE premium_gig SET p_gig_image='{$new_name3}' where p_gig_id=$identifier";
    mysqli_query($DatabaseConnect,$sql_image);


}



//description:

$description=$_POST['gigdescription'];

if($_POST['gigname']!="default")
{
    $gigname=$_POST['gigname'];
    $sql="UPDATE s_gig SET g_name='{$gigname}' WHERE s_gig_id=$identifier"; 
    mysqli_query($DatabaseConnect,$sql);   
}

$sql="UPDATE s_gig SET g_description='{$description}' WHERE s_gig_id=$identifier";
if(mysqli_query($DatabaseConnect,$sql))
{
            //baic gig
        $b_npage=$_POST['b_npage'];
        $b_price=$_POST['b_price'];
        $b_dtime=$_POST['b_dtime'];
        $b_reversion=$_POST['b_reversion'];

        $b_sfile=0;
        if(isset($_POST['b_sfile']))
        { 
            $b_sfile=1;
        }

        $b_ltransparancy=0;
        if(isset($_POST['b_ltransparancy']))
        {
            $b_ltransparancy=1;
        }

        $b_hresolution=0;
        if(isset($_POST['b_hresolution']))
        {
            $b_hresolution=1;
        }

        $b_dmockup=0;
        if(isset($_POST['b_dmockup']))
        {
            $b_dmockup=1;
        }

        $b_sdesign=0;
        if(isset($_POST['b_sdesign']))
        {
            $b_sdesign=1;
        }

        $b_smedia=0;
        if(isset($_POST['b_smedia']))
        {
            $b_smedia=1;
        }

        $b_mvector=0;
        if(isset($_POST['b_mvector']))
        {
            $b_mvector=1;
        }


        $basic_sql="UPDATE basic_gig SET
        b_gig_price='{$b_price}',b_number_of_pages='{$b_npage}',b_delivery_time='{$b_dtime}',
        b_revision='{$b_reversion}',b_source_file='{$b_sfile}',b_logo_transparancy='{$b_ltransparancy}',
        b_high_resolution='{$b_hresolution}',b_3d_mockup='{$b_dmockup}',b_stationary_design='{$b_sdesign}',
        b_social_kit='{$b_smedia}',b_vector_kit='{$b_mvector}' WHERE b_gig_id=$identifier";
        if(mysqli_query($DatabaseConnect,$basic_sql))
        {

        }
        else
        {
            echo "soory baisc gig";
        }




        //standard gig
        $s_npage=$_POST['s_npage'];
        $s_price=$_POST['s_price'];
        $s_dtime=$_POST['s_dtime'];
        $s_reversion=$_POST['s_reversion'];

        $s_sfile=0;
        if(isset($_POST['s_sfile']))
        { 
            $s_sfile=1;
        }

        $s_ltransparancy=0;
        if(isset($_POST['s_ltransparancy']))
        {
            $s_ltransparancy=1;
        }

        $s_hresolution=0;
        if(isset($_POST['s_hresolution']))
        {
            $s_hresolution=1;
        }

        $s_dmockup=0;
        if(isset($_POST['s_dmockup']))
        {
            $s_dmockup=1;
        }

        $s_sdesign=0;
        if(isset($_POST['s_sdesign']))
        {
            $s_sdesign=1;
        }

        $s_smedia=0;
        if(isset($_POST['s_smedia']))
        {
            $s_smedia=1;
        }

        $s_mvector=0;
        if(isset($_POST['s_mvector']))
        {
            $s_mvector=1;
        }


        $standard_sql="UPDATE standard_gig SET
            s_gig_price='{$s_price}',s_number_of_pages='{$s_npage}',s_delivery_time='{$s_dtime}',
            s_revision='{$s_reversion}',s_source_file='{$s_sfile}',s_logo_transparancy='{$s_ltransparancy}',
            s_high_resolution='{$s_hresolution}',s_3d_mockup='{$s_dmockup}',s_stationary_design='{$s_sdesign}',
            s_social_kit='{$s_smedia}',s_vector_kit='{$s_mvector}' WHERE s_gig_id=$identifier";    
            if(mysqli_query($DatabaseConnect,$standard_sql))
            {
                //echo "success";
            }
            else
            {
                //echo "soory standard gig";
            }
    

        //premium gig
        $p_npage=$_POST['p_npage'];
        $p_price=$_POST['p_price'];
        $p_dtime=$_POST['p_dtime'];
        $p_reversion=$_POST['p_reversion'];

        $p_sfile=0;
        if(isset($_POST['p_sfile']))
        { 
            $p_sfile=1;
        }

        $p_ltransparancy=0;
        if(isset($_POST['p_ltransparancy']))
        {
            $p_ltransparancy=1;
        }

        $p_hresolution=0;
        if(isset($_POST['p_hresolution']))
        {
            $p_hresolution=1;
        }

        $p_dmockup=0;
        if(isset($_POST['p_dmockup']))
        {
            $p_dmockup=1;
        }

        $p_sdesign=0;
        if(isset($_POST['p_sdesign']))
        {
            $p_sdesign=1;
        }

        $p_smedia=0;
        if(isset($_POST['p_smedia']))
        {
            $p_smedia=1;
        }

        $p_mvector=0;
        if(isset($_POST['p_mvector']))
        {
            $p_mvector=1;
        }


        $premium_sql="UPDATE premium_gig SET
            p_gig_price='{$p_price}',p_number_of_pages='{$p_npage}',p_delivery_time='{$p_dtime}',
            p_revision='{$p_reversion}',p_source_file='{$p_sfile}',p_logo_transparancy='{$p_ltransparancy}',
            p_high_resolution='{$p_hresolution}',p_3d_mockup='{$p_dmockup}',p_stationary_design='{$p_sdesign}',
            p_social_kit='{$p_smedia}',p_vector_kit='{$p_mvector}' where p_gig_id=$identifier";    
            if(mysqli_query($DatabaseConnect,$premium_sql))
            {
               // echo "success";
            }
            else
            {
               // echo "soory premium gig";
            }

            header("location:seller/freelancer_gig_updation.php?id=$identifier");

}
else
{
    //echo "sorry gig insetion";
}








?>