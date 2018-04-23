<?php
include("connection.php");

//author
	$authors_query=mysqli_query($con,"SELECT * FROM authors");
	$exist=0;
	while($row=mysqli_fetch_array($authors_query,MYSQLI_ASSOC)){
		if(strcmp($author_firstname,$row["first_name"])==0 && strcmp($author_lastname,$row["last_name"])==0){
			$authors_id=$row["authors_id"];
			$exist=1;
			break;
		}
	}
	if($exist==0){
		mysqli_query($con,"INSERT INTO authors (authors_id,first_name,last_name) VALUES('$authors_id','$author_firstname','$author_lastname')");
	}
	//publisher
	$publishers_query=mysqli_query($con,"SELECT * FROM publishers");
	$exist=0;
	while($row=mysqli_fetch_array($publishers_query,MYSQLI_ASSOC)){
		if(strcmp($publisher_name,$row["publisher_name"])==0){
			$publishers_id=$row["publishers_id"];
			$exist=1;
			break;
		}
	}
	if($exist==0){
		mysqli_query($con,"INSERT INTO publishers (publishers_id,publisher_name) VALUES('$publishers_id','$publisher_name')");
	}

	//language
	$languages_query=mysqli_query($con,"SELECT * FROM languages");
	$exist=0;
	while($row=mysqli_fetch_array($languages_query,MYSQLI_ASSOC)){
		if(strcmp($languages_name,$row["languages_name"])==0){
			$languages_id=$row["languages_id"];
			$exist=1;
			break;
		}
	}
	if($exist==0){
		mysqli_query($con,"INSERT INTO languages (languages_id,languages_name) VALUES('$languages_id','$languages_name')");
	}

	//genre
	$genres_query=mysqli_query($con,"SELECT * FROM genres");
	$exist=0;
	while($row=mysqli_fetch_array($genres_query,MYSQLI_ASSOC)){
		if(strcmp($genre_name,$row["genre_name"])==0){
			$genres_id=$row["genres_id"];
			$exist=1;
			break;
		}
	}
	if($exist==0){
		mysqli_query($con,"INSERT INTO genres (genres_id,genre_name) VALUES('$genres_id','$genre_name')");
	}
?>