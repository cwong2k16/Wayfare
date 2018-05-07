<?php
$json = file_get_contents('php://input');
$forminfo = json_decode($json, true);

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
        //$jsonobj->status = "ERROR";
        //die("Connection failed: " . $conn->connect_error);
}

$location = $forminfo["location"];

// sql to create table
$sql = "SELECT * FROM accomodation INNER JOIN facility ON accomodation.id = facility.id WHERE location=".$location;

$items = array();
$result = $conn->query($sql);
if ($result->num_rows > 0) {
        $jsonobj->status = "OK";
        while($row = $result->fetch_assoc()) {
	      $itemobj->type = $row["type"];
              $itemobj->id = $row["id"];
              $itemobj->discount = $row["discount"];
              $itemobj->rate = $row["rate"];
              $itemobj->service = $row["service"];
	      $itemobj->finalprice = $row["rate"] * (100 - $row["discount"]) / 100.00;
              $items[] = clone($itemobj);
        }
}

$jsonobj->items = $items;

$re = json_encode($jsonobj);
echo $re;

$conn->close();
?>
