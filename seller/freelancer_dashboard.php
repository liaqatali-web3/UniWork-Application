<?php
session_start();
include '../BackendLogic/url.php';

if($_SESSION['Role_redirect']!="1")
{
  header("location:");
}

include '../BackendLogic/database_connectivity.php';



?>

<!DOCTYPE php>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard</title>
    <link rel="shortcut icon" href="../hardcode_images/cusit-logo.png" type="image/x-icon">
    <!-- bootstrap Linke -->
    <link rel="stylesheet" href="../asset/css/bootstrap.css">
    <!-- Custom css-->
    <link rel="stylesheet" href="../asset/custom/custom.css">
    <!-- icon link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  </head>
<?php

  if(isset($_GET['limitreach']))
  {
    echo "<script>alert('Sorry! Your Gig Limit is Reached To 4. Thank You');</script>";
  }

?>
<body id="message">

    <!-- navbar  -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border border-bottom-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="freelancer_main_page.php"><span class="title normal_text_color">Cusit Fiverr</sapn><sub style="font-size:11px;font-family: Arial, Helvetica, sans-serif;">Seller Dashboard</sub></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" ></span>
          </button>
          <div class="collapse navbar-collapse  " id="navbarSupportedContent">
            
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <form class="d-flex">
                    <div hidden class="border-radius-0 p-2 search-left" id="btnGroupAddon"><i class="fa fa-search" ></i></div>
                    <input hidden type="text" class="custom-border me-2" placeholder="Find Services" >
                    <button hidden class="btn border border-primary bg-primary text-white" type="submit"><span>Search</span></button>
                  </form>
              </li>
            </ul>

            <a href="freelancer_main_page.php" style="border:1px solid blue">Home</a>            
            <div style="width:30px"></div>
            <div class="btn-group m-lg-4 ml-lg-0 mt-lg-2 mb-lg-0">
            <?php

                $fetch_profile="SELECT * FROM seller where s_email='{$_SESSION['Email_redirect']}'";
                $sql_result=mysqli_query($DatabaseConnect,$fetch_profile);
                  $count=0;
                  while($row=mysqli_fetch_assoc($sql_result))
                  {
                    $count++;
                    if($row['s_image']!="null")
                    {
                ?>

              <img src="../BackendLogic/sellerlogic/image/<?php echo $row['s_image']; ?>" alt="" class="profile_image  " type="button" id="defaultDropdown" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false" style="width:40px;height:40px;">
                <?php
                  }
                  else
                  {
                    echo  "<img src='../Backendlogic/buyerlogic/image/default.png'  class='profile_image' type='button' id='defaultDropdown' data-bs-toggle='dropdown' data-bs-auto-close='true' aria-expanded='false' style='width:40px;height:40px;'>";

                  }
                  if($count==1)
                  {
                    break;
                  }


                
                }
                ?>
              <ul class="dropdown-menu  dropdown-menu-end dropdown-menu-lg-end" aria-labelledby="defaultDropdown" >
                <div class="row p-4">
                <div class="col-2 p-3 pt-2 pl-5">
                  <i class="fa fa-user" style="color:rgb(36, 36, 190)"></i>
                </div>
                <div class="col-10">
                  <li class="dropdown-item" style="text-align:left;"><a href="freelancer_profile_creation.php"><span class="link-text">Profile</span></a></li>
                </div>

                <div class="col-2 p-3 pt-2 pl-5">
                  <i class="fa fa-th" style="color:rgb(36, 36, 190)"></i>
                </div>
                <div class="col-10">
                  <li class="dropdown-item" style="text-align:left;"><a href="freelancer_project_dashboard.php"><span class="link-text">Project Dashboard</span></a></li>
                </div>

                <div class="col-2 p-3 pt-2 pl-5">
                  <i class="fa fa-unlock" style="color:rgb(36, 36, 190)"></i>                </div>
                <div class="col-10">
                  <li class="dropdown-item" style="text-align:left;"><a href="freelancer_security.php"><span class="link-text">Security</span></a></li>
                </div>


                <!-- <div class="col-2 p-3 pt-2 pl-5">
                  <i class="fa fa-gift" style="color:rgb(36, 36, 190)"></i>
                </div>
                <div class="col-10">
                  <li class="dropdown-item" style="text-align:left;"><a href="freelancer_project_dashboard.php"><span class="link-text">Texation</span></a></li>
                </div>

                <div class="col-2 p-3 pt-2 pl-5">
                  <i class="fa fa-credit-card" style="color:rgb(36, 36, 190)"></i>
                </div>
                <div class="col-10">
                  <li class="dropdown-item" style="text-align:left;"><a href="freelancer_project_dashboard.php"><span class="link-text">Payment</span></a></li>
                </div> -->

                <div class="col-2 p-3 pt-2 pl-5">
                  <i class="fa fa-exclamation-circle" style="color:red" style="color:rgb(36, 36, 190)"></i>
                </div>
                <div class="col-10">
                  <li class="dropdown-item" style="text-align:left;"><a href="../BackendLogic/logout.php"><span class="link-text">Logout</span></a></li>
                </div>

                </div><!-- End of Row-->
              </ul>
            </div>
        </div>
        </div>
      </nav>
