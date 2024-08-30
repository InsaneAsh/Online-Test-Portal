<?php 
    session_start();
    if(isset($_SESSION['free_test_token']) && isset($_GET['free_test_token'])){
        $var_one = trim($_SESSION['free_test_token']);
        $var_two = trim($_GET['free_test_token']);
       // echo $var_one . "<br>" . $var_two;
        if($var_one == $var_two){
            
        }
        else{
           // echo "pta nn";
            header("Location: ../HTML/errorpage.html");
            exit();
        }
    }

    $_SESSION['for_taking_test_token'] = bin2hex(random_bytes(32));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- For loading component -->
     <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
     <!-- navbar css -->
    <link rel="stylesheet" href="/Test Guru/HTML/navbar/navbar.css">
    <!-- w3 css -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- external css of freetest.css -->
     <link rel="stylesheet" href="/Test Guru/CSS/freetest.css">
    <body>
</head>
<body>
    <div id="for-taking-test-token" style="display: none;"><?php echo htmlspecialchars($_SESSION['for_taking_test_token'], ENT_QUOTES, 'UTF-8'); ?></div>
    <div class="parent-free-test">
        <!-- start div -->
        <div id="load-navbar"></div>
        
        <div class="w3-bar w3-black parent-navigation-tab">
            <button class="w3-bar-item w3-button navigation-tab-ongoing" onclick="openTask('ongoing')" id="navigation-tab-ongoing">ONGOING</button>
            <button class="w3-bar-item w3-button" onclick="openTask('upcoming')" id="navigation-tab-upcoming">UPCOMING</button>
            <button class="w3-bar-item w3-button" onclick="openTask('attempted')" id="navigation-tab-attempted">ATTEMPTED</button>
        </div>

        <!-- search -->
         <div class="serch-bar-input">
            <input type="text" class="search-bar-navigation" placeholder="searh">
         </div>
        <!-- Content of navigation bar -->
        <div id="ongoing" class="w3-container ongoing test">

            <!-- <div class="parent-ongoing-test-details" id="parent-ongoing-test-details">
                <div class="ongoing-test-details" id="ongoing-test-details">
                    <div class="test-design">
                        <div>&#9776;</div></div>
                    <div class="test-name"><div>MOCK TEST - 01</div></div>
                    <div class="attempt-btn">
                        <div class="attemp-btn-inner">
                            Attempt
                        </div>
                    </div>
                </div>
            </div>     -->

        </div>
          
          <div id="upcoming" class="w3-container upcoming test" style="display:none">
            <h2>Paris</h2>
            <p>Paris is the capital of France.</p> 
          </div>
          
          <div id="attempted" class="w3-container attmepted test" style="display:none">
            <!-- <h2>Welcom to Attempted section</h2>
            <p>Tokyo is the capital of Japan.</p> -->

          </div>

        <!-- parent element for modal -->
         <div id="instruction-modal-for-test"></div>
        <!-- end div -->
    </div>
    <script>
        $(function(){
            $("#load-navbar").load("navbar/navbar.html", function(){
                let nameOnNav = document.querySelector("#name-on-navbar");
                nameOnNav.innerHTML = "Free Test";
                let wellIcon = document.querySelector(".well-icon");
                wellIcon.innerHTML = "";
            });
            
        })
        
        
    </script>
    <!-- freetest js -->
     <script type="module" src="/Test Guru/JS/freetest.js"></script>
    <script type="module" src="/Test Guru/JS/ongoingTestDetails.js"></script>
</body>
</html>