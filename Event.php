<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2E8B57; /* SeaGreen background */
            color: white;
            padding: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #fff;
        }

        th, td {
            padding: 10px;
        }

        th {
            background-color: #1E6847; /* Darker SeaGreen */
        }

        td {
            background-color: #4CAF50; /* SeaGreen background */
            color: white;
        }

        th, td {
            color: white;
        }

        form {
            margin-top: 20px;
        }

        input[type="submit"] {
            background-color: white; /* White background */
            color: #2E8B57; /* SeaGreen text color */
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        input[type="submit"]:hover {
            background-color: #2E8B57; /* SeaGreen background on hover */
            color: white; /* White text color on hover */
        }

        h2 {
            background-color: #1E6847; /* Darker SeaGreen */
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        h2.highlight {
            background-color: #2E8B57; /* SeaGreen background */
        }
    </style>
</head>

<body>

    <?php
    include('connection.php');
    ?>

    <h2 class="highlight">Past Events</h2>
    <table>
        <tr>
            <th>Past Event Name</th>
            <th>Past Event Date</th>
        </tr>
        <?php
        $sql = "SELECT * FROM past_event";
        $result = mysqli_query($con, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['past_event_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['past_event_date']); ?></td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='2'></td></tr>";
        }
        ?>
    </table>

    <h2 class="highlight">Present Events</h2>
    <table>
        <tr>
            <th>Present Event Name</th>
            <th>Present Event Date</th>
        </tr>
        <?php
        $sql = "SELECT * FROM present_event";
        $result = mysqli_query($con, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['present_event_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['present_event_date']); ?></td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='2'>No Current Event Today </td></tr>";
        }
        ?>
    </table>

    <h2 class="highlight">Future Events</h2>
    <table>
        <tr>
            <th>Future Event Name</th>
            <th>Future Event Date</th>
        </tr>
        <?php
        $sql = "SELECT * FROM future_event";
        $result = mysqli_query($con, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['future_event_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['future_event_date']); ?></td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='2'>No upcoming events</td></tr>";
        }
        ?>
    </table>
	  <form action="club_page_for_student.php" method="post">
        <input type="submit" value="Back" class="small-button">
    </form>
	
</body>

</html>
