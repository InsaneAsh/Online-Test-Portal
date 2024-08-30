// let freeContent = document.querySelector("#free-study-material");
// freeContent.addEventListener("click",function(){
//     // window.location.href = "/Test Guru/HTML/studymaterial.html";
// });

let user_profile_token = document.querySelector("#user-profile-token").innerHTML;
document.querySelector("#bottom-profile").addEventListener("click",function(){
    window.location.href = `../HTML/wholeprofile.php?user_profile_token=${user_profile_token}`;
});
