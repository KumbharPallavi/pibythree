<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contact";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data from POST request
$name = $_POST['name'] ?? '';
$email = $_POST['email1'] ?? '';
$phone = $_POST['phone'] ?? '';
$subject = $_POST['subject'] ?? '';
$additional_info = $_POST['additional-information'] ?? '';

// Basic validation (e.g., check if fields are empty)
$errors = [];
if (empty($name)) {
    $errors['name'] = "Name is required";
}
if (empty($email)) {
    $errors['email1'] = "Email is required";
}
if (empty($phone)) {
    $errors['phone'] = "Phone is required";
}
if (empty($subject)) {
    $errors['subject'] = "Subject is required";
}
if (empty($additional_info)) {
    $errors['additional-information'] = "Additional information is required";
}

// If no errors, proceed to database operations
if (empty($errors)) {
    // Prevent duplicate entries
    $sql_check = "SELECT * FROM contact_info WHERE email = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $email);
    $stmt_check->execute();
    $result = $stmt_check->get_result();

    if ($result->num_rows > 0) {
        // Display duplicate entry message
        $error_message = "Duplicate entry found for this email address.";
    } else {
        // Insert data into the database
        $sql = "INSERT INTO contact_info (name, email, phone, subject, additional_info) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $name, $email, $phone, $subject, $additional_info);

        if ($stmt->execute()) {
            // Display success message
            $success_message = "Your contact information has been successfully submitted.";
        } else {
            // Display error message
            $error_message = "There was an error submitting your information. Please try again.";
        }
    }
} else {
    // Collect errors and display them
    $error_message = "Please fill in all required fields.";
}

$conn->close();
?>

<!-- Display success or error message on the page -->
<?php if (isset($success_message)): ?>
    <p class="text-success"><?= $success_message ?></p>
<?php elseif (isset($error_message)): ?>
    <p class="text-danger"><?= $error_message ?></p>
<?php endif; ?>