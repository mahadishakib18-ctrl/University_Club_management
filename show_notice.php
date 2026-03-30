<?php
session_start();
include("connection.php");

if (isset($_POST['delete'])) {
    $notice_id = $_POST['notice_id'];
    $delete_sql = "DELETE FROM notice WHERE notice_id='$notice_id'";
    mysqli_query($con, $delete_sql);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Notices</title>
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

        table {
            width: 100%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: white;
            color: black;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #2E8B57;
            color: white;
        }

        button {
            background-color: #2E8B57; /* SeaGreen color */
            color: white;
            border: none;
            cursor: pointer;
            padding: 8px 12px; /* Adjust padding */
            font-size: 14px; /* Adjust font size */
            border-radius: 3px;
        }

        button:hover {
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
            margin-top: 20px; /* Increase gap before the Back button */
            text-align: center; /* Center the button */
        }

        .back-button-group input[type="submit"] {
            background-color: white; /* White background color */
            color: #2E8B57; /* SeaGreen text color */
            font-size: 18px; /* Increase font size for Back button */
            padding: 10px 15px; /* Adjust padding */
            border: 2px solid #2E8B57; /* SeaGreen border */
            cursor: pointer;
            border-radius: 5px;
        }

        .back-button-group input[type="submit"]:hover {
            background-color: #f0f0f0; /* Light grey background on hover */
        }
    </style>
</head>
<body>
    <h1>Manage Notices</h1>
    <table>
        <tr>
            <th>Notice ID</th>
            <th>Notice Body</th>
            <th>Action</th>
        </tr>

        <?php
        $sql = "SELECT * FROM notice;";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            ?>
            <tr>
                <td><?php echo $row['notice_id'] ?></td>
                <td><?php echo $row['notice_body'] ?></td>
                <td>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="notice_id" value="<?php echo $row['notice_id'] ?>">
                        <button type="submit" name="delete">Delete</button>
                    </form>
                </td>
            </tr>
        <?php }
        echo "Table printing done";
        ?>
    </table>

    <div class="back-button-group">
        <form action="send_notice.php" method="post">
            <input type="submit" value="Back" class="small-button">
        </form>
    </div>
</body>
</html>