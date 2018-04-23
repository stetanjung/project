<?php
//search book
if(empty($_POST['submit'])){
?>
	Find the book by: 


                  <form class="clear" method="POST" action="staff-page-editbooks-edit.php">
                    <fieldset>
                    		<input type="radio" name="searchType" value="title" checked>Title 
							<input type="radio" name="searchType" value="year">Year 
							<input type="radio" name="searchType" value="authors_id">Author 
							<input type="radio" name="searchType" value="publishers_id">Publisher 
							<input type="radio" name="searchType" value="genres_id"> Genre <br><br>
                      <legend>Search:</legend>
                      <input type="text" value="" name="searchResult" placeholder="Look for Books">
                      <button class="fa fa-search" type="submit" title="Search"><em>Search</em></button>
                    </fieldset>
                  </form>
    <form method="POST" action="staff-page-editbooks.php">
	<input type="submit" value="Edit" name="edit"> or <input type="submit" value="Delete" name="delete">
	<br><br><br>
	</form>



	<?php
	if(!empty($_POST["edit"])) include("editbooktable.php"); 
	if(!empty($_POST["delete"])) include("deletebooktable.php");
	?>
<?php
}
?>