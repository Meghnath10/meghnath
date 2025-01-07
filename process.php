<?php
$servername = "localhost"; 
$username = "root";        
$password = "";            
$dbname = "login_html";      
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$username = $_POST['username'];
$password = $_POST['password'];
$Email = $_POST['email'];
$hone_no = $_POST['phone'];
if (empty($user) || empty($pass) || empty($email) || empty($phone)) {
    die("All fields are required!");
}
$hashed_password = password_hash($pass, PASSWORD_BCRYPT);
$stmt = $conn->prepare("INSERT INTO users (username, password, email, phone) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $user, $hashed_password, $email, $phone);
if ($stmt->execute()) {
    echo "Registration successful!";
} else {
    echo "Error: " . $stmt->error;
}
$stmt->close();
$conn->close();
?>