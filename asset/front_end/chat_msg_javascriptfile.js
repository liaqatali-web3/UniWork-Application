$(document).ready(function () {
    var userId = "hhhhh i catch you";
    const socket = io.connect("http://192.168.0.135:3000/", { query: "userId="+userId});
    let selectedEmail = "none";
    let distinctMsgShow = [];

    window.setUserId = function(idToSet){
        userId = idToSet;
    }

    getDistinctMsgShow();
    function getDistinctMsgShow(){
        let emailId = userId;
        $.ajax({
            method: "POST",
            url:"http://192.168.0.135/fiverr/asset/front_end/php_backend/get_messeges.php",
            data:"email_id="+emailId,
            success:function (response) {
                // console.log(response);
                let jsonRes = JSON.parse(response);
                // console.log(jsonRes);

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
    socket.on("chat-msg", (arg) => {
        console.log(arg);
        placeMessageToDistinct(arg);

    });
    function placeMessageToDistinct(arg){
        if(!selectedEmail){
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
    $("#bar_ch_div").fadeOut();
    window.onMessage = function(toEmail) {
        $("#bar_ch_div").show();
        $("#chat_container_ch_div").show();
        $("#chat_list_ch_div").hide();
        $("#text_input_ch_div").show();
        selectedEmail = toEmail;

        $("#top_bar_ch_div > p").text(selectedEmail);
        appendAllChats(toEmail);
    }
    window.onLeaveMessage = function() {
        $("#bar_ch_div").hide();
        $("#chat_list_ch_div").show();
        $("#chat_container_ch_div").hide();
        $("#text_input_ch_div").hide();
        $("#top_bar_ch_div > p").text("Chat");
        selectedEmail = null;
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
    function  sendMessage(chatTxt) {
        if(selectedEmail){
            let objMsg = {userEmail: selectedEmail , chatText: chatTxt,sentBy:userId};
            socket.emit("chat-msg", objMsg);
            insertIntoChatContainerSend(objMsg);
        }else{
            console.log("NO EMAIL FOUND!");
        }
    }
    function insertIntoChatContainerRec(arg) {

        let chContainerTemplate = `<div class='msg_ch_div_receive'>${arg['chatText']}</div>`;

        $("#chat_container_ch_div").append(chContainerTemplate);

    }
    function insertIntoChatContainerSend(arg) {

        let chContainerTemplate = `<div class='msg_ch_div_send'>${arg['chatText']}</div>`;

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


    }

    $("#send_message_ch_div").on("click",function () {
        let txt = $("#input_self_ch_div").val();
        sendMessage(txt);
    });
})

// <div class="chat_display_ch_div">
//     <p class="heading_chat_dis">Alyaan</p>
//     <p class="text_chat_dis">Sample text this is </p>
// </div>

// socket.to(userId).emit('chat-msg', "hello")