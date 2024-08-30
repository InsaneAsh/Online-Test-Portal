
import { questionData } from './testQuestions.js';
// variables
let questionNo = 0;
let trueData = "";
let objectRefrence = "";
let arr = "";
let name_of_test = "";


    const params = new URLSearchParams(window.location.search);
    const dataObj = {
        name : params.get("name"),
        id: params.get("id")
        // id : "test1",
        // name: "MOCK Test - 001"
    }
// attempted question unattempted question partially attempted question 
let  global_fucnction_id = 0;
let not_answered = arr.length
let answered = 0
let marked_for_review = 0
let not_visited = 20
let answer_and_marked_for_review = 0
let submitTIme = 0;
let totalNumber = 0;

// arrray for details

let not_ans = new Array(arr.length).fill(false);
let ans = new Array(arr.length).fill(false);
let marked_for_r = new Array(arr.length).fill(false);
let not_visi = new Array(arr.length).fill(false);
let ans_and_mark_for_r = new Array(arr.length).fill(false);
let optionsData = new Array(arr.length).fill(false);
let scoreArray = new Array(arr.length).fill(0);
let incorrect_arr = [];
let data_for_local = [];

const makeNode = (data,questionNo) =>{
    let parentHasChild = document.querySelector("#question-section-answer");
    not_visi[questionNo] = true;

    if(parentHasChild.hasChildNodes){
        parentHasChild.replaceChildren();
        let questionNode = `<div class="question-option">
                        <div class="question-answer-number">Q-${data.questions[questionNo].question}</div>
                        <div class="mcq-options">
                            <div class="parent-mcq-option">
                                <div>
                                    <input type="radio" name="mcq" id="option1" info=${questionNo}>
                                    <span id="option-1" >${data.questions[questionNo].options.a}</span>
                                </div>
                                <div>
                                    <input type="radio" name="mcq" id="option2" info=${questionNo}>
                                    <span id="option-2">${data.questions[questionNo].options.b}</span>
                                </div>
                                <div>
                                    <input type="radio" name="mcq" id="option3" info=${questionNo}>
                                    <span id="option-3" info=${questionNo}>${data.questions[questionNo].options.c}</span>
                                </div>
                                <div>
                                    <input type="radio" name="mcq" id="option4" info=${questionNo}>
                                    <span id="option-4">${data.questions[questionNo].options.d}</span>
                                </div>
                            </div>
                        </div>
                        <div class="previous-next">
                            <div class="previous-pre" >< Previous</div>
                            <div class="next-and-save" >Next & Save > </div>
                            <div class="mark-review next-and-save" id="review-${questionNo}">Mark for Review </div>
                            <div class="submit-test-btn next-and-save" id="test-submit">Submit</div>
                        </div>
                        
                    </div>
                    <div class="total-question">
                        <p>Total Questions</p>
                        <div class="number-question">
                            
                        </div>
                    </div>`;
    document.querySelector("#question-number-nav").innerHTML = `Q-${Object.keys(data.questions)[questionNo+1]}`;
    let parentContainerQuestion = document.querySelector("#question-section-answer");
   
    parentContainerQuestion.insertAdjacentHTML('beforeend',questionNode);
    document.querySelector(".next-and-save").addEventListener("click",function(){
        nextQuestion(1);
    });
    document.querySelector(".previous-pre").addEventListener("click",function(){
        nextQuestion(-1);
    });
    }else{

    let questionNode = `<div class="question-option">
                        <div class="question-answer-number">Q-${data.questions[questionNo].question}</div>
                        <div class="mcq-options">
                            
                        </div>
                        <div class="previous-next">
                            <div class="previous-pre" >< Previous</div>
                            <div class="next-and-save" >Next & Save > </div>
                            <div class="mark-review next-and-save" id="review-${questionNo}">Mark for Review </div>
                            <div class="next-and-save">Submit</div>
                        </div>
                        
                    </div>
                    <div class="total-question">
                        <p>Total Questions</p>
                        <div class="number-question">
                            
                        </div>
                    </div>`;
    document.querySelector("#question-number-nav").innerHTML = `Q-${Object.keys(data.questions)[questionNo+1]}`;
    let parentContainerQuestion = document.querySelector("#question-section-answer");
    parentContainerQuestion.insertAdjacentHTML('beforeend',questionNode);
    document.querySelector(".next-and-save").addEventListener("click",function(){
        nextQuestion(1);
    });
    document.querySelector(".previous-pre").addEventListener("click",function(){
        nextQuestion(-1);
    });
   
}
document.querySelector(".mark-review").addEventListener("click", function(e){
    markforreview(e.target)
});

document.querySelector("#option1").addEventListener("click", function(e){
    storeOption(e.target);
});
document.querySelector("#option2").addEventListener("click", function(e){
    storeOption(e.target);
});
document.querySelector("#option3").addEventListener("click", function(e){
    storeOption(e.target);
});
document.querySelector("#option4").addEventListener("click", function(e){
    storeOption(e.target);
});
}


