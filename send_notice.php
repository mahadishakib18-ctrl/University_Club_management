<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notice Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2E8B57; /* SeaGreen background */
            color: white;
            margin: 0;
            padding: 10px;
            font-size: 14px;
        }

        h1, h2 {
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
            padding: 8px 12px; /* Adjust padding for smaller button */
            font-size: 16px; /* Increase font size for buttons */
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
            font-size: 16px; /* Increase button font size */
            width: auto; /* Adjust width for smaller button */
        }

        .button-group {
            margin-bottom: 10px; /* Decrease gap between button groups */
        }

        .back-button-group {
            margin-top: 10px; /* Decrease gap before the Back button */
        }
    </style>
</head>
<body>
  

    <h2>Enter a New Notice</h2>
    <form action="insert_notice.php" method="post">
        <div class="input-group">
            <label for="notice"><b>Enter your notice:</b></label>
            <input type="text" id="notice" name="notice" placeholder="Notice" required />
        </div>
        <input type="submit" name="send" value="Send Notice" />
    </form>

    <h2>Manage Notices</h2>
    <form action="show_notice.php" method="post">
        <input type="submit" name="show" value="Show Previous Notices" class="small-button" />
    </form>

    <form action="individual_notice.php" method="post" class="button-group">
	
        <input type="submit" name="show" value="Send Notice to Individual" class="small-button" />
    </form>
	
	  <form action="student_to_admin.php" method="post" class="button-group">
	   <input type="hidden" name="aid" value="<?php echo htmlspecialchars($_SESSION['admin_id']); ?>">
        <input type="submit" name="show" value="Student message" class="small-button" />
    </form>

    <form action="authentication.php" method="POST" class="back-button-group">
        <input type="hidden" name="un" value="<?php echo htmlspecialchars($_SESSION['username']); ?>">
        <input type="hidden" name="pw" value="<?php echo htmlspecialchars($_SESSION['password']); ?>">
        <input type="hidden" name="club" value="<?php echo htmlspecialchars($_SESSION['clubname']); ?>">
        <input type="hidden" name="aid" value="<?php echo htmlspecialchars($_SESSION['admin_id']); ?>">
		
		
        <input type="submit" value="Back" class="small-button">
    </form>
</body>
</html>