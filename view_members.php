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
   
    <h3>Members</h3>

    <table>
      
        <?php
        include("connection.php");
		session_start();
      $clubname=$_SESSION['clubname'];
        ?>

        <table>
       <tr>
            <th>Student ID</th>
            <th>Student Name</th>
            <th>Department Name</th>
            <th>Year</th>
            <th>Address</th>
            <th>Email</th>
            <th>Mobile No</th>
            <th>Blood Group</th>
            <th>DOB</th>
            <th>Faculty</th>
            <th>Club Name</th>
        </tr>
        
        <?php
        $sql = "SELECT Student_ID ,Student_Name ,Department_Name,Year ,Address , Email ,Mobile_no , Blood_group , DOB ,faculty , club_name from member_list where club_name='$clubname'; ";
        $result = mysqli_query($con, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['Student_ID']); ?></td>
                    <td><?php echo htmlspecialchars($row['Student_Name']); ?></td>
                    <td><?php echo htmlspecialchars($row['Department_Name']); ?></td>
                    <td><?php echo htmlspecialchars($row['Year']); ?></td>
                    <td><?php echo htmlspecialchars($row['Address']); ?></td>
                    <td><?php echo htmlspecialchars($row['Email']); ?></td>
                    <td><?php echo htmlspecialchars($row['Mobile_no']); ?></td>
                    <td><?php echo htmlspecialchars($row['Blood_group']); ?></td>
                    <td><?php echo htmlspecialchars($row['DOB']); ?></td>
                    <td><?php echo htmlspecialchars($row['faculty']); ?></td>
                    <td><?php echo htmlspecialchars($row['club_name']); ?></td>
                   
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='2'></td></tr>";
        }
        ?>
    </table>

    </table>

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