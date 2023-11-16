<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize user input
    $barcodeId = $_POST['barcodeId'];
    $productName = $_POST['productName'];
    $productGroup = $_POST['productGroup'];
    $qty = $_POST['qty'];


    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "systtrial_db");

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the username already exists
    $checkproductIdStmt = $conn->prepare("SELECT * FROM product WHERE productID = ?");
    $checkproductIdStmt->bind_param("i", $productId);
    $checkproductIdStmt->execute();
    $checkproductIdStmt = $checkproductIdStmt->get_result();

    if ($checkproductIdStmt->num_rows != 1) {
        echo "<script>alert('Error: Product already existed!'); window.location='product.html';</script>";
        exit();
    }

    // Check if the email already exists
    $checkproductStmt = $conn->prepare("SELECT * FROM product WHERE productName = ?");
    $checkproductStmt->bind_param("s", $productName);
    $checkproductStmt->execute();
    $checkproductStmt = $checkproductStmt->get_result();

    if ($checkproductStmt->num_rows != 1) {
        echo "<script>alert('Error: Product name already existed!'); window.location='product.html';</script>";
        exit(); // Stop execution if the email doesn't exist
    }

    // Continue with the password change process

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO product (productId, productName, productGroup, qty) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sss", $productId, $productName, $productGroup, $qty);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('Product Saved!'); window.location='product.html';</script>";
        exit(); // Ensure that no other code is executed after the redirect
    } else {
        echo "<script>alert('Product Failed to Save!'); window.location='product.html';</script>";
        exit();
    }

    // Close the statements and connection
    $updateStmt->close();
    $checkUsernameStmt->close();
    $checkEmailStmt->close();
    $conn->close();
}
?>
