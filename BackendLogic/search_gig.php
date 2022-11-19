<?php

require("database_connectivity.php");
require("url.php");

    $search_value=$_POST['search_value'];

$output="";

?>


<?php
    $checkpoint=0;
                    $sql="SELECT * FROM seller where s_name like '%{$search_value}%'";
                    $sql_run=mysqli_query($DatabaseConnect,$sql);
                    while($row=mysqli_fetch_assoc($sql_run))
                    {
                      $check_validation_of_gig=1;

                      $sql_p="SELECT p_gig_image FROM premium_gig where p_gig_email='{$row["s_email"]}'";
                      $sql_run_p=mysqli_query($DatabaseConnect,$sql_p);
                      while($rowp=mysqli_fetch_assoc($sql_run_p))
                      {
                        if(empty($rowp['p_gig_image']))
                        {
                          $check_validation_of_gig+=1;
                        }
                        break;
                      }

                      $sql_s="SELECT s_gig_image FROM standard_gig where s_gig_email='{$row["s_email"]}'";
                      $sql_run_s=mysqli_query($DatabaseConnect,$sql_s);
                      while($rows=mysqli_fetch_assoc($sql_run_s))
                      {
                        if(empty($rowp['s_gig_image']))
                        {
                          $check_validation_of_gig+=1;
                        }

                        break;
                      }
                      
                      $sql_b="SELECT b_gig_image FROM basic_gig where b_gig_email='{$row["s_email"]}'";
                      $sql_run_b=mysqli_query($DatabaseConnect,$sql_b);
                      while($rowb=mysqli_fetch_assoc($sql_run_b))
                      {
                        if(empty($rowp['b_gig_image']))
                        {
                          $check_validation_of_gig+=1;
                        }
                        break;
                      }

                      if($check_validation_of_gig==3)
                      {
                        if($row['s_status']==1)
                      {
                      $checkpoint++;


    ?>

    <?php
        $output='<div class="col-sm-12 col-lg-3 mt-3">
            <div class="card" style="width: 18rem;height:350px;">
              <!--carousel Start-->
              <a href="../show_freelancer_profile.php?id=<?php echo $row["s_id"]; ?>" style="font-size:16px;text-align:justify;padding:0;">
              <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                  </div>
                  <div class="carousel-inner">
                    <div class="carousel-item active">';
            ?>
                    <?php
                    $sql_p="SELECT p_gig_image FROM premium_gig where p_gig_email='{$row["s_email"]}'";
                    $sql_run_p=mysqli_query($DatabaseConnect,$sql_p);
                    while($rowp=mysqli_fetch_assoc($sql_run_p))
                    {

                     $output .='<img src="../BackendLogic/sellerlogic/gig_images/<?php echo $rowp["p_gig_image"]; ?>" class="d-block w-100"   style="height:170px;">';
                    
                    break;
                    }
                    ?>
                    
                    <?php
                    $output .="
                    </div>
                    <div class='carousel-item'>";
                     
                     ?>;
                    <?php
                    $sql_s="SELECT s_gig_image FROM standard_gig where s_gig_email='{$row["s_email"]}'";
                    $sql_run_s=mysqli_query($DatabaseConnect,$sql_s);
                    while($rows=mysqli_fetch_assoc($sql_run_s))
                    {
                      $output .='<img src="../BackendLogic/sellerlogic/gig_images/<?php echo $rows["s_gig_image"]; ?>" class="d-block w-100" alt="..." style="height:170px">';
                    break;
                    }
                    $output .='</div>
                    <div class="carousel-item">';
                    $sql_b="SELECT b_gig_image FROM basic_gig where b_gig_email='{$row["s_email"]}'";
                    $sql_run_b=mysqli_query($DatabaseConnect,$sql_b);
                    while($rowb=mysqli_fetch_assoc($sql_run_b))
                    {

                      $output .='<img src="../BackendLogic/sellerlogic/gig_images/<?php echo $rowb["b_gig_image"]; ?>" class="d-block w-100" alt="..." style="height:170px" >';
                    break;
                    }
                   $output .='</div>
                  </div>
                </div>
              <!-- Carousel end-->
              <div class="card-body">
                  <img src="../BackendLogic/sellerlogic/image/<?php echo $row["s_image"]; ?>" alt="" class="rounded-circle" width="40" height="40">
                <span class="card-title" style="font-size:22px;color:rgb(36, 36, 190);;font-family:Georgia, "Times New Roman", Times, serif;"><?php echo $row["s_name"]; ?></span>';

                    $sql_g="SELECT g_description FROM s_gig where s_email='{$row["s_email"]}'";
                    $sql_run_g=mysqli_query($DatabaseConnect,$sql_g);
                    while($rowg=mysqli_fetch_assoc($sql_run_g))
                    {

                    $output .='<p class="card-text mt-2"><?php echo $rowg["g_description"]; ?></p>';

                    break;
                    }

               $output .='<span>
                  <li class="fa fa-star" style="color:gold"></li>
                  <li class="fa fa-star" style="color:gold"></li>
                  <li class="fa fa-star" style="color:gold"></li>
                  <li class="fa fa-star" style="color:gold"></li>
              </span>
              </div>
            </div>
          </a>
      </div>';
                      }
                    }
                               
      }
    
    ?>

    <?php $output .='</div>'; 
    
    echo $output;
    
    ?>

      
