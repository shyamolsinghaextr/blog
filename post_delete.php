<?php 

	session_start();
	require_once('db_connection.php');
	include 'components/head.php';
	include 'components/navbar.php';
	include 'components/sitebar.php';
	
	if(isset($_GET['id'])){	
		$postID = $_GET['id'];
		$sql = "DELETE FROM posts WHERE id = '$postID'"; 
		$result = mysqli_query($conn, $sql); 
		header("Location: posts.php");
	}

?>