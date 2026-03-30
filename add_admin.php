<?php
session_start();

// Check if the session is set and retrieve the clubname
if (!isset($_SESSION['clubname'])) {
    echo "Access denied.";
    exit();
}

$clubname = $_SESSION['clubname'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Admin</title>
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
            width: 300px;
            text-align: center;
        }
        h2 {
            color: #2E8B57;
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        label {
            align-self: flex-start;
            margin: 10px 0 5px;
        }
        input[type="text"], input[type="password"], input[type="submit"] {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            width: 100%;
        }
        input[type="submit"] {
            background-color: #2E8B57;
            color: white;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #1E6847;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add New Admin</h2>
        <form action="add_admin_process.php" method="post">
            <label for="admin_name">Admin Name:</label>
            <input type="text" id="admin_name" name="admin_name" required>
            
            <label for="admin_password">Admin Password:</label>
            <input type="password" id="admin_password" name="admin_password" required>
            
            <!-- Hidden field to pass the club name -->
            <input type="hidden" name="club_name" value="<?php echo htmlspecialchars($clubname); ?>">

            <input type="submit" value="Add Admin">
        </form>
        <form action="authentication.php" method="POST">
            <input type="hidden" name="un" value="<?php echo htmlspecialchars($_SESSION['username']); ?>">
            <input type="hidden" name="pw" value="<?php echo htmlspecialchars($_SESSION['password']); ?>">
            <input type="hidden" name="club" value="<?php echo htmlspecialchars($_SESSION['clubname']); ?>">
            <input type="hidden" name="aid" value="<?php echo htmlspecialchars($_SESSION['admin_id']); ?>">
            <input type="submit" value="Back">
        </form>
    </div>
</body>
</html>
