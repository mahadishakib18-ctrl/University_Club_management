<?php
session_start();
include("connection.php");

// Get current date
$current_date = date('Y-m-d');

// Move future events to present events
$move_to_present_sql = "INSERT INTO present_event (present_event_name, present_event_date)
                        SELECT future_event_name, future_event_date 
                        FROM future_event 
                        WHERE future_event_date = '$current_date'";
mysqli_query($con, $move_to_present_sql);
$delete_moved_future_sql = "DELETE FROM future_event WHERE future_event_date = '$current_date'";
mysqli_query($con, $delete_moved_future_sql);

// Move present events to past events
$move_to_past_sql = "INSERT INTO past_event (past_event_name, past_event_date)
                     SELECT present_event_name, present_event_date 
                     FROM present_event 
                     WHERE present_event_date < '$current_date'";
mysqli_query($con, $move_to_past_sql);
$delete_moved_present_sql = "DELETE FROM present_event WHERE present_event_date < '$current_date'";
mysqli_query($con, $delete_moved_present_sql);

// Handle delete actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete_present'])) {
        $present_event_id = $_POST['present_event_id'];
        $delete_sql = "DELETE FROM present_event WHERE present_event_id='$present_event_id'";
        mysqli_query($con, $delete_sql);
    } elseif (isset($_POST['delete_past'])) {
        $past_event_id = $_POST['past_event_id'];
        $delete_sql = "DELETE FROM past_event WHERE past_event_id='$past_event_id'";
        mysqli_query($con, $delete_sql);
    } elseif (isset($_POST['delete_future'])) {
        $future_event_id = $_POST['future_event_id'];
        $delete_sql = "DELETE FROM future_event WHERE future_event_id='$future_event_id'";
        mysqli_query($con, $delete_sql);
    } elseif (isset($_POST['add_future'])) {
        $f_name = $_POST['en'];
        $f_date = $_POST['ed'];
        $sql = "INSERT INTO future_event (future_event_name, future_event_date) 
                VALUES ('$f_name', '$f_date')";
        mysqli_query($con, $sql);

        // Redirect to the same page to show the updated table
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Events</title>
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
        }

        h1 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        h2 {
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
            margin-bottom: 20px; /* Increased margin-bottom for space */
        }

        input[type="text"], input[type="date"], input[type="submit"] {
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


    <h2>- FUTURE EVENTS -</h2>
    <table>
        <tr>
            <th>Event Name</th>
            <th>Event Date</th>
            <th>Action</th>
        </tr>
        <?php
        $sql = "SELECT * FROM future_event;";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            ?>
            <tr>
                <td><?php echo $row['future_event_name']; ?></td>
                <td><?php echo $row['future_event_date']; ?></td>
                <td>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="future_event_id" value="<?php echo $row['future_event_id']; ?>">
                        <button type="submit" name="delete_future" style="background-color: #2E8B57; color: white; border: none; padding: 6px; cursor: pointer;">Delete</button>
                    </form>
                </td>
            </tr>
        <?php }
        ?>
    </table>

    <h2>- PRESENT EVENTS -</h2>
    <table>
        <tr>
            <th>Event Name</th>
            <th>Event Date</th>
            <th>Action</th>
        </tr>
        <?php
        $sql = "SELECT * FROM present_event;";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            ?>
            <tr>
                <td><?php echo $row['present_event_name']; ?></td>
                <td><?php echo $row['present_event_date']; ?></td>
                <td>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="present_event_id" value="<?php echo $row['present_event_id']; ?>">
                        <button type="submit" name="delete_present" style="background-color: #2E8B57; color: white; border: none; padding: 6px; cursor: pointer;">Delete</button>
                    </form>
                </td>
            </tr>
        <?php }
        ?>
    </table>

    <h2>- PAST EVENTS -</h2>
    <table>
        <tr>
            <th>Event Name</th>
            <th>Event Date</th>
            <th>Action</th>
        </tr>
        <?php
        $sql = "SELECT * FROM past_event;";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            ?>
            <tr>
                <td><?php echo $row['past_event_name']; ?></td>
                <td><?php echo $row['past_event_date']; ?></td>
                <td>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="past_event_id" value="<?php echo $row['past_event_id']; ?>">
                        <button type="submit" name="delete_past" style="background-color: #2E8B57; color: white; border: none; padding: 6px; cursor: pointer;">Delete</button>
                    </form>
                </td>
            </tr>
        <?php }
        ?>
    </table>

    <h2> ADD UPCOMING EVENTS </h2>
    <form name="f1" action="edit_event.php" method="POST">
        <div class="input-group">
            <label for="en">New Event Name:</label>
            <input type="text" id="en" name="en" required />
        </div>
        <div class="input-group">
            <label for="date">Event Date:</label>
            <input type="date" id="date" name="ed" required />
        </div>
        <input type="hidden" name="add_future" value="1">
        <input type="submit" id="event_btn" value="Add Future Event">
    </form>
    
    <form action="authentication.php" method="POST">
        <input type="hidden" name="un" value="<?php echo htmlspecialchars($_SESSION['username']); ?>">
        <input type="hidden" name="pw" value="<?php echo htmlspecialchars($_SESSION['password']); ?>">
        <input type="hidden" name="club" value="<?php echo htmlspecialchars($_SESSION['clubname']); ?>">
        <input type="hidden" name="aid" value="<?php echo htmlspecialchars($_SESSION['admin_id']); ?>">
        <input type="submit" value="Back">
    </form>
</body>
</html>