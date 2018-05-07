<?php
// function debug_to_console( $data ) {
//         $output = $data;
//         if ( is_array( $output ) )
//                 $output = implode( ',', $output);

//         echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
//         }
// debug_to_console("Help");
$json = file_get_contents('php://input');
$forminfo = json_decode($json, true);
$firstname = $forminfo["firstname"];
$lastname = $forminfo["lastname"];
$birthday = $forminfo["birthday"];
$fpass = $forminfo["password"];

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
$sql_attributes = "INSERT INTO passenger (first_name, last_name, birthday, password"; // need to append trailing ')' at end
$sql_values = "VALUES ('".$firstname."', '".$lastname."', FROM_UNIXTIME(".$birthday."), '".$fpass."'"; // need to append trailing ')' at end

if (array_key_exists("gender", $forminfo)) {
	$gender = $forminfo["gender"];
	if (strcmp($gender, "Male") == 0) {
		$gender = "m";
	} elseif (strcmp($gender, "Female") == 0) {
                $gender = "f";
        } else {
                $gender = "o";
        }
	$sql_attributes .= ", gender"; // append to end of sql_attributes
	$sql_values .= ", '".$gender."'";
}

if (array_key_exists("address", $forminfo)) {
	$address = $forminfo["address"];
        $sql_attributes .= ", street_address"; // append to end of sql_attributes
        $sql_values .= ", '".$address."'";
}

if (array_key_exists("city", $forminfo)) {
	$city = $forminfo["city"];
        $sql_attributes .= ", city"; // append to end of sql_attributes
        $sql_values .= ", '".$city."'";
}

if (array_key_exists("state", $forminfo)) {
	$state = $forminfo["state"];
        $sql_attributes .= ", state"; // append to end of sql_attributes
        $sql_values .= ", '".$state."'";
}

if (array_key_exists("zipcode", $forminfo)) {
	$zipcode = $forminfo["zipcode"];
        $sql_attributes .= ", zip_code"; // append to end of sql_attributes
        $sql_values .= ", '".$zipcode."'";
}

if (array_key_exists("email", $forminfo)) {
	$email = $forminfo["email"];
        $sql_attributes .= ", email"; // append to end of sql_attributes
        $sql_values .= ", '".$email."'";
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