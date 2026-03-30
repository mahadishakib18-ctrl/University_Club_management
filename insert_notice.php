<?php
include ('connection.php');

$notice_body = $_POST['notice'];
$sql = "INSERT INTO notice (notice_body) VALUES ('$notice_body')";
$result = mysqli_query($con, $sql);

if (!$result) {
    echo "error occurred";
    echo mysqli_error($con);
} else {
    echo "<h1>Notice sent. Redirecting back to the notice page...</h1>";
    // Meta tag to refresh the page after 2 seconds
    echo "<meta http-equiv='refresh' content='1;url=send_notice.php'>";
}
?>
