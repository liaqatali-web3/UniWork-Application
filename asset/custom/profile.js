//descrition area start
document.getElementById("DescriptionArea").style.display="none";
document.getElementById("DescriptionUpdate").style.display="none";
document.getElementById("Description").addEventListener("click",()=>{
document.getElementById("DescriptionArea").style.display="block";
document.getElementById("DescriptionUpdate").style.display="block";
})
//descrition area end


//language form
document.getElementById("LangUpdationForm").style.display="none";
document.getElementById("LangUpdationBtn").addEventListener("click",()=>{
    document.getElementById("LangUpdationForm").style.display="block";
})

document.getElementById("LangUpdationCancel").addEventListener("click",()=>{
    document.getElementById("LangupdationForm").style.display="block";
})
//language form end


//skill form
document.getElementById("SkillsUpdationForm").style.display="none";
document.getElementById("SkillsUpdationBtn").addEventListener("click",()=>{
    document.getElementById("SkillsUpdationForm").style.display="block";
})

document.getElementById("SkillsUpdationCancel").addEventListener("click",()=>{
    document.getElementById("SkillsupdationForm").style.display="block";
})

//skill form end

//Education form
document.getElementById("EducationUpdationForm").style.display="none";
document.getElementById("EducationUpdationBtn").addEventListener("click",()=>{
    document.getElementById("EducationUpdationForm").style.display="block";
})

document.getElementById("EducationUpdationCancel").addEventListener("click",()=>{
    document.getElementById("EducationupdationForm").style.display="block";
})

//Education form end