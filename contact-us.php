<?php include('header.php'); ?>
<section class="about-banner">
            <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="banner-img">
                                <img src="images/contact-us-banner.jpg" class="img-fluid" alt="about-us-banner">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-text-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">                       
                            <div class="banner-head" data-aos="fade-down">
                                    <h2>Contact Us</h2>
                                </div>
                                <ol class="breadcrumb breadcrumb-light">
                                    <li class="breadcrumb-item"><a href="<?php echo $home; ?>/index">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </header>
    </div>
    <section class="contact-us section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contact-us-content" data-aos="flip-right">
                        <!-- <label>Contact Us</label> -->
                        <h2>Thanks for your interest in PibyThree. How can we help you?</h2>
                        <p>To hear our latest insights, get a peek at our vibrant culture and see how our unique
                            approach with cutting-edge solutions empowers enterprises to achieve the remarkable results
                        </p>
                    </div>
                    <?php
$errors = [];
$success_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Input validation
    if (empty($_POST['name']) || strlen($_POST['name']) < 2 || strlen($_POST['name']) > 50) {
        $errors['name'] = "Invalid name. Please enter a valid name (2-50 characters).";
    }

    if (empty($_POST['email1']) || !filter_var($_POST['email1'], FILTER_VALIDATE_EMAIL)) {
        $errors['email1'] = "Invalid email. Please enter a valid email address.";
    }

    if (empty($_POST['phone']) || !preg_match('/^\d{10}$/', $_POST['phone'])) {
        $errors['phone'] = "Invalid phone number. Please enter a valid 10-digit number.";
    }

    if (empty($errors)) {
        // Process form data (e.g., save to the database)
        $success_message = "Thank you! Your message has been sent successfully.";
        // Optionally, redirect to avoid resubmission
        // header('Location: ?status=success');
        // exit;
    }
}
?>
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

// Initialize message variables
$error_message = '';
$success_message = '';

// If no errors, proceed to database operations
if (empty($errors)) {
    // Prevent duplicate entries
    $sql_check = "SELECT * FROM contact_info WHERE email = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $email);
    $stmt_check->execute();
    $result = $stmt_check->get_result();

    if ($result->num_rows > 0) {
        // Duplicate entry found
        $error_message = "Duplicate entry found for this email address.";
    } else {
        // Insert data into the database
        $sql = "INSERT INTO contact_info (name, email, phone, subject, additional_info) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $name, $email, $phone, $subject, $additional_info);

        if ($stmt->execute()) {
            // Success message
            $success_message = "Your contact information has been successfully submitted.";
        } else {
            // Error message
            $error_message = "There was an error submitting your information. Please try again.";
        }
    }
} else {
    // Collect errors and display them
    $error_message = "Please fill in all required fields.";
}

$conn->close();
?>

<!-- Display success or error message above the form -->
<?php if ($error_message): ?>
    <p class="text-danger"><?= $error_message ?></p>
<?php elseif ($success_message): ?>
    <p class="text-success"><?= $success_message ?></p>
<?php endif; ?>

<!-- Your form here -->
<form action="" method="post" id="contactusForm" novalidate="novalidate">
    <div class="form-wrapper">
        <div class="form-card">
            <input type="text" name="name" class="form-control input-field" id="name" placeholder="Name" 
                value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
            <small class="text-danger"><?= $errors['name'] ?? '' ?></small>
        </div> 
        <div class="form-card">
            <input type="email" name="email1" class="form-control input-field" id="email1" placeholder="Email" 
                value="<?= htmlspecialchars($_POST['email1'] ?? '') ?>">
            <small class="text-danger"><?= $errors['email1'] ?? '' ?></small>
        </div>
        <div class="form-card">
            <input type="text" name="phone" class="form-control input-field" id="phone" placeholder="Phone" 
                value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>">
            <small class="text-danger"><?= $errors['phone'] ?? '' ?></small>
        </div> 
        <div class="form-card"> 
            <input type="text" name="subject" class="form-control input-field" id="subject" placeholder="Subject" 
                value="<?= htmlspecialchars($_POST['subject'] ?? '') ?>">
            <small class="text-danger"><?= $errors['subject'] ?? '' ?></small>
        </div>
    </div>
    <div class="mb-3">
        <textarea name="additional-information" class="form-control" id="additional-information" 
                placeholder="Additional Information"><?= htmlspecialchars($_POST['additional-information'] ?? '') ?></textarea>
        <small class="text-danger"><?= $errors['additional-information'] ?? '' ?></small>
    </div>
    <button type="submit" class="btn btn-default mt-3 form-submit" data-aos="flip-right">SUBMIT</button>
</form>

                </div>
            </div>
        </div>
    </section>
    <a href="mailto:contactus@pibythree.com">
        <div class="contact-icon" role="button" aria-label="Contact Us">
          <i class="fa-regular fa-envelope"></i>
        </div>
    </a>
    <?php include('footer.php'); ?>