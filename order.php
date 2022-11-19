<?php

session_start();
include "BackendLogic/url.php";
include "BackendLogic/database_connectivity.php";

?>


<!DOCTYPE php>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <link rel="shortcut icon" href="hardcode_images/cusit-logo.png" type="image/x-icon">
    <!-- bootstrap Linke -->
    <link rel="stylesheet" href="asset/css/bootstrap.css">
    <!-- Custom css-->
    <link rel="stylesheet" href="asset/custom/custom.css">
    <!-- icon link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  </head>
<body>

    <!-- navbar  -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border border-bottom-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php"><span class="title normal_text_color">Cusit Fiverr</sapn><sub style="font-size:11px;font-family: Arial, Helvetica, sans-serif;">Buyer Order</sub></a>

                 <!-- Buyer navigation-->
                <div>
                <a href="client_main_page.php" class="link-text" style="font-size:15px;">Home</a>
                <a href="client_profile.php" class="link-text" style="font-size:15px;">Profile</a>
                <a href="client_security.php" class="link-text" style="font-size:15px;">Security</a>
                <a href="client_texation.php" class="link-text" style="font-size:15px;">Texation</a>
                <a href="client_payment.php" class="link-text" style="font-size:15px;">Payment</a>
                <a href="signout.php" class="link-text" style="font-size:15px;">Signout</a>
                </div>
                <!-- Buyer navigation End-->

        </div>
    </nav>
    <!-- navbar end-->

