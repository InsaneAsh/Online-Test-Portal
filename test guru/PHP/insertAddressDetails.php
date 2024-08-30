<?php
    include 'fetchrollnumber.php';

    $permanent_address = htmlspecialchars($_POST['permanent_address']);
    $p_a_pincode =htmlspecialchars($_POST['p_a_pincode']);
    $correspondance_address =htmlspecialchars($_POST['c_address']);
    $c_a_pincode =htmlspecialchars($_POST['c_a_pincode']);

    $sql_insert = "INSERT INTO adress_details (adk_id, permanent_address, p_a_pincode, correspondance_address, c_a_pincode) VALUES (?, ?, ?, ?,?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("issss",$roll_number, $permanent_address, $p_a_pincode, $correspondance_address, $c_a_pincode);

    if ($stmt_insert->execute()) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $stmt_insert->error;
    }
    
    $stmt_insert->close();
    $conn->close();
?>
<script>
    document.addEventListener("DOMContentLoaded", function(){
        window.history.back();
    });
</script>