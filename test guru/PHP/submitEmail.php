<?php
    include 'connection.php';
    $email = $_GET['email'];
    
    $stmt = $conn->prepare("INSERT INTO `basic_information`(`email`) VALUES (?)");
    $stmt->bind_param("s", $email);
    if($stmt->execute()){
        print_r("submit email using php");
        return true;
    }
    else{
        print_r("not submit data");
        return false;
    }
?>