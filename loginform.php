<?php
mysql_select_db('ishareilearn',mysql_connect('localhost','root',''));

if (isset($_POST['submit'])) {

$username=$_POST['username'];
$password=$_POST['password'];

$result=mysql_query("select * from registration where username='$username' and password='$password'")or die (mysql_error());	
	
$count=mysql_num_rows($result);
$row=mysql_fetch_array($result);
		
		if ($count > 0){
		session_start();
		$_SESSION['ID']=$row['ID'];
		header('location:home.php');
		}else{
		header('location:error1.html');
		}
}
?>