<!-- navbar end-->

<!-- profile -->
<br> <br>
<div class="container ">
    <div class="row">
        <div class="col-lg-4 col-12">
            <!-- card 1st for profile -->
            <div class="card w-100 pl-5 pr-5 pt-3" >
                <center>
                <?php

                $fetch_profile="SELECT * FROM seller where s_email='{$_SESSION['Email_redirect']}'";
                $sql_result=mysqli_query($DatabaseConnect,$fetch_profile);
                  $count=0;
                  while($row=mysqli_fetch_assoc($sql_result))
                  {
                    $count++;
                ?>

                <form id="firstform">
                <?php
                if($row['s_image']!='null')
                {
                ?>
                <img  src="../BackendLogic/sellerlogic/image/<?php echo $row['s_image']; ?>" alt="" style="width:100px;height:100px;border-radius:50%">
                <?php
                }
                else
                {
                  echo  "<img src='../Backendlogic/buyerlogic/image/default.png'  class='profile_image' type='button' id='defaultDropdown' data-bs-toggle='dropdown' data-bs-auto-close='true' aria-expanded='false' style='width:100px;height:100px;border-radius:50%'>";
                
                }

                ?>
                <div class="transpart_custom_bg"  style="height:100px; width:100px;border-radius:50%;opacity:0.9;position:relative;top:-100px"><i class="fa fa-camera" style="color:white;font-size:40px;margin-top:30px"></i>
                <input name="simage" type="file" title=" " ></div>
                <input name="sname" value='<?php echo $row["s_name"];?>' class="custom_input w-75" placeholder="Edit Name">
                <input name="sstory" value='<?php echo $row["s_story"]; ?>' class="custom_input mt-4 w-75" placeholder="One line Story">
                <br>
                <input type="submit" id="btnprofile" class="btn bg-primary text-white" value="Update">
                </form>
                <?php
                                if($count==1)
                                {
                                  break;
                                }
                     }
                     
                  ?>
                <br><br>
                </center>
                </div>
            <!-- card 1st for profile end -->

            <!-- Card 2nd for description etc -->
                <div class="card w-100 pl-5 pr-5 pt-2 mt-3">
                    <center>
                
                <?php
                $fetch_profile="SELECT * FROM seller where s_email='{$_SESSION['Email_redirect']}'";
                $sql_result=mysqli_query($DatabaseConnect,$fetch_profile);
                     $count=0;
                  while($row=mysqli_fetch_assoc($sql_result))
                  {
                    $count++;
                ?>


                    <h6 class="m-4 mr-0 mt-2 mb-0 common-title" id="Description">Description</h6>
                    <br>
                    <textarea class="w-75 custom-textarea"  name="" id="DescriptionArea"><?php echo $row['s_description'];?></textarea>
                    <br>
                    <button type="submit" class="btn mb-3 bg-primary text-white" id="DescriptionUpdate">Update</button>
                  <?php
                                  if($count==1)
                                  {
                                    break;
                                  }
                    }
                  ?>
                  
                  </center>

                    <center>
                        <h6 class="m-4 mr-0 mt-2 mb-0 common-title" id="Description">Language</h6>
                        <br><br><br>
                        <select name="" id="language" class="m-0 w-75  custom_input">
                            <option value="default" class="option" name="default" selected>Language</option>
                            <option value="English" class="option" name="LanEnglish">English</option>
                            <option value="Urdu" class="option" name="LanUrud">Urdu</option>
                            <option value="Pashto" class="option" name="LanPashto">Pashto</option> 
                        </select>
                        <br><br>
                        <select name="" id="level" class="m-0 w-75  custom_input">
                          <option value="default" class="option" name="default">Level</option>
                          <option value="basic" class="option" name="basic">Basic</option>
                          <option value="conversational" class="option" name="conversational">Conversational</option> 
                          <option value="Fluent" class="option" name="fluent">Fluent</option> 
                          <option value="Navtive" class="option" name="navtive">Navtive</option> 
                      </select>
                        <br>
                        <button  class="btn mb-3 bg-primary text-white" id="LanguageUpdate">Update</button>
                        <div class="ScrollBar">
                        <table class="table" id="languagetable">
                          <?php
                             $fetch_language="SELECT * FROM s_language where s_email='{$_SESSION['Email_redirect']}'";
                            $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);
                            while($row=mysqli_fetch_assoc($fetch_language_run))
                            {

                          ?>
                          <tr style="text-align: center;">
                            <td><?php echo $row['s_language']; ?></td>
                            <td><?php echo $row['s_language_level'];?></td>
                            <td><button class="fa fa-trash btn btn-delete" id="delete_language" data-id=<?php echo $row['s_language_id'];?> ></button></td>
                          </tr>
                          <?php
                            }
                          ?>
                        
                        </table>
                        </div>

                      </center>
                    </div>
                    <!-- Card 2nd for description etc end -->


                    
                 
                    <!-- skill Start -->
                      <div class="card w-100 pl-5 pr-5 pt-2 mt-3">
                        <center>
                          <h6 class="m-4 mr-0 mt-2 mb-0 common-title" id="Description">Skills</h6>
                          <br><br><br>
                          <select name="" id="skill" class="m-0 w-75  custom_input">
                              <option value="Web Design & Development" class="option" name="LanEnglish">Web Design & Development</option>
                              <option value="Android Development" class="option" name="LanUrud">Android Development</option>
                              <option value="IOS Development" class="option" name="LanPashto">IOS Development</option> 
                              <option value="Logo Design" class="option" name="LanPashto">Logo Design</option>
                              <option value="Video Editing" class="option" name="LanPashto">Video Editing</option> 
                              <option value="Gif File & Animation" class="option" name="LanPashto">Gif File and Animation</option>                                                     
                              <option value="Email Writing" class="option" name="LanPashto">Email Writing</option> 
                              <option value="Letter Writing" class="option" name="LanPashto">Letter Writing</option> 
                              <option value="Creative" class="option" name="LanPashto">Creative Writing</option> 
                          </select>
                          <br><br>
                          <select name="" id="experience" class="m-0 w-75  custom_input">
                            <option value="6 Month" class="option" name="basic">6 Months</option>
                            <option value="1 Year" class="option" name="conversational">1 Year</option> 
                            <option value="2 Year" class="option" name="fluent">2 Year</option> 
                            <option value="Above" class="option" name="navtive">Above</option> 
                        </select>
                          <br>
                          <button  class="btn mb-3 bg-primary text-white" id="sUpdate">Update</button>
  
                          <table class="table" id="skilltable">
                          <?php
                             $fetch_language="SELECT * FROM s_skill where s_email='{$_SESSION['Email_redirect']}'";
                            $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);
                            while($row=mysqli_fetch_assoc($fetch_language_run))
                            {

                          ?>
                          <tr style="text-align: center;">
                            <td><?php echo $row['s_skill']; ?></td>
                            <td><?php echo $row['s_skill_level'];?></td>
                            <td><button class="fa fa-trash btn btn-delete-skill" id="delete_skill" data-id=<?php echo $row['s_skill_id'];?> ></button></td>
                          </tr>
                          <?php
                            }
                          ?>

                           </table>
                 
                      </div>
                      <!-- skill end -->






                         <!-- education Start -->
                         <div class="card w-100 pl-5 pr-5 pt-2 mt-3">
                          <center>
                            <h6 class="m-4 mr-0 mt-2 mb-0 common-title" id="Description">Education</h6>
                            <br><br><br>
                            <select name="" id="title" class="m-0 w-75  custom_input">
                                <option value="default">Title</option>
                                <option value="BS" class="option" name="LanEnglish">BS</option>
                                <option value="BA" class="option" name="LanUrud">BA</option>
                                <option value="MA" class="option" name="LanPashto">MA</option> 
                                <option value="Intermediate" class="option" name="LanPashto">Intermediate</option> 
                                <option value="Secondary School" class="option" name="LanPashto">Secondary School</option> 
                                <option value="Primary School" class="option" name="LanPashto">Primary School</option> 
                            </select>
                            <br><br>
                            <select name="" id="major" class="m-0 w-75  custom_input">
                                <option value="default">Major</option>
                                <option value="Computer Science" class="option" name="LanEnglish">Computer Science</option>
                                <option value="Software Engineering" class="option" name="LanUrud">Software Engineering</option>
                                <option value="Accounting" class="option" name="LanPashto">Accounting</option> 
                                <option value="Finance" class="option" name="LanPashto">Finance</option> 
                                <option value="Electrical Engineering" class="option" name="LanPashto">Electrical Engineering</option> 
                                <option value="Civil Engineering" class="option" name="LanPashto">Civil Engineering</option> 
                            </select>
                            <br><br>
                            <select name="" id="year" class="m-0 w-75  custom_input">
                              <option value="default">Year</option>
                              <option value="Below" class="option">Below</option>
                              <option value="2001" class="option">2001</option>
                              <option value="2002" class="option">2002</option>
                              <option value="2003" class="option">2003</option>
                              <option value="2004" class="option">2004</option>
                              <option value="2005" class="option">2005</option>
                              <option value="2006" class="option">2006</option>
                              <option value="2007" class="option">2007</option>
                              <option value="2008" class="option">2008</option>
                              <option value="2009" class="option">2009</option>
                              <option value="2010" class="option">2010</option>
                              <option value="2011" class="option">2011</option>
                              <option value="2012" class="option">2012</option>
                              <option value="2013" class="option">2013</option>
                              <option value="2014" class="option">2014</option>
                              <option value="2015" class="option">2015</option>
                              <option value="2016" class="option">2016</option>
                              <option value="2017" class="option">2017</option>
                              <option value="2018" class="option">2018</option>
                              <option value="2019" class="option">2019</option>
                              <option value="2020" class="option">2020</option>
                              <option value="2021" class="option">2021</option>
                              <option value="2022" class="option">2022</option>
                              
                          </select>
                            <br>
                            <button  class="btn mb-3 bg-primary text-white" id="eUpdate">Update</button>
   
                            <table class="table" id="educationtable">
                            <?php
                             $fetch_language="SELECT * FROM s_education where s_email='{$_SESSION['Email_redirect']}'";
                            $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);
                            while($row=mysqli_fetch_assoc($fetch_language_run))
                            {

                          ?>
                          <tr style="text-align: center;">
                            <td><?php echo $row['s_education_title']; ?></td>
                            <td><?php echo $row['s_education_major'];?></td>
                            <td><?php echo $row['s_education_year'];?></td>
                            
                            <td><button class="fa fa-trash btn btn-delete-education" id="delete_education" data-id=<?php echo $row['s_education_id'];?> ></button></td>
                          </tr>
                          <?php
                            }
                          ?>
                             </table>
                   
                        </div>
                        <!-- education end-->

                          <!-- Certificate start -->
                          <div class="card w-100 pl-5 pr-5 pt-2 mt-3">
                          <center>
                            <h6 class="m-4 mr-0 mt-2 mb-0 common-title" id="Description">Certificates</h6>
                            <br>
                            <input type="text" id="certificate" class="InputField" placeholder="Certificate Name">
                            <br><br>
                            <input type="text" id="from" class="InputField" placeholder="From">
                            
                           <br><br><br><br><br>
                            <select name="" id="cyear" class="m-0 w-75  custom_input">
                              <option value="default">Year</option>
                              <option value="Below" class="option">Below</option>
                              <option value="2001" class="option">2001</option>
                              <option value="2002" class="option">2002</option>
                              <option value="2003" class="option">2003</option>
                              <option value="2004" class="option">2004</option>
                              <option value="2005" class="option">2005</option>
                              <option value="2006" class="option">2006</option>
                              <option value="2007" class="option">2007</option>
                              <option value="2008" class="option">2008</option>
                              <option value="2009" class="option">2009</option>
                              <option value="2010" class="option">2010</option>
                              <option value="2011" class="option">2011</option>
                              <option value="2012" class="option">2012</option>
                              <option value="2013" class="option">2013</option>
                              <option value="2014" class="option">2014</option>
                              <option value="2015" class="option">2015</option>
                              <option value="2016" class="option">2016</option>
                              <option value="2017" class="option">2017</option>
                              <option value="2018" class="option">2018</option>
                              <option value="2019" class="option">2019</option>
                              <option value="2020" class="option">2020</option>
                              <option value="2021" class="option">2021</option>
                              <option value="2022" class="option">2022</option>
                              
                          </select>
                            <br>
                            <button  class="btn mb-3 bg-primary text-white" id="cUpdate">Update</button>
   
                            <table class="table" id="certificatetable">
                            <?php
                             $fetch_language="SELECT * FROM s_certificate where s_email='{$_SESSION['Email_redirect']}'";
                            $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);
                            while($row=mysqli_fetch_assoc($fetch_language_run))
                            {

                          ?>
                          <tr style="text-align: center;">
                            <td><?php echo $row['s_certificate']; ?></td>
                            <td><?php echo $row['s_certificate_from'];?></td>
                            <td><?php echo $row['s_certificate_year'];?></td>
                            
                            <td><button class="fa fa-trash btn btn-delete-certificate" id="delete_education" data-id=<?php echo $row['s_certificate_id'];?> ></button></td>
                          </tr>
                          <?php
                            }
                          ?>
                             </table>
                            </center>
                        </div>
                        <!-- certificate end-->



        </div>

        <div class="col-lg-8 col-sm-12 mt-3 mt-lg-0">
            <div class="card w-100 p-4">
                <div class="row justify-content-end">
                    <div class="col-lg-9 col-sm-12">
                        <span>It seems that you don't have any active Gigs. Get selling!</span>        
                    </div>
                    <div class="col-lg-3 col-sm-12 mt-3 mt-lg-0">
                        <a href="freelancer_gig.php" class="btn bg-primary text-white p-2 p-0 w-100" style="font-size:13px;display:inline">Create A New Gig </a>
                    </div>
                </div>
            </div>
              <br>
            <div class="row">
              <?php

              // go to database and change forign key names which same as primary it many create
              //conplict.
               $fetch_language="SELECT * FROM s_gig inner join standard_gig on s_gig.s_gig_id=standard_gig.s_gig_id where s_gig.s_email='{$_SESSION['Email_redirect']}'";
               $fetch_language_run=mysqli_query($DatabaseConnect,$fetch_language);

               if(mysqli_num_rows($fetch_language_run)>0)
               {
                 
               while($row=mysqli_fetch_assoc($fetch_language_run))
                {
                ?>
                <div class="col-6 mt-2">
                  <center>
                <div class="card border-0" style="width:90%;">
                  <img src="../BackendLogic/sellerlogic/gig_images/<?php echo $row['s_gig_image'];?>" alt="" srcset="" style="height:220px;">
                  <span style="text-align:center;margin-top:15px;margin-bottom:7px;">
                  <a href="freelancer_gig_updation.php?id=<?php echo $row['s_gig_id'];?>" style="font-size:16px;"><?php echo $row['g_name']; ?></a>
                  </span>
                    <span style="margin-top:0px;text-align:center;">
                    <li class="fa fa-star" style="color:gold"></li>
                    <li class="fa fa-star" style="color:gold"></li>
                    <li class="fa fa-star" style="color:gold"></li>    
                    </span>
                    
                    
                  <form action="<?php $_SERVER['PHP_SELF']; ?>">

                  <input type="text" hidden value="<?php echo $row['s_gig_id']?>" name="delete_gig_id">
                  <input type="submit" value="Delete Gig" name="delete_gig"  class="btn btn-danger">
                  </div>
                
                  </form>  
                </center>
              </div>
              <?php
                }}
              ?>
            </div>
        </div>
    </div>
