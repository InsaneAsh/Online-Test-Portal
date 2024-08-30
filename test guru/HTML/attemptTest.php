<?php
    session_start();

    if(isset($_SESSION['for_taking_test_token']) && isset($_GET['for_taking_test_token'])){
        $var_one = trim($_SESSION['for_taking_test_token']);
        $var_two = trim($_SESSION['for_taking_test_token']);
        if($var_one == $var_two){
            
        }
        }
        else{
            header("Location: ../HTML/gotodashboard.html");
            exit();
        }
        session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- For loading component -->
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    
        <!-- fontawesome scripts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- External Css -->
     <link rel="stylesheet" href="/Test Guru/CSS/for testing purpose/modal.css">
     <!-- attempt css -->
      <link rel="stylesheet" href="/Test Guru/CSS/attemptTest.css">
      <!-- ecxternal modal css -->
      <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
</head>
<body>     
        <div id="parent-number-div"></div>
        <div class="parent-attempttest-container">
            <!-- <div class="test-result-calculate">
                <div class="child-test-result-div">
                    <div class="test-result-heading"><h1>Test Result</h1></div> 
                    <div class="score-and-time">
                        <div class="score-title">score</div>
                        <div class="obtained-score">0</div>
                        <div class="completion-time">0 minutes, 41 seconds</div>
                    </div>
                    <div class="whole-total">
                        <div class="total-number-of-question">
                            <div class="total-questions">Total Question</div>
                            <div class="total-question-total">20</div>
                        </div>
                        <div class="correct-answer-number">
                            <div class="correct-answer">Correct Answers</div>
                            <div class="correct-number">0</div>
                        </div>
                        <div class="incorrect-answer-number">
                            <div class="incorrect-answer">Incorrect Answers</div>
                            <div class="incorrect-number">0</div>
                        </div>
                        <div class="partially-correct">
                            <div class="partially-correct-answer">Partially Correct Answers</div>
                            <div class="partially-correct-number">0</div>
                        </div>
                        <div class="unattempted-answer">
                            <div class="unattempted-question">Unattempted Question</div>
                            <div class="unattempted-number">20</div>
                        </div>  
                    </div>
                </div>
            </div> -->
            <!-- modal -->
            <div id="detail-modal"></div>
            <!--  -->

            <div class="testLayout-parent" id="testLayout-parent">
                <div class="timer-parent-class">
                    <div class="watch-timer">
                        <div id="watch-timer">hh:mm:ss</div>
                    </div>
                </div>
                <div class="question-time">
                    <div class="question-number-marks">
                        <div class="question-number" id="question-number-nav">
                            Question No.
                        </div>
                        <div class="marks">
                            +2
                        </div>
                    </div>
                    <div class="timer-review-report">
                        <div class="timer-positive" id="timer-positive">
                            hh:mm:ss
                        </div>
                        <div class="review">

                        </div>
                        <div class="report" id="report" >
                            &#65049;
                            
                        </div>
                    </div>
                </div>
                
                <div class="question-section-answer" id="question-section-answer">
                    <!-- <div class="question-option">
                        <div class="question-answer-number"></div>
                        <div class="mcq-options"></div>
                        <div class="previous-next">
                            <div class="previous-pre"> Previous</div>
                            <div class="next-and-save">Next & Save </div>
                        </div>
                        
                    </div>
                    <div class="total-question">
                        <p>Total Questions</p>
                        <div class="number-question">
                            <div class="question-box"></div>
                        </div>
                    </div> -->
                </div>
            </div>

            
        <!-- end of div -->
        </div>
        <!-- modal html -->
        <div id="parent-element-for-modal">
            <!-- <div id="for-hide-modal">
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
                                <span>20</span>
                            </div>
                            <div class="answered">
                                <div class="answer-ed"></div>
                                <span class="ans-ed">Answered</span>
                                <span>20</span>
                            </div>
                            <div class="marked-for-review">
                                <div class="marke-for-review"></div>
                                <span class="m-for-review">Marked For Review</span>
                                <span>20</span>
                            </div>
                            <div class="not-visited">
                                <div class="n-v"></div>
                                <span class="n-visited">Not Visited</span>
                                <span>20</span>
                            </div>
                            <div class="ans-and-mark-for-review">
                                <div class="ans-and-m-for-re"></div>
                                <span class="an-a-m-f-r">Partially Marked For Review</span>
                                <span>20</span>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        <!--  -->
        <!--  -->
        <script type="module"  src="/Test Guru/JS/attemptTest.js"></script>
        <script>
        

            $(function(){
                $("#detail-modal").load("modal.html", 
                function(){
                    
                    var modal = document.getElementById("myModal");
                    
                    var span = document.getElementsByClassName("close")[0];
                    
                    span.onclick = function() {
                    window.history.back();
                    }
                   
                    openModal(modal);
                    function openModal(modal){
                        modal.style.display = "block"
                    }
                    

                    let questions = document.querySelector("#total-question-number");

                    document.querySelector("#name-of-mocktest").innerHTML = questions.getAttribute('name-of-test');

                    let ques = questions.getAttribute('total-question');
                    let node_insert = `<div class="upper-detail-layout">
                        <div class="total-question-attempt">
                        <i class="fa fa-users"></i>
                        <div>${ques} Questions</div>
                        </div>

                        <div class="total-question-attempt">  
                            <i class="fa fa-users"></i>
                            <div class="total-time">30 Minutes</div>
                        </div>

                        <div class="total-question-attempt">
                        <i class="fa fa-users"></i>
                        <div class="total-marks">${ques*2} Marks</div>
                        </div>
                        
                    </div>
                        <div class="wrapper-of-checkbox-div">
                            <input type="checkbox" name="read" id="read">
                            <div class="read-only">
                            I have read and understand the instructions. I agree that in case of not adhering to the instructios.I shall be liable to debbared from this test and/or disciplinary action, which may include ban from future tests.
                            </div>
                    </div>
                    <div class="start-test-div">
                        <button id="start-test-btn"  disabled>Start Test</button>
                    </div>`;
                
                       let test_parent = document.querySelector("#important-details-about-test");
                       test_parent.insertAdjacentHTML("beforeend", node_insert);
                       let start_test_btn = document.querySelector('#start-test-btn');
                    console.log(start_test_btn);
                    document.querySelector('.wrapper-of-checkbox-div').addEventListener('click',function(){
                        start_test_btn.disabled = false;
                    });
                    start_test_btn.onclick = function(event) {
                       modal.style.display = "none";
                        fun();
                    }
                    
                }); 
            })
            
        </script>
        <!-- External JS -->
        
        <script src="/Test Guru/JS/modal.js"></script>
        
        <!-- questoin answer data -->
         <script type="module" src="/Test Guru/JS/testQuestions.js"></script>
</body>
</html>
<!-- <span>
                                <input type="radio" name="" id="option1">
                                 <div id="option1">${data.questions[questionNo].options.a}</div>
                            </span>
                            <span>
                                <input type="radio" name="" id="option2">
                                 <div id="option2">${data.questions[questionNo].options.b}</div>
                            </span>
                            <span>
                                <input type="radio" name="" id="option3">
                                 <div id="option3">${data.questions[questionNo].options.c}</div>
                            </span>
                            <span>
                                <input type="radio" name="" id="option4">
                                 <divid="option4">${data.questions[questionNo].options.d}</div>
                            </span> -->