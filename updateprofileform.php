<?php

	include "connection.php";
	$users_id = $_POST['users_id'];
	$child_FN = $_POST['first_name'];
	$child_LN = $_POST['last_name'];
	$child_username = $_POST['username'];
	$child_password = $_POST['password'];
	$child_dob = $_POST['date_of_birth'];
	$parent_FN = $_POST['parent_FN'];
	$parent_LN = $_POST['parent_LN'];
	$parent_phone = $_POST['phone'];
	$parent_email = $_POST['email'];

	$parent_id = mysqli_fetch_array(mysqli_query($con, "select parents_id from users where users_id = '$users_id'"));

	$update_users = mysqli_query($con, "update users set first_name = '$child_FN', last_name = '$child_LN', date_of_birth = '$child_dob', username = '$child_username', password = '$child_password' where users_id = '$users_id'");

	$update_parents = mysqli_query($con, "update parents set first_name = '$parent_FN', last_name = '$parent_LN', phone_number = '$parent_phone', email = '$parent_email' where parents_id = '$parent_id[parents_id]'");
?>