</div>

<!-- profile end-->


<br><br><br><br>
<!-- -->

<!-- footer Start -->
<hr>
<div class="container">

  <div class="row">
    <div class="col-sm-12 col-lg-3">
     <h5 class="common-title">Categories</h5>
     <p>Graphics & Design</p>
     <p>Digital Marketing</p>
     <p>Writing & Translation</p>
     <p>Video & Animation</p>
     <p>Music & Audio</p>
     <p>Programming & Tech</p>
     <p>Data</p>
     <p>Business</p>
     <p>Lifestyle</p>
     <p>Sitemap</p>
     </div>
     <div class="col-sm-12 col-lg-2">
      <h5 class="common-title">About</h5>
      <p>Careers</p>
      <p>Press & News</p>
      <p>Partnerships</p>
      <p>Privacy Policy</p>
      <p>Terms of Service</p>
      <p>Intellectual Property Claims</p>
      <p>Investor Relations </p>
      </div>
     <div class="col-sm-12 col-lg-2">
      <h5 class="common-title">Support</h5>
      <p>Help & Support</p>
      <p>Trust & Safety</p>
      <p>Selling on Fiverr</p>
      <p>Buying on Fiverr</p>
     </div>
     <div class="col-sm-12 col-lg-2">
      <h5 class="common-title">Community</h5>
      <p>Events</p>
      <p>Blog</p>
      <p>Forum</p>
      <p>Community Standards</p>
      <p>Podcast</p>
      <p>Affiliates</p>
      <p>Invite a Friend</p>
      <p>Become a Sellerdiv</p> 
      </div>
      <div class="col-sm-12 col-lg-3">
      <h5 class="common-title">More From Cusit-Fiverr</h5>
      <p>Fiverr Pro</p>
      <p>Fiverr Studios</p>
      <p>Fiverr Logo Maker</p>
      <p>Fiverr Guides</p>
      <p>Get Inspired</p>
      <p>ClearVoice</p>
      <p>Content Marketing</p>
      <p>Fiverr Workspace</p>
      <p>Invoice Software</p>
      </div>
    </div>
