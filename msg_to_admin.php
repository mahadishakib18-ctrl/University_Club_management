<?php
session_start();
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send'])) {
    $a_id = $_POST['aid'];
    $notice = $_POST['notice'];
    $student_id = $_SESSION['student_id'];

    $sql = "INSERT INTO ind_notice_ad (a_id, notice, student_id) VALUES ('$a_id', '$notice', '$student_id')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "<h2>Message sent successfully!</h2>";
    } else {
        echo "<h2>Error sending message: " . mysqli_error($con) . "</h2>";
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
    <title>Send Message to Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2E8B57; /* SeaGreen background */
            color: white;
            margin: 0;
            padding: 10px;
            font-size: 14px;
        }

        h1 {
            color: #FFD700; /* Gold color for highlight */
            text-shadow: 1px 1px 2px #000; /* Shadow for highlighting */
            text-align: center;
            font-size: 18px;
            margin-bottom: 10px;
        }

        form {
            background: #fff;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            margin: 0 auto; /* Center the form horizontally */
            width: 600px;
            margin-bottom: 10px;
            color: black; /* Text color inside the form */
        }

        input[type="text"], input[type="submit"] {
            padding: 6px;
            border-radius: 3px;
            font-size: 14px;
            width: calc(100% - 14px);
            margin-bottom: 6px;
            box-sizing: border-box; /* Ensure padding and border are included in the width */
        }

        input[type="submit"] {
            background-color: #2E8B57; /* SeaGreen color */
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px 15px; /* Adjust padding for larger button */
            font-size: 16px; /* Increase font size for the Send Notice button */
        }

        input[type="submit"]:hover {
            background-color: #1E6847; /* Darker SeaGreen */
        }

        .input-group {
            margin-bottom: 6px;
        }

        .input-group label {
            display: block;
            margin-bottom: 3px;
            color: #333; /* Label text color */
            font-size: 14px;
        }

        .small-button {
            font-size: 14px; /* Decrease button font size */
            width: auto; /* Adjust width for smaller button */
        }

        .back-button-group {
            margin-top: 20px; /* Increase gap before the Back button */
            text-align: center; /* Center the button */
        }

        .back-button-group input[type="submit"] {
            background-color: #2E8B57; /* Green background color */
            color: white; /* White text color */
            font-size: 14px; /* Decrease font size for Back button */
            padding: 6px 10px; /* Decrease padding */
            border: none; /* Remove border */
            cursor: pointer;
            border-radius: 5px;
        }

        .back-button-group input[type="submit"]:hover {
            background-color: #1E6847; /* Darker green background on hover */
        }
    </style>
</head>
<body>
    <h1>Send Message to Admin</h1>
    <form name="f1" action="msg_to_admin.php" method="POST">
        <div class="input-group">
            <label for="aid"><b>Admin ID:</b></label>
            <input type="text" id="aid" name="aid" required />
        </div>
        <div class="input-group">
            <label for="notice"><b>Notice:</b></label>
            <input type="text" id="notice" name="notice" required />
        </div>
        <input type="submit" name="send" value="Send Notice" />
    </form>

    <div class="back-button-group">
        <form action="member_login.php" method="post">
            <input type="hidden" name="un" value="<?php echo htmlspecialchars($_SESSION['username']); ?>">
            <input type="hidden" name="pw" value="<?php echo htmlspecialchars($_SESSION['password']); ?>">
            <input type="hidden" name="club" value="<?php echo htmlspecialchars($_SESSION['clubname']); ?>">
            <input type="submit" value="Back" class="small-button">
        </form>
    </div>
</body>
</html>
