<?php

session_start();
include 'BackendLogic/url.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <link rel="stylesheet" href="asset/css/bootstrap.css">
    <!-- icon link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

    <center>
    <div class="container" style="margin-top:15%;width:50%;border:1px solid blue;padding:100px;">
    <div>Order Has Been SuccessFully Placed <br> Go Back To Seller Profile</div>
    <br>
    <a href="<?php echo $URL."/buyer/client_project_dashboard.php"?>" class="custom-btn">Go Back</button>
    </div>
    </center>
</body>
</html>