let callNode = (data) =>{
    let node_data = data.getAttribute("id");
    let node_data_split = node_data.split("-");
    jumpQuestion(parseInt(node_data_split[1]));
}
const makeQuestionNode = (data) =>{
    let parentOfNewNode = document.querySelector(".number-question");
    let newNode = `<div class="question-box"></div>`;
    let l = 1;
    arr = data.questions;
    for(let i in data.questions){
        
        newNode = `<div class="question-box" id="node-${i}">${l}</div>`;
        
        parentOfNewNode.insertAdjacentHTML("beforeend", newNode);
        l++;
        document.querySelector(`#node-${i}`).addEventListener("click", function(){
            callNode(this);
        });
    } 
}

for(let i in questionData){
    if(questionData[i].name == dataObj.name && questionData[i].id == dataObj.id){
        name_of_test = questionData[i].name;
        objectRefrence = i;
        trueData = questionData[i];
        makeNode(questionData[i],questionNo);
        makeQuestionNode(questionData[i]);
    }
}
let jumpQuestion = (data) =>{
    questionNo = data;
    makeNode(trueData,data);
    makeQuestionNode(trueData);
}
let nextQuestion = (val) =>{
    questionNo = questionNo + (val);
    if(questionNo < 0){
        questionNo = 0;
        questionNo = questionNo + 1;
    }
    else if(questionNo >= arr.length){ 
       questionNo = arr.length-1;
       questionNo = questionNo + 0;
    }
    else{
         makeNode(trueData,questionNo);
         makeQuestionNode(trueData);
    }    
}

function generateNode(data){
    alert(data);
}
// for preventing page reload
window.addEventListener('beforeunload', function (event) {
    // Standard text for most browsers
    const confirmationMessage = 'Are you sure you want to leave this page?';

    // For modern browsers, setting the returnValue is necessary
    event.returnValue = confirmationMessage;

    // For older browsers (may not be supported in all cases)
    return confirmationMessage;
});

// Timer 

function startTimer(){
    let watchTimer = document.querySelector("#watch-timer");
    let d = new Date();
    d.setHours(0);
    d.setMinutes(30-1);
    d.setSeconds(60);
    watchTimer.innerHTML = `${d.getHours()}:${d.getMinutes()}:${d.getSeconds()}`;
    let functionId = setInterval(function(){
        d.setSeconds(d.getSeconds()-1);
        watchTimer.innerHTML = `${d.getHours()}:${d.getMinutes()}:${d.getSeconds()}`;
        if(d.getSeconds() == 0){
            d.setSeconds(60);
            d.setMinutes(d.getMinutes()-1);
            watchTimer.innerHTML = `${d.getHours()}:${d.getMinutes()}:${d.getSeconds()}`;
            submitTIme = `${d.getHours()}:${d.getMinutes()}:${d.getSeconds()}`;
        }
        if(d.getMinutes() == 0 && d.getSeconds() == 0){
            disableTest(functionId);
        }
    }, 1000);
    global_fucnction_id = functionId;
}
// startTimer();

function startTimertwo(){
    let timerPositive = document.querySelector("#timer-positive");
    let d = new Date();
    d.setHours(0);
    d.setMinutes(29);
    d.setSeconds(30);
    timerPositive.innerHTML = `${d.getHours()}:${d.getMinutes()}:${d.getSeconds()}`;
    let functionId = setInterval(function(){
        d.setSeconds(d.getSeconds()+1);
        timerPositive.innerHTML = `${d.getHours()}:${d.getMinutes()}:${d.getSeconds()}`;
        if(d.getSeconds() == 60){
            d.setMinutes(d.getMinutes()+1);
        }
        if(d.getMinutes() == 30 && d.getSeconds() == 0){
            calculateScore();
            disableTest(functionId);
           
        }
    },1000);
}
// startTimertwo();
document.querySelector("#test-submit").addEventListener("click",function(){

    disableTest(global_fucnction_id);
});


