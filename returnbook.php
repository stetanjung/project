<html>
<form action="returnbookprocess.php" method="POST">
<body>
<table>
	<tr>
		<td>Title</td>
		<td>Year</td>
		<td>Author</td>
		<td>Publisher</td>
		<td>Language</td>
		<td>Genre</td>
		<td>Return?</td>
	</tr>
<?php
include("connection.php");
session_start();
$users_id="1";	//EDIT THIS LATER TO 	$_SESSION['users_id'];
$query=mysqli_query($con,"SELECT b.*,r.borrows_id,r.return_date FROM books b, borrows r WHERE b.books_id = r.books_id AND r.users_id=$users_id");

while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){
	if($row['return_date']==NULL)break;
	$author_query=mysqli_query($con,"SELECT first_name,last_name FROM authors WHERE authors_id=$row[authors_id]");
	$author=mysqli_fetch_array($author_query,MYSQLI_ASSOC);
	$author_name=$author["first_name"]." ".$author["last_name"];

	$publisher_query=mysqli_query($con,"SELECT publisher_name FROM publishers WHERE publishers_id=$row[publishers_id]");
	$publisher=mysqli_fetch_array($publisher_query,MYSQLI_ASSOC);
	$publisher_name=$publisher["publisher_name"];

	$languages_query=mysqli_query($con,"SELECT languages_name FROM languages WHERE languages_id=$row[languages_id]");
	$language=mysqli_fetch_array($languages_query,MYSQLI_ASSOC);
	$languages_name=$language["languages_name"];

	$genres_query=mysqli_query($con,"SELECT genre_name FROM genres WHERE genres_id=$row[genres_id]");
	$genre=mysqli_fetch_array($genres_query,MYSQLI_ASSOC);
	$genres_name=$genre["genre_name"];
	$books_id=$row['books_id'];
	echo "
		<tr>
			<td>$row[title]</td>
			<td>$row[year]</td>
			<td>$author_name</td>
			<td>$publisher_name</td>
			<td>$languages_name</td>
			<td>$genres_name</td>
			<td><input type='checkbox' name='return[]' value='$row[borrows_id]'></td>
		</tr>

	";
}
?>
</table><br><br>
<input type="submit" value="Return!">
<?php
include("connectionclose.php");
?>
</body>
</form>
</html>