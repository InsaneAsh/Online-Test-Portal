<?php 
    include 'connection.php';
    $emailId = "";
    if(isset($_SESSION['emailId'])){
        $emailId = $_SESSION['emailId'];
    }
    else{
        echo "error";
    }

    // $email_url = 'rathoreashutosh1011@gmail.com';
    // echo $emailId;

    $name = '';
    $mobile_number = '';
    $roll_number = '';
    $email = '';
    $date_of_joining = '';

    $sql_email = "select * from basic_information where email = ?";
    $stmt = $conn->prepare($sql_email);
    $stmt->bind_param("s", $emailId);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
            $name = $row['name'];
            $mobile_number = $row['mobile_number'];
            $email = $row['email'];
            $roll_number = (int) $row['roll_number'];
            $date_of_joining = $row['date_of_joining'];
    }
?>