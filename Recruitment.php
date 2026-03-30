<?php
session_start();
$clubname = isset($_POST['clubname']) ? $_POST['clubname'] : '';

// Check if the club name is set
if (!$clubname) {
    die("No club selected.");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recruitment - <?php echo htmlspecialchars($clubname); ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2E8B57; /* SeaGreen background */
            color: white;
            padding: 20px;
            text-align: center;
        }

        form {
            background: #fff;
            color: black;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            width: 500px;
            margin: 20px auto;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="tel"],
        input[type="date"],
        input[type="file"],
        select {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 14px;
        }

        input[type="submit"] {
            background-color: #2E8B57; /* SeaGreen color */
            color: white;
            border: none;
            padding: 10px;
            border-radius: 3px;
            cursor: pointer;
            font-size: 14px;
        }

        input[type="submit"]:hover {
            background-color: #1E6847; /* Darker SeaGreen */
        }
    </style>
</head>
<body>
    <h1>Register Here</h1>
    <form action="signup.php" enctype="multipart/form-data" method="post">
        <b>Enter your ID </b>
        <input type="text" name="i" placeholder="Enter id" required />
        <br>
        <b>Enter your Name</b>
        <input type="text" name="n" placeholder="Enter name" required />
        <br>
        <b>Enter password</b>
        <input type="text" name="pass" placeholder="Enter password" required />
        <br>
        <label for="faculty"><b>Select Faculty </b></label>
        <select id="faculty" name="f">
            <option value="fst">Faculty of Science and Technology (FST)</option>
            <option value="fbs">Faculty of Business Studies (FBS)</option>
        </select>
        <br>
        <label for="department"><b>Select Department </b></label>
        <select id="department" name="d">
            <option value="ICT">ICT</option>
            <option value="CSE">CSE</option>
            <option value="ES">ES</option>
            <option value="AIS">AIS</option>
            <option value="F&B">F&B</option>
            <option value="MGT">MGT</option>
        </select>
        <br>
        <label for="year"><b>Select year</b></label>
        <select id="year" name="y">
            <option value="1st">1st year</option>
            <option value="2nd">2nd year</option>
            <option value="3rd">3rd year</option>
            <option value="4th">4th year</option>
        </select>
        <br>
        <b>Enter your Address</b>
        <input type="text" name="Add" placeholder="Enter Address" required />
        <br>
        <b>Enter your Email</b>
        <input type="email" name="e" placeholder="Enter Email" required />
        <br>
        <label for="mobile"><b>Phone number </b></label>
        <input type="tel" id="mobile" name="mob" placeholder="01718111111" required />
        <br>
        <label for="dob"><b>Date of birth</b></label>
        <input type="date" id="dob" name="dob" required />
        <br>
        <label for="blood"><b>Select blood group </b></label>
        <select id="blood" name="b">
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
        </select>
        <br>
        <b>Select your Profile-pic</b>
        <input type="file" name="pic" />
        <!-- Add other variables as hidden input fields -->
        <input type="hidden" name="clubname" value="<?php echo htmlspecialchars($clubname); ?>">
        <input type="submit" name="save" value="Register" />
    </form>
	
	 <form action="club_page_for_student.php" method="post">
        <input type="submit" value="Back" class="small-button">
    </form>
</body>
</html>
