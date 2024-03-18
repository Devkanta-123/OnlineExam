<?php
// include db connection
include 'db/db_connection.php';

$registrationNo = $_POST['registrationNo'];
$firstname = $_POST['firstname'];
$password = $_POST['password'];
$email = $_POST['email'];
$phoneno = $_POST['phoneno'];
$address = $_POST['address'];
$grade = $_POST['grade'];

try {
    // Prepare SQL statement to insert data
    $stmt = $pdo->prepare("INSERT INTO student (registrationNo,firstname, password, email, phoneno, address, grade) VALUES (:registrationNo,:firstname, :password, :email, :phoneno, :address, :grade)");

    // Bind parameters
    $stmt->bindParam(':registrationNo', $registrationNo);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phoneno', $phoneno);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':grade', $grade);

    // Execute the statement
    $stmt->execute();

    echo "Student registered successfully!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the connection
$pdo = null;
?>
