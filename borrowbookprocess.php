<html>
<body>
<?php
session_start();
include("connection.php");
$users_id='000001';
$borrow=array();
$i=0;
$today_date=date("Y-m-d");
$boolean=0;
if(isset($_POST['borrow'])){

	foreach($_POST['borrow'] as $borrow[$i]){
		$num_borrow = 1000000;
		$borrows_id = 0;
		$max_borrow = mysqli_fetch_array(mysqli_query($con, "SELECT max(borrows_id) as max_borrow_id from borrows"), MYSQLI_ASSOC);
		if($max_borrow['max_borrow_id'] == 0){$borrows_id = substr($num_borrow + $max_borrow['max_borrow_id'] + 1, -6);}
		else{$borrows_id = substr($num_borrow + $max_borrow['max_borrow_id'] + 1, -6);}
		echo "$borrow[$i]";
		mysqli_query($con,"UPDATE books SET available='0' WHERE books_id=$borrow[$i]");
		mysqli_query($con,"INSERT INTO borrows (borrows_id,users_id,books_id,borrow_date,overdue)
			VALUES ('$borrows_id','$users_id','$borrow[$i]','$today_date','$boolean')");
		$i++;
	}
	echo "<h2>You have borrowed $i books, please return after 7 days.</h2>";
}
else echo "lol";
?>
</body>
</html>