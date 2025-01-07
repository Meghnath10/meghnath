<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "browse_image";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if a file is uploaded
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $image = $_FILES['image'];

    // Validate file upload
    if ($image['error'] === UPLOAD_ERR_OK) {
        $imageName = $image['name'];
        $imageTmpName = $image['tmp_name'];
        $imageType = $image['type'];
        $imageSize = $image['size'];

        // Validate file type (optional)
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($imageType, $allowedTypes)) {
            die("Error: Only JPG, PNG, and GIF files are allowed.");
        }

        // Read the file content as binary data
        $imageData = addslashes(file_get_contents($imageTmpName));

        // Insert into database
        $sql = "INSERT INTO images (name, type, size, data) VALUES ('$imageName', '$imageType', '$imageSize', '$imageData')";
        if ($conn->query($sql) === TRUE) {
            echo "Image uploaded and saved successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error uploading file.";
    }
} else {
    echo "No file uploaded.";
}

$conn->close();
?>