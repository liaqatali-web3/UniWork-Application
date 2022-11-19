<?php
    session_start();
    // //freelancer
    // echo $_SESSION['email']."<br>";
    // //buyer
    // echo $_SESSION['Email_redirect'];

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    
    <!-- chat --->
    <link rel="stylesheet" href="asset/front_end/chat_msg_stylesheet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- chat javascript-->
    <script src="asset/front_end/jquery.min.js"></script>
    <script src="https://cdn.socket.io/4.5.0/socket.io.min.js" integrity="sha384-7EyYLQZgWBi67fBtVxw60/OWl1kjsfrPFcaU0pp0nAh+i8FD068QogUvg85Ewy1k" crossorigin="anonymous"></script>

    <script>
    $(document).ready(function () {
    let chatWindowOpen = false;
    let userId = "liaqatali205204il.com";
    var socket;
    let selectedEmail = "none";
    let distinctMsgShow = [];
    function initializeSocket(userIdArg){
       socket = io.connect("http://127.0.0.1:3000/", { query: "userId="+userIdArg});
        socket.on("chat-msg", (arg) => {
            console.log(arg);
            console.log("_________44");
            placeMessageToDistinct(arg);

        });
    }
    function setUserId(idToSet){
        userId = idToSet;
    }

    
    function getDistinctMsgShow(userIdArg){
        let emailId = userIdArg;
        console.log(emailId + "This is email id");
        $.ajax({
            method: "POST",
            url:"http://127.0.0.1/fiverr/asset/front_end/php_backend/get_messeges.php",
            data:"email_id="+emailId,
            success:function (response) {
                // console.log(response);
                let jsonRes = JSON.parse(response);
                // console.log(jsonRes);
                console.log(jsonRes);
                console.log("_____");
                // let msgHeader = {conversationHolder: emailId,msgData:[jsonRes[0]]};
                // distinctMsgShow.push(msgHeader);
                // console.log(distinctMsgShow);
                $.each(jsonRes,function (index,value) {
                    if(value['msgTo'] !== emailId){
                        arrangeMessageIntoArray(value['msgTo'],value);
                    }else{
                        arrangeMessageIntoArray(value['msgFrom'],value);
                    }
                });
                console.log(distinctMsgShow);
                insertIntoChatList(distinctMsgShow);

                
                // $.each(jsonRes,function (index,value) {
                //     insertIntoChatList(value);
                // })
            }
        })
    }

    function arrangeMessageIntoArray(conversationHolder,msgData){
        let msgHeader = {conversationHolder: conversationHolder,msgData:[msgData]};
        let boolExistCateg = false;
        for(let i = 0;i<distinctMsgShow.length;i++){
            if(distinctMsgShow[i]['conversationHolder'] === conversationHolder ){
                distinctMsgShow[i]['msgData'].push(msgData);
                boolExistCateg = true;
                break;
            }
        }
        if(!boolExistCateg){
            distinctMsgShow.push(msgHeader);
        }


    }
    
    function placeMessageToDistinct(arg){
        if(chatWindowOpen){
            insertIntoChatContainerRec(arg);
            insertToDistinctMsgShow(arg);
        }else{
            insertToDistinctMsgShow(arg);
        }
    }
    function insertToDistinctMsgShow(arg){
        let userEmailTo = arg['sentBy'];
        let argModified = {msgTo:arg['sentBy'],msgFrom:arg['userEmail'],msgData:arg['chatText']};
        let boolNotFound = true;
        for(let i=0;i<distinctMsgShow.length;i++){
            if(userEmailTo === distinctMsgShow[i]['conversationHolder']){

                distinctMsgShow[i]['msgData'].push(argModified);
                console.log(distinctMsgShow);
                boolNotFound = false;
                break;
            }
        }
        if(boolNotFound){
            insertNewConversation(argModified);
        }

    }
    function insertNewConversation(arg){
        let disMsg = {conversationHolder:"none",msgData:[arg]};
        if(arg['msgTo'] === userId){
            disMsg['conversationHolder'] = arg['msgFrom'];
        }else if(arg['msgFrom'] === userId){
            disMsg['conversationHolder'] = arg['msgTo'];
        }

        distinctMsgShow.push(disMsg);
    }
    
    function onMessage(toEmail) {
        $("#bar_ch_div").show();
        $("#chat_container_ch_div").show();
        $("#chat_list_ch_div").hide();
        $("#text_input_ch_div").show();
        selectedEmail = toEmail;
        chatWindowOpen = true;
        $("#top_bar_ch_div > p").text(selectedEmail);
        appendAllChats(toEmail);
        let scrollHeight = $("#chat_container_ch_div").get(0).scrollHeight;
        $("#chat_container_ch_div").animate({scrollTop:scrollHeight});
    }
    function onLeaveMessage() {
        $("#bar_ch_div").hide();
        $("#chat_list_ch_div").show();
        $("#chat_container_ch_div").hide();
        $("#text_input_ch_div").hide();
        $("#top_bar_ch_div > p").text("Chat");
        selectedEmail = null;
        chatWindowOpen = false;
    }
    $("#bar_ch_div").on("click",function () {
        onLeaveMessage();
    });
    function appendAllChats(userEmail){
        for(let i=0;i<distinctMsgShow.length;i++){
            if(userEmail === distinctMsgShow[i]['conversationHolder']){
                $("#chat_container_ch_div").empty();
                let msgShow = distinctMsgShow[i]['msgData'];
                for(let j = 0;j<msgShow.length;j++){
                    console.log(msgShow[j]);

                    if(msgShow[j]['msgTo'] === userEmail){
                        let newArg = {chatText:msgShow[j]['msgData']};
                        insertIntoChatContainerRec(newArg);
                    }else{
                        let newArg = {chatText:msgShow[j]['msgData']};
                        insertIntoChatContainerSend(newArg);
                    }
                }
                break;
            }
        }
    }
    // let argModified = {msgTo:arg['sentBy'],msgFrom:arg['userEmail'],msgData:arg['chatText']};
    // insertNewConversation(argModified);
    function newEmailConversation(email){
        let boolNotFound = true;
        for(let i = 0;i<distinctMsgShow.length;i++){
            if(distinctMsgShow[i]['conversationHolder'] === email){
                onMessage(email);
                boolNotFound = false;
                break;
            }
        }
        if(boolNotFound){
            let argModified = {msgTo:arg['sentBy'],msgFrom:arg['userEmail'],msgData:arg['chatText']};
            insertNewConversation(argModified);

        }
    }
    function sendMessage(chatTxt) {
        if(selectedEmail){
            let objMsg = {userEmail: selectedEmail , chatText: chatTxt,sentBy:userId};
            console.log(objMsg);
            socket.emit("chat-msg", objMsg);
            insertIntoChatContainerSend(objMsg);
            let scrollHeight = $("#chat_container_ch_div").get(0).scrollHeight;
            $("#chat_container_ch_div").animate({scrollTop:scrollHeight});
        }else{
            console.log("NO EMAIL FOUND!");
        }
    }
    function insertIntoChatContainerRec(arg) {

        let chContainerTemplate = `<div class='msg_ch_div_receive' style='background-color:white;color:black;width:35%;padding:15px;border-radius:20px;'>${arg['chatText']}</div>`;

        $("#chat_container_ch_div").append(chContainerTemplate);

    }
    function insertIntoChatContainerSend(arg) {

        let chContainerTemplate = `<div class='msg_ch_div_send' style='background-color:rgb(109, 227, 195);color:white;width:35%;margin-left:60%;padding:15px;border-radius:20px;'>${arg['chatText']}</div>`;

        $("#chat_container_ch_div").append(chContainerTemplate);

    }
    function insertIntoChatList(msgData){
        $.each(msgData,function (index,value) {
            console.log(value);
            let divToAppend = $("<div/>",{
                class: "chat_display_ch_div",
                click:function () {
                    // console.log(value['conversationHolder']);
                    onMessage(value['conversationHolder']);
                }
            });
            //     let divToAppend = `<div class="chat_display_ch_div">
            //     <p class="heading_chat_dis">Alyaan</p>
            //     <p class="text_chat_dis">Sample text this is </p>
            // </div>`;
            let headChatDis = $("<p/>",{
                text: value['conversationHolder'],
                class: "heading_chat_dis"
            });
            let lastMsgData = value['msgData'].length-1;
            let textChatDis = $("<p/>",{
                text: value['msgData'][lastMsgData]['msgData'],
                class: "text_chat_dis"
            });
            divToAppend.append(headChatDis);
            divToAppend.append(textChatDis);

            $("#chat_list_ch_div").append(divToAppend);
        });

        onMessage(selectedEmail);
    }

    $("#send_message_ch_div").on("click",function () {
        let txt = $("#input_self_ch_div").val();
        sendMessage(txt);
    });


    $.ajax({
        url: "getMessegeInfo.php",
        method: "GET",
        success:function (response) {

                let jsonParsed = JSON.parse(response);
                console.log(jsonParsed);
                console.log("______(())()");
               
                userId=jsonParsed['emailRedirect'];
                
                getDistinctMsgShow(userId);
                
                initializeSocket(userId);
                selectedEmail = jsonParsed['email'];
                
                
            }
    })
    })   
 </script>

</head>
<body>
    
    <!-- message button -->

    <div id="chat_div_ch_div" style="z-index:10;margin:-10px">
        <div id="top_bar_ch_div">
            <p>User Name</p>
            <div id="bar_ch_div" class="bar_ch_div">
                <div class="bar_in_ch_div"></div>
                <div class="bar_in_ch_div"></div>
                <div class="bar_in_ch_div"></div>
            </div>
        </div>
        <div id="chat_list_ch_div" style="height:650px;background-color:rgb(218, 237, 234)">

        </div>
        <div id="chat_container_ch_div" style="height:550px;background-color:rgb(218, 237, 234)">

        
        </div>
        <center>
        <div id="text_input_ch_div" style="width:98%;margin-left:-15px;padding:20px;background-color:rgb(44, 31, 117);margin-top:0px;">
            <input id="input_self_ch_div" placeholder="Write..." style="width:60%;border-radius:20px;padding:10px;border:0"  />
            <button id="send_message_ch_div" style="padding:15px;border:2px solid white;background-color:rgb(44, 31, 117);color:white;border-radius:10px;"><i class="fa fa-paper-plane"></i></button>
        </div>
        </center>
    </div>

    <!-- message button end-->


</body>
</html>