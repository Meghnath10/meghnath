<?php
$servername = "localhost";
$username = "root";    
$password = "";
$dbname = "login_html";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Simple validation for POST data
if (!empty($_POST["Username"]) && !empty($_POST["Password"]) && !empty($_POST["Email"]) && !empty($_POST["Phone_no"])) {
    $a = $_POST["tb1"];
    $b = $_POST["tb2"]; // Use plain text for simplicity (not recommended for production)
    $c = $_POST["tb3"];
    $d = $_POST["tb4"];
    echo $a;
    

    $sql = "INSERT INTO login (Username, Pass, Email, Phone_no) VALUES ('$a', '$b', '$c', '$d')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} //else
 {
   // echo "Please fill in all fields.";
}

$conn->close();
?>
