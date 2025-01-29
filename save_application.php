<?php
// Database connection
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = "";     // Replace with your database password
$dbname = "careers";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $position = $_POST['position'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile_no = $_POST['mobile-no'];
    $file = $_FILES['file'];

    // File upload
    $target_dir = "uploads/";
    $file_name = basename($file["name"]);
    $target_file = $target_dir . $file_name;

    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        // Insert data into database
        $sql = "INSERT INTO applications (position, name, email, mobile_no, file_path) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $position, $name, $email, $mobile_no, $target_file);

        if ($stmt->execute()) {
            echo "Application submitted successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error uploading file.";
    }
}

$conn->close();
?>