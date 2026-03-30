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
        .back-button {
            background-color: #FFD700; /* Gold color */
            color: #2E8B57; /* SeaGreen text color */
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 14px;
            border-radius: 5px;
            margin-top: 20px; /* Adjust margin */
        }

        .back-button:hover {
            background-color: #FFDF00; /* Lighter Gold color on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Manage Request</h1>
        <table>
            <tr>
                <th> Student_ID</th>
                <th>student_name</th>
                <th>department_name</th>
                <th>club_name </th>
                <th>Action</th>
            
            </tr>

            <?php
            include("connection.php");
			session_start();
            // Handle delete action
            if (isset($_POST['delete'])) {
                $Student_ID = $_POST['Student_ID'];

                $delete_sql = "DELETE FROM student WHERE Student_ID='$Student_ID'";
                mysqli_query($con, $delete_sql);
            }
            
             if (isset($_POST['approve'])) {
                $Student_ID = $_POST['Student_ID'];

                $approve_sql = "update student set status='yes' WHERE Student_ID='$Student_ID'";
                mysqli_query($con, $approve_sql);
            }

            
            $sql = "SELECT * FROM request";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                ?>
                <tr>
                    <td><?php echo $row['Student_ID'] ?></td>
                    <td><?php echo $row['student_name'] ?></td>
                    <td><?php echo $row['department_name'] ?></td>
                    <td><?php echo $row['club_name'] ?></td>
                    <td>
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="Student_ID" value="<?php echo $row['Student_ID'] ?>">
                            <button type="submit" name="delete">Delete</button>
                            <button type="submit" name="approve">Approve</button>
                        </form>
                    </td>
                </tr>
            <?php }
            ?>
        </table>
		
    </div>
	    <form action="authentication.php" method="POST">
        <input type="hidden" name="un" value="<?php echo htmlspecialchars($_SESSION['username']); ?>">
        <input type="hidden" name="pw" value="<?php echo htmlspecialchars($_SESSION['password']); ?>">
        <input type="hidden" name="club" value="<?php echo htmlspecialchars($_SESSION['clubname']); ?>">
        <input type="hidden" name="aid" value="<?php echo htmlspecialchars($_SESSION['admin_id']); ?>">
        <input type="submit" value="Back">
    </form>
</body>
</html>
