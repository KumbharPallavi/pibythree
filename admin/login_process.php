<?php 
include('../config.php');
if (empty($_POST['email']) && empty($_POST['password']) ) {
	// Could not get the data that should have been sent.
	$_SESSION['error'] = "Error: Authentication failed.";
  header('Location: login.php');
}

$conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $email     = preg_replace('/[^a-zA-Z0-9_.@]/', '', $_POST['email']);
  $password  = base64_encode(base64_encode($_POST['password']));
  $sql       = "SELECT * FROM users WHERE email='$email' AND password='$password' AND is_deleted=1 AND status=1 limit 1";
  $result    = $conn->query($sql);
  

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    	$_SESSION['id'] = $row['id']; 
    	$_SESSION['email'] = $row['email']; 
    	$_SESSION['name'] = $row['name']; 
    }
  	header('Location: dashboard.php');
  }else{
  	$_SESSION['error'] = "Error: Authentication failed.";
  	header('Location: login.php');
  }
?>