<div class="container">
<br><br>
<div class="row mt-3">
    <?php

                    if($_GET['gig_type']==1)
                    {
                    $sql_basic="SELECT * FROM basic_gig inner join s_gig on basic_gig.b_gig_id=s_gig.s_gig_id where b_gig_email='{$_GET['email']}' AND b_gig_id={$_GET['gig_id']}";
                    $sql_basic_run=mysqli_query($DatabaseConnect,$sql_basic);
                    while($row_basic=mysqli_fetch_assoc($sql_basic_run))
                    {

    ?>
<div class="col-lg-4 col-12">
    <h5 class="common-title text-center mt-2">Basic</h5>
    <div class="card">
        <img src="BackendLogic/sellerlogic/gig_images/<?php echo $row_basic['b_gig_image']; ?>" style="height:200px" alt="" srcset="">
        <h6 class="common-title text-center mt-2"><?php echo $row_basic['g_name']; ?></h6>
         <center>
         <div class="ScrollBar" style="height:80px"><?php echo $row_basic['g_description']; ?></div>                    

            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Show Details
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse hide" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body ScrollBar">
            
                        <div class="row">
                            <div class="col-6" style="text-align:left;padding-left:25px;">
                               Price 
                            </div>
                            <div class="col-6">
                               Rs. <?php echo $row_basic['b_gig_price']; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                           <div class="col-6" style="text-align:left;padding-left:25px;">
                              Delivery Time 
                           </div>
                           <div class="col-6">
                           <?php echo $row_basic['b_delivery_time']; ?> Days
                           </div>
                       </div>
                       <hr>
                       <div class="row">
                           <div class="col-6" style="text-align:left;padding-left:25px;">
                              Number Of Pages 
                           </div>
                           <div class="col-6">
                           <?php echo $row_basic['b_number_of_pages']; ?>
                           </div>
                       </div>
                       <hr>
                       <div class="row">
                          <div class="col-6" style="text-align:left;padding-left:25px;">
                             Reversion
                          </div>
                          <div class="col-6">
                          <?php echo $row_basic['b_revision']; ?> Times
                          </div>
                      </div>
                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                            Source Code 
                         </div>
                         <div class="col-6">
                         <?php  if($row_basic['b_source_file']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>
                      
                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                            Transparent Logo
                         </div>
                         <div class="col-6">
                         <?php  if($row_basic['b_logo_transparancy']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>

                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                         High Resolution
                         </div>
                         <div class="col-6">
                         <?php  if($row_basic['b_high_resolution']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>

                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                         3D Mockup
                         </div>
                         <div class="col-6">
                         <?php  if($row_basic['b_3d_mockup']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>
                      
                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                         Stationary Design
                         </div>
                         <div class="col-6">
                         <?php  if($row_basic['b_stationary_design']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>

                      
                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                         Soical Kit
                         </div>
                         <div class="col-6">
                         <?php  if($row_basic['b_social_kit']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>

                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                         Vector Kit
                         </div>
                         <div class="col-6">
                         <?php  if($row_basic['b_vector_kit']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>
                      <!-- local Row End-->    
                    </div>
                  </div>
                </div>
            </div>
            <br>            
        </center>
        <br>
    </div>    
    </div>
<?php
 }}
 else if($_GET['gig_type']==2)
 {
     
    $sql_standard="SELECT * FROM standard_gig inner join s_gig on standard_gig.s_gig_id=s_gig.s_gig_id where standard_gig.s_gig_email='{$_GET['email']}' AND standard_gig.s_gig_id={$_GET['gig_id']}";
    $sql_standard_run=mysqli_query($DatabaseConnect,$sql_standard);
    while($row_standard=mysqli_fetch_assoc($sql_standard_run))
    {
?>
<div class="col-lg-4 col-12">
        <h5 class="common-title text-center mt-2">Standard</h5>
        <div class="card ">
            <img src="BackendLogic/sellerlogic/gig_images/<?php echo $row_standard['s_gig_image']; ?>" style="height:200px" alt="" srcset="">
            <h6 class="common-title text-center mt-2"><?php echo $row_standard['g_name']; ?></h6>
            <center>
                
            <div class="ScrollBar" style="height:80px"><?php echo $row_standard['g_description']; ?></div>                    
                <div class="accordion" id="accordionExample2">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne2" aria-expanded="true" aria-controls="collapseOne">
                          Show Details
                        </button>
                      </h2>
                      <div id="collapseOne2" class="accordion-collapse collapse hide" aria-labelledby="headingOne" data-bs-parent="#accordionExample2">
                        <div class="accordion-body ScrollBar">
                
                            
                        <div class="row">
                            <div class="col-6" style="text-align:left;padding-left:25px;">
                               Price 
                            </div>
                            <div class="col-6">
                               Rs. <?php echo $row_standard['s_gig_price']; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                           <div class="col-6" style="text-align:left;padding-left:25px;">
                              Delivery Time 
                           </div>
                           <div class="col-6">
                           <?php echo $row_standard['s_delivery_time']; ?> Days
                           </div>
                       </div>
                       <hr>
                       <div class="row">
                           <div class="col-6" style="text-align:left;padding-left:25px;">
                              Number Of Pages 
                           </div>
                           <div class="col-6">
                           <?php echo $row_standard['s_number_of_pages']; ?>
                           </div>
                       </div>
                       <hr>
                       <div class="row">
                          <div class="col-6" style="text-align:left;padding-left:25px;">
                             Reversion
                          </div>
                          <div class="col-6">
                          <?php echo $row_standard['s_revision']; ?> Times
                          </div>
                      </div>
                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                            Source Code 
                         </div>
                         <div class="col-6">
                         <?php  if($row_standard['s_source_file']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>
                      
                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                            Transparent Logo
                         </div>
                         <div class="col-6">
                         <?php  if($row_standard['s_logo_transparancy']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>

                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                         High Resolution
                         </div>
                         <div class="col-6">
                         <?php  if($row_standard['s_high_resolution']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>

                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                         3D Mockup
                         </div>
                         <div class="col-6">
                         <?php  if($row_standard['s_3d_mockup']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>
                      
                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                         Stationary Design
                         </div>
                         <div class="col-6">
                         <?php  if($row_standard['s_stationary_design']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>

                      
                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                         Soical Kit
                         </div>
                         <div class="col-6">
                         <?php  if($row_standard['s_social_kit']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>

                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                         Vector Kit
                         </div>
                         <div class="col-6">
                         <?php  if($row_standard['s_social_kit']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>
                      <!-- local Row End-->    
                        </div>
                      </div>
                    </div>
                </div>
                <br>            
            </center>
            <br>
        </div>    
        </div>
<?php
     } 
    }
    else if($_GET['gig_type']==3)
    {
        $sql_premium="SELECT * FROM premium_gig inner join s_gig on premium_gig.p_gig_id=s_gig.s_gig_id where premium_gig.p_gig_email='{$_GET['email']}' AND premium_gig.p_gig_id={$_GET['gig_id']}";
        $sql_premium_run=mysqli_query($DatabaseConnect,$sql_premium);
        while($row_premium=mysqli_fetch_assoc($sql_premium_run))
        {
?>


<div class="col-lg-4 col-12">
        <h5 class="common-title text-center mt-2">Premuim</h5>
        <div class="card ">
        <img src="BackendLogic/sellerlogic/gig_images/<?php echo $row_premium['p_gig_image']; ?>" style="height:200px" alt="" srcset="">
        <h6 class="common-title text-center mt-2"><?php echo $row_premium['g_name']; ?></h6>
         <center>
         <div class="ScrollBar" style="height:80px"><?php echo $row_premium['g_description']; ?></div>                    

                <div class="accordion" id="accordionExample3">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne3" aria-expanded="true" aria-controls="collapseOne">
                          Show Details
                        </button>
                      </h2>
                      <div id="collapseOne3" class="accordion-collapse collapse hide" aria-labelledby="headingOne" data-bs-parent="#accordionExample3">
                        <div class="accordion-body ScrollBar">
                

                        <div class="row">
                            <div class="col-6" style="text-align:left;padding-left:25px;">
                               Price 
                            </div>
                            <div class="col-6">
                               Rs. <?php echo $row_premium['p_gig_price']; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                           <div class="col-6" style="text-align:left;padding-left:25px;">
                              Delivery Time 
                           </div>
                           <div class="col-6">
                           <?php echo $row_premium['p_delivery_time']; ?> Days
                           </div>
                       </div>
                       <hr>
                       <div class="row">
                           <div class="col-6" style="text-align:left;padding-left:25px;">
                              Number Of Pages 
                           </div>
                           <div class="col-6">
                           <?php echo $row_premium['p_number_of_pages']; ?>
                           </div>
                       </div>
                       <hr>
                       <div class="row">
                          <div class="col-6" style="text-align:left;padding-left:25px;">
                             Reversion
                          </div>
                          <div class="col-6">
                          <?php echo $row_premium['p_revision']; ?> Times
                          </div>
                      </div>
                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                            Source Code 
                         </div>
                         <div class="col-6">
                         <?php  if($row_premium['p_source_file']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>
                      
                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                            Transparent Logo
                         </div>
                         <div class="col-6">
                         <?php  if($row_premium['p_logo_transparancy']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>

                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                         High Resolution
                         </div>
                         <div class="col-6">
                         <?php  if($row_premium['p_high_resolution']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>

                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                         3D Mockup
                         </div>
                         <div class="col-6">
                         <?php  if($row_premium['p_3d_mockup']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>
                      
                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                         Stationary Design
                         </div>
                         <div class="col-6">
                         <?php  if($row_premium['p_stationary_design']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>

                      
                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                         Soical Kit
                         </div>
                         <div class="col-6">
                         <?php  if($row_premium['p_social_kit']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>

                      <hr>
                      <div class="row">
                         <div class="col-6" style="text-align:left;padding-left:25px;">
                         Vector Kit
                         </div>
                         <div class="col-6">
                         <?php  if($row_premium['p_vector_kit']==1) { echo "Yes";} else {echo "No";}; ?>
                         </div>
                      </div>
                    </div><!-- end of local row -->

                      </div>
                    </div>
                </div>
                <br>            
            </center>
            <br>
        </div>    
    </div>
<?php
    }}
?>

<!-- NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN -->









<div class="col-lg-6 col-12 mt-2">
    <center>
    <h5 class="common-title" style="margin-left:200px;color:green">Pay With 2Chectout</h5>
    <div class="card  rounded-0" style="width:46rem">
    <center>


    <div>
         <form action="order_logic.php" method="POST" class='pt-5' enctype="multipart/form-data">
            <center>
                           
            <?php

               if($_GET['gig_type']==1)
               {
                  $seller_info="SELECT * from seller where s_email='{$_GET['email']}'";
                  $seller_info_run=mysqli_query($DatabaseConnect,$seller_info);
                  if(mysqli_num_rows($seller_info_run)>0)
                  {
                     while($seller_row=mysqli_fetch_assoc($seller_info_run))
                     {
                  ?>
                  <span class="common-title">Seller </span>
                  <br> <input type="text" class="InputField" name="seller_name" value="<?php echo $seller_row['s_name']; ?>" style="width:50%">
                  <?php
                        }}
                  ?>

                  <?php
                     $buyer_info="SELECT * from buyer where b_email='{$_SESSION['Email_redirect']}'";
                     $buyer_info_run=mysqli_query($DatabaseConnect,$buyer_info);
                     if(mysqli_num_rows($buyer_info_run)>0)
                     {
                        while($buyer_row=mysqli_fetch_assoc($buyer_info_run))
                        {
                     ?>
                     <br>
                     <span class="common-title">Buyer </span>
                     <br> <input type="text" class="InputField" name="buyer_name" value="<?php echo $buyer_row['b_name']; ?>" style="width:50%" >
                     <!-- extra information -->
                     <input type="text" class="InputField" name="current_date" hidden value="<?php echo date("y:m:d"); ?>" style="width:50%">
                     <input type="text" class="InputField" name="seller_email" hidden value="<?php echo $_GET['email']; ?>" style="width:50%">
                     <input type="text" class="InputField" name="buyer_email" hidden value="<?php echo $_SESSION['Email_redirect']; ?>" style="width:50%">
                     <input type="text" class="InputField" name="price" hidden value="<?php echo $_GET['price']; ?>" style="width:50%">
                     <input type="text" class="InputField" name="complete" hidden value="0" style="width:50%">                    
                     <input type="text" class="InputField" name="gig_id" hidden value="<?php echo $_GET['gig_id']; ?>" style="width:50%">                    
                     <input type="text" class="InputField" name="gig_type" hidden value="<?php echo $_GET['gig_type']; ?>" style="width:50%">                    
                  
                     <!-- extra information end -->
                     <br><span class="common-title">Delivery Date</span>
                     <br> <input type="date" class="InputField" name="delivery" style="width:50%">
                     <div style="color:red">It Is *Important</div>
                     <br><br><span class="common-title">Requirment File</span><br>
                     <br><br><br><br><br>
                     <div class="transpart_custom_bg"  style="height:100px; width:100px;border-radius:50%;background-color:rgb(35, 14, 158);position:relative;top:-80px"><i class="fa fa-book" style="color:white;font-size:40px;margin-top:30px"></i>
                      <input type="file" name="requirement_document"  title="Select File">
                     </div>
                     <?php
                           }}
                        $basic_gig_info="SELECT * from s_gig where s_gig_id={$_GET['gig_id']}";
                        $basic_gig_info_run=mysqli_query($DatabaseConnect,$basic_gig_info);
                           if(mysqli_num_rows($basic_gig_info_run)>0)
                           {
                              while($basic_gig_row=mysqli_fetch_assoc($basic_gig_info_run))
                              {      
                     ?> 
                     <input type="text" class="InputField" name="gig_name" hidden value="<?php echo $basic_gig_row['g_name']; ?>" style="width:50%">
                                       
                     <?php
                        }}
                     ?>
                  <!-- end of basic gig -->
   

                  <!-- start of stardard gig -->
            <?php
               }
               else if($_GET['gig_type']==2)
               {
                  $seller_info="SELECT * from seller where s_email='{$_GET['email']}'";
                  $seller_info_run=mysqli_query($DatabaseConnect,$seller_info);
                  if(mysqli_num_rows($seller_info_run)>0)
                  {
                     while($seller_row=mysqli_fetch_assoc($seller_info_run))
                     {
                  ?>
                  <span class="common-title">Seller </span>
                  <br> <input type="text" class="InputField" name="seller_name" value="<?php echo $seller_row['s_name']; ?>" style="width:50%">
                  <?php
                        }}
                  ?>

                  <?php
                     $buyer_info="SELECT * from buyer where b_email='{$_SESSION['Email_redirect']}'";
                     $buyer_info_run=mysqli_query($DatabaseConnect,$buyer_info);
                     if(mysqli_num_rows($buyer_info_run)>0)
                     {
                        while($buyer_row=mysqli_fetch_assoc($buyer_info_run))
                        {
                     ?>
                     <br>
                     <span class="common-title">Buyer </span>
                     <br> <input type="text" class="InputField" name="buyer_name" value="<?php echo $buyer_row['b_name']; ?>" style="width:50%">
                     <!-- extra information -->
                     <input type="text" class="InputField" name="current_date" hidden value="<?php echo date("m:d:y"); ?>" style="width:50%">
                     <input type="text" class="InputField" name="seller_email" hidden value="<?php echo $_GET['email']; ?>" style="width:50%">
                     <input type="text" class="InputField" name="buyer_email" hidden value="<?php echo $_SESSION['Email_redirect']; ?>" style="width:50%">
                     <input type="text" class="InputField" name="price" hidden value="<?php echo $_GET['price']; ?>" style="width:50%">
                     <input type="text" class="InputField" name="complete" hidden value="0" style="width:50%">
                     <input type="text" class="InputField" name="gig_id" hidden value="<?php echo $_GET['gig_id']; ?>" style="width:50%">                    
                     <input type="text" class="InputField" name="gig_type" hidden value="<?php echo $_GET['gig_type']; ?>" style="width:50%">                    
                                      
                     <!-- extra information end -->
                     <br><span class="common-title">Delivery Date</span>
                     <br> <input type="date" class="InputField" name="delivery" style="width:50%">
                     <div style="color:red">It Is *Important</div>
                     <br><br><span class="common-title">Requirment File</span><br>
                     <br><br><br><br><br>
                     <div class="transpart_custom_bg"  style="height:100px; width:100px;border-radius:50%;background-color:rgb(35, 14, 158);position:relative;top:-80px"><i class="fa fa-book" style="color:white;font-size:40px;margin-top:30px"></i>
                      <input name="requirement_document" type="file" title=" " >
                     </div>
                     <?php
                           }}
                        $standard_gig_info="SELECT * from s_gig where s_gig_id={$_GET['gig_id']}";
                        $standard_gig_info_run=mysqli_query($DatabaseConnect,$standard_gig_info);
                           if(mysqli_num_rows($standard_gig_info_run)>0)
                           {
                              while($standard_gig_row=mysqli_fetch_assoc($standard_gig_info_run))
                              {      
                     ?> 
                     <input type="text" class="InputField" name="gig_name" hidden value="<?php echo $standard_gig_row['g_name']; ?>" style="width:50%">                     
                     <?php
                        }}
                     ?>
                  <!-- end of stardard gig -->
            <?php
                      }
                      else if($_GET['gig_type']==3)
                      {
                         $seller_info="SELECT * from seller where s_email='{$_GET['email']}'";
                         $seller_info_run=mysqli_query($DatabaseConnect,$seller_info);
                         if(mysqli_num_rows($seller_info_run)>0)
                         {
                            while($seller_row=mysqli_fetch_assoc($seller_info_run))
                            {
                         ?>
                         <span class="common-title">Seller </span>
                         <br> <input type="text" class="InputField" name="seller_name" value="<?php echo $seller_row['s_name']; ?>" style="width:50%">
                         <?php
                               }}
                         ?>
       
                         <?php
                            $buyer_info="SELECT * from buyer where b_email='{$_SESSION['Email_redirect']}'";
                            $buyer_info_run=mysqli_query($DatabaseConnect,$buyer_info);
                            if(mysqli_num_rows($buyer_info_run)>0)
                            {
                               while($buyer_row=mysqli_fetch_assoc($buyer_info_run))
                               {
                            ?>
                            <br>
                            <span class="common-title">Buyer </span>
                            <br> <input type="text" class="InputField" name="buyer_name" value="<?php echo $buyer_row['b_name']; ?>" style="width:50%">
                           <!-- extra information -->
                           <input type="text" class="InputField" name="current_date" hidden value="<?php echo date("m:d:y"); ?>" style="width:50%">
                           <input type="text" class="InputField" name="seller_email" hidden value="<?php echo $_GET['email']; ?>" style="width:50%">
                           <input type="text" class="InputField" name="buyer_email" hidden value="<?php echo $_SESSION['Email_redirect']; ?>" style="width:50%">
                           <input type="text" class="InputField" name="price" hidden value="<?php echo $_GET['price']; ?>" style="width:50%">
                           <input type="text" class="InputField" name="complete" hidden value="0" style="width:50%">
                           <input type="text" class="InputField" name="gig_id" hidden value="<?php echo $_GET['gig_id']; ?>" style="width:50%">                    
                           <input type="text" class="InputField" name="gig_type" hidden value="<?php echo $_GET['gig_type']; ?>" style="width:50%">                    
                                 
                                
                           <!-- extra information end -->
                            <br><span class="common-title">Delivery Date</span>
                            <br> <input type="date" class="InputField" name="delivery" style="width:50%">
                            <div style="color:red">It Is *Important</div>
                            <br><br><span class="common-title">Requirment File</span><br>
                            <br><br><br><br><br>
                            <div class="transpart_custom_bg"  style="height:100px; width:100px;border-radius:50%;background-color:rgb(35, 14, 158);position:relative;top:-80px"><i class="fa fa-book" style="color:white;font-size:40px;margin-top:30px"></i>
                             <input name="requirement_document" type="file" title=" " >
                            </div>
                            <?php
                                  }}
                               $premium_gig_info="SELECT * from s_gig where s_gig_id={$_GET['gig_id']}";
                               $premium_gig_info_run=mysqli_query($DatabaseConnect,$premium_gig_info);
                                  if(mysqli_num_rows($premium_gig_info_run)>0)
                                  {
                                     while($premium_gig_row=mysqli_fetch_assoc($premium_gig_info_run))
                                     {      
                            ?> 
                            <input type="text" class="InputField" name="gig_name" hidden  value="<?php echo $premium_gig_row['g_name']; ?>" style="width:50%">                     
                            <?php
                               }}}
                            ?>
                         <!-- end of basic gig -->       
               <input type="submit" class="custom-btn" value="Pay">
            </center>
         </form>
   </div>
</div>


</div><!--row end -->

</div><!-- container end -->
<br><br>
    

<!-- Custom Javacript-->
<script src="asset/custom/custom.js"></script>
<!-- javascript Linke -->
<script src="asset/js/bootstrap.js"></script>
</body>
</php>
