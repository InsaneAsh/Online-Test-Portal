<?php
    session_start();
    if(isset($_SESSION['study_material_token']) && isset($_GET['study_material_token'])){
        $one = trim($_SESSION['study_material_token']);
        $two = trim($_GET['study_material_token']);
        if($one == $two){
            
        }
        else{
           header("Location: ../HTML/errorpage.html");
           exit();
        }
        
    }
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
    <!-- stuudy material css -->
    <link rel="stylesheet" href="/Test Guru/CSS/studymaterial.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div>
        <div id="load-navbar"></div>
        
        
    </div>
    <script>
        $(function(){
            $("#load-navbar").load("navbar/navbar.html", function(){
                let nameOnNav = document.querySelector("#name-on-navbar");
                nameOnNav.innerHTML = "Study Material";
            });
            
        })
        
    </script>
    <!-- studymaterial js -->
     <script src="/Test Guru/JS/studymaterial.js"></script>
</body>
</html>