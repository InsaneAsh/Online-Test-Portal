let eamilId = ""
let temp_email = ""
let email_flag = "";

let imageChangeFun = () =>{
    let image_img = document.querySelector('#images-new').firstElementChild;
    let img_arr = [ '../Images/checklist-7730757.jpg','../Images/test-361512_1280.jpg', '../Images/test-4092022.jpg'];
    let counter = 0;
    image_img.src = `${img_arr[counter]}`;
        setInterval(function(){
            counter++;
           if(counter > 2){
            counter = 0;
           }
                image_img.src = `${img_arr[counter]}`;
            
        }, 3000);
    

}
imageChangeFun();
const enableSubmit = () =>{
    // console.log("inside enable submit fun")
    eamilId = document.querySelector("#emailId").value;
    temp_email = eamilId;
    eamilId = eamilId.split("@");

    let sendOtpBtn = document.querySelector("#send-otp-btn");
    if(eamilId[eamilId.length-1] == "gmail.com"){
        sendOtpBtn.disabled = false;
    }
    else{
        console.log(eamilId)
        sendOtpBtn.disabled = true;
    }
    
}
let otp = 4567;

const enableVerify = () =>{
    
    let temp_otp = document.querySelector("#otpId").value;
    let submitOtpBtn = document.querySelector("#submit-otp-btn");
    console.log(temp_otp.length)
    if(temp_otp.length == 4){
        submitOtpBtn.disabled = false;
        submitOtpBtn.addEventListener("click", function(){
            let entered_otp = document.querySelector("#otpId").value;
            if(otp == entered_otp){
                loadEmail(`${temp_email}`);
                // if(localStorage.getItem("emailId") == null){
                //     localStorage.setItem("emailId", `${temp_email}`);
                //     loadEmail(`${temp_email}`);
                // }
                // else{
                    
                //     window.location.href = `../HTML/Dashboard.php?login_token=${encrypted_token}` ;
                // } 
            }
            else{
                alert("Please enter valid OTP");
            }
        })
    }
    else{
        submitOtpBtn.disabled = true;
    }
}

let sendOtpBtn = document.querySelector("#send-otp-btn");

sendOtpBtn.addEventListener("click",function(){
    document.querySelector("#signin-form").style.display = "none";
    document.querySelector("#verify-otp").style.display = "flex";
    document.querySelector("#user-id").innerHTML = `**OTP is send to your id ${temp_email}`;
})

function loadEmail(value){
    window.location.href = `../PHP/forloginemail.php?emailId=${value}&login_token=${encrypted_token}`;
}

// function submitEmail(value){
//     let xhttp = new XMLHttpRequest();
//     xhttp.onreadystatechange = function(){
//         if(this.readyState == 2 && this.response == 200){
//            console.log("send data into db")
//         }
//     }
//     xhttp.open("GET", "../PHP/submitEmail.php?email="+value);
//     xhttp.send();
// }

