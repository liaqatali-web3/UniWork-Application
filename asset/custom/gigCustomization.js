//Gig Logic
document.getElementById("GStandardMonatory").style.display="none";
document.getElementById("GStandardMonatoryBody").style.display="none";
document.getElementById("FinishProgressBar").style.display="none";
document.getElementById("FinishMessage").style.display="none";


//GBannerTitle Start
document.getElementById("GBannerTitleBtn").addEventListener('click',(e)=>{
    document.getElementById("GBannerTitle").style.display="none";
    document.getElementById("GCProgressBar").style.display="none";

    document.getElementById("GStandardMonatory").style.display="block";
    document.getElementById("GStandardMonatoryBody").style.display="block";
    
});
//

//GStandardMonatoryBtn
document.getElementById("GStandardMonatoryBtn").addEventListener('click',(e)=>{
    document.getElementById("GStandardMonatory").style.display="none";
    document.getElementById("GStandardMonatoryBody").style.display="none";

    document.getElementById("FinishProgressBar").style.display="block";
    document.getElementById("FinishMessage").style.display="block";
    
});

//