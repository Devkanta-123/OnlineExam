<?php
session_start();
include 'db/db_connection.php';

// Retrieve form data
$LoginRegistrationNo = $_POST['LoginRegistrationNo'];
$LoginPassword = $_POST['LoginPassword'];

try {
    // Prepare SQL statement to check user credentials
    $stmt = $pdo->prepare("SELECT * FROM student WHERE registrationNo = :LoginRegistrationNo AND password = :LoginPassword");
    $stmt->bindParam(':LoginRegistrationNo', $LoginRegistrationNo); // Corrected binding
    $stmt->bindParam(':LoginPassword', $LoginPassword); // Corrected binding
    $stmt->execute();

    // Check if user exists
    if ($stmt->rowCount() > 0) {
        $_SESSION['LoginRegistrationNo'] = $LoginRegistrationNo; // There's no $firstname variable defined here
        echo 'success';
    } else {
        echo 'Invalid username or password';
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the connection
$pdo = null;
?>
   