</div>

<div class="container">
  <hr>
  <div class="row">
  <div class="col-sm-12 col-lg-6"><span class="common-title" style="font-size:30px">Cusit-Fiverr</span> ©City University Peshware</div>
  <div class="col-sm-12 col-lg-6">
    <span class="float-lg-end">
    <i class="fa fa-whatsapp" style="color:green;font-size:30px;margin-right:12px"></i>
    <i class="fa fa-youtube" style="color:red;font-size:30px;margin-right:12px"></i>
    <i class="fa fa-facebook" style="color:blue;font-size:30px;margin-right:12px"></i>
    <i class="fa fa-instagram" style="color:red;font-size:30px;margin-right:12px"></i>
    <i class="fa fa-twitter" style="color:rgb(0, 225, 255);font-size:30px;margin-right:12px"></i>
    <i class="fa fa-google" style="color:blue;font-size:30px;margin-right:12px"></i>
  </span>
    </div>
  </div>
</div>
<br>
<!-- footer End-->




<!-- Custom Javacript-->
<script src="../asset/custom/profile.js"></script>
<!-- javascript Linke -->
<script src="../asset/js/bootstrap.js"></script>
<!-- jquery -->
<script src="../asset/custom/jquery.js"></script>
<script src="../asset/custom/seller_jquery.js"></script>


</body>
</php>

<?php
if(isset($_GET['delete_gig']))
{

  $sql="DELETE FROM s_gig where s_gig_id={$_GET['delete_gig_id']}";
  $sql_run=mysqli_query($DatabaseConnect,$sql);
  if($sql_run)
  {
    $sql_basic="DELETE FROM basic_gig where b_gig_id={$_GET['delete_gig_id']}";
    $sql_basic_run=mysqli_query($DatabaseConnect,$sql_basic);
    if($sql_basic_run)
    {
    $sql_standard="DELETE FROM standard_gig where s_gig_id={$_GET['delete_gig_id']}";
    $sql_standard_run=mysqli_query($DatabaseConnect,$sql_standard);
    if($sql_standard_run)
    {
    $sql_premium="DELETE FROM premium_gig where p_gig_id={$_GET['delete_gig_id']}";
    $sql_premium_run=mysqli_query($DatabaseConnect,$sql_premium);
    if($sql_premium_run)
    {
      echo "<script>document.location.reload(true);<script>";
      header("location:seller/freelancer_dashboard.php");
    }

    }
  }

  }

}

?>