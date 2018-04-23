<?php
	include("connection.php");

	$user_id = "000000";
	$username = "admin";
	$password = "root";
	$first_name = "admin";
	$last_name = "admin";
	$date_of_birth = "00-00-0000";

	$administration = mysqli_query($con, "insert into users (users_id, username, password, first_name, last_name, date_of_birth) values ('$users_id', '$username', '$password', '$first_name', '$last_name', '$date_of_birth')");

	if($administration === true){
		echo "Data is inserted";
	}
	else{
		echo "Data error".$con->error;
	}

	include("connectionclose.php");
?>