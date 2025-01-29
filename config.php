<?php
	if ( ! session_id() ) {
        session_start();    
    }
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "mysql";
	// $sessdir = dirname(dirname(__FILE__)).'/pybythree/tmp';
	//print_r($sessdir);die;
	// ini_set('session.save_path', $sessdir); 
	// echo session_save_path(); die;
	// error_reporting(E_ALL);
	// ini_set('display_errors', '1');
    // $dir = 'https://'.$_SERVER['HTTP_HOST'].'/pibythree-revamp/admin';
	// $dir = 'https://'.$_SERVER['HTTP_HOST'].'/pibythree-revamp/admin';
	// $home = 'https://'.$_SERVER['HTTP_HOST'].'/pibythree-revamp';

	$dir = 'https://'.$_SERVER['HTTP_HOST'].'/pibythree-revamp/admin';
	$dir = 'https://'.$_SERVER['HTTP_HOST'].'/pibythree-revamp/admin';
	$home = 'https://'.$_SERVER['HTTP_HOST'].'/pibythree-revamp';
	$physical_dir = __dir__.'/admin/';
	
?>
