<?php
include("connection.php");
$return=array();
$i=0;
$today_date1=date("Y-m-d");
$today_date= new DateTime(date("Y-m-d"));
$overdue=0;
$num_overdue=0;
if(isset($_POST['return'])){
	foreach($_POST['return'] as $return[$i]){
		$query=mysqli_query($con,"SELECT borrow_date,books_id FROM borrows WHERE borrows_id=$return[$i]");
		$result=mysqli_fetch_array($query);
		$borrow_date=$result['borrow_date'];
		$borrow_date1= new DateTime($borrow_date);
		$difference=$today_date->diff($borrow_date1);
		if($difference->d<=7) $overdue=0;
		else{
		 	$overdue=1;
		 	$num_overdue++;
		}
		mysqli_query($con,"UPDATE borrows SET return_date='$today_date1', overdue='$overdue' WHERE borrows_id=$return[$i]");
		mysqli_query($con,"UPDATE books SET available='1' WHERE books_id=$result[books_id]");
	}
	echo "<h2>You have $num_overdue overdue books. You need to PAY!</h2>";
}
?>