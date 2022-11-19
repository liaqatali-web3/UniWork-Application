
document.getElementById("WhatMakeProfileBest").style.display="none";
document.getElementById("SteerClearUp").style.display="none";
document.getElementById("PersonalInfo").style.display="none";
document.getElementById("ProfessionalInfo").style.display="none";
document.getElementById("AccountInfo").style.display="none";
document.getElementById("ProgressBarFirst").style.display="none";
document.getElementById("ProgressBarSecond").style.display="none";
document.getElementById("ProgressBarThird").style.display="none";
document.getElementById("ProgressBarFourth").style.display="none";
document.getElementById("Security").style.display="none";
document.getElementById("ProgressBarFifth").style.display="none";
document.getElementById("DoneMessage").style.display="none";





//GetReadyBtn Start
document.getElementById("GetReadyBtn").addEventListener('click',()=>{

    document.getElementById("GetReady").style.display="none";
    document.getElementById("WhatMakeProfileBest").style.display="block";
});

document.getElementById("BackFromWhatMakeProfileBestBtn").addEventListener('click',()=>{

    document.getElementById("GetReady").style.display="block";
    document.getElementById("WhatMakeProfileBest").style.display="none";
});

//



//WhatMakeProfileBest
document.getElementById("WhatMakeProfileBestBtn").addEventListener('click',()=>{
    document.getElementById("WhatMakeProfileBest").style.display="none";    
    document.getElementById("SteerClearUp").style.display="block";
    
});

document.getElementById("BackSteerClearUpBtn").addEventListener('click',()=>{

    document.getElementById("WhatMakeProfileBest").style.display="block";
    document.getElementById("SteerClearUp").style.display="none";
    
});
//


//perosnal info
document.getElementById("SteerClearUpBtn").addEventListener('click',()=>{

    document.getElementById("PersonalInfo").style.display="block";
    document.getElementById("ProgressBarFirst").style.display="block";
    document.getElementById("SteerClearUp").style.display="none";
});

//


//professional info
document.getElementById("PersonalInfoBtn").addEventListener('click',()=>{


    document.getElementById("ProfessionalInfo").style.display="block";
    document.getElementById("ProgressBarSecond").style.display="block";
    document.getElementById("ProgressBarFirst").style.display="none";
    document.getElementById("PersonalInfo").style.display="none";

    
});

//


//Account Info
document.getElementById("ProfessionalInfoBtn").addEventListener('click',()=>{
   
    
    document.getElementById("ProfessionalInfo").style.display="none";
    document.getElementById("AccountInfo").style.display="block";
    document.getElementById("ProgressBarFirst").style.display="none";
    document.getElementById("ProgressBarSecond").style.display="none";
    document.getElementById("ProgressBarThird").style.display="block"; 
});


//Account Info
document.getElementById("AccountInfoBtn").addEventListener('click',()=>{

    document.getElementById("Security").style.display="block";
    document.getElementById("ProgressBarFourth").style.display="block";
    document.getElementById("AccountInfo").style.display="none";
    document.getElementById("ProgressBarFirst").style.display="none";
    document.getElementById("ProgressBarSecond").style.display="none";
    document.getElementById("ProgressBarThird").style.display="none";    
});

//last of profile which is done message
document.getElementById("Done").addEventListener('click',()=>{

    document.getElementById("DoneMessage").style.display="block";
    document.getElementById("ProgressBarFourth").style.display="none";
    document.getElementById("Security").style.display="none";
    document.getElementById("ProgressBarFifth").style.display="block";
});


