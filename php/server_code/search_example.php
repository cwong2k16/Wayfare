<?php
$json = file_get_contents('php://input');
$forminfo = json_decode($json, true);

$jsonobj->status = "error";

$form_timestamp = time();
$form_limit = 25;
if (isset($forminfo["timestamp"])) {
        $form_timestamp = $forminfo["timestamp"];
}
if (isset($forminfo["limit"])) {
        $form_limit = $forminfo["limit"];
        if ($form_limit > 100) {
                $form_limit = 100;
        }
}

$servername = "localhost";
$username = "root";
$password = "password";

// Change db location
$dbname = "twitter";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
        //$jsonobj->status = "ERROR";
        //die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "SELECT * FROM items INNER JOIN followers ON userid=username AND followerid ='".$_COOKIE["user"]."' AND timestamp < from_unixtime(".$form_timestamp.")";
if (isset($forminfo["following"])) {
        if ($forminfo["following"]+0 == 0) {
                $sql = "SELECT * FROM items WHERE timestamp < from_unixtime(".$form_timestamp.")";
        }
}

if (isset ($forminfo["username"])) {
        $sql .= " AND username = '".$forminfo["username"]."'";
}
$result = $conn->query($sql);
if ($result->num_rows > 0) {
        $jsonobj->status = "OK";
        $items = array();
        while($row = $result->fetch_assoc()) {
                if (isset($forminfo["q"])) {
                        $query = $forminfo["q"];
                        $query = "/".$query."/";
                        //echo $forminfo["content"];
                        if (preg_match($query, $row["content"]) && $form_limit > 0) {
                                //error_log(print_r($row,true));
                                $itemobj->id = $row["id"];
                                $itemobj->username = $row["username"];
                                $itemobj->retweeted = $row["retweeted"];
                                $itemobj->content = $row["content"];
                                $itemobj->timestamp = strtotime($row["timestamp"]);

                                $propertyobj->likes = $row["likes"];
                                $itemobj->property = $propertyobj;

                                $items[] = clone($itemobj);
                                $form_limit--;
                                //error_log(print_r($itemobj,true));
                        }
                } else {
                        if ($form_limit > 0) {
                        $itemobj->id = $row["id"];
                        $itemobj->username = $row["username"];
                        $itemobj->retweeted = $row["retweeted"];
                        $itemobj->content = $row["content"];
                        $itemobj->timestamp = strtotime($row["timestamp"]);

                        $propertyobj->likes = $row["likes"];
                        $itemobj->property = $propertyobj;

                        $items[] = clone($itemobj);
                        $form_limit--;
                        }
                }
        }
        $jsonobj->items = $items;
} else {
        $jsonobj->error = "nothing found";
        //echo "Error creating table: " . $conn->error;
}
$re = json_encode($jsonobj);
echo $re;

$conn->close();
?>
