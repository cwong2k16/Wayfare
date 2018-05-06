<?php
$json = file_get_contents('php://input');
$forminfo = json_decode($json, true);
$groupid = $forminfo["groupid"];
$transid = $forminfo["transportation_id"];
$start = $forminfo["start"];
$end = $forminfo["end"];

$jsonobj->status = "error";

$servername = "localhost";
$username = "root";
$password = "password";

// Change db location
$dbname = "travel";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
        $jsonobj->reason = "unable to connect to db";
}

$sql2 = "SELECT * FROM member WHERE group_id='".$groupid."'";

$result = $conn->query($sql2);
if ($result->num_rows > 0) {
        $jsonobj->status = "OK";
        while($row = $result->fetch_assoc()) {
		$confnum = rand(0, 10000);
		$passid = $row["passenger_id"];
		$sql = "INSERT INTO uses (group_id, passenger_id, transportation_id, confirmation_num, start_date, end_date) VALUES (".$groupid.", ".$passid.", ".$transid.", $confnum, FROM_UNIXTIME(".$start."), FROM_UNIXTIME(".$end."))";
		$conn->query($sql);
        }
}

// sql to create table

$re = json_encode($jsonobj);
echo $re;

$conn->close();
?>
