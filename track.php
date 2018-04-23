<?php
date_default_timezone_set('Asia/Hong_Kong');

$todayc = date('Y-m-d');

$ip = getenv("REMOTE_ADDR");
include("connection.php");
$result = mysqli_query($con, "SELECT date, ip FROM counter");
$true=0;
while($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	if($rows['date'] == $todayc && $rows['ip'] == $ip) {
		$true=1;
		break;
	}
}
if($true==0) {
		$query = "INSERT INTO counter (date, ip) VALUES('$todayc', '$ip')";
		mysqli_query($con, $query);
}

?>