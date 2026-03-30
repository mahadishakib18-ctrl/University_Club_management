<?php
echo "<br>";
//echo "I am in connection life";
$host = "localhost";
$user = "root";
$password = "root";
$db_name = "club";

$con = mysqli_connect($host, $user, $password, $db_name);
if(mysqli_connect_errno()){
    die("Failed to connect with MYSQL: ".mysqli_connect_error());
}else{
    echo "<br>";
    //echo "Database connected";
}

?>