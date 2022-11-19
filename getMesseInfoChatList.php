<?php
    session_start();
    $arrayToSend = array("emailRedirect"=>$_SESSION['Email_redirect']);
    echo json_encode($arrayToSend);
?>