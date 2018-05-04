<?php
$json = file_get_contents('php://input');
$forminfo = json_decode($json, true);
$type = $forminfo["type"];

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


if (strcmp("bus",$type) == 0) {
	// sql to create table
	$sql_attributes = "INSERT INTO bus (id, bus_num, class, fare) VALUES ('".$firstname."', '".$lastname."', FROM_UNIXTIME(".$birthday.")"; // need to append trailing ')' at end
}

$sql = $sql_attributes . ") " . $sql_values . ")";
echo $sql;
if ($conn->query($sql) === TRUE) {
        $jsonobj->status = "OK";
} else {
        $jsonobj->reason = "error with sql. unable to add to table";
}

$re = json_encode($jsonobj);
echo $re;

$conn->close();
?>

