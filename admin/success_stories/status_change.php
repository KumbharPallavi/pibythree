<?php
	include('../../config.php');
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}


	$sql = "SELECT * FROM success_stories WHERE status=1 AND id=".base64_decode($_GET['id']);

	if ($result = mysqli_query($conn, $sql)) {
	  $rowcount = mysqli_num_rows( $result );
    
    }
    if($rowcount>=1){
		$sql = "UPDATE success_stories SET status=0 WHERE id=".base64_decode($_GET['id']);
	}else{
		$sql = "UPDATE success_stories SET status=1 WHERE id=".base64_decode($_GET['id']);
	}

	if ($conn->query($sql) === TRUE) {
	  $_SESSION['success'] = "Record updated successfully";
	  echo "<script>location.href = '".$dir."/success_stories';</script>";
	} else {
	  $_SESSION['error'] = "Error: " . $sql . "<br>" . $conn->error;
      header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	$conn->close();
?>