<?php
session_start();
include "../../url.php";
include "../../database_connectivity.php";

if($_FILES['firstimage']['name'] !='')
{
    $filename=$_FILES['firstimage']['name'];

    $extension=pathinfo($filename,PATHINFO_EXTENSION);

    $valid_extension=array("jpg","png","jpeg",'gif');

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
}
else
{
    echo "select first image first.";
}





if($_FILES['secondimage']['name'] !='')
{
    $filename=$_FILES['secondimage']['name'];

    $extension=pathinfo($filename,PATHINFO_EXTENSION);

    $valid_extension=array("jpg","png","jpeg",'gif');

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
}
else
{
    echo "select first image first.";
}


if($_FILES['thirdimage']['name'] !='')
{
    $filename=$_FILES['thirdimage']['name'];

    $extension=pathinfo($filename,PATHINFO_EXTENSION);

    $valid_extension=array("jpg","png","jpeg",'gif');

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
}
else
{
    echo "select first image first.";
}



//description:

$description=$_POST['gigdescription'];
$gigname=$_POST['gigname'];

$sql="INSERT INTO s_gig(g_name,g_description,s_email) values('{$gigname}','{$description}','{$_SESSION['Email_redirect']}')";


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


        $basic_sql="INSERT INTO basic_gig(
        b_gig_image,b_gig_price,b_number_of_pages,b_delivery_time,
        b_revision,b_source_file,b_logo_transparancy,
        b_high_resolution,b_3d_mockup,b_stationary_design,
        b_social_kit,b_vector_kit,b_gig_email) values(
        '{$new_name}','{$b_price}','{$b_npage}','{$b_dtime}',
        '{$b_reversion}','{$b_sfile}','{$b_ltransparancy}',
        '{$b_hresolution}','{$b_dmockup}','{$b_sdesign}','{$b_smedia}',
        '{$b_mvector}','{$_SESSION['Email_redirect']}')";

        if(mysqli_query($DatabaseConnect,$basic_sql))
        {
            echo "success";
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


        $standard_sql="INSERT INTO standard_gig(
            s_gig_image,s_gig_price,s_number_of_pages,s_delivery_time,
            s_revision,s_source_file,s_logo_transparancy,
            s_high_resolution,s_3d_mockup,s_stationary_design,
            s_social_kit,s_vector_kit,s_gig_email) values(
            '{$new_name2}','{$s_price}','{$s_npage}','{$s_dtime}',
            '{$s_reversion}','{$s_sfile}','{$s_ltransparancy}',
            '{$s_hresolution}','{$s_dmockup}','{$s_sdesign}','{$s_smedia}',
            '{$s_mvector}','{$_SESSION['Email_redirect']}')";
    
            if(mysqli_query($DatabaseConnect,$standard_sql))
            {
                echo "success";
            }
            else
            {
                echo "soory standard gig";
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


        $premium_sql="INSERT INTO premium_gig(
            p_gig_image,p_gig_price,p_number_of_pages,p_delivery_time,
            p_revision,p_source_file,p_logo_transparancy,
            p_high_resolution,p_3d_mockup,p_stationary_design,
            p_social_kit,p_vector_kit,p_gig_email) values(
            '{$new_name3}','{$p_price}','{$p_npage}','{$p_dtime}',
            '{$p_reversion}','{$p_sfile}','{$p_ltransparancy}',
            '{$p_hresolution}','{$p_dmockup}','{$p_sdesign}','{$_smedia}',
            '{$p_mvector}','{$_SESSION['Email_redirect']}')";
    
            if(mysqli_query($DatabaseConnect,$premium_sql))
            {
                echo "success";
            }
            else
            {
                echo "soory premium gig";
            }


}
else
{
    echo "sorry gig insetion";
}















?>