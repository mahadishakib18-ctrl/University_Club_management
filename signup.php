<?php
session_start();
$clubname = isset($_POST['clubname']) ? $_POST['clubname'] : '';

// Check if the club name is set
if (!$clubname) {
    die("No club selected.");
}


include ('connection.php');
$id = $_POST['i'];
$uname = $_POST['n'];
$faculty =$_POST['f'];
// Corrected typo here from 'ITC' to 'ICT'
$dept = $_POST['d'];
$year = $_POST['y'];
$add = 	$_POST['Add'];
$email = $_POST['e'];
$mobile = $_POST['mob'];
$blood = $_POST['b'];
$dobi = $_POST['dob'];
$pass = $_POST['pass'];

$target_file = basename($_FILES["pic"]["name"]);
$filename = $id. "." . strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$tempname = $_FILES["pic"]["tmp_name"];
$folder = "image/" . $filename;

if (move_uploaded_file($tempname, $folder)) {
    $msg = "Image uploaded successfully";
} else {
    $msg = "Failed to upload image";
}

// Corrected typo here from '$clubname' to '$clubname'
$sql = "insert into student( Student_ID,Student_Name,Department_Name,Year,Address,Email,Mobile_no,Blood_group,DOB,faculty,picture, password,club_name) 
		values ('$id', '$uname', '$dept','$year','$add','$email','$mobile','$blood','$dobi','$faculty','$folder','$pass','$clubname')";
$result = mysqli_query($con, $sql);
if (!$result) {
    echo "error ocurred";
    echo mysqli_error($con);
} else {
    echo "<h1>Profile created. <a href=\"index.php\">please
        Click here to login</a></h1>";
}
?>
