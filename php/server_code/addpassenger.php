<?php
$json = file_get_contents('php://input');
$forminfo = json_decode($json, true);
$firstname = $forminfo["firstname"];
$lastname = $forminfo["lastname"];
$birthday = $forminfo["birthday"];

$password_hash = password_hash($form_password, PASSWORD_DEFAULT);

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
$sql = "INSERT INTO passenger (first_name, last_name, birthday)
VALUES ('".$firstname."', '".$lastname."', FROM_UNIXTIME(".$birthday."))";


if ($conn->query($sql) === TRUE) {
        $jsonobj->status = "OK";
} else {
        $jsonobj->reason = "unable to add to table";
}

$re = json_encode($jsonobj);
echo $re;

$conn->close();
?>
