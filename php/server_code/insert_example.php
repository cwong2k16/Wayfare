<?php
$json = file_get_contents('php://input');
$forminfo = json_decode($json, true);
$form_username = $forminfo["username"];
$form_password = $forminfo["password"];
$form_email = $forminfo["email"];

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
$sql = "INSERT INTO users (username, password, email, verkey)
VALUES ('".$form_username."', '".$password_hash."', '".$form_email."')";

if ($conn->query($sql) === TRUE) {
        $jsonobj->status = "OK";
} else {
        $jsonobj->reason = "unable to add to table";
}

$re = json_encode($jsonobj);
echo $re;

$conn->close();
?>