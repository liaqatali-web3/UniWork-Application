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
    <title>Create Gig</title>
    <link rel="shortcut icon" href="../hardcode_images/cusit-logo.png" type="image/x-icon">
    <!-- bootstrap Linke -->
    <link rel="stylesheet" href="../asset/css/bootstrap.css">
    <!-- Custom css-->
    <link rel="stylesheet" href="../asset/custom/custom.css">
    <!-- icon link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>


    <!-- navbar  -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border border-bottom-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="freelancer_main_page.php"><span class="title normal_text_color">Cusit Fiverr</sapn><sub style="color:grey;font-size:12px;font-family:sans-serif"> Profile Information</sub></a>

                <!-- Buyer navigation-->
                <div>
                    <a href="freelancer_main_page.php" class="link-text" style="font-size:15px;">Home</a>
                    <a href="freelancer_dashboard.php" class="link-text" style="font-size:15px;">DashBoard</a>
                    <a href="freelancer_security.php" class="link-text" style="font-size:15px;">Security</a>
                    <a href="freelancer_project_dashboard.php" class="link-text" style="font-size:15px;">Project DashBoard</a>
                    <!-- <a href="freelancer_texation.php" class="link-text" style="font-size:15px;">Texation</a>
                    <a href="freelancer_payment.php" class="link-text" style="font-size:15px;">Payment</a> -->
                    <a href="../BackendLogic/logout.php" class="link-text" style="font-size:15px;">Signout</a>
                </div>
                <!-- Buyer navigation End-->    


        </div>
    </nav>
    <!-- navbar end-->

    <!-- Get Ready End -->
    <div class="container" id="GetReady">
        <br><br><br>
        <div class="row">

            <!-- left side text start -->
            <div class="col-lg-5 col-sm-12 pr-5">


                <h4 class="common-title">Ready to start selling on Fiverr? <br> Here’s the breakdown:</h4>
                <br>
                <hr>
                <div class="row">
                    <div class="col-1">
                        <i class="fa fa-book icon_custom_color"></i>
                    </div>
                    <div class="col-11">
                        Learn what makes a successful profile
                        Discover the do’s and don’ts to ensure you’re always on the right track.
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-1">
                        <i class="fa fa-user icon_custom_color"></i>
                    </div>
                    <div class="col-11">
                        Create your seller profile
                        Add your profile picture, description, and professional information.
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-1">
                        <i class="fa fa-home icon_custom_color"></i>
                    </div>
                    <div class="col-11">
                        Publish your Gig
                        Create a Gig of the service you’re offering and start selling instantly.
                    </div>
                </div>
                <hr>
                <br><br>
                <button class="custom-btn" id="GetReadyBtn">Continue</button>

            </div>
            <!-- left side text end-->


            <!-- right side video start -->
            <div class="col-lg-1"></div>
            <div class="col-lg-6 col-sm-12 mt-lg-0 mt-5">
                <video src="../video/selling.mp4" width="100%" height="100%" autoplay="ture" controls
                    style="margin-top:-35px;padding-bottom:40px;"></video>
            </div>
            <!-- right side video end-->

        </div>
    </div>
    <!-- Get Ready End -->





    <!-- What make profile Best-->
    <br>
    <div class="container" id="WhatMakeProfileBest">
        <div class="row">
            <!-- left side start -->
            <div class="col-lg-4">
                <img src="../hardcode_images/side.png" class="rounded-3 w-lg-75 " height="550px" alt="">
            </div>
            <!-- left side end-->
            <!-- right side start-->
            <div class="col-lg-7">
                <br>
                <h3 class="common-title">What makes a successful Fiverr profile?</h3>
                <p style="font-family:Arial, Helvetica, sans-serif;">Your first impression matters! Create a profile
                    that will stand out from the crowd on Fiverr.</p>
                <div class="row">

                    <div class="col-lg-4 col-6 mt-lg-0 mt-5 pl-5">
                        <center>
                        <i class="fa fa-user-circle common-title" style="font-size:50px;"></i><br>
                        Take your time in creating your profile so it’s exactly as you want it to be.
                        </center>
                    </div>
                    <div class="col-lg-4 col-6 mt-lg-0 mt-5">
                        <center>
                            <i class="fa fa-link common-title" style="font-size:50px;"></i><br>
                        Add credibility by linking out to your relevant professional networks.
                        </center>
                    </div>
                    <div class="col-lg-4 col-6 mt-lg-0 mt-5">
                        <center>
                            <i class="fa fa-gears common-title" style="font-size:50px;"></i><br>
                        Accurately describe your professional skills to help you get more work.
                        </center>
                    </div>
                   
                    <div class="col-lg-4 col-6 mt-lg-0 mt-5">
                        <center>
                        <i class="fa fa-smile-o common-title" style="font-size:50px;"></i><br>
                        Put a face to your name! Upload a profile picture that clearly shows your face.
                        </center>

                    </div>

                </div>

                <br>
                <button class="custom-btn" id="WhatMakeProfileBestBtn">Containue</button>
                <button class="custom-btn" id="BackFromWhatMakeProfileBestBtn">back</button>
            </div>
            <!-- right side end-->
        </div>
        <!--row end -->
    </div>
    <!--container end-->


    <!-- What make profile Best-->





    <!-- Steer Clear Up-->

    <div class="container" id="SteerClearUp">
        <div class="row">
            <!-- left side start -->
            <div class="col-lg-4">
                <img src="../hardcode_images/side.png" class="rounded-3 w-lg-75 " height="550px" alt="">
            </div>
            <!-- left side end-->
            <!-- right side start-->
            <div class="col-lg-7">
                <h3 class="common-title">Now, let’s talk about the things you want to steer clear of.</h3>
                <p style="font-family:Arial, Helvetica, sans-serif;">Your success on Fiverr is important to us. Avoid
                    the following to keep in line with our community standards:</p>
                <div class="row">

                    <div class="col-lg-4 col-6 mt-lg-0 mt-5 pl-5">
                        <center>
                        <i class="fa fa-warning common-title" style="font-size:50px;"></i><br>
                           Providing any misleading or inaccurate information about your identity.
                        </center>
                    </div>
                    <div class="col-lg-4 col-6 mt-lg-0 mt-5">
                        <center>
                            <i class="fa fa-users common-title" style="font-size:50px;"></i><br>
                            Opening duplicate accounts. Remember, you can always create more Gigs.
                        </center>        
                    </div>
                    <div class="col-lg-4 col-6 mt-lg-0 mt-5">
                        <center>
                            <i class="fa fa-mail-forward common-title" style="font-size:50px;"></i><br>
                            Soliciting other community members for work on CusitFiverr.
                        </center>                        
                    </div>
                    <div class="col-lg-4 col-6 mt-lg-0 mt-5">
                        <center>
                            <i class="fa fa-money common-title" style="font-size:50px;"></i><br>
                            Requesting to take communication and payment outside of CusitFiverr.
                        </center>
                    </div>

                </div>

                <br>
                <button class="custom-btn" id="SteerClearUpBtn">Containue</button>
                <button class="custom-btn" id="BackSteerClearUpBtn">back</button>

            </div>
            <!-- right side end-->
        </div>
        <!--row end -->
    </div>
    <!--container end-->

    <!-- Stree Clear Up end-->



    <!-- progress bar For Gig-->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border border-bottom-dark"
        style="margin-top:-25px;padding:20px 0px 5px 0px" id="ProgressBarFirst">
        <div class="container-fluid">
            <div class=" navbar-collapse" id="navbarSupportedContent">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-10 col-12">
                            <ol class="ProgressBar">
                                <li><span class="ProgressCircle">1</span> Personal Info ></li>
                                <li><span class="ProgressCircle">2</span> Professional Info ></li>
                                <li><span class="ProgressCircle">3</span> Stay Tune ></li>
                                <li><span class="ProgressCircle">4</span> Gig Banner </li>
                            </ol>
                        </div>
                        <div class="col-lg-2 col-12" style="margin-top:-10px">
                            <span>Completion Rate:<span>20%</span></span>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar"
                                    style="width: 20%;background-color:rgb(35, 14, 158);" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- progress bar For Gig End-->


    <!-- personal info about profile Start -->
    <div class="container mt-2" id="PersonalInfo">

    <form id="profileinfo_form">
        <div class="row">
            <div class="col-6">
                <h3 class="common-title">Personal Info</h3>
                <p>Tell us a bit about yourself. This information will appear on your public profile, so that potential
                    buyers can get to know you better.</p>
            </div><!-- colum End-->


        </div><!-- first Row End-->
        <p style="text-align:right;color:grey">*Mandatory fields</p>
        <hr>
        <br>

        <div class="row">
            <div class="col-4 ">
                <h4>Full Name<span style="color:red">*</span> <i style="font-size:16px;color:grey">private</i></h4>
                <span style="color:grey" id="FullName">Ex. john Hero</span>
            </div>

            <div class="col-8">
                <?php
                $fetch_profile="SELECT * FROM seller where s_email='{$_SESSION['Email_redirect']}'";
                $sql_result=mysqli_query($DatabaseConnect,$fetch_profile);
                  while($row=mysqli_fetch_assoc($sql_result))
                  {
                ?>
                <input type="text" name='name' placeholder="Full Name" class="InputField" value="<?php echo $row['s_name']; ?>" id="name" style="width:60%">
                <span id="name_message" class="text-danger">Please Enter Your Name</span>
                <?php
                  }
                ?>
                <br>
                <span style="margin-left:25px;color:red;display:none;" id="EMFirstName">Enter Your Full Name</span>
            </div>
        </div>

        <br><br><br><br><br>
        <div class="row">
            <div class="col-4">
                <h4>Profile Picture<span style="color:red">*</span></h4>
                <span style="color:grey" id="FullName">Add a profile picture of yourself so customers will know exactly
                    who they’ll be working with.</span>
            </div>
            <div class="col-8">
            <?php
                $fetch_profile="SELECT * FROM seller where s_email='{$_SESSION['Email_redirect']}'";
                $sql_result=mysqli_query($DatabaseConnect,$fetch_profile);
                  while($row=mysqli_fetch_assoc($sql_result))
                  {
            ?>
                <img src="../BackendLogic/sellerlogic/image/<?php echo $row['s_image'];?>" alt=""
                    style="width:100px;height:100px;border-radius:50%;margin-left:150px">
            <?php
                  }
            ?>
                <div class="transpart_custom_bg"
                    style="height:100px; width:100px;border-radius:50%;opacity:0.9;position:relative;top:-100px;left:150px">
                    <i class="fa fa-camera"
                        style="color:white;font-size:40px;margin-top:30px;margin-left:28px"></i>
                        <input type="file" name="image" id="image"></div>
                <span style="margin-left:145px;position:relative;top:-90px;color:red;display: none;" id="EMImage">Select
                    a Picture</span>
            </div>
        </div>


        <br><br><br><br><br>
        <div class="row">
            <div class="col-4">
                <h4>Description<span style="color:red">*</span></h4>
            </div>
            <div class="col-8">
            <?php
            
               $fetch_profile="SELECT * FROM seller where s_email='{$_SESSION['Email_redirect']}'";
                $sql_result=mysqli_query($DatabaseConnect,$fetch_profile);
                  while($row=mysqli_fetch_assoc($sql_result))
                  {
            ?>
                <textarea name="description" id="description" cols="87" rows="7"
                    placeholder="Share a bit about your work experience,cool project you've completed, and your are of expertise."
                    style="padding:10px;border:1px solid grey;border-radius:5px"><?php echo $row['s_description'];?></textarea>
                    <span id="Description_message" class="text-danger">Please Enter Your Short Description</span>

                <?php
                  }
                ?>
                <div class="row justify-content-between">
                    <div class="col-6">
                        <span style="color:red">Please enter at least 150 characters</span>
                    </div>
                    <div class="col-2">
                        
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br>

        <div class="row">
            <div class="col-4">
                <h4>Personal Website</h4>
                <i style="color:grey">Private</i>
            </div>
            <div class="col-8">
            <?php    
            $fetch_profile="SELECT * FROM seller where s_email='{$_SESSION['Email_redirect']}'";
             $sql_result=mysqli_query($DatabaseConnect,$fetch_profile);
               while($row=mysqli_fetch_assoc($sql_result))
               {
            ?>
                <input type="text" name="website" id="website" class="InputField" value="<?php echo $row['s_website'];?>"
                    placeholder="Provide a link to your own professional website"
                    style="width:98%;margin-left:-10px;border:1px solid rgb(182, 181, 181);">
                    <span id="website_message" class="text-danger">Please Enter Your Website Link</span>


            <?php
               }
            ?>
            </div>
        </div>
        <br>

        <div class="row justify-content-end">
            <div class="col-2">
                <button  class="custom-btn bg-danger" id="confirmation_first">Confirm</button>
            </div>
        </div>

        <div class="row justify-content-end">
            <div class="col-2">
                <input type="submit" class="custom-btn" id="PersonalInfoBtn" value="Continue">
            </div>
        </div>

        <br>
        </form>
 
    </div>
    <!-- information about profile End-->

    <!-- form validation -->
    <script>

        document.getElementById("PersonalInfoBtn").style="display:none";
        
        document.getElementById("name_message").style="display:none";
        document.getElementById("Description_message").style="display:none";
        document.getElementById("website_message").style="display:none";


        const confirmationbtn=document.getElementById("confirmation_first");
        confirmationbtn.addEventListener("click",(e)=>{
        const name=document.getElementById("name");
        const image=document.getElementById("image");
        const description=document.getElementById("description");
        const website=document.getElementById("website");


        var check=0;
        if((name==='' && name==null) || (name.value=="") || (name.value=="null"))
        {
            document.getElementById("name_message").style="display:block";
            check=1;
        }

        
        if((description==='' && description==null) || (description.value=="") || (description.value=="null"))
        {
            document.getElementById("Description_message").style="display:block";
            check=1;
        }
        

        
        if((website==='' && website==null) || (website.value=="") || (website.value=="null"))
        {
            document.getElementById("website_message").style="display:block";
            check=1;
        }


        if(check==0)
        {
            confirmationbtn.style="display:none";
            document.getElementById("PersonalInfoBtn").style="display:block";
            

        }
    
        });

    </script>




    <!-- progress bar For Gig-->
    <nav id="ProgressBarSecond" class="navbar navbar-expand-lg navbar-light bg-white border border-bottom-dark"
        style="margin-top:-25px;padding:20px 0px 5px 0px">
        <div class="container-fluid">
            <div class=" navbar-collapse" id="navbarSupportedContent">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-10 col-12">
                            <ol class="ProgressBar">
                                <li style="color:rgb(35, 14, 158);font-weight: bolder;"><span class="ProgressCircle"
                                        style="background-color:rgb(35, 14, 158);color:white;border:1px solid rgb(35, 14, 158);">1</span>
                                    Personal Info ></li>
                                <li><span class="ProgressCircle">2</span> Professional Info ></li>
                                <li><span class="ProgressCircle">3</span> Stay Tune ></li>
                                <li><span class="ProgressCircle">4</span> Gig Banner </li>
                            </ol>
                        </div>
                        <div class="col-lg-2 col-12" style="margin-top:-10px">
                            <span>Completion Rate:<span>50%</span></span>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar"
                                    style="width: 50%;background-color:rgb(35, 14, 158);" aria-valuenow="25"
                                    aria-valuemin="50" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- progress bar For Gig End-->


    <!-- professional information about profile Start -->

    <div class="container mt-2" id="ProfessionalInfo">
        <div class="row">
            <div class="col-6">
                <h3 class="common-title">Professional Info</h3>
                <p>This is your time to shine. Let potential buyers know what you do best and how you gained your
                    skills, certifications and experience.</p>
            </div><!-- colum End-->
        </div><!-- first Row End-->
        <p style="text-align:right;color:grey">*Mandatory fields</p>
        <hr>
        <br>


        <!-- EXPERIENCE -->
        <br><br>
        <div class="row">
            <div class="col-4">
                <h4>Skills<span style="color:red">*</span></h4>
                <span style="color:grey;" id="FullName">List the skills related to the services you're offering and add
                    your experience level.</span>
            </div>
            <div class="col-8">
                <div class="row border p-2" style="width:99%">
                    <div class="col-5 mt-2">
                        <select name="skill" id="skill" class="InputDropDown" style="width:100%">
                              <option value="Web Design & Development" class="option" name="LanEnglish">Web Design & Development</option>
                              <option value="Android Development" class="option" name="LanUrud">Android Development</option>
                              <option value="IOS Development" class="option" name="LanPashto">IOS Development</option> 
                              <option value="Logo Design" class="option" name="LanPashto">Logo Design</option>
                              <option value="Video Editing" class="option" name="LanPashto">Video Editing</option> 
                              <option value="Gif File & Animation" class="option" name="LanPashto">Gif File and Animation</option>                                                     
                              <option value="Email Writing" class="option" name="LanPashto">Email Writing</option> 
                              <option value="Letter Writing" class="option" name="LanPashto">Letter Writing</option> 
                              <option value="Creative writing" class="option" name="LanPashto">Creative Writing</option> 
                        </select>
                    </div>
                    <div class="col-5 mt-2">
                        <select name="" id="experience" class="InputDropDown" style="width:80%">
                        <option value="6 Month" class="option" name="basic">6 Months</option>
                            <option value="1 Year" class="option" name="conversational">1 Year</option> 
                            <option value="2 Year" class="option" name="fluent">2 Year</option> 
                            <option value="Above" class="option" name="navtive">Above</option> 
                        </select>
                    </div>
                    <div class="col-2">
                        <button class="custom-btn mt-3" id="sUpdate">Add</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            var sUpdate=document.getElementById("sUpdate");

            sUpdate.addEventListener("click",()=>{
                alert("You Have Successfuly Add Your Skill");
            })
        </script>
        <!-- EDUCATION--->
        <br><br><br><br><br>
        <div class="row">
            <div class="col-4">
                <h4>Education</h4>
                <span style="color:grey;" id="FullName">Add any relevant education details that will help customers to
                    get to know you better.</span>
            </div>
            <div class="col-8">
                <div class="row border p-3" style="width:99%">
                    <div class="col-6"></div>
                    <div class="col-6"></div>

                    <div class="row mt-3">
                        <div class="col-8">
                            <select name="" id="title" class="InputField"
                                style="border-radius:5px 0px 0px 5px;padding-bottom:11px">
                                <option value="default">Title</option>
                                <option value="BS" class="option" name="LanEnglish">BS</option>
                                <option value="BA" class="option" name="LanUrud">BA</option>
                                <option value="MA" class="option" name="LanPashto">MA</option> 
                                <option value="Intermediate" class="option" name="LanPashto">Intermediate</option> 
                                <option value="Secondary School" class="option" name="LanPashto">Secondary School</option> 
                                <option value="Primary School" class="option" name="LanPashto">Primary School</option> 
                            </select>
                            <select name="" id="major" class="InputField"
                                style="padding-bottom:11px">
                                <option value="default">Major</option>
                                <option value="Computer Science" class="option" name="LanEnglish">Computer Science</option>
                                <option value="Software Engineering" class="option" name="LanUrud">Software Engineering</option>
                                <option value="Accounting" class="option" name="LanPashto">Accounting</option> 
                                <option value="Finance" class="option" name="LanPashto">Finance</option> 
                                <option value="Electrical Engineering" class="option" name="LanPashto">Electrical Engineering</option> 
                                <option value="Civil Engineering" class="option" name="LanPashto">Civil Engineering</option> 
                            </select>
                        </div>

                        <div class="col-3">
                            <select name="" id="year" class="InputField" style="margin-left:0px;width:126%">
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
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-2">
                            <button class="custom-btn" style="position:relative;left:320px;margin-top:20px;" id="eUpdate">Add</button>
                            </div>
                        </div>
                        <script>
                            var sUpdate=document.getElementById("eUpdate");

                            sUpdate.addEventListener("click",()=>{
                                alert("You Have Successfuly Add Your Education");
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br>

        <div class="row">
            <div class="col-4">
                <h4>Certification</h4>
                <span style="color:grey" id="FullName">Include any certificates or awards that are relevant to the
                    services you're offering.</span>
            </div>
            <div class="col-8">
                <div class="row border p-3" style="width:99%">
                    <div class="col-5">
                        <input type="text" id="certificate" class="InputField" style="width:105%"
                            placeholder="Certificate/Award"></div>
                    <div class="col-5">
                        <input type="text" id="from" class="InputField" style="width:95%"
                            placeholder="Certificate/Award From"></div>
                    <div class="col-2">
                        <select name="" id="year" class="InputField" style="margin-left:-25px;width:126%">
                            <option value="default" class="option">Year</option>  
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
                        <div class="row justify-content-center">
                            <center>
                            <div class="col-2">
                            <button class="custom-btn mt-3" style="margin-left:-10px;" id="cUpdate">Add</button>
                            </div>
                            </center>
                        </div>

                        <script>
                            var sUpdate=document.getElementById("cUpdate");

                            sUpdate.addEventListener("click",()=>{
                                alert("You Have Successfuly Add Your Certificate");
                            })
                        </script>

                    </div>
                </div>
            </div>
        </div>

        <br><br><br><br>
        <!-- LANGUAGE -->
        <div class="row">
            <div class="col-4">
                <h4>Language<span style="color:red">*</span></h4>
                <span style="color:grey;" id="FullName">List the skills related to the services you're offering and add
                    your experience level.</span>
            </div>
            <div class="col-8">
                <div class="row border p-2" style="width:99%">
                    <div class="col-5 mt-2">
                        <select name="" id="language" class="InputDropDown" style="width:100%">
                            <option value="default" class="option" name="default" selected>Language</option>
                            <option value="English" class="option" name="LanEnglish">English</option>
                            <option value="Urdu" class="option" name="LanUrud">Urdu</option>
                            <option value="Pashto" class="option" name="LanPashto">Pashto</option> 
                        </select>
                    </div>
                    <div class="col-5 mt-2">
                        <select name="" id="level" class="InputDropDown" style="width:80%">
                        <option value="default" class="option" name="default">Level</option>
                          <option value="basic" class="option" name="basic">Basic</option>
                          <option value="conversational" class="option" name="conversational">Conversational</option> 
                          <option value="Fluent" class="option" name="fluent">Fluent</option> 
                          <option value="Navtive" class="option" name="navtive">Navtive</option> 
                        </select>
                    </div>
                    <div class="col-2">
                        <button class="custom-btn mt-3" id="LanguageUpdate">Add</button>
                    </div>

                    <script>
                            var sUpdate=document.getElementById("LanguageUpdate");
                            sUpdate.addEventListener("click",()=>{
                                alert("You Have Successfuly Add Your Language");
                            })
                    </script>
                </div>
            </div>
            

            <br>
            <div class="row justify-content-end">
                <div class="col-2">
                    <button class="custom-btn mt-3" id="ProfessionalInfoBtn" style="margin-left:-23px;width:100%">Continue</button>
                </div>
            </div>
            <br>
        
    </div>
    </div>


    <!-- information about profile End-->

    <!-- progress bar For Gig-->
    <nav id="ProgressBarThird" class="navbar navbar-expand-lg navbar-light bg-white border border-bottom-dark"
        style="margin-top:-25px;padding:20px 0px 5px 0px">
        <div class="container-fluid">
            <div class=" navbar-collapse" id="navbarSupportedContent">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-10 col-12">
                            <ol class="ProgressBar">
                                <li style="color:rgb(35, 14, 158);font-weight: bolder;"><span class="ProgressCircle"
                                        style="background-color:rgb(35, 14, 158);color:white;border:1px solid rgb(35, 14, 158);">1</span>
                                    Personal Info ></li>
                                <li style="color:rgb(35, 14, 158);font-weight: bolder;"><span class="ProgressCircle"
                                        style="background-color:rgb(35, 14, 158);color:white;border:1px solid rgb(35, 14, 158);">2</span>
                                    Professional Info ></li>
                                <li><span class="ProgressCircle">3</span> Stay Tune ></li>
                                <li><span class="ProgressCircle">4</span> Gig Banner </li>
                            </ol>
                        </div>
                        <div class="col-lg-2 col-12" style="margin-top:-10px">
                            <span>Completion Rate:<span>70%</span></span>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar"
                                    style="width: 70%;background-color:rgb(35, 14, 158);" aria-valuenow="25"
                                    aria-valuemin="50" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- progress bar For Gig End-->

    <!-- Linked Account -->

    <div class="container mt-5" id="AccountInfo">

    <br><br>
    <center>
    <h1>Hello Stay Here There is Just One Step You Have To Complete Click On Continue</h1>
    </center>
    <br><br>
            <?php
                $fetch_profile="SELECT * FROM s_social where s_email='{$_SESSION['Email_redirect']}'";
                $sql_result=mysqli_query($DatabaseConnect,$fetch_profile);
                  while($row=mysqli_fetch_assoc($sql_result))
                  {
            ?>

        <div class="row">
            <div class="col-4">
                <h4>Facebook Account</h4>
                <i style="color:grey">Private*</i>
            </div>
            <div class="col-8">
                <input type="text" value="<?php echo $row['s_facebook']; ?>" name="" id="facebook" class="w-75 InputField" placeholder="Paste Facebook URL">
            </div>

        </div><!-- Row End-->

        <br><br>
        <div class="row">

            <div class="col-4">
                <h4>Instagram Account</h4>
                <i style="color:grey">Private*</i>
            </div>
            <div class="col-8">
                <input type="text" value="<?php echo $row['s_instagram']; ?>" name="" id="instagram" class="w-75 InputField" placeholder="Paste Instagram URL">
            </div>

        </div><!-- Row End-->


        <br><br>
        <div class="row">

            <div class="col-4">
                <h4>Twitter Account</h4>
                <i style="color:grey">Private*</i>
            </div>
            <div class="col-8">
                <input type="text" value="<?php echo $row['s_twitter']; ?>" name="" id="twitter" class="w-75 InputField" placeholder="Paste Twitter URL">
            </div>

        </div><!-- Row End-->
                <?php
                  }
                  ?>
        <br><br>

        <button class="custom-btn" id="AccountInfoBtn" style="position: relative; left:85%;width:15%">Continue</button>
    </div><!-- Container end-->


<!-- ProgressBar fourth-->
    <nav id="ProgressBarFourth" class="navbar navbar-expand-lg navbar-light bg-white border border-bottom-dark"
    style="margin-top:-25px;padding:20px 0px 5px 0px">
    <div class="container-fluid">
        <div class=" navbar-collapse" id="navbarSupportedContent">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10 col-12">
                        <ol class="ProgressBar">
                            <li style="color:rgb(35, 14, 158);font-weight: bolder;"><span class="ProgressCircle"
                                    style="background-color:rgb(35, 14, 158);color:white;border:1px solid rgb(35, 14, 158);">1</span>
                                Personal Info ></li>
                            <li style="color:rgb(35, 14, 158);font-weight: bolder;"><span class="ProgressCircle"
                                    style="background-color:rgb(35, 14, 158);color:white;border:1px solid rgb(35, 14, 158);">2</span>
                                Professional Info ></li>
                            <li style="color:rgb(35, 14, 158);font-weight: bolder;"><span class="ProgressCircle" style="background-color:rgb(35, 14, 158);color:white;border:1px solid rgb(35, 14, 158);">3</span> Stay Tune ></li>
                            <li><span class="ProgressCircle">4</span> Security </li>
                        </ol>
                    </div>
                    <div class="col-lg-2 col-12" style="margin-top:-10px">
                        <span>Completion Rate:<span>90%</span></span>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar"
                                style="width: 90%;background-color:rgb(35, 14, 158);" aria-valuenow="25"
                                aria-valuemin="50" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- progress bar For Gig End-->




<!-- GigBanner -->
    <div class="container mt-5" id="Security">
        <div class="row">
            <div class="col-7">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, dignissimos minus voluptates deserunt rerum asperiores perspiciatis enim veritatis deleniti est, voluptatem quas odio quasi sit quae mollitia dolorem, maxime earum.
            </div>
            <i style="margin-top:10px;text-align:right;color:grey">Security is Mandatory *</i>
            <hr style="margin-top:20px;">
        </div>
        <br>
        <div class="row m-4">
            <div class="col-3">
                <h4>Phone</h4>
                <span style="color:grey">
                    Phone Number Should that Which is in use
                </span>

            </div>
            <div class="col-5 mt-4">
            <?php
                $fetch_profile="SELECT * FROM seller where s_email='{$_SESSION['Email_redirect']}'";
                $sql_result=mysqli_query($DatabaseConnect,$fetch_profile);
                  while($row=mysqli_fetch_assoc($sql_result))
                  {
            ?>
                
                <input type="text" id="phone" value="<?php echo $row['s_phone'];?>" class="InputField" style="width:100%" placeholder="Phone Number">
                <span id="phone_message" class="text-danger">Enter Number Please</span>

            <?php
                  }
            ?>
            </div>

        </div>
        <div class="row justify-content-end">
            <div class="col-2">
            <button class="custom-btn bg-danger" id="confirmation_btn2">Confirm</button>
            </div>
        </div>


        
        <div class="row justify-content-end">
            <div class="col-2">
            <button class="custom-btn" id="Done">Done</button>
            </div>
        </div>
    </div>


    <script>
        document.getElementById("Done").style="display:none";
        document.getElementById("phone_message").style="display:none";

        const btn=document.getElementById("confirmation_btn2");

        btn.addEventListener("click",(e)=>{
        const phone=document.getElementById("phone");
        var check=0;
        console.log(phone.value);
        if((phone==='' && phone==null) || (phone.value=="") || (phone.value=="null"))
        {
            document.getElementById("phone_message").style="display:block";
            check=1;
        }

        if(check==0)
        {
            btn.style="display:none";
            document.getElementById("Done").style="display:display";

        }

        })
    </script>
<!-- GigBanner-->


<!-- ProgressBar fourth-->
<nav id="ProgressBarFifth" class="navbar navbar-expand-lg navbar-light bg-white border border-bottom-dark"
style="margin-top:-25px;padding:20px 0px 5px 0px">
<div class="container-fluid">
    <div class=" navbar-collapse" id="navbarSupportedContent">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 col-12">
                    <ol class="ProgressBar">
                        <li style="color:rgb(35, 14, 158);font-weight: bolder;"><span class="ProgressCircle"
                                style="background-color:rgb(35, 14, 158);color:white;border:1px solid rgb(35, 14, 158);">1</span>
                            Personal Info ></li>
                        <li style="color:rgb(35, 14, 158);font-weight: bolder;"><span class="ProgressCircle"
                                style="background-color:rgb(35, 14, 158);color:white;border:1px solid rgb(35, 14, 158);">2</span>
                            Professional Info ></li>
                        <li style="color:rgb(35, 14, 158);font-weight: bolder;"><span class="ProgressCircle" style="background-color:rgb(35, 14, 158);color:white;border:1px solid rgb(35, 14, 158);">3</span> Linked Accounts ></li>
                        <li style="color:rgb(35, 14, 158);font-weight: bolder;"><span class="ProgressCircle" style="width: 90%;background-color:rgb(35, 14, 158);color:white;">4</span> Security </li>
                    </ol>
                </div>
                <div class="col-lg-2 col-12" style="margin-top:-10px">
                    <span>Completion Rate:<span>100%</span></span>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar"
                            style="width: 100%;background-color:rgb(35, 14, 158);" aria-valuenow="25"
                            aria-valuemin="50" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</nav>
<!-- progress bar For Gig End-->

<!-- done Box-->    

    <div class="container" id="DoneMessage">
        <br>
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card h-100 w-100 border-0">
                    <img src="../hardcode_images/congratulation.png" alt="" srcset="" height="250px">
                    <p style="text-align:center;margin-top:20px" class="p-2">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure magni, neque et porro alias voluptatum ipsum saepe praesentium, vitae consectetur fugiat, ipsam dicta sed incidunt facere eos! Nostrum, deserunt illo?
                    </p>
                    <span style="margin-top:10px;text-align:center" class="common-title p-2">
                        Now Custom Your Gig For the Professional Market
                    </span>
                    <br>
                    <a href="freelancer_dashboard.php" class="custom-btn border-0" style="border-radius:0;text-align:center;margin-left:0">Congratulation Go To Home</a>
                </div>
            </div>
        </div>
    </div>
<br><br>
<!-- done box End-->

    <!-- Custom Javacript-->
    <script src="../asset/custom/createGig.js"></script>
    <!-- javascript Linke -->
    <script src="../asset/js/bootstrap.js"></script>
    <!-- jquery -->
    <script src="../asset/custom/jquery.js"></script>
    <script src="../asset/custom/seller_jquery.js"></script>

    <script>

        $(document).ready(function(){

            $("#profileinfo_form").on("submit",function(e){
                e.preventDefault();
                var formdata=new FormData(this);
                $.ajax({
                    url:"../BackendLogic/sellerlogic/profile_logic/profile_complete_form.php",
                    type:"POST",
                    data:formdata,
                    contentType:false,
                    processData:false,
                    success:function(data){
                        
                
                    }
                });
            });//profile form end


            $("#AccountInfoBtn").on("click",function(e){
                
                var facebook=$("#facebook").val();
                var instagram=$("#instagram").val();
                var twitter=$("#twitter").val();

                $.ajax({
                    url:"../BackendLogic/sellerlogic/profile_logic/account.php",
                    type:"POST",
                    data:{"facebook":facebook,"instagram":instagram,"twitter":twitter},
                    success:function(data){
                        console.log(data);
                    }
                }); 

            })//end of social media

            
            $("#Done").on("click",function(e){
                
                var phone=$("#phone").val();

                $.ajax({
                    url:"../BackendLogic/sellerlogic/profile_logic/phone.php",
                    type:"POST",
                    data:{"phone":phone},
                    success:function(data){
                        console.log(data);
                    }
                }); 

            })//end of social media


        });



    </script>

</body>

</php>