<?php 

	include_once('resources/init.php'); 

if ( ! isset($_GET['id']) ) {
	header('location: home.php');
	die();
}

delete('posts', $_GET['id']);

header('location: home.php');
die();

?>