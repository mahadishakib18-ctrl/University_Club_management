<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Notice Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2e8b57;
            color: white;
            text-align: center;
        }
        .container {
            margin: 0 auto;
            width: 80%;
            padding: 20px;
        }
        h1 {
            color: yellow;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            background-color: white;
            color: black;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Achievements</h1>
        <table>
            <tr>
                <th>Achievement Name</th>
                <th>Competition Name</th>
                <th>Winner Name</th>
                <th>Winning Year</th>
               
            </tr>

            <?php
            include("connection.php");
		    $username = $_POST['un'];
    $password = $_POST['pw'];
    $clubname = $_POST['club'];
            // Fetch achievements from the database
            $sql = "SELECT * FROM achievement";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                ?>
                <tr>
                    <td><?php echo $row['achievement_name'] ?></td>
                    <td><?php echo $row['competition_name'] ?></td>
                    <td><?php echo $row['winner_name'] ?></td>
                    <td><?php echo $row['winning_year'] ?></td>

            <?php }
            ?>
        </table>
    </div>
		 <form action="member_login.php" method="post">
		 <input type="hidden" name="un" value="<?php echo htmlspecialchars($username); ?>">
							   <input type="hidden" name="pw" value="<?php echo htmlspecialchars($password); ?>">
							    <input type="hidden" name="club" value="<?php echo htmlspecialchars($clubname); ?>">
        <input type="submit" value="Back" class="small-button">
    </form>
</body>
</html>