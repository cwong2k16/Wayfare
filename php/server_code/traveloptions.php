<?php
$json = file_get_contents('php://input');
$forminfo = json_decode($json, true);

$jsonobj->status = "error";

$servername = "localhost";
$username = "root";
$password = "password";

//error_log(print_r($forminfo, true));
//error_log(print_r($_GET, true));

// Change db location
$dbname = "travel";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
        //$jsonobj->status = "ERROR";
        //die("Connection failed: " . $conn->connect_error);
	$jsonobj->reason = "cannot connect to db";
}

// sql to create table
$sql = "SELECT * FROM transport_loc INNER JOIN cruise ON 
transportation_id=id AND source_id =".$forminfo["source"]." AND dest_id =".$forminfo["dest"]." INNER JOIN transportation ON transportation_id = transportation.id 
INNER JOIN company ON company.id = company_id
LEFT JOIN company_review ON company_review.company_id = company.id";

$items = array();
$result = $conn->query($sql);
if ($result->num_rows > 0) {
        $jsonobj->status = "OK";
        while($row = $result->fetch_assoc()) {
	      $itemobj->type = "cruise";
              $itemobj->id = $row["transportation_id"];
              $itemobj->num = $row["cruise_num"];
              $itemobj->clas = $row["class"];
              $itemobj->fare = $row["fare"];
              $itemobj->companyid = $row["company_id"];
              $itemobj->companyname = $row["name"];
	      $itemobj->review_content = $row["content"];
	      $itemobj->rating = $row["rating"];
              $items[] = clone($itemobj);
        }
}

$sql = "SELECT * FROM transport_loc INNER JOIN bus ON
transportation_id=id AND source_id =".$forminfo["source"]." AND dest_id =".$forminfo["dest"]." INNER JOIN transportation ON transportation_id = transportation.id
INNER JOIN company ON company.id = company_id
LEFT JOIN company_review ON company_review.company_id = company.id";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
        $jsonobj->status = "OK";
        while($row = $result->fetch_assoc()) {
              $itemobj->type = "bus";
              $itemobj->id = $row["transportation_id"];
              $itemobj->num = $row["bus_num"];
              $itemobj->clas = $row["class"];
              $itemobj->fare = $row["fare"];
              $itemobj->companyid = $row["company_id"];
              $itemobj->companyname = $row["name"];
              $itemobj->review_content = $row["content"];
              $itemobj->rating = $row["rating"];
              $items[] = clone($itemobj);
        }
}

$sql = "SELECT * FROM transport_loc INNER JOIN flight ON
transportation_id=id AND source_id =".$forminfo["source"]." AND dest_id =".$forminfo["dest"]." INNER JOIN transportation ON transportation_id = transportation.id
INNER JOIN company ON company.id = company_id
LEFT JOIN company_review ON company_review.company_id = company.id";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
        $jsonobj->status = "OK";
        while($row = $result->fetch_assoc()) {
              $itemobj->type = "flight";
              $itemobj->id = $row["transportation_id"];
              $itemobj->num = $row["flight_num"];
              $itemobj->clas = $row["class"];
              $itemobj->fare = $row["fare"];
              $itemobj->companyid = $row["company_id"];
              $itemobj->companyname = $row["name"];
              $itemobj->review_content = $row["content"];
              $itemobj->rating = $row["rating"];
              $items[] = clone($itemobj);
        }
}

$jsonobj->items = $items;

$re = json_encode($jsonobj);
echo $re;

$conn->close();
?>