function calculateScore(){
    
    for(let i = 0;i<arr.length; i++){
        if(optionsData[i] !==undefined){
            if(arr[i].correct_answer == optionsData[i].option_ans_option ){
                scoreArray.push(2);   
            }
            else{
                incorrect_arr.push(0);
            }
        }
    }
  
    
}
let disableTest = (disableValue) =>{
    let temp_arr = '';
    if(localStorage.getItem('attempted_test') == null){
        data_for_local.push(dataObj);
        localStorage.setItem('attempted_test',JSON.stringify(data_for_local));

    }
    else{
        temp_arr = JSON.parse(localStorage.getItem('attempted_test'));
        temp_arr.push(dataObj);
        localStorage.setItem('attempted_test', JSON.stringify(temp_arr));
    }

    clearInterval(disableValue);

    let testLayoutParent = document.querySelector("#testLayout-parent");
    testLayoutParent.replaceChildren();
    let testDetails = `<div class="test-result-calculate">
                <div class="child-test-result-div">
                    <div class="test-result-heading"><h1>Test Result</h1></div> 
                    <div class="score-and-time">
                        <div class="score-title">score</div>
                        <div class="obtained-score" id="obtained-score"></div>
                        <div class="completion-time">${submitTIme}</div>
                    </div>
                    <div class="whole-total">
                        <div class="total-number-of-question">
                            <div class="total-questions">Total Question</div>
                            <div class="total-question-total">${arr.length}</div>
                        </div>
                        <div class="correct-answer-number">
                            <div class="correct-answer">Correct Answers</div>
                            <div class="correct-number">${scoreArray.length}</div>
                        </div>
                        <div class="incorrect-answer-number">
                            <div class="incorrect-answer">Incorrect Answers</div>
                            <div class="incorrect-number">${incorrect_arr.length}</div>
                        </div>
                        <div class="partially-correct">
                            <div class="partially-correct-answer">Partially Correct Answers</div>
                            <div class="partially-correct-number">0</div>
                        </div>
                        <div class="unattempted-answer">
                            <div class="unattempted-question">Unattempted Question</div>
                            <div class="unattempted-number">${arr.length - scoreArray.length}</div>
                        </div>  
                    </div>
                </div>
            </div>`;
        document.querySelector("#testLayout-parent").style.display = "none";
        document.querySelector(".parent-attempttest-container").insertAdjacentHTML("beforeend", testDetails);

        document.querySelector("#obtained-score").innerHTML = scoreArray.reduce((accumulator, currentValue) => accumulator + currentValue, 0);
}

function storeOption(data){
    let val = ""
    if(data.id == "option1"){
        val = "a";
    }
    else if(data.id == "option2"){
        val = "b";
    }
    else if(data.id == "option3"){
        val = "c";
    }
    else{
        val = "d";
    }
     
    optionsData.push({
        questionNo: data.getAttribute("info"),
        option : data.id,
        option_ans: document.querySelector(`#option-${data.id[data.id.length-1]}`).innerHTML,
        option_ans_option: val
    });

}


let openModalForDetail = ()=>{
    let not_visi_count = arr.length - not_visi.filter(value => value == true).length;
    marked_for_review = marked_for_r.filter(value => value == true).length;
    console.log(document.querySelector('.mark-review'))
    let node = `<div id="for-hide-modal">
                <div class="modal-parent">
                    <div class="child-modal">
                        <div class="for-closing" id="for-closing" onclick="document.getElementById('for-hide-modal').style.display = 'none'">
                            &times;
                        </div>
                        <div id="count-different">
                        <div class="count-different-type">
                            <div class="not-answered">
                                <div class="n-a"></div>
                                <span class="n-a-write">Not Answered</span>
                                <span>${arr.length - optionsData.length}</span>
                            </div>
                            <div class="answered">
                                <div class="answer-ed"></div>
                                <span class="ans-ed">Answered</span>
                                <span>${optionsData.length}</span>
                            </div>
                            <div class="marked-for-review">
                                <div class="marke-for-review"></div>
                                <span class="m-for-review">Marked For Review</span>
                                <span>${marked_for_review}</span>
                            </div>
                            <div class="not-visited">
                                <div class="n-v"></div>
                                <span class="n-visited">Not Visited</span>
                                <span>${not_visi_count}</span>
                            </div>
                            <div class="ans-and-mark-for-review">
                                <div class="ans-and-m-for-re"></div>
                                <span class="an-a-m-f-r">Partially Marked For Review</span>
                                <span>${answer_and_marked_for_review}</span>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>`;
    let parentElementForModal = document.querySelector("#parent-element-for-modal");
    parentElementForModal.insertAdjacentHTML("beforeend", node);
    document.getElementById('for-hide-modal').style.display='block'
}
document.querySelector("#report").addEventListener("click",function(){
    openModalForDetail();
});

function markforreview(targetData){

    marked_for_review = targetData.id.split("-");
    marked_for_r[marked_for_review[marked_for_review.length-1]] = true;

}
let sendData = ()=>{
    return arr.length;
}
document.addEventListener('DOMContentLoaded',function(){
    let parent_number_div = document.querySelector("#parent-number-div");
    let span = document.createElement('span');
    span.setAttribute('total-question',arr.length);
    span.setAttribute('name-of-test',name_of_test);
    span.id = 'total-question-number';
    parent_number_div.appendChild(span);
    span.style.display = "none";

});
window.fun = function(){
    startTimer();
    startTimertwo();
}