
<form method="POST" action="borrowbookprocess.php">
<?php
include("connection.php");
$search_book_query=mysqli_query($con,"SELECT * FROM books");
?>
<table>
	<tr>
		<td>Title</td>
		<td>Year</td>
		<td>Author</td>
		<td>Publisher</td>
		<td>Languages</td>
		<td>Genre</td>
		<td>Available?</td>
		<td>Borrow</td>
	</tr>
<?php
while($row=mysqli_fetch_array($search_book_query,MYSQLI_ASSOC)){

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
	$books_id=$row["books_id"];

	if($row['available']==0) $available="Not available";
	else $available="Available";
	echo "
		<tr>
			<td>$row[title]</td> 
			<td>$row[year]</td>
			<td>$author_name</td>
			<td>$publisher_name</td>
			<td>$languages_name</td>
			<td>$genres_name</td>
			<td>$available</td>
		";
		if($row['available']==1) echo "<td><input type='checkbox' name='borrow[]' value='$row[books_id]'></td>";
		else echo "<td><center>X</center></td>";
	echo "
		</tr>
	";
}
?>
</table><br><br>
<input type="submit" value="Borrow!">
<?php
include("connectionclose.php");
?>
</form>