<?php
	if(empty($_SESSION['id'])){
		$_SESSION['error'] = "Error: Session timeout.";
	  	header('Location: '.$dir.'/login.php');
	}
?>