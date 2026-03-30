<?php
session_start();  // Start a session
        include('connection.php');
		$admin_id =$_POST['aid'];
        $username = $_POST['un'];
        $password = $_POST['pw'];
        $clubname = $_POST['club'];
        $cur_pass = $_POST['current_password'];
        $new_pass = $_POST['new_password'];
        $con_pass = $_POST['confirm_password'];
		
		if($new_pass==$con_pass){
		$sql = "update authentication set A_password = '$new_pass' where Admin_id = '$admin_id';";
        $result = mysqli_query($con, $sql);
		echo "password changed successfully";
?>	
<html>
<body>

<form action="index.php" method="POST">
        <input type="submit" value="go back">
    </form>

</body>
</html>
	<?php
	}else{
		echo "Two different password is entered."; 
		?>
		<html>
<body>

<form action="change_pass.php" method="POST">
        <!-- Hidden fields for session data -->
        <input type="hidden" name="un" value="<?php echo htmlspecialchars($_SESSION['username']); ?>">
        <input type="hidden" name="pw" value="<?php echo htmlspecialchars($_SESSION['password']); ?>">
        <input type="hidden" name="club" value="<?php echo htmlspecialchars($_SESSION['clubname']); ?>">
        <input type="hidden" name="aid" value="<?php echo htmlspecialchars($_SESSION['admin_id']); ?>">
        <input type="submit" value="go back">
    </form>

</body>
</html>
		
		<?php
		}
		 
		
?>

