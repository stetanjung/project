<?php
include("connection.php");
$num_author = 1000000;
$num_publisher = 1000000;
$num_language = 10000;
$num_genre = 10000;

$authors_id = 0;
$publishers_id = 0;
$languages_id = 0;
$genres_id = 0;

$max_author = mysqli_fetch_array(mysqli_query($con, "SELECT max(authors_id) as max_author_id from authors"), MYSQLI_ASSOC);
$max_publisher = mysqli_fetch_array(mysqli_query($con, "SELECT max(publishers_id) as max_publisher_id from publishers"), MYSQLI_ASSOC);
$max_language = mysqli_fetch_array(mysqli_query($con, "SELECT max(languages_id) as max_language_id from languages"), MYSQLI_ASSOC);
$max_genre = mysqli_fetch_array(mysqli_query($con, "SELECT max(genres_id) as max_genre_id from genres"), MYSQLI_ASSOC);

if($max_author['max_author_id'] == 0){$authors_id = substr($num_author + $max_author['max_author_id'] + 1, -6);;}
else{$authors_id = substr($num_author + $max_author['max_author_id'] + 1, -6);}

if($max_publisher['max_publisher_id'] == 0){$publishers_id = substr($num_publisher + $max_publisher['max_publisher_id'] + 1, -6);}
else{$publishers_id = substr($num_publisher + $max_publisher['max_publisher_id'] + 1, -6);}

if($max_language['max_language_id'] == 0){$languages_id = substr($num_language + $max_language['max_language_id'] + 1, -4);}
else{$languages_id = substr($num_language + $max_language['max_language_id'] + 1, -4);}

if($max_genre['max_genre_id'] == 0){$genres_id = substr($num_genre + $max_genre['max_genre_id'] + 1, -4);}
else{$genres_id = substr($num_genre + $max_genre['max_genre_id'] + 1, -4);}
?>