<?php
    session_start();
    $arrayToSend = array("email"=>$_SESSION['email'] ,"emailRedirect"=>$_SESSION['Email_redirect']);
    echo json_encode($arrayToSend);
?>