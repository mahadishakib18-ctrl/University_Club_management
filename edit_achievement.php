<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Achievement</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2E8B57; /* SeaGreen background */
            color: white;
            margin: 0;
            padding: 10px;
            font-size: 14px;
        }

        h1, h2, h3 {
            color: #FFD700; /* Gold color for highlight */
            text-shadow: 1px 1px 2px #000; /* Shadow for highlighting */
            text-align: center;
        }

        h1 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        h2, h3 {
            font-size: 16px;
            margin: 20px 0 10px; /* Space above and below the heading */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px; /* Increased margin-bottom for space */
        }

        th, td {
            border: 1px solid white;
            padding: 6px;
            text-align: left;
            font-size: 14px;
        }

        th {
            background-color: #3CB371; /* MediumSeaGreen header background */
        }

        tr:nth-child(even) {
            background-color: #1E824C; /* Darker MediumSeaGreen for even rows */
        }

        tr:nth-child(odd) {
            background-color: #4CAF50; /* MediumSeaGreen for odd rows */
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
    </style>
</head>
<body>
   
    <h3>AVAILABLE ACHIEVEMENTS</h3>

    <table>
        <tr>
            <th>Achievement Name</th>
            <th>Competition Name</th>
            <th>Winner Name</th>
            <th>Winning Year</th>
            <th>Action</th>
        </tr>
        <?php
        include("connection.php");
		session_start();
        // Handle delete action
        if (isset($_POST['delete'])) {
            $achievement_id = $_POST['achievement_id'];
            $delete_sql = "DELETE FROM achievement WHERE achievement_ID='$achievement_id'";
            mysqli_query($con, $delete_sql);
        }

        // Handle add achievement action
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_achievement'])) {
            $achi_name = $_POST['en'];
            $com_name = $_POST['cn'];
            $win_name = $_POST['wn'];
            $win_year = $_POST['wy'];

            $sql = "INSERT INTO achievement (achievement_name, competition_name, winner_name, winning_year) VALUES ('$achi_name', '$com_name', '$win_name', '$win_year')"; 
            mysqli_query($con, $sql);

            // Redirect to the same page to show the updated table
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }

        // Fetch and display achievements
        $sql = "SELECT * FROM achievement;";
        $result = mysqli_query($con, $sql);
        $row_num = 0; // Initialize row number
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $row_num++;
            $row_color = ($row_num % 2 == 0) ? '#1E824C' : '#4CAF50'; // Determine row color
            echo "<tr style='background-color: {$row_color};'>";
            echo "<td>{$row['achievement_name']}</td>";
            echo "<td>{$row['competition_name']}</td>";
            echo "<td>{$row['winner_name']}</td>";
            echo "<td>{$row['winning_year']}</td>";
            echo "<td>
                    <form method='post' style='display:inline;'>
                        <input type='hidden' name='achievement_id' value='{$row['achievement_id']}'>
                        <button type='submit' name='delete' style='background-color: {$row_color}; color: white; border: none; padding: 6px; cursor: pointer;'>Delete</button>
                    </form>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>

    <h2>ADD NEW ACHIEVEMENT</h2>
    <form name="f1" action="edit_achievement.php" method="POST">
        <div class="input-group">
            <label for="en">New Achievement Name:</label>
            <input type="text" id="en" name="en" required />
        </div>
        <div class="input-group">
            <label for="cn">Competition Name:</label>
            <input type="text" id="cn" name="cn" required />
        </div>
        <div class="input-group">
            <label for="wn">Winner Name:</label>
            <input type="text" id="wn" name="wn" required />
        </div>
        <div class="input-group">
            <label for="wy">Winning Year:</label>
            <input type="text" id="wy" name="wy" required />
        </div>
        <input type="hidden" name="add_achievement" value="1">
        <input type="submit" id="event_btn" value="Add Achievement">
    </form>

    <form action="authentication.php" method="POST">
        <!-- Hidden fields for session data -->
        <input type="hidden" name="un" value="<?php echo htmlspecialchars($_SESSION['username']); ?>">
        <input type="hidden" name="pw" value="<?php echo htmlspecialchars($_SESSION['password']); ?>">
        <input type="hidden" name="club" value="<?php echo htmlspecialchars($_SESSION['clubname']); ?>">
        <input type="hidden" name="aid" value="<?php echo htmlspecialchars($_SESSION['admin_id']); ?>">
		
        <input type="submit" value="Back">
    </form>
</body>
</html>