<?php
session_start();
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send'])) {
    $s_id = $_POST['sid'];
    $s_dept = $_POST['dep'];
    $s_notice = $_POST['notice'];
    $admin_id = $_SESSION['admin_id'];

	
    $sql = "INSERT INTO ind_notice (s_id, s_dept, notice, Admin_Id) VALUES ('$s_id', '$s_dept', '$s_notice', '$admin_id')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "<h2>Notice sent successfully!</h2>";
    } else {
        echo "<h2>Error sending notice: " . mysqli_error($con) . "</h2>";
    }

    // Redirect to the same page to prevent form resubmission
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Notice to Individual Student</title>
    
</head>
<body>
    <h1>Send Message to Individual Student</h1>
    <form name="f1" action="individual_notice.php" method="POST">
        <div class="input-group">
            <label for="user"><b>Student ID:</b></label>
            <input type="text" id="user" name="sid" required />
        </div>
        <div class="input-group">
            <label for="dept"><b>Department:</b></label>
            <input type="text" id="dept" name="dep" required />
        </div>
        <div class="input-group">
            <label for="notice"><b>Enter your notice:</b></label>
            <input type="text" id="notice" name="notice" placeholder="Notice" required />
        </div>
        <input type="submit" name="send" value="Send Notice" />
    </form>

    <div class="back-button-group">
        <form action="send_notice.php" method="post">
            <input type="submit" value="Back" class="small-button">
        </form>
    </div>
</body>
</html>