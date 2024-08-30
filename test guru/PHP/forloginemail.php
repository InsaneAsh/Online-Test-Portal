<?php
    session_start();
    include 'connection.php';
    $realtoken= "";
    $_SESSION['emailId'] = '';
    if(isset($_SESSION['login_token']) && $_GET['login_token']){
        $var_one = trim($_SESSION['login_token']);
        $var_two = trim($_GET['login_token']);
        $realtoken = $_GET['login_token'];
        if($var_one == $var_two){

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

    if(isset($_GET['emailId'])){
        
        $emailId = $_GET['emailId'];
        $_SESSION['emailId'] = $emailId;
        $sql = "SELECT email FROM basic_information WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $emailId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($result->num_rows > 0)
        {
            header("Location: ../HTML/Dashboard.php?emailId=$emailId&login_token=$realtoken");
            exit();
        }
        else{
            header("Location: ../PHP/Details.php");
            exit();
        }
    }
    else{
        header("Location: ../HTML/errorpage.html");
        exit();
    }
   
?>