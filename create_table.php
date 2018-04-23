<?php
	include "connection.php";
	
	$user = "create table users(users_id char(6) not null,	username varchar(30) not null,	password varchar(30) not null,	first_name varchar(30) not null,	last_name varchar(30) not null, date_of_birth date not null,	parents_id char(5), last_login date,	primary key (users_id),	foreign key (parents_id) references parents(parents_id))";
	
	$parent = "create table parents(parents_id char(5) not null,	first_name varchar(30) not null,	last_name varchar(30) not null,	phone_number varchar(30) not null,	email varchar(30),	primary key (parents_id))";
	
	$book = "create table books(books_id char(13) not null,available boolean not null default 1,	title varchar(30) not null,	year int not null,	authors_id char(6),	publishers_id char(6),	languages_id char(4),	genres_id char(4),	primary key(books_id), foreign key (authors_id) references authors(authors_id),	foreign key (publishers_id) references publishers(publishers_id),	foreign key (languages_id) references languages(languages_id),	foreign key (genres_id) references genres(genres_id))";
	
	$author = "create table authors(	authors_id char(6) not null,	first_name varchar(30) not null,	last_name varchar(30) not null,	primary key(authors_id))";
	
	$publisher = "create table publishers(	publishers_id char(6) not null,	publisher_name varchar(30) not null,	primary key(publishers_id))";
	
	$language = "create table languages(	languages_id char(4) not null,languages_name varchar(30) not null,	primary key(languages_id))";
	
	$genre = "create table genres(	genres_id char(4) not null,	genre_name varchar(20) not null,	primary key(genres_id))";
	
	$borrow = "create table borrows(	borrows_id char(6) not null,	users_id char(6),	books_id char(13),	borrow_date date,	return_date date, borrow_number_days int,	overdue char(5),	primary key(borrows_id),foreign key (users_id) references users(users_id), foreign key (books_id) references books(books_id))";
	
	$counter = "create table counter(  id int auto_increment,  date DATE NOT NULL,  ip varchar(16) NOT NULL,  primary key (id))";

	if(mysqli_query($con, $parent) === true && mysqli_query($con, $user) === true && mysqli_query($con, $author) === true && mysqli_query($con, $publisher) === true &&mysqli_query($con, $language) === true && mysqli_query($con, $genre) === true && mysqli_query($con, $book) === true && mysqli_query($con, $borrow) === true && mysqli_query($con, $counter)) {
		echo "Database created successfully";
	}

	else{
		echo "Error creating database: ".$con->error;
	}
	$users_id = "000000";
	$username = "admin";
	$password = md5("root");
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
?>