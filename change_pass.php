<?php 

session_start();  // Start a session
        include('connection.php');
		$admin_id =$_POST['aid'];
        $username = $_POST['un'];
        $password = $_POST['pw'];
        $clubname = $_POST['club'];
	?>
<html>	
		<body>
    <div class="container">
        <h2>Change Password</h2>
        <form action="confirm_pass.php" method="POST">
            <label for="current_password">Current Password:</label>
            <input type="password" id="current_password" name="current_password" required><br>
            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password" required><br>
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required><br>
			<input type="hidden" name="un" value="<?php echo htmlspecialchars($_SESSION['username']); ?>">
        
		<input type="hidden" name="pw" value="<?php echo htmlspecialchars($_SESSION['password']); ?>">
        <input type="hidden" name="club" value="<?php echo htmlspecialchars($_SESSION['clubname']); ?>">
        <input type="hidden" name="aid" value="<?php echo htmlspecialchars($_SESSION['admin_id']); ?>">
            <input type="submit" value="Change Password">
        </form>
    </div>
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


  