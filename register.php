<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize user input
    $username = htmlspecialchars($_POST['username']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    // Validate password match
    if ($password !== $cpassword) {
        echo "<script>alert('Passwords do not match!'); window.location='regform.html';</script>";
        exit();
    }

    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "systtrial_db");

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the username already exists
    $checkStmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $checkStmt->bind_param("s", $username);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        echo "<script>alert('Error: Username already exists!'); window.location='regform.html';</script>";
    } else {
        // Continue with the registration process

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<script>alert('Registration successful!'); window.location='login.html';</script>";
            exit(); 
        } else {
            echo "<script>alert('Registration failed. Please try again later'); window.location='regform.html';</script>";
            exit(); 
        }

        // Close the statement
        $stmt->close();
    }

    // Close the statement and connection
    $checkStmt->close();
    $conn->close();
}
?>
