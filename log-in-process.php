<?php
include("connection.php");
$username=$_POST['username'];
$password=$_POST['password'];
$password=md5($password);
$password=substr($password,0,-2);
$result=mysqli_query($con,"SELECT users_id FROM users WHERE username='$username' AND password='$password'");
session_start();
if(mysqli_num_rows($result)==0) { header("Location: log-in.php");}
else{
//correct username and password
	
	$array=mysqli_fetch_array($result,MYSQLI_ASSOC);
	$_SESSION['users_id']=$array['users_id'];
	if(strcmp($array['users_id'],"000000")==0) header("Location: staff-page.php");
	else{ 
		date_default_timezone_set('Asia/Hong_Kong');
		$today=date('Y/m/d');
		$query="UPDATE users set last_login ='$today' WHERE users_id='$array[users_id]'";
		mysqli_query($con,$query);
		header("Location: member-page.php");
	}
}
include("connectionclose.php");
?>