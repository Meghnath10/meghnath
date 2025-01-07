<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "listmore";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $pass = trim($_POST['password']);
    $email = trim($_POST['email']);
    $phone_no = trim($_POST['phone_no']);

    $stmt = $conn->prepare("INSERT INTO register (Username, Password, Email, Phone_no) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $pass, $email, $phone_no);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
