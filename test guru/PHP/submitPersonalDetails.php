<?php
    include 'fetchrollnumber.php';

    $email_url = 'rathoreashutosh1011@gmail.com'; 
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $nationality = $_POST['nationality'];
    $blood_group = $_POST['blood_group'];

    $sql_insert = "INSERT INTO personal_details (fk_id, date_of_birth, gender, nationality, blood_group)
                VALUES (?, ?, ?, ?,?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("issss",$roll_number, $date_of_birth, $gender, $nationality, $blood_group);

    if ($stmt_insert->execute()) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $stmt_insert->error;
    }

    $stmt_insert->close();
    $conn->close();
?>