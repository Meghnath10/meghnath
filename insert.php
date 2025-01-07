
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jain_073";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO jain_073 (Student_Name, student_email,Branch)
VALUES ('meghnath', 'meghnath607187@gmail.com', 'cse*')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>