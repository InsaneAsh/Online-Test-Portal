let for_taking_test_token = document.querySelector("#for-taking-test-token").innerHTML;
 window.openTask =(testName)=> {
    if(testName == "attempted"){
        var i;
        var x = document.getElementsByClassName("test");
        for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
        }
        document.getElementById(testName).style.display = "block";
        printLocalStorageDate();
    }
    else if(testName == 'ongoing'){
        var i;
        var x = document.getElementsByClassName("test");
        for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
        }
        document.getElementById(testName).style.display = "block";  
        printInitialTest();
    }
    else{
        var i;
        var x = document.getElementsByClassName("test");
        for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
        }
        document.getElementById(testName).style.display = "block";  
    }

  }
  import { ongoingTest } from "./ongoingTestDetails.js";

  let checkPresentInLocal = (value)=>{
    let temp_arr = '';
    if(localStorage.getItem("attempted_test") !== null){
         temp_arr = JSON.parse(localStorage.getItem("attempted_test"));
         return temp_arr.some(element => element.id == value.id && element.name == value.name);
    }else{
        return false;
    }
 }

function printInitialTest(){
    let data_local = "";
    if(document.querySelector("#ongoing").hasChildNodes){
        document.querySelector("#ongoing").replaceChildren();
        if(localStorage.getItem("attempted_test") == null){
            for(let i in ongoingTest){
                let node = `<div class="parent-ongoing-test-details" id="parent-ongoing-test-details">
                        <div class="ongoing-test-details" id="ongoing-test-details">
                            <div class="test-design">
                                <div>&#9776;</div></div>
                            <div class="test-name"><div>${ongoingTest[i].name}</div></div>
                            <div class="attempt-btn" id="">
                                <div class="attempt-btn-inner" test-detail-id='${ongoingTest[i].id}' test-detail-name='${ongoingTest[i].name}'>
                                    Attempt
                                </div>
                            </div>
                        </div>
                    </div>  `;
                let parentElement = document.querySelector("#ongoing");
                //parentElement.innerHTML += node;
                parentElement.insertAdjacentHTML('beforeend', node);   
            }
        }
        else{
            data_local = JSON.parse(localStorage.getItem("attempted_test"));
            ongoingTest.filter(element => {
                if(checkPresentInLocal(element)){
                    
                }
                else{
                    let node = `<div class="parent-ongoing-test-details" id="parent-ongoing-test-details">
                            <div class="ongoing-test-details" id="ongoing-test-details">
                                <div class="test-design">
                                    <div>&#9776;</div></div>
                                <div class="test-name"><div>${element.name}</div></div>
                                <div class="attempt-btn" id="">
                                    <div class="attempt-btn-inner" test-detail-id='${element.id}' test-detail-name='${element.name}'>
                                        Attempt
                                    </div>
                                </div>
                            </div>
                        </div>  `;
                    let parentElement = document.querySelector("#ongoing");
                    //parentElement.innerHTML += node;
                    parentElement.insertAdjacentHTML('beforeend', node);   
                }
            });
            
        }
    }
    else{
        if(localStorage.getItem("attempted_test") == null){
            for(let i in ongoingTest){
                let node = `<div class="parent-ongoing-test-details" id="parent-ongoing-test-details">
                        <div class="ongoing-test-details" id="ongoing-test-details">
                            <div class="test-design">
                                <div>&#9776;</div></div>
                            <div class="test-name"><div>${ongoingTest[i].name}</div></div>
                            <div class="attempt-btn" id="">
                                <div class="attempt-btn-inner" test-detail-id='${ongoingTest[i].id}' test-detail-name='${ongoingTest[i].name}'>
                                    Attempt
                                </div>
                            </div>
                        </div>
                    </div>  `;
                let parentElement = document.querySelector("#ongoing");
                //parentElement.innerHTML += node;
                parentElement.insertAdjacentHTML('beforeend', node);   
            }
        }
        else{
            data_local = JSON.parse(localStorage.getItem("attempted_test"));
            ongoingTest.filter(element => {
                if(checkPresentInLocal(element)){
                    
                }
                else{
                    let node = `<div class="parent-ongoing-test-details" id="parent-ongoing-test-details">
                            <div class="ongoing-test-details" id="ongoing-test-details">
                                <div class="test-design">
                                    <div>&#9776;</div></div>
                                <div class="test-name"><div>${element.name}</div></div>
                                <div class="attempt-btn" id="">
                                    <div class="attempt-btn-inner" test-detail-id='${element.id}' test-detail-name='${element.name}'>
                                        Attempt
                                    </div>
                                </div>
                            </div>
                        </div>  `;
                    let parentElement = document.querySelector("#ongoing");
                    //parentElement.innerHTML += node;
                    parentElement.insertAdjacentHTML('beforeend', node);   
                }
            });
            
        }
    }
    

}
printInitialTest();
function openFreeTestModal(value){
    let node = `<div id="for-hide-modal">
                <div class="modal-parent">
                    <div class="child-modal">
                        <div class="for-closing" id="for-closing" onclick="document.getElementById('for-hide-modal').style.display = 'none'">
                            <div>General Instruction</div><div class='close-instruction-tab'>&times;</div>
                           
                        </div>
                        
                         <div class='written-instruction'>
                            * This is timed testl; the running time is displayed on top left corner of the screen.
<br>
* The bar above the question text displays the question numbers in the current section of the test. You can move to any question by clicking on the respective number.
<br>
* The question screen displays the question number along with the question and resspective options.
<br>
* The top right of section above the question has an option to mark the question for review. You can later view the marked question.
<br>
* You can mark or unmark any option you have chosen by tapping on the respective option.
<br>
* The button left corner contains the option to move to the next question.
<br>
* You can jump between sections(if allowed by the tutuor) by chosing the section in bottom center drop down.
<br>
* You can submit the test at any point of time by clicking the submit button on the top right corner of the screen.
<br>
* Before  submission, the screen shows a confirmation pop up with the total number of questions in the test, questions answered and questions marked for review.
<br>
* Test  must be completed in one attempt. Test once submitted cannot be re-attempted or started again.
<br>
* You shoud not change or close the test screen while attempting the test.
<br>
* If the site is closed or screen is changed more than three times by any means, the test will be submitted automatically.
<br>
* After completion of test, a test summary screen will be displayed with section details and solutions.
<br>
* If something goes wrong, contact your tutor and communicate the problem.
 <br>                        </div>
                         <div class='instruction-btn-div'>
                         <a href="attempttest.php?id=${value.id}&name=${value.name}&for_taking_test_token=${for_taking_test_token}"><button class='instruction-next-btn'>Next</button></div></a>
                    </div>
                </div>
            </div>`;
   let parent_element =  document.querySelector("#instruction-modal-for-test");
   parent_element.insertAdjacentHTML("beforeend", node);
    document.getElementById('for-hide-modal').style.display='block';
}
let attempt_btn = document.querySelectorAll(".attempt-btn");
attempt_btn.forEach(element => {
    element.addEventListener("click", function(e){
        let obj = {
            id : e.target.getAttribute('test-detail-id'),
            name : e.target.getAttribute('test-detail-name')
        }
        openFreeTestModal(obj);
    });
});

