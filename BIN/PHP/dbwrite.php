<?php
include 'connect.php';
// Keep this API Key value to be compatible with the ESP32 code provided in the project page. 
// If you change this value, the ESP32 sketch needs to match
$api_key_value = "tPmAT5Ab3j7F9";
//$api_key= "tPmAT5Ab3j7F9&sensor=BME280&location=Office&value1=24.75&value2=24.76&value3=24.7";
$api_key= $sensor = $location = $Bottle1 = $Bottle2 = $Bottle3 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $sensor = test_input($_POST["sensor"]);
        $location = test_input($_POST["location"]);
        $Bottle1 = test_input($_POST["Bottle1"]);
        $Bottle2 = test_input($_POST["Bottle2"]);
        $Bottle3 = test_input($_POST["Bottle3"]);
        $ReadingTime = test_input($_POST["ReadingTime"]);

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "INSERT INTO SMART_BIN_Data (sensor, location, Bottle1, Bottle2, Bottle3, ReadingTime)
        VALUES ('" . $sensor . "', '" . $location . "', '" . $Bottle1 . "', '" . $Bottle2 . "', '" . $Bottle3 . "', '" . $ReadingTime . "' )";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
    else {
        echo "Wrong API Key provided.";
    }

}
else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}