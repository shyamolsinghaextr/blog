<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Dashboard</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
<?php 
	session_start();
	if($_SESSION["Role"] != 'admin' AND $_SESSION["Role"] != 'editor'){ header("Location: index.php");} 
?>