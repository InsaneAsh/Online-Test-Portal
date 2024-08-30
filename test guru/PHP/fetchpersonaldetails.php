<?php 
    
    include 'fetchdata.php';
    // $email_url = 'rathoreashutosh1011@gmail.com';
    $dob = '';
    $gender = '';
    $nationality = '';
    $blood_group = '';

    $sql_pd = "SELECT * FROM `personal_details` WHERE fk_id = ?";
    $stmt = $conn->prepare($sql_pd);
    $stmt->bind_param("s",$roll_number);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0){
       $row = $result->fetch_assoc();
            $dob = $row['date_of_birth'];
            $gender = $row['gender'];
            $nationality = $row['nationality'];
            $blood_group = $row['blood_group'];
        
    }
    

?>