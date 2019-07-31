<?php
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "mustafa123";
$dbname = "school";
$dbconnection = new mysqli($dbservername,$dbusername,$dbpassword,$dbname);
if ($dbconnection->connect_error)
{
    echo "MySQL connection is not succesful " . $dbconnection->connect_error;
}
?>