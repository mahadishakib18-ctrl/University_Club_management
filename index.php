<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUP Club Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2E8B57; /* SeaGreen background */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            overflow: hidden; /* Prevent scrolling */
        }
        h1 {
            color: #fff;
            text-align: center;
            margin: 5px 0;
            font-size: 16px; /* Further reduced font size */
        }
        .welcome {
            font-size: 18px; /* Smaller font size */
            font-weight: bold;
            color: #FFD700; /* Gold color for highlight */
            text-shadow: 1px 1px 2px #000; /* Shadow for highlighting */
            margin: 0; /* Remove margin */
        }
        form {
            background: #fff;
            padding: 6px; /* Reduced padding */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 4px 0;
            width: 240px; /* Adjusted width */
        }
        label {
            display: block;
            margin-bottom: 2px; /* Reduced margin */
            font-weight: bold;
            color: #2E8B57; /* SeaGreen color */
            font-size: 12px; /* Smaller font size */
        }
        input[type="text"],
        input[type="password"],
        select {
            width: calc(100% - 12px); /* Adjust for padding and border */
            padding: 4px; /* Reduced padding */
            margin-bottom: 4px; /* Reduced margin */
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box; /* Ensures padding and border are included in the element's width and height */
            font-size: 12px; /* Smaller font size */
        }
        input[type="submit"] {
            background-color: #2E8B57; /* SeaGreen color */
            color: white;
            padding: 6px 8px; /* Reduced padding */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 12px; /* Smaller font size */
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #1E6847; /* Darker SeaGreen */
        }
        p {
            margin: 0 0 4px 0; /* Reduced margin */
        }
        .form-container {
            display: flex;
            justify-content: center;
            gap: 10px; /* Space between forms */
        }
    </style>
</head>
<body>
    <h1 class="welcome">Welcome to BUP Club Website!</h1>
    <h1>Admin Login</h1>
    <form name="f1" action="authentication.php" method="POST">
        <p>
            <label for="club">Choose a club:</label>
            <select id="club" name="club" required> <!-- Add required attribute -->
                <option value="ITC">ITC</option>
                <option value="RC">RC</option>
            </select>
        </p>
		<p>
                    <label for="id"><b>Admin ID:</b></label>
                    <input type="text" id="id" name="aid" placeholder="  " required>
                </p> 
        <p>
            <label for="user">Username:</label>
            <input type="text" id="user" name="un" required/> <!-- Add required attribute -->
        </p>
        <p>
            <label for="pass">Password:</label>
            <input type="password" id="pass" name="pw" required> <!-- Add required attribute -->
        </p>
        <p>
            <input type="submit" id="btn" value="Login">
        </p>
    </form>
    <div class="form-container">
        <div>
            <h1>View Clubs</h1>
            <form name="f2" action="club_page_for_student.php" method="POST">
                <p>
                    <label for="club">Choose a club:</label>
                    <select id="club" name="club">
                        <option value="ITC">ITC</option>
                        <option value="RC">RC</option>
                    </select>
                </p>
                <p>
                    <input type="submit" id="btn" value="View Club">
                </p>
            </form>
        </div>
        <div>
            <h1>Login as a Member</h1>
            <form name="f3" action="member_login.php" method="POST">
				             
			  <p>
                    <label for="user"><b>Username:</b></label>
                    <input type="text" id="user" name="un" placeholder="alice" required>
                </p>
                <p>
                    <label for="pass"><b>Password:</b></label>
                    <input type="password" id="pass" name="pw" placeholder="" required>
                </p>
                <p>
                    <label for="club">Choose a club:</label>
                    <select id="club" name="club">
                        <option value="ITC">ITC</option>
                        <option value="RC">RC</option>
                    </select>
                </p>
                <p>
                    <input type="submit" id="btn" value="Login">
                </p>
            </form>
        </div>
    </div>
</body>
</html>
