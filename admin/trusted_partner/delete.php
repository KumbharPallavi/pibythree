<?php
	include('../../config.php');
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	$sql = "UPDATE trusted_partner SET is_deleted=0 WHERE id=".base64_decode($_GET['id']);

	if ($conn->query($sql) === TRUE) {
	  $_SESSION['success'] = "Record deleted successfully";
	  echo "<script>location.href = '".$dir."/trusted_partner';</script>";
	} else {
	  $_SESSION['error'] = "Error: " . $sql . "<br>" . $conn->error;
      header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	$conn->close();
?>