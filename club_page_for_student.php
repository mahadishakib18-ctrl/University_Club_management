<?php
session_start();
$clubname = isset($_POST['club']) ? $_POST['club'] : 'Unknown club';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club Portal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2E8B57; /* SeaGreen background */
            color: white;
            margin: 0;
            padding: 10px;
            font-size: 14px;
            text-align: center;
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
            width: 300px; /* Decrease width */
            margin-bottom: 10px;
            color: black; /* Text color inside the form */
        }

        input[type="text"], input[type="password"], input[type="submit"] {
            padding: 8px; /* Reduce padding */
            border-radius: 3px;
            font-size: 14px;
            width: calc(100% - 16px); /* Adjust width to fit */
            margin-bottom: 10px;
            box-sizing: border-box; /* Ensure padding and border are included in the width */
        }

        input[type="submit"] {
            background-color: #2E8B57; /* SeaGreen color */
            color: white;
            border: none;
            cursor: pointer;
            padding: 8px 10px; /* Adjust padding for larger button */
            font-size: 14px; /* Adjust font size */
        }

        input[type="submit"]:hover {
            background-color: #1E6847; /* Darker SeaGreen */
        }

        .button-group {
            margin-top: 10px; /* Increase gap before the buttons */
        }

        .button-group input[type="submit"] {
            font-size: 14px;
            width: 100%;
        }

        .small-button {
            background-color: #2E8B57; /* Green background color */
            color: white; /* White text color */
            font-size: 14px; /* Font size */
            padding: 6px 10px; /* Padding */
            border: none; /* Remove border */
            cursor: pointer;
            border-radius: 5px;
            width: 100%;
        }

        .small-button:hover {
            background-color: #1E6847; /* Darker green background on hover */
        }
    </style>
</head>
<body>
    <h2>Welcome To The Club</h2>

    <form name="f3" action="Achievement.php" method="POST" class="button-group">
        <input type="submit" id="btn" value="Achievement">
    </form>

    <form name="f3" action="Event.php" method="POST" class="button-group">
     <input type="submit" id="btn" value="Events">
    </form>

    <form name="f3" action="recruitment.php" method="POST"  class="button-group">
        <input type="hidden" name="clubname" value="<?php echo htmlspecialchars($clubname); ?>">
        <input type="submit" id="btn" value="Recruitment">
    </form>

    <form action="index.php" method="post" class="button-group">
        <input type="submit" class="small-button" value="Back to Index">
    </form>
</body>
</html>
