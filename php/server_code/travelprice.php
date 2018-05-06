<?php
$json = file_get_contents('php://input');
$forminfo = json_decode($json, true);
$groupid = $forminfo["groupid"];
$transid = $forminfo["transportation_id"];
$rate = 0;

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

// sql to create table
$sql = "SELECT rate FROM car_rental WHERE id = ".$transid;

$result = $conn->query($sql);
if ($result->num_rows > 0) {
        $jsonobj->status = "OK";
        $row = $result->fetch_assoc();
	$rate = $row["rate"];
}

$sql = "SELECT fare FROM flight WHERE id = ".$transid;

$result = $conn->query($sql);
if ($result->num_rows > 0) {
        $jsonobj->status = "OK";
        $row = $result->fetch_assoc();
        $rate = $row["fare"];
}

$sql = "SELECT fare FROM cruise WHERE id = ".$transid;

$result = $conn->query($sql);
if ($result->num_rows > 0) {
        $jsonobj->status = "OK";
        $row = $result->fetch_assoc();
        $rate = $row["fare"];
}

$sql = "SELECT fare FROM bus WHERE id = ".$transid;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
        $jsonobj->status = "OK";
        $row = $result->fetch_assoc();
        $rate = $row["fare"];
}

$jsonobj->rate = $rate;

$size = 0;
$sql = "SELECT size FROM travel_group WHERE id = ".$groupid;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
        $jsonobj->status = "OK";
        $row = $result->fetch_assoc();
        $size = $row["size"];
}
$jsonobj->size = $size;
$jsonobj->total = $size*$rate;

$re = json_encode($jsonobj);
echo $re;

$conn->close();
?>
