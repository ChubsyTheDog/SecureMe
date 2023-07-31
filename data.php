<?php
header("Content-Type: application/json", true);

$ip_address = isset($_GET['ip_address']) ? $_GET['ip_address'] : $_POST['ip_address'];
$os = isset($_GET['os']) ? $_GET['os'] : $_POST['os'];
$browser = isset($_GET['browser']) ? $_GET['browser'] : $_POST['browser'];
$mobile = isset($_GET['mobile']) ? $_GET['mobile'] : $_POST['mobile'];
$screen_width = isset($_GET['screen_width']) ? $_GET['screen_width'] : $_POST['screen_width'];
$screen_height = isset($_GET['screen_height']) ? $_GET['screen_height'] : $_POST['screen_height'];
$full_user_agent = isset($_GET['full_user_agent']) ? $_GET['full_user_agent'] : $_POST['full_user_agent'];

	$host = "localhost";
	$dbUsername = "id21095402_securemetoday";
	$dbPassword = "u12WHk>#h%VUQ!JS";
	$dbName = "id21095402_data";
	
	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
	
	if (mysqli_connect_error()) {
		die('Connection error('. mysqli_connect_errno(). ')'. mysqli_connect_error());
	}else{
        $Insert = "INSERT INTO data(ip_address, os, browser, mobile, screen_width, screen_height, full_user_agent) values(?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("ssssiis",$ip_address, $os, $browser, $mobile, $screen_width, $screen_height, $full_user_agent);
                if ($stmt->execute()) {
                    echo "New record inserted sucessfully.";
                }
                else {
                    echo $stmt->error;
                }

            $stmt->close();
            $conn->close();
	}
?>