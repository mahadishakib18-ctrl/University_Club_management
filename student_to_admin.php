<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Message from student</title>
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
                <th>Student ID </th>
                <th>Notice</th>
               
               
            </tr>

            <?php
            include("connection.php");
		 $admin_id=$_SESSION['admin_id'];
            // Fetch achievements from the database
            $sql = "SELECT student_id,notice FROM ind_notice_ad WHERE a_id='$admin_id';";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                ?>
                <tr>
                     <td><?php echo $row['notice'] ?></td>
                    <td><?php echo $row['student_id'] ?></td>
     

            <?php }
            ?>
        </table>
    </div>
		 <form action="send_notice.php" method="post">
		 <input type="hidden" name="un" value="<?php echo htmlspecialchars($username); ?>">
							   <input type="hidden" name="pw" value="<?php echo htmlspecialchars($password); ?>">
							    <input type="hidden" name="club" value="<?php echo htmlspecialchars($clubname); ?>">
        <input type="submit" value="Back" class="small-button">
    </form>
</body>
</html>