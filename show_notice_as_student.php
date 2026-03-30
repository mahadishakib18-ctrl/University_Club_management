<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notices</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2E8B57;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: black;
            width: 80%;
            max-width: 800px;
            text-align: center;
        }
        h2 {
            color: #2E8B57;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #2E8B57;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .back-button {
            background-color: #2E8B57;
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
            width: 100%;
            text-align: center;
            display: inline-block;
            text-decoration: none;
        }
        .back-button:hover {
            background-color: #1E6847;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Notices</h2>
        <table>
            <tr>
                <th>Notice Body</th>
            </tr>
            <?php
            include("connection.php");
            session_start();
            $sql = "SELECT notice_body FROM notice;";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['notice_body']); ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <form action="member_login.php" method="POST">
            <input type="hidden" name="un" value="<?php echo htmlspecialchars($_SESSION['username']); ?>">
            <input type="hidden" name="pw" value="<?php echo htmlspecialchars($_SESSION['password']); ?>">
            <input type="hidden" name="club" value="<?php echo htmlspecialchars($_SESSION['clubname']); ?>">
            <input type="submit" value="Back" class="back-button">
        </form>
    </div>
</body>
</html>