let printLocalStorageDate = () =>{
    if(document.querySelector("#attempted").hasChildNodes){
        document.querySelector("#attempted").replaceChildren();
        let attempted = document.querySelector("#attempted");
        let exam_data = ''; 
        if(localStorage.getItem('attempted_test')== null){
            attempted.insertAdjacentHTML('beforeend', '<h1>No data</h1>');
        }
        else{
            exam_data = JSON.parse(localStorage.getItem('attempted_test'));
            for(let i in exam_data){
        
                let node = `<div class="parent-ongoing-test-details" id="parent-ongoing-test-details">
                        <div class="ongoing-test-details" id="ongoing-test-details">
                            <div class="test-design">
                                <div>&#9776;</div></div>
                            <div class="test-name"><div>${exam_data[i].name}</div></div>
                            <div class="attempt-btn" id="">
                                <div class="attempt-btn-inner" test-detail-id='${exam_data[i].id}' test-detail-name='${exam_data[i].name}'>
                                    Re-Attempt
                                </div>
                            </div>
                        </div>
                    </div>  `;
            
                //parentElement.innerHTML += node;
                attempted.insertAdjacentHTML('beforeend', node);   
            }
            document.querySelectorAll('.attempt-btn-inner').forEach(element => {
                element.addEventListener("click", function(e){
                    let obj = {
                        id : e.target.getAttribute('test-detail-id'),
                        name : e.target.getAttribute('test-detail-name')
                    }
                    openFreeTestModal(obj);
                });
            });
        }
    }
    else{
        let attempted = document.querySelector("#attempted");
    let exam_data = ''; 
    if(localStorage.getItem('attempted_test')== null){
        attempted.insertAdjacentHTML('beforeend', '<h1>No data</h1>');
    }
    else{
        exam_data = JSON.parse(localStorage.getItem('attempted_test'));
        for(let i in exam_data){
       
            let node = `<div class="parent-ongoing-test-details" id="parent-ongoing-test-details">
                    <div class="ongoing-test-details" id="ongoing-test-details">
                        <div class="test-design">
                            <div>&#9776;</div></div>
                        <div class="test-name"><div>${exam_data[i].name}</div></div>
                        <div class="attempt-btn" id="">
                            <div class="attempt-btn-inner" test-detail-id='${exam_data[i].id}' test-detail-name='${exam_data[i].name}'>
                                Re-Attempt
                            </div>
                        </div>
                    </div>
                </div>  `;
           
            //parentElement.innerHTML += node;
            attempted.insertAdjacentHTML('beforeend', node);   
        }
        document.querySelectorAll('.attempt-btn-inner').forEach(element => {
            element.addEventListener("click", function(e){
                let obj = {
                    id : e.target.getAttribute('test-detail-id'),
                    name : e.target.getAttribute('test-detail-name')
                }
                openFreeTestModal(obj);
            });
        });
    }
    }
    
    
}

