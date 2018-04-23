<?php
	include "connection.php";
	$child_FN = $_POST['first_name'];
	$child_LN = $_POST['last_name'];
	$child_username = $_POST['username'];
	$child_password = $_POST['password'];
	$child_dob = $_POST['date_of_birth'];
	$parent_FN = $_POST['parent_FN'];
	$parent_LN = $_POST['parent_LN'];
	$parent_phone = $_POST['phone'];
	$parent_email = $_POST['email'];

	$num_parent = 100000;
	$num_user = 1000000;

	$user_id = 0;
	$parent_id = 0;

	$max_user = mysqli_fetch_array(mysqli_query($con, "select max(users_id) as max_user_id from users"), MYSQLI_ASSOC);
	$max_parent = mysqli_fetch_array(mysqli_query($con, "select max(parents_id) as max_parent_id from parents"), MYSQLI_ASSOC);

	$user_id = substr($num_user + $max_user['max_user_id'] + 1, -6);
	$parent_id = substr($num_parent + $max_parent['max_parent_id'] + 1, -5);

	$exist_user = mysqli_fetch_array(mysqli_query($con, "select users_id from users where username = '$child_username' and password = '$child_password' and first_name = '$child_FN' and last_name = '$child_LN' and date_of_birth = '$child_dob'"));

	$exist_parent = mysqli_fetch_array(mysqli_query($con, "select parents_id from parents where first_name = '$parent_FN' and last_name = '$parent_LN' and phone_number = '$parent_phone' and email = '$parent_email'"));

	if($exist_parent == null){
		mysqli_query($con, "insert into parents (parents_id, first_name, last_name, phone_number, email) values ('$parent_id', '$parent_FN', '$parent_LN', '$parent_phone', '$parent_email')");
	}
	else{
		$parent_id = $exist_parent['parents_id'];
	}
	if($exist_user == null){
		mysqli_query($con, "insert into users (users_id, first_name, last_name, username, password, date_of_birth, parents_id) values ('$user_id', '$child_FN', '$child_LN', '$child_username', '$child_password', '$child_dob', '$parent_id')");
	}else{
		echo "User is already created.";
	}
	echo $con->error;
?>