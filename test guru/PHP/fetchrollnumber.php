<?php
    include 'connection.php';
    $emailId = "";
    session_start();
    if(isset($_SESSION['emailId'])){
        $emailId = $_SESSION['emailId'];
    }
    else{
        echo "error";
    }

    $roll_number = '';
    

    $sql_email = "select roll_number from basic_information where email = ?";
    $stmt = $conn->prepare($sql_email);
    $stmt->bind_param("s", $emailId);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
           
            $roll_number = (int) $row['roll_number'];
            echo $roll_number;
            
    }

?>