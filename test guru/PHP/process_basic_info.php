<?php
// Include the database connection file
session_start(); // Start the session

// Generate a unique token
$_SESSION['token'] = bin2hex(random_bytes(32));

include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form inputs
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $date_of_joining = htmlspecialchars($_POST['date_of_joining']);
    $email = htmlspecialchars($_POST['email']);

    $pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";

    // Validate inputs
    if (!preg_match("/^[\w\s]+$/", $name)) {
        die("Invalid name format.");
    }
    if (!preg_match("/^\d{10}$/", $phone)) {
        die("Invalid phone number format. It should be 10 digits.");
    }
    if (!preg_match($pattern, $email)) {
        echo "InValid email address.";
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO `basic_information`(`name`, `mobile_number`, `email`,`date_of_joining`) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $name, $phone, $email, $date_of_joining);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Thank you for submitting the form.";
        header("Location: ../HTML/Dashboard.php?token=".$_SESSION['token']);
        exit();
    } else {
        echo "Error: " . $stmt->error;
        header("Location: ../HTML/Login.html");
        exit();
    }
    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect to the form if not a POST request
    header("Location: details.php");
    exit();
}
?>
