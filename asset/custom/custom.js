

    //This is for SignUpForm
    document.getElementById("SignUpForm").style.display="none";    
    document.getElementById("SignUpBtn").addEventListener("click",()=>{
    document.getElementById("SignUpForm").style.display="block";});

    document.getElementById("close").addEventListener("click",()=>{
    document.getElementById("SignUpForm").style.display="none";});
    //end SignUpForm

    //This is for SignInForm
    document.getElementById("SignInForm").style.display="none";
    document.getElementById("SignInBtn").addEventListener("click",()=>{
    document.getElementById("SignInForm").style.display="block";});
    
    document.getElementById("closeSignIn").addEventListener("click",()=>{
    document.getElementById("SignInForm").style.display="none";});
    //end SignInForm

