<?php 
$sname = "localhost";
$unmae = "root";
$password = "";

$db_conn = "hms_capstone";

$conn = mysqli_connect($sname, $unmae, $password, $db_conn);

if (!$conn) {
    echo "Failed to connect!";
};
?>