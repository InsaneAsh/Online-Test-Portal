<?php 
    include '../PHP/fetchdata.php';
    //$email_url = 'rathoreashutosh1011@gmail.com';
    $permanent_address = '';
    $p_a_pincode = '';
    $correspondance_address = '';
    $c_a_pincode = '';

    $sql_ad = "SELECT * FROM `adress_details` WHERE adk_id = ?";
    $stmt = $conn->prepare($sql_ad);
    $stmt->bind_param("s",$roll_number);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
       $row = $result->fetch_assoc();
            $permanent_address = $row['permanent_address'];
            $p_a_pincode = $row['p_a_pincode'];
            $correspondance_address = $row['correspondance_address'];
            $c_a_pincode = $row['c_a_pincode'];

    }
?>