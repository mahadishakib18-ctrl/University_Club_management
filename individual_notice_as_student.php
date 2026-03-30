<?php

        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Individual Notices</title>
            <style>
                body {
                    font-family: 'Arial', sans-serif;
                    background-color: #2E8B57;
                    color: #333;
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
                    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
                    color: black;
                    width: 80%;
                    max-width: 800px;
                    text-align: center;
                }
                h1 {
                    color: #2E8B57;
                    text-align: center;
                    margin-bottom: 20px;
                }
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 20px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }
                th, td {
                    border: 1px solid #ddd;
                    padding: 12px;
                    text-align: left;
                }
                th {
                    background-color: #2E8B57;
                    color: white;
                    text-transform: uppercase;
                }
                tr:nth-child(even) {
                    background-color: #f9f9f9;
                }
                tr:hover {
                    background-color: #f1f1f1;
                }
                td {
                    font-size: 16px;
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
                /* Add responsive design */
                @media (max-width: 600px) {
                    .container {
                        width: 100%;
                        padding: 10px;
                    }
                    th, td {
                        padding: 8px;
                    }
                }
            </style>
        </head>
        <body>
            <div class="container">
                <h1>Individual Notices</h1>
                <table>
                    <tr>
                        <th>Notice</th>
                        <th>Admin ID</th>
						
                    </tr>
                    <?php
					
					include("connection.php");
session_start();
$Student_ID = $_POST['student_id'];

// Correct the SQL query
$sql = "SELECT notice, Admin_Id 
        FROM ind_notice 
        WHERE s_id = '$Student_ID' order by Admin_Id";

$result = mysqli_query($con, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
                    // Fetch and display the notices
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['notice']); ?></td>
                            <td><?php echo htmlspecialchars($row['Admin_Id']); ?></td>
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
        <?php
    } else {
        echo "No notices found for the student.";
    }
} else {
    // Display error message if the query fails
    echo "Error executing query: " . mysqli_error($con);
}
?>
