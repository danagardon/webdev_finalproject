<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Registration Form</title>
</head>

<body>

<?php

$dbc = mysqli_connect('localhost', 'root', '', 'ishareilearn');
	
	if(($_SERVER['REQUEST_METHOD'] == 'POST')){
		
		if(isset($_POST['ID']) && filter_var($_POST['registration'], 
		FILTER_VALIDATE_INT, array('min_range' => 1))){
			$ID = $_POST['ID'];
			
		}else{
			$ID = 0;
		}


$firstname= $_POST['firstname'];
$lastname= $_POST['lastname'];
$email= $_POST['email'];
$username= $_POST['username'];
$password= $_POST['password'];
		
		
		$q = "INSERT INTO registration (firstname, lastname, email, username, password, ID) VALUES ('$firstname', '$lastname', '$email', '$username', '$password', $ID)";
		$r = mysqli_query($dbc, $q);
		
		if(mysqli_affected_rows($dbc) == 1){
			
					header('location:success.html');
			
		}else{
		header('location:.html');

		}
	}

?>

</body>

</html>
