<?php
define('DB_HOST', "localhost");
define('DB_USER', "root");
define('DB_PASS', "");
define('DB_NAME', "shiftmate");

$conn = new mysqli("localhost", "root", "", "shiftmate");
$db = mysqli_connect('localhost', 'root', '', 'shiftmate');
 
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>