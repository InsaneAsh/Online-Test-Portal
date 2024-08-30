 <?php
    session_start();
    include '../PHP/fetchdata.php';
    if(isset($_SESSION['token']) && isset($_GET['token'])){
        $var_token = trim($_SESSION['token']);
        $var_getToken = trim($_GET['token']);
        if($var_token == $var_getToken){
            
        }
        else{
            header("Location: ../HTML/errorpage.html");
            exit();
        }
    }
    else if(isset($_SESSION['login_token']) && isset($_GET['login_token'])){
        $var_login_token = trim($_SESSION['login_token']);
        $var_getLogin_token = trim($_GET['login_token']);
        if($var_login_token && $var_getLogin_token){
            
        }
        else{
            header("Location: ../HTML/errorpage.html");
            exit();
        }
    }
    else if(isset($_SESSION['for_login_token']) && isset($_GET['for_login_token'])){
        $var_for_login_token = $_SESSION['for_login_token'];
        $var_getFor_login_token = $_GET['for_login_token'];
        if($var_for_login_token && $var_getFor_login_token){
            
        }
        else{
            header("Location: ../HTML/errorpage.html");
            exit();
        }
    }
    else{
        header("Location: ../HTML/errorpage.html");
        exit();
    }
    $_SESSION['study_material_token'] = bin2hex(random_bytes(32));
    $_SESSION['free_test_token'] = bin2hex(random_bytes(32));
    $_SESSION['user_profile_token'] = bin2hex(random_bytes((32)));


?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- fontawesome scripts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Get your own code at fontawesome.com-->
    <link rel="stylesheet" href="/Test Guru/CSS/Dashboard.css">
    <!-- For loading component -->
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <!-- Sidebar css -->
     <link rel="stylesheet" href="/Test Guru/CSS/sidebar.css">
</head>
<body>
    <!-- <span id="name-of-user" style="display: none;"><?php $name ?></span> -->
    <div id="user-profile-token" style="display: none;"><?php echo htmlspecialchars($_SESSION['user_profile_token'], ENT_QUOTES, 'UTF-8'); ?></div>
    <div id="free-test-token" style="display: none;"><?php echo htmlspecialchars($_SESSION['free_test_token'], ENT_QUOTES, 'UTF-8')?></div>
    <div id="study-material-token" style="display:none;" study-material-attr="<?php echo htmlspecialchars($_SESSION['study_material_token'], ENT_QUOTES, 'UTF-8'); ?>">
        <?php echo htmlspecialchars($_SESSION['study_material_token'], ENT_QUOTES, 'UTF-8'); ?>
    </div>
    <div class="root-container">

        <!-- start of div -->
        
        <!--  -->
        <div class="navbar-container">
            <nav class="navbar">
                <span class="three-line-code" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
                <span class="test-guru">Test Guru</span>
                <i class='well-icon'><i class="fa fa-bell"></i></i>
            </nav>
        </div>
        <div class="wrapper-of-container">
            <div class="parent-free-content">
                <div class="free-content">
                    <p class="free-content-para">Free content</p>
                    <a href="#" style="text-decoration: none;" id="for-study-token"><div class="study-material" id="free-study-material">
                        <p>Study Material</p>
                        <p>Icon</p>
                    </div>
                </a>
                </div>
            </div>
        </div>
        <!-- onload side bar -->
        <div id="onloadSideBar">

        </div>
        
       

        <!-- Bottom Navbar -->
        <div class="parent-bottom-navbar">
            <div class="parent-bottom-container">
                <div class="bottom-home">
                    <div>
                        <i class="fa fa-university for-icon"  ></i>
                        Home
                    </div>
                    
                </div>
                <div class="bottom-chat">
                    <div><i class="fa fa-comments-o for-icon"  ></i>Chat</div>
                </div>
                <div class="bottom-store">
                    <div><i class="fa fa-skyatlas for-icon"  ></i>Store</div>
                </div>
                <div class="bottom-profile" id="bottom-profile">
                    <div><i class="fa fa-child for-icon"  ></i>Profile</div>
                </div>
            </div>
        </div>
        <!-- End of div -->
         

    </div>
    <!-- JS load script- -->
     <script>
        // console.log(document.querySelector('#name-of-user').innerHTML);
        $(function(){
            $("#onloadSideBar").load("sidebar.html",function(){
                let free_test_token = document.querySelector("#free-test-token").innerHTML;
                let click_for_free_test = document.querySelector("#click-for-free-test");
                click_for_free_test.addEventListener("click", function(){
                    window.location.href = `../HTML/freetest.php?free_test_token=${free_test_token}`;
                });
                document.querySelector("#sidebar-name-of-user").innerHTML = `<span><?php echo $name ?></span>`;

                let sidebar_study_material = document.querySelector("#sidebar-study-material");
                sidebar_study_material.setAttribute('href',`studymaterial.php?study_material_token=${study_material_token}`);

                let sidebar_user_profile = document.querySelector("#sidebar-user-profile");
                sidebar_user_profile.setAttribute('href',`wholeprofile.php?user_profile_token=${user_profile_token}`);
                
            });
            
        });
        
        let study_material_token = document.querySelector("#study-material-token").innerHTML;
        console.log(study_material_token);
        

        
        document.querySelector("#for-study-token").addEventListener("click",function(){
            //console.log(`../HTML/studymaterial.php?study_material_token=${study_material_token}`)
            window.location.href = `../HTML/studymaterial.php?study_material_token=${study_material_token}` ;
        });     
     </script>
     <!-- External js for script -->
      <script src="/Test Guru/JS/sidebar.js"></script>
      <!-- Dashboard js -->
       <script src="/Test Guru/JS/Dashboard.js"></script>
</body>
</html>