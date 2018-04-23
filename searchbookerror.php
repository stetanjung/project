<html>
<form method="POST" action="searchbookprocess.php">

Find the book by: 
<input type="radio" name="searchType" value="title" checked>Title 
<input type="radio" name="searchType" value="year">Year 
<input type="radio" name="searchType" value="authors_id">Author 
<input type="radio" name="searchType" value="publisher_id">Publisher 
<input type="radio" name="searchType" value="genres_id"> Genre <br><br>
<input type="text" name="searchResult">
<input type="submit" value="Submit!"><br><br>
<b>Please do not have empty input.</b>
</form>
</html>