<?php
    if(htmlspecialchars($_POST['email_id'])){

        include 'con_db.php';

        $emailId = htmlspecialchars($_POST['email_id']);

        $stmt = $conn->prepare("SELECT  *  FROM chat_msg WHERE msg_from=? OR msg_to=?");
        $stmt->bind_param("ss",$emailId,$emailId);
        $stmt->execute();
        $stmt->bind_result($msgFrom,$msgTo,$msgData,$msgId);
        $arrayMsg = array();
        while($stmt->fetch()){
            $arrayTemp = array(
                "msgTo"=>$msgTo,
                "msgFrom"=>$msgFrom,
                "msgData"=>$msgData,
                "msgId"=>$msgId
            );
            array_push($arrayMsg,$arrayTemp);
        }
        echo json_encode($arrayMsg);
    }else{
        echo "Error";
    }