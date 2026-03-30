<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home Page</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #2E8B57; /* SeaGreen background */
            margin: 0;
            padding: 0;
            color: white;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            overflow-y: auto; /* Enable vertical scrolling */
        }
        h1 {
            color: #FFD700; /* Gold color for highlight */
            text-shadow: 2px 2px 4px #000; /* Shadow for highlighting */
            margin: 10px 0;
            text-align: center;
        }
        form {
            background: #fff;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 10px 0;
            width: 280px;
        }
        input[type="submit"] {
            background-color: #2E8B57; /* SeaGreen color */
            color: white;
            padding: 8px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #1E6847; /* Darker SeaGreen */
        }
        p {
            margin: 8px 0; /* Reduced margin */
        }
        a {
            color: #FFD700; /* Gold color for the link */
            text-decoration: none; /* Remove underline */
        }
        a:hover {
            text-decoration: underline; /* Add underline on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        session_start();  // Start a session
        include('connection.php');
        $admin_id =$_POST['aid'];
        $username = $_POST['un'];
        $password = $_POST['pw'];
        $clubname = $_POST['club'];

        $sql = "SELECT * FROM authentication WHERE A_Name = '$username' AND A_password = '$password' AND club_name = '$clubname' AND Admin_Id='$admin_id'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            // Store user data in session
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password; // Consider not storing plain passwords in session
            $_SESSION['clubname'] = $clubname;
            $_SESSION['admin_id'] = $admin_id;

            echo "<h1>WELCOME TO YOUR HOME PAGE</h1>";
            echo "<h1><p class='uppercase'> $username </p></h1>";
            ?>
            <form name="f4" action="edit_achievement.php" method="POST">
                <p>
                    <input type="submit" id="btn" value="EDIT ACHIEVEMENT">
                </p>
            </form>
            <form name="f4" action="edit_event.php" method="POST">
                <p>
                    <input type="submit" id="btn" value="EDIT EVENT">
                </p>
            </form>
            <form name="f4" action="send_notice.php" method="POST">
                <p>
                    <input type="hidden" name="un" value="<?php echo $username; ?>">
                    <input type="hidden" name="pw" value="<?php echo $password; ?>">
                    <input type="hidden" name="club" value="<?php echo $clubname; ?>">
                    <input type="hidden" name="aid" value="<?php echo $admin_id; ?>">
                    <input type="submit" id="btn" value="SEND NOTICE">
                </p>
            </form>
            <form name="f4" action="approve_req.php" method="POST">
                <p>
                    <input type="hidden" name="un" value="<?php echo $username; ?>">
                    <input type="hidden" name="pw" value="<?php echo $password; ?>">
                    <input type="hidden" name="club" value="<?php echo $clubname; ?>">
                    <input type="hidden" name="aid" value="<?php echo $admin_id; ?>">
                    <input type="submit" id="btn" value="APPROVE REQUEST">
                </p>
            </form>
            <form action="add_admin.php" method="POST">
                <input type="hidden" name="clubname" value="<?php echo $clubname; ?>">
                <input type="submit" value="ADD NEW ADMIN" class="small-button">
            </form>
            <form name="f4" action="change_pass.php" method="POST">
                <input type="hidden" name="un" value="<?php echo $username; ?>">
                <input type="hidden" name="pw" value="<?php echo $password; ?>">
                <input type="hidden" name="club" value="<?php echo $clubname; ?>">
                <input type="hidden" name="aid" value="<?php echo $admin_id; ?>">
                <input type="submit" id="btn" value="CHANGE PASSWORD">
            </form>
            <form name="f4" action="view_members.php" method="POST">
                <input type="hidden" name="un" value="<?php echo $username; ?>">
                <input type="hidden" name="pw" value="<?php echo $password; ?>">
                <input type="hidden" name="club" value="<?php echo $clubname; ?>">
                <input type="hidden" name="aid" value="<?php echo $admin_id; ?>">
                <input type="submit" id="btn" value="VIEW MEMBERS">
            </form>

            <form action="index.php" method="post">
                <input type="submit" value="Back" class="small-button">
            </form>
            <?php
        } else {
            ?>
            <h1>Login failed. Invalid username or password.</h1>
            <a href="index.php">CLICK HERE TO TRY AGAIN</a>
            <?php
        }
        ?>
    </div>
</body>
</html>
