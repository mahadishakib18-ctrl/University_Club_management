<?php
session_start(); // Start a session

include('connection.php');

// Check if all required POST parameters are set
if(isset($_POST['un'], $_POST['pw'], $_POST['club'])) {
    $username = $_POST['un'];
    $password = $_POST['pw'];
    $clubname = $_POST['club'];

    // Prepare SQL statement to prevent SQL injection
    $sql = "SELECT * FROM student WHERE Student_Name = ? AND password = ? AND club_name = ? AND status='YES'";
    
    // Prepare and bind the statement
    $stmt = mysqli_prepare($con, $sql);

    // Check if the statement was prepared successfully
    if($stmt) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "sss", $username, $password, $clubname);
        
        // Execute the statement
        mysqli_stmt_execute($stmt);
        
        // Get result set
        $result = mysqli_stmt_get_result($stmt);
        
        // Check if there's any row returned
        if(mysqli_num_rows($result) == 1) {
            // Fetch student ID
            $student_id_sql = "SELECT Student_ID, picture FROM student WHERE Student_Name = ? AND password = ?";
            $student_id_stmt = mysqli_prepare($con, $student_id_sql);
            
            if($student_id_stmt) {
                mysqli_stmt_bind_param($student_id_stmt, "ss", $username, $password);
                mysqli_stmt_execute($student_id_stmt);
                $student_id_result = mysqli_stmt_get_result($student_id_stmt);
                $student_id_row = mysqli_fetch_assoc($student_id_result);
                
                if($student_id_row) {
                    $student_id = $student_id_row['Student_ID'];
                    $imagePath = $student_id_row['picture'];

                    // Store user data, student ID, and photo path in session
                    $_SESSION['username'] = $username;
                    $_SESSION['clubname'] = $clubname;
                    $_SESSION['student_id'] = $student_id;
                    $_SESSION['imagePath'] = $imagePath;

                    // Display the membership page content
                    ?>
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Membership</title>
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
                            .profile-picture {
                                margin: 20px 0;
                            }
                            .profile-picture img {
                                border-radius: 50%;
                                border: 2px solid #2E8B57;
                                width: 200px;
                                height: 200px;
                                object-fit: cover;
                            }
                            form {
                                display: flex;
                                flex-direction: column;
                                align-items: center;
                            }
                            input[type="submit"] {
                                background-color: #2E8B57;
                                color: white;
                                border: none;
                                cursor: pointer;
                                padding: 10px;
                                border-radius: 5px;
                                margin: 5px 0;
                                width: 100%;
                            }
                            input[type="submit"]:hover {
                                background-color: #1E6847;
                            }
                        </style>
                    </head>
                    <body>
                        <div class="container">
                            <h2>Membership</h2>
                            <?php if($imagePath): ?>
                                <div class="profile-picture">
                                    <img src="<?php echo htmlspecialchars($imagePath); ?>" alt="Profile Picture">
                                </div>
                            <?php endif; ?>
                            <form action="show_notice_as_student.php" method="post">
                                <input type="submit" name="show" value="Show Notice from Admin" />
                            </form>
                            <form action="individual_notice_as_student.php" method="post">
                                <input type="hidden" name="student_id" value="<?php echo htmlspecialchars($student_id); ?>">
                                <input type="submit" name="show" value="Show Individual Notice from Admin" />
                            </form>
							
							   <form action="msg_to_admin.php" method="post">
							  <input type="hidden" name="student_id" value="<?php echo htmlspecialchars($SESSION['student_id']); ?>">	
                                <input type="submit" name="show" value="Send message to Admin" />
                            </form>
                           
							<form action="achievement2.php" method="post">
					<input type="hidden" name="un" value="<?php echo htmlspecialchars($username); ?>">
							   <input type="hidden" name="pw" value="<?php echo htmlspecialchars($password); ?>">
							    <input type="hidden" name="club" value="<?php echo htmlspecialchars($clubname); ?>">		
                                <input type="submit" name="show" value="Achievement" />
                            </form>
							 <form action="Event2.php" method="post">
							 
							  <input type="hidden" name="un" value="<?php echo htmlspecialchars($username); ?>">
							   <input type="hidden" name="pw" value="<?php echo htmlspecialchars($password); ?>">
							    <input type="hidden" name="club" value="<?php echo htmlspecialchars($clubname); ?>">
                                <input type="submit" name="show" value="Event" />
								
                            </form>
							
							 <form action="index.php" method="POST">
                                <input type="submit" value="Back">
                            </form>
                        </div>
                    </body>
                    </html>
                    <?php
                } else {
                    echo "Failed to fetch student ID.";
                }
            } else {
                echo "Error preparing the SQL statement for fetching student ID: " . mysqli_error($con);
            }
        } else {
            echo "Invalid username, password, club name, or status.";
        }
    } else {
        // Display error message if preparing the SQL statement failed
        echo "Error preparing the SQL statement: " . mysqli_error($con);
    }
} else {
    echo "Please provide username, password, and club name.";
}
?>
